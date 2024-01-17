<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DekorasiModel;
use CodeIgniter\HTTP\ResponseInterface;

class Dekorasi extends BaseController
{
    protected $dekorasi;
    public function __construct()
    {
        session();
        $this->dekorasi = new DekorasiModel();
    }
    public function index()
    {
        if (session()->get('logged_in')  == true) {
            $data['dekorasi'] = $this->dekorasi->findAll();
            return view('admin/dekorasi/index', $data);
        } else {
            return redirect()->to('admin/login');
        }
    }

    public function add()
    {
        if (session()->get('logged_in')  == true) {
            return view('admin/dekorasi/add');
        } else {
            return redirect()->to('admin/login');
        }
    }

    public function save()
    {
        if (session()->get('logged_in')  == true) {
            $rules = [
                'nama_dekorasi' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required',
                'gambar' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
            ];
            $pesan = [
                'nama_dekorasi' => [
                    'required' => 'Nama Dekorasi Tidak Boleh Kosong'
                ],
                'deskripsi' => [
                    'required' => 'Deskripsi Tidak Boleh Kosong'
                ],
                'harga' => [
                    'required' => 'Harga Tidak Boleh Kosong'
                ],
                'gambar' => [
                    'uploaded' => 'File Belum DiUpload',
                    'mime_in' => 'Tipe File Tidak DiIzinkan'
                ],
            ];
            if (!$this->validate($rules, $pesan)) {
                $data['validation'] = $this->validator;
                return view('admin/dekorasi/add', $data);
            }
            $nama_dekorasi = $this->request->getVar('nama_dekorasi');
            $deskripsi = $this->request->getVar('deskripsi');
            $harga = $this->request->getVar('harga');
            $gambar = $this->request->getFile('gambar');
            $gambar->move(WRITEPATH . '../public/gambar');

            $data = [
                'nama_dekor' => $nama_dekorasi,
                'deskripsi' => $deskripsi,
                'harga' => $harga,
                'gambar' => $gambar->getClientName()
            ];
            $this->dekorasi->save($data);

            return redirect()->to('admin/dekorasi');
        } else {
            return redirect()->to('admin/login');
        }
    }

    public function edit($id)
    {
        if (session()->get('logged_in')  == true) {
            $data['cari'] = $this->dekorasi->where(['id_dekor' => $id])->first();
            return view('admin/dekorasi/edit', $data);
        } else {
            return redirect()->to('admin/login');
        }
    }

    public function update()
    {
        if (session()->get('logged_in')  == true) {
            $id = $this->request->getVar('kode');
            $nama_dekorasi = $this->request->getVar('nama_dekorasi');
            $deskripsi = $this->request->getVar('deskripsi');
            $harga = $this->request->getVar('harga');
            $gambar = $this->request->getFile('gambar');
            $gambar->move(WRITEPATH . '../public/gambar');

            $data = [
                'id_dekor' => $id,
                'nama_dekor' => $nama_dekorasi,
                'deskripsi' => $deskripsi,
                'harga' => $harga,
                'gambar' => $gambar->getClientName()
            ];
            $this->dekorasi->save($data);

            return redirect()->to('admin/dekorasi');
        } else {
            return redirect()->to('admin/login');
        }
    }

    public function delete($id)
    {
        if (session()->get('logged_in')  == true) {
            $this->dekorasi->delete($id);

            return redirect()->to('admin/dekorasi');
        } else {
            return redirect()->to('admin/login');
        }
    }

    
}
