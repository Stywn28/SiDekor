<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;
use Google_Client;

class Login extends BaseController
{
    protected $users;
    protected $googleClient;
    public function __construct()
    {
        $this->users = new UsersModel();
        helper(['form', 'url']);

        $this->googleClient = new Google_Client();
        $this->googleClient->setClientId('788204451509-blsn7pf5j9kdso69gk4gjkovdbukd22j.apps.googleusercontent.com');
        $this->googleClient->setClientSecret('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');
        $this->googleClient->setRedirectUri('http://localhost:8080/login/masuk');
        $this->googleClient->addScope('email');
        $this->googleClient->addScope('profile');
    }
    public function index()
    {
        $data['link'] = $this->googleClient->createAuthUrl();
        return view('login/index', $data);
    }

    public function register()
    {
        return view('register/index');
    }

    public function save()
    {
        // $rules = [
        //     'nama' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Nama Lengkap Tidak Boleh Kosong!'
        //         ]
        //     ],
        //     'ponsel' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Ponsel Lengkap Tidak Boleh Kosong!',
        //         ]
        //     ],
        //     'email' => [
        //         'rules' => 'required|valid_email',
        //         'errors' => [
        //             'required' => 'Email Lengkap Tidak Boleh Kosong!',
        //             'valid_email' => 'Format Email Tidak Benar!'
        //         ]
        //     ],
        //     'password' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Password Lengkap Tidak Boleh Kosong!'
        //         ]
        //     ],
        // ];
        // if (!$this->validate($rules)) {
        //     $data['validation'] = $this->validator;
        //     return view('register/index', $data);
        // }
        // $nama = $this->request->getVar('nama');
        // $ponsel = $this->request->getVar('ponsel');
        // $email = $this->request->getVar('email');
        // $password = password_hash($this->request->getVar('password'), PASSWORD_BCRYPT);
        // $data = [
        //     'id' => time(),
        //     'nama' => $nama,
        //     'ponsel' => $ponsel,
        //     'email' => $email,
        //     'password' => $password,
        // ];
        // $this->users->save($data);
        // session()->setFlashdata('success', 'Horeee, Berhasil Daftar Akun');
        // return redirect()->to('login');
            $rules = [
                'nama' => 'required',
                'ponsel' => 'required',
                'email' => 'required|valid_email',
                'password' => 'required',
                'ulpass' => 'required|matches[password]'
            ];
            $pesan = [
                'nama' => [
                    'required' => 'Nama Tidak Boleh Kosong!',
                ],
                'ponsel' => [
                    'required' => 'No Ponsel Tidak Boleh Kosong!',
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
                return view('register/index', $data);
            }

            $nama = $this->request->getVar('nama');
            $ponsel = $this->request->getVar('ponsel');
            $email = $this->request->getVar('email');
            $password = password_hash($this->request->getVar('password'), PASSWORD_BCRYPT);

            $data = [
                'id' => time(),
                'nama' => $nama,
                'ponsel' => $ponsel,
                'email' => $email,
                'password' => $password,
            ];

            $this->users->save($data);
            session()->setFlashdata('success', 'Horeee, Berhasil Daftar Akun');
            return redirect()->to('login');
        
    }

    public function proses()
    {
        // $rules = [
        //     'email' => [
        //         'rules' => 'required|valid_email',
        //         'errors' => [
        //             'required' => 'Email Tidak Boleh Kosong',
        //             'valid_email' => 'Format Email Tidak Benar'
        //         ]
        //     ],
        //     'password' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Password Tidak Boleh Kosong',
        //         ]
        //     ],
        // ];
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required'
        ];

        $pesan = [
            'email' => [
                'required' => 'Email Tidak Boleh Kosong!',
                'valid_email' => 'Format Email Salah!'
            ],
            'password' => [
                'required' => 'Password Tidak Boleh Kosong!',
            ]
        ];
        // if (!$this->validate($rules)) {
        //     $data['validation'] = $this->validator;
        //     return view('login/index', $data);
        // }
        if (!$this->validate($rules, $pesan)) {
            $data['validation'] = $this->validator;
            return view('login/index', $data);
        }
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $login = $this->users->where(['email' => $email])->first();
        if ($login) {
            if (password_verify($password, $login->password)) {
                session()->set([
                    'id' => $login->id,
                    'nama' => $login->nama,
                    'email' => $login->email,
                    'logged_in' => true
                ]);
                return redirect()->to('dashboard/index');
            } else {
                session()->setFlashdata('error', 'Password Masih Salah!');
                return redirect()->to('login');
            }
        } else {
            session()->setFlashdata('error', 'Email Tidak DiTemukan!');
            return redirect()->to('login');
        }
    }

    public function keluar()
    {
        session()->destroy();
        return redirect()->to('home/index');
    }

    public function masuk()
    {
        $token = $this->googleClient->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
        if (!isset($token['error'])) {
            $this->googleClient->setAccessToken($token['access_token']);
            $googleService = new \Google_Service_Oauth2($this->googleClient);
            $isi = $googleService->userinfo->get();

            $row = [
                'id' => $isi['id'],
                'nama' => $isi['name'],
                'ponsel' => $isi['ponsel'],
                'email' => $isi['email'],
            ];
            $this->users->save($row);
            session()->set([
                'id' => $isi['id'],
                'nama' => $isi['name'],
                'email' => $isi['email'],
                'logged_in' => true
            ]);
            return redirect()->to('dashboard/index');
        }
    }
}
