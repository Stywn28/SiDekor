<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use CodeIgniter\HTTP\ResponseInterface;

class Petugas extends BaseController
{
    protected $petugas;
    public function __construct()
    {
        $this->petugas = new AdminModel();
        helper(['form', 'url']);
    }
    public function index()
    {
        if (session()->get('logged_in')  == true) {
            $data['petugas'] = $this->petugas->findAll();
            return view('admin/petugas/index', $data);
        } else {
            return redirect()->to('admin/login');
        }
    }

    public function add()
    {
        if (session()->get('logged_in')  == true) {
            return view('admin/petugas/add');
        } else {
            return redirect()->to('admin/login');
        }
    }

    public function save()
    {
        if (session()->get('logged_in')  == true) {
            $rules = [
                'nama' => 'required',
                'email' => 'required|valid_email',
                'password' => 'required',
                'ulpass' => 'required|matches[password]'
            ];
            $pesan = [
                'nama' => [
                    'required' => 'Nama Tidak Boleh Kosong!',
                ],
                'email' => [
                    'required' => 'Email Tidak Boleh Kosong!',
                    'valid_email' => 'Format Email Salah!'
                ],
                'password' => [
                    'required' => 'Password Tidak Boleh Kosong!',
                ],
                'ulpass' => [
                    'required' => 'Ulang Password Tidak Boleh Kosong!',
                    'matches' => 'Password Tidak Sama!'
                ]
            ];
            if (!$this->validate($rules, $pesan)) {
                $data['validation'] = $this->validator;
                return view('admin/petugas/add', $data);
            }

            $nama = $this->request->getVar('nama');
            $email = $this->request->getVar('email');
            $password = password_hash($this->request->getVar('password'), PASSWORD_BCRYPT);

            $data = [
                'nama' => $nama,
                'email' => $email,
                'password' => $password
            ];

            $this->petugas->save($data);
            return redirect()->to('admin/petugas');
        } else {
            return redirect()->to('admin/login');
        }
    }

    public function edit($id)
    {
        $data['cari'] = $this->petugas->where(['id_admin' => $id])->first();
        return view('admin/petugas/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getVar('kode');
        $nama = $this->request->getVar('nama');
        $email = $this->request->getVar('email');
        $password = password_hash($this->request->getVar('password'), PASSWORD_BCRYPT);
        if (empty($this->request->getVar('password'))) {
            $data = [
                'id_admin' => $id,
                'nama' => $nama,
                'email' => $email,
            ];
        } else {
            $data = [
                'id_admin' => $id,
                'nama' => $nama,
                'email' => $email,
                'password' => $password
            ];
        }
        $this->petugas->save($data);
        return redirect()->to('admin/petugas');
    }

    public function delete($id)
    {
        $this->petugas->delete($id);
        return redirect()->to('admin/petugas');
    }
}
