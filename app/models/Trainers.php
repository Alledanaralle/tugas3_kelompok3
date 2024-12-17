<?php
// app/models/Trainers.php

// Memuat file konfigurasi database
require_once '../config/database.php';

// Deklarasi kelas Trainers yang bertanggung jawab untuk pengelolaan data pelatih
class Trainers
{
    private $db; // Properti untuk menyimpan koneksi database

    // Konstruktor untuk menginisialisasi koneksi database
    public function __construct()
    {
        $this->db = (new Database())->connect(); // Membuat koneksi dengan memanfaatkan kelas Database
    }

    // Mengambil semua data pelatih
    public function getAllTrainers()
    {
        $query = $this->db->query("SELECT * FROM trainer"); // Mengambil semua data dari tabel `trainer`
        return $query->fetchAll(PDO::FETCH_ASSOC); // Mengembalikan data dalam bentuk array asosiatif
    }

    // Mencari data pelatih berdasarkan ID
    public function find($id)
    {
        $query = $this->db->prepare("SELECT * FROM trainer WHERE id_trainer = :id"); // Query untuk mencari pelatih berdasarkan ID
        $query->bindParam(':id', $id, PDO::PARAM_INT); // Mengikat parameter ID untuk menghindari SQL injection
        $query->execute(); // Menjalankan query
        return $query->fetch(PDO::FETCH_ASSOC); // Mengembalikan data pelatih sebagai array asosiatif
    }

    // Menambahkan pelatih baru
    public function add($name, $specialization, $schedule)
    {
        $query = $this->db->prepare("INSERT INTO trainer (nama, spesialisasi, jadwal) VALUES (:nama, :spesialisasi, :jadwal)"); // Query untuk menambahkan data pelatih
        $query->bindParam(':nama', $name); // Mengikat parameter nama
        $query->bindParam(':spesialisasi', $specialization); // Mengikat parameter spesialisasi
        $query->bindParam(':jadwal', $schedule); // Mengikat parameter jadwal
        return $query->execute(); // Menjalankan query dan mengembalikan status eksekusi
    }

    // Memperbarui data pelatih berdasarkan ID
    public function update($id, $data)
    {
        $query = "UPDATE trainer SET nama = :nama, spesialisasi = :spesialisasi, jadwal = :jadwal WHERE id_trainer = :id_trainer"; // Query untuk memperbarui data
        $stmt = $this->db->prepare($query); // Mempersiapkan query
        $stmt->bindParam(':nama', $data['nama']); // Mengikat parameter nama
        $stmt->bindParam(':spesialisasi', $data['spesialisasi']); // Mengikat parameter spesialisasi
        $stmt->bindParam(':jadwal', $data['jadwal']); // Mengikat parameter jadwal
        $stmt->bindParam(':id_trainer', $id, PDO::PARAM_INT); // Mengikat parameter ID
        return $stmt->execute(); // Menjalankan query dan mengembalikan status eksekusi
    }

    // Menghapus data pelatih berdasarkan ID
    public function delete($id)
    {
        $query = "DELETE FROM trainer WHERE id_trainer = :id"; // Query untuk menghapus data pelatih
        $stmt = $this->db->prepare($query); // Mempersiapkan query
        $stmt->bindParam(':id', $id); // Mengikat parameter ID
        return $stmt->execute(); // Menjalankan query dan mengembalikan status eksekusi
    }
}
