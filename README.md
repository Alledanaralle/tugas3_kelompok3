# tugas3_kelompok3
## Praktikum Pemgrograman Web 2 - Politeknik Negeri Cilacap

## Informasi Umum

Proyek ini merupakan bagian dari Tugas Praktikum Pemrograman Web 2 pada mata kuliah Praktikum Pemgrograman Web 2

## Deskripsi Proyek

Proyek ini merupakan bagian aplikasi web sederhana yang menerapkan arsitektur Model-View-Controller (MVC) dengan menggunakan konsep Pemrograman Berorientasi Objek (OOP).

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

# Aplikasi Pengelolaan Fasilitas Kebugaran
<h2> 1. Member </h2>
        Tabel Members digunakan untuk menyimpan data anggota yang terdaftar di fasilitas kebugaran. Data yang dikelola mencakup nama anggota, usia, jenis kelamin, dan jenis          paket langganan yang dipilih.
        Fitur ini dilengkapi dengan fungsi CRUD (Create, Read, Update, Delete) untuk memudahkan pengelolaan data anggota. Pengguna dapat menambahkan anggota baru, melihat            daftar anggota yang terdaftar, memperbarui informasi jika ada perubahan, dan menghapus data anggota yang sudah tidak aktif.
        Tabel ini dirancang untuk mendukung pengelolaan data secara efisien dan memastikan semua informasi terkait anggota tercatat dengan baik. <br>
 <h2>2. Trainers </h2>
        Tabel Trainers digunakan untuk menyimpan data pelatih kebugaran yang bekerja di fasilitas tersebut. Informasi yang dicatat meliputi nama pelatih, spesialisasi yang           dimiliki (misalnya yoga, angkat beban, atau kardio), dan jadwal kerja mereka.
        Fitur ini juga dilengkapi dengan fungsi CRUD (Create, Read, Update, Delete) untuk memudahkan pengelolaan data pelatih. Pengguna dapat menambahkan pelatih baru,               melihat daftar pelatih yang sudah terdaftar, memperbarui informasi seperti spesialisasi atau jadwal jika ada perubahan, serta menghapus data pelatih yang tidak lagi          aktif.
        Tabel ini dirancang untuk memastikan semua informasi terkait pelatih kebugaran tersimpan dengan terorganisir dan mudah diakses sesuai kebutuhan. <br>
 <h2>3. Workout Classes</h2>
        Tabel Workout Classes berfungsi untuk menyimpan data terkait kelas latihan kebugaran yang tersedia di fasilitas tersebut. Setiap baris dalam tabel ini mencatat               informasi tentang nama kelas, waktu kelas, pelatih yang bertanggung jawab, dan kuota peserta yang dapat mengikuti kelas tersebut.
        Tabel ini dilengkapi dengan fitur CRUD (Create, Read, Update, Delete) untuk mengelola jadwal kelas kebugaran. Pengguna dapat menambahkan kelas baru, melihat daftar           kelas yang tersedia, memperbarui jadwal atau informasi kelas, dan menghapus kelas yang sudah tidak diperlukan.
        Ada relasi antara tabel Workout Classes dan tabel Trainers melalui kolom ID pelatih. Hubungan ini memungkinkan setiap kelas untuk dihubungkan dengan pelatih yang             mengajarnya, sehingga memudahkan pengelolaan jadwal kelas berdasarkan pelatih.
        Dengan adanya relasi ini, sistem dapat mengatur siapa pelatih yang menangani kelas tersebut, serta memastikan bahwa kuota peserta untuk setiap kelas tercatat dengan          baik.
<h2> 4. Equipment</h2>   
        Tabel Gym Equipment menyimpan data alat kebugaran, seperti nama alat, jenis alat, dan kondisi (baik, rusak, perlu perbaikan). Tabel ini dilengkapi fitur CRUD untuk           mengelola inventaris alat kebugaran, memungkinkan pengguna untuk menambah, melihat, memperbarui, dan menghapus data alat.
        Sistem ini memudahkan pengelolaan dan pemantauan kondisi alat kebugaran di fasilitas.
        
        
        

