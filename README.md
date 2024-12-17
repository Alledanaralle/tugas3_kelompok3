# Praktikum Pemgrograman Web 2 - Politeknik Negeri Cilacap

## Informasi Umum

Proyek ini merupakan bagian dari Tugas Praktikum Pemrograman Web 2 pada mata kuliah Praktikum Pemgrograman Web 2

## Deskripsi Proyek

Proyek ini merupakan bagian aplikasi web sederhana yang menerapkan arsitektur Model-View-Controller (MVC) dengan menggunakan konsep Pemrograman Berorientasi Objek (OOP). Bagian ini merupakan bagian trainer dimana trainer
menginputkan jadwal mereka pada Aplikasi Pengelolaan Fasilitas Kebugaran.

## Tujuan

Tujuan dari praktikum ini adalah untuk memenuhi tugas matakuliah Praktikum Pemrograman Web 2 dan memenuhi tugas UAS Praktikum Web 2 dalam penerapkan konsep OOP serta melakukan operasi CRUD (Create, Read, Update, Delete) pada data dan penerapan MVC.

## Tech Stack

- **Bahasa Pemrograman:** PHP
- **Database:** MySQL
- **Frontend:** HTML, CSS, JavaScript
- **Version Control:** Git (GitLab)
- **Web Server:** Apache (dengan .htaccess untuk pengaturan URL)

## Struktur Proyek

```plaintext
mvc-sample/
├── app/
│   ├── controllers/
│   │   └── TrainerController.php         # Controller untuk mengelola logika pengguna
│   ├── models/
│   │   └── Trainer.php                   # Model untuk mengelola data pengguna
│   └── views/
│       └── trainer/
│           ├── index.php              # View untuk menampilkan daftar dan manajemen pengguna
│           ├── edit.php               # Edit untuk menampilkan halaman edit pengguna
│           └── create.php             # View untuk menampilkan form pembuatan pengguna baru
├── config/
│   └── database.php                   # Konfigurasi database
├── public/
│   ├── .htaccess                      # Pengaturan URL rewrite
│   └── index.php                      # Entry point aplikasi
├── .htaccess                          # Pengaturan URL rewrite
└── routes.php                         # Mendefinisikan rute untuk aplikasi
```

## Cara Menjalankan Proyek

1.  **Clone Repository:**
    ```bash
    git clone https://github.com/Alledanaralle/tugas3_kelompok3.git
    ```
2.  **Jika menggunakan virtual host pada apache xampp:**
    Untuk menjalankan proyek ini pada Apache Laragon, Anda perlu membuat virtual host:

    - Letakkan Proyek di Folder Laragon
      Pindahkan proyek Anda ke dalam folder C:\laragon\www.
      ` C:\laragon\www\tugas3_kelompok3`
    - Buat Virtual Host Menggunakan Laragon
      a. Buka Laragon dan klik kanan pada icon Laragon di system tray (pojok kanan bawah).
      b. Pilih "Root" untuk memastikan proyek Anda terlihat di direktori www.
      c. Klik kanan lagi pada icon Laragon, pilih "Quick app > Virtual Hosts > Auto Virtual Hosts".
      Dengan fitur ini, Laragon akan secara otomatis membuat virtual host untuk setiap folder di dalam C:\laragon\www.

    - Edit File Hosts
      Jika Laragon belum menambahkan entri di file hosts, tambahkan manual:
        Buka file hosts di lokasi:
        C:\Windows\System32\drivers\etc\hosts
        Tambahkan baris berikut:
        160.19.166.42 tugas3_kelompok3.local
    - Buka Laragon dan klik "Start All" atau restart Apache dari menu Laragon.
    - Buka browser dan akses aplikasi Anda di:
    http://tugas3_kelompok3.local