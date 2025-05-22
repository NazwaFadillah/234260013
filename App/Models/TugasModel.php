<?php

// app/Models/TugasModel.php
// Model untuk mengelola data dari tabel 'tugas'

namespace App\Models; // Menentukan namespace untuk model ini

use CodeIgniter\Model; // Mengimpor base class Model dari CodeIgniter

class TugasModel extends Model { // Deklarasi class TugasModel yang mewarisi CodeIgniter\Model

    protected $table = 'tugas';
    // Menentukan nama tabel di database yang digunakan model ini

    protected $allowedFields = ['judul', 'deskripsi', 'deadline', 'status', 'user_id'];
    // Menentukan kolom-kolom mana saja yang diizinkan untuk diisi atau diubah
    // Fitur keamanan untuk mencegah mass-assignment ke kolom lain

    protected $useTimestamps = false;
    // Menonaktifkan fitur otomatis pengisian kolom 'created_at' dan 'updated_at'
    // Jika tabel memiliki kolom waktu tersebut, bisa diubah menjadi true
}
?>