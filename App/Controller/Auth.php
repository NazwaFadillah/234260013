<?php

// Lokasi file: app/Controllers/Auth.php

namespace App\Controllers; // Mendeklarasikan namespace controller ini
use App\Models\UserModel; // Mengimpor model UserModel untuk akses ke database user
use CodeIgniter\Controller; // Mengimpor base Controller dari CodeIgniter

class Auth extends Controller { // Membuat class Auth yang mewarisi Controller

    public function login() { // Method untuk menangani login
        helper(['form']); // Memuat form helper (berguna untuk validasi, dsb)

        if ($this->request->getMethod() === 'post') { // Jika method form adalah POST (form disubmit)
            $model = new UserModel(); // Membuat objek model untuk akses database

            // Mencari data user berdasarkan username yang dikirim dari form
            $user = $model->where('username', $this->request->getPost('username'))->first();

            // Jika user ditemukan dan password cocok
            if ($user && password_verify($this->request->getPost('password'), $user['password'])) {//Mengecek kecocokan password plaintext dan password yang di-hash.
                // Simpan data user ke session
                session()->set([ //Menyimpan data ke dalam session.
                    'user_id' => $user['id'],
                    'username' => $user['username']
                ]);
                return redirect()->to('/tugas'); // Arahkan ke halaman /tugas setelah login berhasil
            }

            // Jika login gagal, kembali ke halaman sebelumnya dengan pesan error
            return redirect()->back()->with('error', 'Login gagal');
        }

        // Jika request bukan POST, tampilkan halaman login
        return view('auth/login');
    }

    public function register() { // Method untuk menangani registrasi user baru
        helper(['form']); // Memuat form helper

        if ($this->request->getMethod() === 'post') { // Jika method form adalah POST
            $model = new UserModel(); // Membuat objek model

            // Ambil data dari form dan hash password-nya
            $data = [
                'username' => $this->request->getPost('username'),//Mengambil data dari form POST.
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];

            $model->insert($data); // Simpan data user ke database
            return redirect()->to('/login'); // Arahkan ke halaman login setelah registrasi
        }

        // Jika request bukan POST, tampilkan halaman register
        return view('auth/register');
    }

    public function logout() { // Method untuk logout user
        session()->destroy(); // Hancurkan semua data session (logout)
        return redirect()->to('/login'); // Arahkan ke halaman login
    }
}
?>
