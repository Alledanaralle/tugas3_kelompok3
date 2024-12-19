<?php
// routes.php

// Mengimpor file EquipmentController untuk dapat menggunakan kelasnya
require_once 'app/controllers/EquipmentController.php';

// Membuat instance dari kelas EquipmentController
$controller = new EquipmentController();

// Mendapatkan URL yang diminta oleh pengguna melalui browser
$url = $_SERVER['REQUEST_URI'];

// Mendapatkan metode HTTP (GET, POST, dll.) dari permintaan
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Mengecek apakah URL adalah '/equipment/index' atau hanya '/'
// Jika ya, panggil metode index() pada EquipmentController
if ($url == '/equipment/index' || $url == '/') {
    $controller->index();

// Mengecek apakah URL adalah '/equipment/create' dengan metode GET
// Jika ya, panggil metode create() untuk menampilkan form pembuatan data baru
} elseif ($url == '/equipment/create' && $requestMethod == 'GET') {
    $controller->create();

// Mengecek apakah URL adalah '/equipment/store' dengan metode POST
// Jika ya, panggil metode store() untuk menyimpan data yang dikirim dari form
} elseif ($url == '/equipment/store' && $requestMethod == 'POST') {
    $controller->store();

// Mengecek apakah URL sesuai dengan pola '/equipment/edit/{id}' dan metode GET
// Jika ya, panggil metode edit() dengan parameter ID alat kebugaran yang diambil dari URL
} elseif (preg_match('/\/equipment\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    // Mendapatkan ID alat kebugaran dari URL
    $equipmentId = $matches[1];
    $controller->edit($equipmentId);

// Mengecek apakah URL sesuai dengan pola '/equipment/update/{id}' dan metode POST
// Jika ya, panggil metode update() untuk memperbarui data berdasarkan ID yang diterima dari URL
} elseif (preg_match('/\/equipment\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    // Mendapatkan ID alat kebugaran dari URL
    $equipmentId = $matches[1];
    // Memanggil metode update() dengan ID dan data POST dari form
    $controller->update($equipmentId, $_POST);

// Mengecek apakah URL sesuai dengan pola '/equipment/delete/{id}' dan metode GET
// Jika ya, panggil metode delete() untuk menghapus data berdasarkan ID yang diterima dari URL
} elseif (preg_match('/\/equipment\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    // Mendapatkan ID alat kebugaran dari URL
    $equipmentId = $matches[1];
    $controller->delete($equipmentId);

// Jika tidak ada rute yang cocok, kembalikan respons 404 Not Found
} else {
    // Mengatur status HTTP menjadi 404
    http_response_code(404);
    // Menampilkan pesan "404 Not Found"
    echo "404 Not Found";
}
