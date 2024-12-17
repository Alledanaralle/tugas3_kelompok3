<?php
// app/controllers/TrainerController.php

// Memuat file model Trainers untuk digunakan dalam controller ini
require_once '../app/models/Trainers.php';

// Deklarasi kelas TrainerController yang bertanggung jawab untuk mengatur logika aplikasi terkait trainer
class TrainerController
{
    private $trainerModel; // Properti untuk menyimpan instance dari model Trainers

    // Konstruktor untuk menginisialisasi model Trainers
    public function __construct()
    {
        $this->trainerModel = new Trainers();
    }

    // Metode untuk menampilkan daftar semua trainer
    public function index()
    {
        $trainers = $this->trainerModel->getAllTrainers(); // Mengambil semua data trainer dari model
        require_once '../app/views/trainers/index.php'; // Memuat view untuk menampilkan daftar trainer
    }

    // Metode untuk menampilkan form tambah trainer
    public function create()
    {
        require_once '../app/views/trainers/create.php'; // Memuat view form untuk menambahkan trainer baru
    }

    // Metode untuk memproses data dari form tambah trainer dan menyimpannya ke database
    public function store()
    {
        $name = $_POST['nama']; // Mengambil data nama dari form
        $specialization = $_POST['spesialisasi']; // Mengambil data spesialisasi dari form
        $schedule = $_POST['jadwal']; // Mengambil data jadwal dari form
        $this->trainerModel->add($name, $specialization, $schedule); // Menambahkan data trainer ke database melalui model
        header('Location: /trainers/index'); // Mengarahkan kembali ke halaman daftar trainer
    }

    // Menampilkan form edit dengan data trainer berdasarkan ID
    public function edit($id)
    {
        $trainer = $this->trainerModel->find($id); // Mengambil data trainer berdasarkan ID
        require_once __DIR__ . '/../views/trainers/edit.php'; // Memuat view form edit
    }

    // Memproses permintaan update data trainer
    public function update($id)
    {
        $data = [
            'nama' => $_POST['nama'], // Mengambil data nama dari form
            'spesialisasi' => $_POST['spesialisasi'], // Mengambil data spesialisasi dari form
            'jadwal' => $_POST['jadwal'], // Mengambil data jadwal dari form
        ];
        $updated = $this->trainerModel->update($id, $data); // Mengupdate data trainer melalui model
        if ($updated) {
            header("Location: /trainers/index"); // Mengarahkan kembali ke halaman daftar trainer jika berhasil
        } else {
            echo "Failed to update trainer."; // Menampilkan pesan error jika gagal
        }
    }

    // Memproses permintaan untuk menghapus data trainer
    public function delete($id)
    {
        $deleted = $this->trainerModel->delete($id); // Menghapus data trainer berdasarkan ID melalui model
        if ($deleted) {
            header("Location: /trainers/index"); // Mengarahkan kembali ke halaman daftar trainer jika berhasil
        } else {
            echo "Failed to delete trainer."; // Menampilkan pesan error jika gagal
        }
    }
}
