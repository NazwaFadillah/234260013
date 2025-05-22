<?php

// app/Models/UserModel.php
// File model untuk mengelola data pengguna (user)

namespace App\Models; // Menentukan namespace model
use CodeIgniter\Model; // Mengimpor base class Model dari CodeIgniter

class UserModel extends Model { // Mendeklarasikan class UserModel yang mewarisi CodeIgniter\Model

    protected $table = 'users'; 
    // Menentukan nama tabel database yang digunakan, yaitu 'users'

    protected $allowedFields = ['username', 'password']; 
    // Kolom-kolom yang diizinkan untuk diisi atau diubah (saat insert/update)

    protected $useTimestamps = false;
    // Menonaktifkan fitur timestamp (created_at dan updated_at)
}
?>