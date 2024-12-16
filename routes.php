<?php
// routes.php

// Memuat file TrainerController untuk menangani permintaan terkait pelatih
require_once 'app/controllers/TrainerController.php';

// Membuat instance dari TrainerController
$controller = new TrainerController();

// Mendapatkan URL permintaan dari server
$url = $_SERVER['REQUEST_URI'];

// Mendapatkan metode permintaan (GET atau POST)
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Routing permintaan berdasarkan URL dan metode HTTP
if ($url == '/trainer/index' || $url == '/') {
    // Menampilkan halaman daftar pelatih
    $controller->index();
} elseif ($url == '/trainer/create' && $requestMethod == 'GET') {
    // Menampilkan form untuk menambahkan pelatih baru
    $controller->create();
} elseif ($url == '/trainer/store' && $requestMethod == 'POST') {
    // Memproses data dari form untuk menyimpan pelatih baru
    $controller->store();
} elseif (preg_match('/\/trainer\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    // Menampilkan form edit berdasarkan ID pelatih
    $trainerId = $matches[1]; // Mengambil ID pelatih dari URL
    $controller->edit($trainerId);
} elseif (preg_match('/\/trainer\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    // Memproses data untuk memperbarui pelatih berdasarkan ID
    $trainerId = $matches[1]; // Mengambil ID pelatih dari URL
    $controller->update($trainerId, $_POST);
} elseif (preg_match('/\/trainer\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    // Memproses permintaan untuk menghapus pelatih berdasarkan ID
    $trainerId = $matches[1]; // Mengambil ID pelatih dari URL
    $controller->delete($trainerId);
} else {
    // Menangani permintaan yang tidak dikenali dengan menampilkan pesan 404
    http_response_code(404); // Mengatur kode respons HTTP menjadi 404
    echo "404 Not Found"; // Menampilkan pesan bahwa halaman tidak ditemukan
}
