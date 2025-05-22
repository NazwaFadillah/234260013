// app/Config/Routes.php

$routes->get('/login', 'Auth::login'); 
// Menampilkan halaman login (GET request ke method login di Auth controller)

$routes->post('/login', 'Auth::login'); 
// Menangani proses login saat form dikirim (POST request ke method login)

$routes->get('/register', 'Auth::register'); 
// Menampilkan halaman register (GET request ke method register)

$routes->post('/register', 'Auth::register'); 
// Menangani proses pendaftaran user baru (POST request ke method register)

$routes->get('/logout', 'Auth::logout'); 
// Menangani proses logout user (GET request ke method logout)

$routes->get('/tugas', 'Tugas::index'); 
// Menampilkan daftar tugas (GET request ke method index pada Tugas controller)

$routes->get('/tugas/tambah', 'Tugas::tambah'); 
// Menampilkan form tambah tugas (GET request ke method tambah)

$routes->post('/tugas/tambah', 'Tugas::tambah'); 
// Menangani proses penyimpanan tugas baru (POST request ke method tambah)

$routes->get('/tugas/edit/(:num)', 'Tugas::edit/$1'); 
// Menampilkan form edit tugas dengan ID tertentu (GET request ke method edit)

$routes->post('/tugas/edit/(:num)', 'Tugas::edit/$1'); 
// Menangani proses update tugas (POST request ke method edit dengan ID)

$routes->get('/tugas/hapus/(:num)', 'Tugas::hapus/$1'); 
// Menangani proses penghapusan tugas berdasarkan ID (GET request ke method hapus)
 