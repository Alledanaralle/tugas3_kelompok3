<?php
// config/database.php

// Mendeklarasikan kelas Database untuk mengatur koneksi ke database
class Database
{
    // Properti untuk menyimpan informasi koneksi database
    private $host = '160.19.166.42'; // Alamat host database
    private $db_name = '2C_klp3'; // Nama database
    private $username = '2C_klp3'; // Username untuk autentikasi database
    private $password = 'nBuGU-@MsqI[!qKy'; // Password untuk autentikasi database
    private $conn; // Properti untuk menyimpan objek koneksi

    // Metode untuk menghubungkan ke database
    public function connect()
    {
        $this->conn = null; // Inisialisasi properti koneksi dengan null
        try {
            // Membuat koneksi ke database menggunakan PDO
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            // Mengatur mode error PDO agar menampilkan exception jika terjadi kesalahan
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Menangkap dan menampilkan pesan error jika koneksi gagal
            echo "Connection error: " . $e->getMessage();
        }
        return $this->conn; // Mengembalikan objek koneksi
    }
}
