<?php

// app/Controllers/Tugas.php
// File controller untuk mengelola data tugas

namespace App\Controllers; // Menetapkan namespace controller
use App\Models\TugasModel; // Mengimpor model TugasModel untuk akses database
use CodeIgniter\Controller; // Mengimpor base class Controller dari CodeIgniter

class Tugas extends Controller { // Membuat class Tugas yang mewarisi fitur dari Controller

    public function index() { //Menampilkan semua tugas milik user yang sedang login.
        $model = new TugasModel(); // Membuat objek model untuk ambil data tugas
        // Mengambil semua data tugas berdasarkan user yang sedang login
        $data['tugas'] = $model->where('user_id', session()->get('user_id'))->findAll();
        // Mengirim data ke view tugas/index.php
        return view('tugas/index', $data);
    }

    public function tambah() { //Menampilkan form tambah tugas dan menyimpan data ke database.
        // Jika form dikirim (method POST)
        if ($this->request->getMethod() === 'post') {
            $model = new TugasModel(); // Membuat objek model
            // Menyimpan data tugas yang dikirim melalui form
            $model->save([
                'judul' => $this->request->getPost('judul'), // Mengambil judul dari input form
                'deskripsi' => $this->request->getPost('deskripsi'), // Mengambil deskripsi dari input form
                'deadline' => $this->request->getPost('deadline'), // Mengambil deadline dari input form
                'status' => $this->request->getPost('status'), // Mengambil status dari input form
                'user_id' => session()->get('user_id'), // Menetapkan ID user yang sedang login
            ]);
            return redirect()->to('/tugas'); // Setelah disimpan, redirect ke halaman daftar tugas
        }
        // Jika bukan POST, tampilkan form tambah tugas
        return view('tugas/tambah');
    }

    public function edit($id) { //Menampilkan form edit dan memperbarui data tugas berdasarkan ID.
        $model = new TugasModel(); // Membuat objek model
        // Jika form dikirim (method POST)
        if ($this->request->getMethod() === 'post') {
            // Memperbarui data tugas berdasarkan ID
            $model->update($id, [
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'deadline' => $this->request->getPost('deadline'),
                'status' => $this->request->getPost('status'),
            ]);
            return redirect()->to('/tugas'); // Setelah update, kembali ke daftar tugas
        }
        // Jika bukan POST, ambil data tugas berdasarkan ID untuk ditampilkan di form edit
        $data['tugas'] = $model->find($id);
        return view('tugas/edit', $data); // Kirim data ke view edit
    }

    public function hapus($id) { //Menghapus tugas berdasarkan ID.
        $model = new TugasModel(); // Membuat objek model
        $model->delete($id); // Menghapus data tugas berdasarkan ID
        return redirect()->to('/tugas'); // Setelah hapus, kembali ke daftar tugas
    }
}
?>