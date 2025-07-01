<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $user;

    function __construct()
    {
        helper('form');
        $this->user = new UserModel();
    }

    public function login()
    {
        if ($this->request->getPost()) {
            $rules = [
                'username' => 'required|min_length[6]',
                'password' => 'required|min_length[7]|numeric',
            ];

            if ($this->validate($rules)) {
                $username = $this->request->getVar('username');
                $password = $this->request->getVar('password');

                $dataUser = $this->user->where(['username' => $username])->first();

                if ($dataUser) {
                    if (password_verify($password, $dataUser['password'])) {
                        // --- MULAI KODE BARU UNTUK CEK DISKON ---

                        // 1. Hubungkan ke database dan cari diskon untuk hari ini. 
                        $db = \Config\Database::connect();
                        // Tanggal hari ini adalah Senin, 30 Juni 2025
                        $diskonHariIni = $db->table('diskons')->where('tanggal', date('Y-m-d'))->get()->getRow();
                        
                        // 2. Siapkan data session dasar
                        $sessionData = [
                            'username' => $dataUser['username'],
                            'role' => $dataUser['role'],
                            'isLoggedIn' => TRUE
                        ];

                        // 3. Jika diskon ditemukan, tambahkan ke data session. 
                        if ($diskonHariIni) {
                            $sessionData['diskon_hari_ini'] = [
                                'nominal' => $diskonHariIni->nominal
                            ];
                        }

                        // --- AKHIR KODE BARU ---
                        
                        // Set semua data ke session
                        session()->set($sessionData);

                        return redirect()->to(base_url('/'));
                    } else {
                        session()->setFlashdata('failed', 'Kombinasi Username & Password Salah');
                        return redirect()->back();
                    }
                } else {
                    session()->setFlashdata('failed', 'Username Tidak Ditemukan');
                    return redirect()->back();
                }
            } else {
                session()->setFlashdata('failed', $this->validator->listErrors());
                return redirect()->back();
            }
        }

        return view('v_login');
    }
    
    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}