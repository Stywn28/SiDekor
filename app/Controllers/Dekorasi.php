<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DekorasiModel;
use App\Models\PesanModel;
use CodeIgniter\HTTP\ResponseInterface;

class Dekorasi extends BaseController
{
    protected $dekorasi;
    protected $pesan;
    public function __construct()
    {
        $this->pesan = new PesanModel();
        helper(['form', 'url']);
        $this->dekorasi = new DekorasiModel();
    }
    public function index()
    {
        if (session()->get('logged_in') == true) {
            $data['dekorasi'] = $this->dekorasi->findAll();
            return view('dekorasi/index', $data);
        } else {
            return redirect()->to('login');
        }
    }

    public function pesan($id)
    {
        if (session()->get('logged_in') == true) {
            $data['dekorasi'] = $this->dekorasi->where(['id_dekor' => $id])->first();
            return view('dekorasi/pesan', $data);
        } else {
            return redirect()->to('login');
        }
    }

    public function proses()
    {
        $harga = $this->request->getVar('harga');
        $id = $this->request->getVar('id');
        $rules = [

            'lama' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Tanggal Harus Di Isi!',
                    'numeric' => 'Lama Penyewaan Harus Angka'
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Harus Di Isi!'
                ]
            ]

        ];
        if ($this->validate($rules)) {
            $data['dekorasi'] = $this->dekorasi->where(['id_dekor' => $id])->first();
            $data['validation'] = $this->validator->getErrors();
            return view('dekorasi/pesan', $data);
        }
        $lama = $this->request->getVar('lama');
        $tanggal = $this->request->getVar('tanggal');

        $total = $harga;

        \Midtrans\Config::$serverKey = 'SB-Mid-server-epWF61uzp3KBuWGOugyL-w8F';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $id_pesan = time();
        $nama = session()->get('nama');
        $email = session()->get('email');
        $params = array(
            'transaction_details' => array(
                'order_id' => $id_pesan,
                'gross_amount' => $total,
            ),
            'customer_details' => array(
                'first_name' => $nama,
                'last_name' => '',
                'email' => $email,
                'phone' => '',
            ),
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $data = [
            'id_pesan' => $id_pesan,
            'id' => session()->get('id'),
            'id_dekor' => $id,
            'total' => $total,
            'tanggal' => $tanggal,
            'snap' => $snapToken
        ];
        $this->pesan->save($data);
        session()->setFlashdata('success', 'Berhasil Pesan Dekorasi');
        return redirect()->to('dekorasi/bayar');
    }

    public function bayar()
    {
        $data['pesan'] = $this->pesan
            ->join('dekorasi', 'dekorasi.id_dekor=pesan.id_dekor')
            ->where(['id' => session()->get('id')])
            ->findAll();
        return view('dekorasi/bayar', $data);
    }
}
