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
        <h3>Controller</h3><hr>
        
```php
        <?php
        // app/controllers/memberController.php
        require_once '../app/models/member.php';
        class MemberController {
        private $memberModel;
 ````
        
Kode ini mendefinisikan MemberController, yang mengelola logika fitur anggota dalam MVC. Model Member disertakan untuk mengakses data, dan properti $memberModel             digunakan sebagai penghubung ke model, diinisialisasi melalui konstruktor
```php
public function __construct() {
    $this->memberModel = new Member();
}

```
Menginisialisasi objek model Member, yang digunakan untuk berinteraksi dengan data anggota di basis data.
```php
public function index() {
    $member = $this->memberModel->getAllMember();
    require_once '../app/views/member/index_member.php';
}

```
Mengambil seluruh data anggota menggunakan method getAllMember() dari model, dan memuat view index_member.php untuk menampilkan daftar anggota.

```php
public function create() {
    require_once '../app/views/member/create_member.php';
}
```
Memuat form view create_member.php untuk menambahkan anggota baru.
```php
public function store() {
    $id_member = $_POST['id_member'];
    $nama = $_POST['nama'];
    $usia = $_POST['usia'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $paket_langganan = $_POST['paket_langganan'];
    $this->memberModel->add($id_member, $nama, $usia, $jenis_kelamin, $paket_langganan);
    header('Location: /member/index_member');
}
```
Fungsi `store()` dalam script ini bertanggung jawab untuk menangani permintaan yang mengirimkan data anggota baru melalui metode POST. Fungsi ini dimulai dengan mengambil nilai yang dikirimkan melalui form (menggunakan metode `$_POST`) untuk lima atribut data anggota, yaitu: `id_member`, `nama`, `usia`, `jenis_kelamin`, dan `paket_langganan`.
Setelah data diperoleh, fungsi ini memanggil metode `add()` dari model `memberModel`, yang berfungsi untuk menyimpan data anggota baru ke dalam database. Data yang diambil dari form (seperti ID anggota, nama, usia, jenis kelamin, dan paket langganan) diteruskan sebagai argumen ke dalam metode `add()` tersebut.
Setelah data berhasil disimpan, fungsi ini menggunakan perintah `header('Location: /member/index_member')` untuk mengarahkan (redirect) pengguna kembali ke halaman daftar anggota (`/member/index_member`). Hal ini memastikan pengguna melihat daftar anggota yang sudah diperbarui setelah menambahkan anggota baru.
```php
public function edit($id_member) {
    $member = $this->memberModel->find($id_member);
    require_once __DIR__ . '/../views/member/edit_member.php';
}
```
Fungsi `edit($id_member)` mengambil data anggota berdasarkan ID yang diberikan menggunakan metode `find()` dari model `memberModel`. Setelah itu, data anggota dimuat ke dalam tampilan `edit_member.php`, yang memungkinkan pengguna untuk mengedit informasi anggota tersebut.
```php
public function update($id_member, $data) {
    $updated = $this->memberModel->update($id_member, $data);
    if ($updated) {
        header("Location: /member/index_member");
    } else {
        echo "Failed to update member.";
    }
}
```
Fungsi `update($id_member, $data)` bertanggung jawab untuk memperbarui data anggota berdasarkan ID yang diberikan. Fungsi ini memanggil metode `update()` dari model `memberModel` untuk memperbarui data anggota di database. Jika pembaruan berhasil, pengguna akan diarahkan kembali ke halaman daftar anggota. Jika gagal, pesan error akan ditampilkan.
```php
public function delete($id_member) {
    $deleted = $this->memberModel->delete($id_member);
    if ($deleted) {
        header("Location: /member/index_member");
    } else {
        echo "Failed to delete member.";
    }
}
```
Fungsi `delete($id_member)` bertugas untuk menghapus data anggota berdasarkan ID yang diberikan. Fungsi ini memanggil metode `delete()` dari model `memberModel` untuk menghapus anggota dari database. Jika penghapusan berhasil, pengguna akan diarahkan kembali ke halaman daftar anggota. Jika gagal, pesan error akan ditampilkan.
<h3>Full Script Controller</h3><hr>

```php

<?php
// app/controllers/memberController.php
require_once '../app/models/member.php';

class MemberController {
    private $memberModel;

    public function __construct() {
        $this->memberModel = new Member();
    }

    public function index() {
        $member = $this->memberModel->getAllMember();
        require_once '../app/views/member/index_member.php';

    }

    public function create() {
        require_once '../app/views/member/create_member.php';
    }

    public function store() {
        $id_member = $_POST['id_member'];
        $nama = $_POST['nama'];
        $usia = $_POST['usia'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $paket_langganan = $_POST['paket_langganan'];
        $this->memberModel->add($id_member, $nama, $usia, $jenis_kelamin, $paket_langganan);
        header('Location: /member/index_member');
    }
    // Show the edit form with the member data
    public function edit($id_member) {
        $member = $this->memberModel->find($id_member); // Assume find() gets member by ID
        require_once __DIR__ . '/../views/member/edit_member.php';
    }

    // Process the update request
    public function update($id_member, $data) {
        $updated = $this->memberModel->update($id_member, $data);
        if ($updated) {
            header("Location: /member/index_member"); // Redirect to member list
        } else {
            echo "Failed to update member.";
        }
    }

    // Process delete request
    public function delete($id_member) {
        $deleted = $this->memberModel->delete($id_member);
        if ($deleted) {
            header("Location: /member/index_member"); // Redirect to member list
        } else {
            echo "Failed to delete member.";
        }
    }

```

<h3>Models</h3><hr>

```php
<?php
// app/models/Member.php
require_once '../config/database.php';
class Member {
    private $db;
    public function __construct() {
        $this->db = (new Database())->connect();
    }
```
Script ini mendefinisikan kelas `Member` yang berfungsi untuk mengelola data anggota. Di dalam kelas, ada properti `$db` untuk menyimpan koneksi database. Konstruktor kelas menginisialisasi koneksi database dengan memanggil metode `connect()` dari kelas `Database`, yang memungkinkan kelas `Member` untuk melakukan operasi database.
```php
public function getAllMember() {
        $query = $this->db->query("SELECT * FROM member");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
```
Script ini digunakan untuk mengambil semua data anggota (member) dari tabel `member` dalam database. Fungsi `getAllMember()` menjalankan query SQL `SELECT * FROM member` untuk mendapatkan seluruh baris data dari tabel tersebut. Hasilnya kemudian diambil dan dikembalikan dalam bentuk array asosiatif yang bisa digunakan untuk menampilkan data anggota dalam aplikasi.
```php
 public function find($id_member) {
        $query = $this->db->prepare("SELECT * FROM member WHERE id_member = :id_member");
        $query->bindParam(':id_member', $id_member, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
```
Script ini digunakan untuk mencari data anggota berdasarkan `id_member`. Fungsi `find($id_member)` menyiapkan query SQL untuk memilih data anggota yang memiliki `id_member` tertentu, kemudian mengeksekusi query dan mengembalikan hasilnya dalam bentuk array asosiatif.
```php
    public function add($id_member, $nama, $usia, $jenis_kelamin, $paket_langganan) {
        $query = $this->db->prepare("INSERT INTO member (id_member, nama, usia, jenis_kelamin, paket_langganan) 
        VALUES (:id_member, :nama, :usia, :jenis_kelamin, :paket_langganan)");
        $query->bindParam(':id_member', $id_member);
        $query->bindParam(':nama', $nama);
        $query->bindParam(':usia', $usia);
        $query->bindParam(':jenis_kelamin', $jenis_kelamin);
        $query->bindParam(':paket_langganan', $paket_langganan);
        return $query->execute();
    }
```
Script ini digunakan untuk menambahkan data anggota baru ke dalam tabel `member` di database. Fungsi `add()` menerima lima parameter (`id_member`, `nama`, `usia`, `jenis_kelamin`, `paket_langganan`), kemudian menyusun query `INSERT INTO` dengan parameter yang diikat menggunakan `bindParam()`. Setelah itu, query dijalankan dengan `execute()`, yang akan menyisipkan data ke dalam tabel `member` dan mengembalikan `true` jika berhasil, atau `false` jika gagal.
```php
public function update($id_member, $data) {
        $query = "UPDATE member SET id_member = :id_member, nama = :nama, usia = :usia, 
        jenis_kelamin = :jenis_kelamin, paket_langganan = :paket_langganan
         WHERE id_member = :id_member";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_member', $data['id_member']);
        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':usia', $data['usia']);
        $stmt->bindParam(':jenis_kelamin', $data['jenis_kelamin']);
        $stmt->bindParam(':paket_langganan', $data['paket_langganan']);
        $stmt->bindParam(':id_member', $id_member);
        return $stmt->execute();
    }
```
Script ini digunakan untuk memperbarui data anggota di tabel `member` berdasarkan `id_member`. Fungsi `update()` menerima dua parameter, yaitu `id_member` yang akan diperbarui dan array `$data` yang berisi data baru. Query `UPDATE` dipersiapkan dan nilai dari `$data` diikat ke query menggunakan `bindParam()`. Setelah itu, query dieksekusi dengan `execute()` untuk memperbarui data anggota yang sesuai. Fungsi ini mengembalikan `true` jika pembaruan berhasil dan `false` jika gagal.
```php
 public function delete($id_member) {
        $query = "DELETE FROM member WHERE id_member = :id_member";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_member', $id_member);
        return $stmt->execute();
    }
}
```
Script ini digunakan untuk menghapus data anggota dari tabel `member` berdasarkan `id_member`. Fungsi `delete()` menerima satu parameter, yaitu `id_member`, yang menunjukkan anggota yang akan dihapus. Query SQL `DELETE FROM member WHERE id_member = :id_member` dipersiapkan untuk menghapus data anggota yang memiliki `id_member` yang sesuai. Nilai `id_member` yang diterima oleh fungsi diikat ke query menggunakan `bindParam()`. Setelah itu, query dijalankan dengan metode `execute()` untuk mengeksekusi perintah penghapusan di database. Fungsi ini mengembalikan `true` jika penghapusan berhasil dan `false` jika terjadi kesalahan.
<h3>Full Script Models Member</h3><hr>        

```php
    <?php
    // app/models/Member.php
    require_once '../config/database.php';
    class Member {
    private $db;
    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getAllMember() {
        $query = $this->db->query("SELECT * FROM member");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id_member) {
        $query = $this->db->prepare("SELECT * FROM member WHERE id_member = :id_member");
        $query->bindParam(':id_member', $id_member, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function add($id_member, $nama, $usia, $jenis_kelamin, $paket_langganan) {
        $query = $this->db->prepare("INSERT INTO member (id_member, nama, usia, jenis_kelamin, paket_langganan) 
        VALUES (:id_member, :nama, :usia, :jenis_kelamin, :paket_langganan)");
        $query->bindParam(':id_member', $id_member);
        $query->bindParam(':nama', $nama);
        $query->bindParam(':usia', $usia);
        $query->bindParam(':jenis_kelamin', $jenis_kelamin);
        $query->bindParam(':paket_langganan', $paket_langganan);
        return $query->execute();
    }

    // Update member data by ID
    public function update($id_member, $data) {
        $query = "UPDATE member SET id_member = :id_member, nama = :nama, usia = :usia, 
        jenis_kelamin = :jenis_kelamin, paket_langganan = :paket_langganan
         WHERE id_member = :id_member";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_member', $data['id_member']);
        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':usia', $data['usia']);
        $stmt->bindParam(':jenis_kelamin', $data['jenis_kelamin']);
        $stmt->bindParam(':paket_langganan', $data['paket_langganan']);
        $stmt->bindParam(':id_member', $id_member);
        return $stmt->execute();
    }

    // Delete member by ID
    public function delete($id_member) {
        $query = "DELETE FROM member WHERE id_member = :id_member";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_member', $id_member);
        return $stmt->execute();
    }
```    
<h3>Views</h3><hr>
<h3>Create Member</h3>

```html
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
```
Script tersebut digunakan untuk mengimpor file CSS Bootstrap versi 5.3.3 dari CDN, yang berfungsi untuk memberikan styling otomatis pada halaman HTML. Dengan ini, halaman akan menggunakan desain responsif dan elemen UI yang telah disediakan oleh Bootstrap.
```html
<div class="container mt-5">
        <div class="card mx-auto" style="max-width: 600px;">
            <div class="card-header">
                <h5 class="text-center">Tambah Pengguna Baru</h5>
            </div>
            <div class="card-body">
```
Script ini membuat sebuah **kontainer** yang berisi **card** dengan lebar maksimal 600px. Card ini memiliki **header** yang menampilkan judul "Tambah Pengguna Baru" yang diposisikan di tengah. Bagian **card-body** adalah tempat utama untuk menampilkan konten form atau elemen lainnya. 
```html
<form action="/member/store" method="POST">
                    <table class="table table-borderless">
                        <tr>
                            <td>Nama </td>
                            <td><input type="text" name="nama" id="nama" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td> Usia </td>
                            <td><input type="text" name="usia" id="usia" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin </td>
                            <td>
                                <select name="jenis_kelamin" id="" value="<?= @$x['jenis_kelamin'] ?>" class="form-select" required>
                                    <option value="<?= @$x['jenis_kelamin'] ?>" required>--Pilih Jenis Kelamin--</option>
                                    <option value="P"> P</option>
                                    <option value="L"> L</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Paket Langganan</td>
                            <td>
                                <select name="paket_langganan" id="" value="<?= @$x['paket_langganan'] ?>" class="form-select" required>
                                    <option value="<?= @$x['paket_langganan'] ?>" required>--Pilih Paket Langganan--</option>
                                    <option value="Standard">Standard</option>
                                    <option value="Premium">Premium</option>
                                    <option value="VIP">VIP</option>
                                </select>
                            </td>
                        </tr>
                    </table>
```
Script ini adalah form HTML yang mengumpulkan data pengguna baru, seperti nama, usia, jenis kelamin, dan paket langganan. Form ini menggunakan metode POST untuk mengirim data ke endpoint /member/store. Setiap field memiliki atribut required untuk memastikan pengguna mengisi semua kolom sebelum mengirimkan form. Dropdown tersedia untuk memilih jenis kelamin dan paket langganan, sementara nama dan usia diinput melalui kolom teks.
<h3>Full Script Views Create</h3>

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Member Baru</title>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 600px;">
            <div class="card-header">
                <h5 class="text-center">Tambah Pengguna Baru</h5>
            </div>
            <div class="card-body">
                <form action="/member/store" method="POST">
                    <table class="table table-borderless">
                        <tr>
                            <td>Nama </td>
                            <td><input type="text" name="nama" id="nama" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td> Usia </td>
                            <td><input type="text" name="usia" id="usia" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin </td>
                            <td>
                                <select name="jenis_kelamin" id="" value="<?= @$x['jenis_kelamin'] ?>" class="form-select" required>
                                    <option value="<?= @$x['jenis_kelamin'] ?>" required>--Pilih Jenis Kelamin--</option>
                                    <option value="P"> P</option>
                                    <option value="L"> L</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Paket Langganan</td>
                            <td>
                                <select name="paket_langganan" id="" value="<?= @$x['paket_langganan'] ?>" class="form-select" required>
                                    <option value="<?= @$x['paket_langganan'] ?>" required>--Pilih Paket Langganan--</option>
                                    <option value="Standard">Standard</option>
                                    <option value="Premium">Premium</option>
                                    <option value="VIP">VIP</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <div class="d-flex justify-content-between gap-2">
                    <a href="/member/index_member" class="btn w-100 btn-outline-dark">Kembali</a>
                    <button type="submit" class="btn btn-dark w-100">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
```
<h3>Edit Member</h3>

```html
<body>
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 600px;">
            <div class="card-header">
                <h5 class="text-center">Edit Member</h5>
            </div>
            <div class="card-body">
```
Script ini membuat tampilan dengan kontainer utama yang memiliki margin atas, berisi sebuah card dengan lebar maksimal 600px yang dipusatkan. Card ini memiliki header dengan judul "Edit Member" yang diposisikan di tengah, diikuti oleh body card yang akan menampung elemen lainnya seperti form 
```html and php
<form action="/member/update_member/<?php echo $member['id_member']; ?>" method="POST">
    <table class="table table-borderless">
        <tr>
        <td>Nama </td>
        <td><input type="text" id="nama" name="nama" value="<?php echo $member['nama']; ?>" required></td>
        </tr>
        <tr>
        <td>Usia </td>
        <td><input type="text" id="usia" name="usia" value="<?php echo $member['usia']; ?>" required></td>
        </tr>
        <tr>
        <td>Jenis Kelamin </td>
        <td>
        <select name="jenis_kelamin" id="jenis_kelamin" required>
            <option value="L" <?php if ($member['jenis_kelamin'] == 'L') echo 'selected'; ?>>L</option>
            <option value="P" <?php if ($member['jenis_kelamin'] == 'P') echo 'selected'; ?>>P</option>
        </select>
        </td>
        </tr>
        <tr>
        <td>Paket Langganan </td>
        <td>
         <select name="paket_langganan" id="paket_langganan" required>
            <option value="Standard" <?php if ($member['paket_langganan'] == 'Standard') echo 'selected'; ?>>Standard</option>
            <option value="Premium" <?php if ($member['paket_langganan'] == 'Premium') echo 'selected'; ?>>Premium</option>
            <option value="VIP" <?php if ($member['paket_langganan'] == 'VIP') echo 'selected'; ?>>VIP</option>
        </select>
        </td>
        </tr>
    </table>
        <div class="d-flex justify-content-between gap-2">
                    <a href="/member/index_member" class="btn w-100 btn-outline-dark">Kembali</a>
                    <button type="submit" class="btn w-100 btn-dark">Update</button>
                    </div>
    </form>
```
Formulir ini dirancang untuk mengedit data anggota (member) dalam sebuah sistem. Data yang akan diedit mencakup nama, usia, jenis kelamin, dan paket langganan. Aksi formulir diarahkan ke URL `/member/update_member/{id_member}`, di mana `{id_member}` adalah ID anggota yang datanya sedang diedit. ID tersebut diambil secara dinamis menggunakan PHP, memastikan bahwa data yang diedit sesuai dengan anggota yang dipilih.<br>
Formulir menggunakan tabel untuk menyusun elemen-elemen input dengan rapi. Input pertama adalah kolom teks untuk nama anggota yang diisi secara otomatis dengan nama dari database, ditampilkan melalui variabel `$member['nama']`. Input kedua adalah kolom teks untuk usia anggota yang juga diisi otomatis dari data yang tersimpan, melalui variabel `$member['usia']`.<br>
Bagian berikutnya adalah dropdown untuk memilih jenis kelamin. Dropdown ini memiliki dua opsi, yaitu "L" untuk Laki-laki dan "P" untuk Perempuan. PHP memeriksa data dari `$member['jenis_kelamin']` untuk menentukan opsi yang aktif (selected) secara otomatis. Setelah itu, terdapat dropdown lain untuk memilih paket langganan anggota. Pilihan yang tersedia adalah "Standard", "Premium", dan "VIP". Sama seperti sebelumnya, PHP memeriksa data dari `$member['paket_langganan']` untuk menentukan paket yang aktif secara default.<br>
Di bagian bawah formulir terdapat dua tombol. Tombol pertama, "Kembali", memungkinkan pengguna kembali ke halaman daftar anggota tanpa menyimpan perubahan. Tombol kedua, "Update", digunakan untuk mengirim data yang telah diubah ke server agar dapat diperbarui di database. Seluruh data dikirim menggunakan metode POST, menjaga keamanan informasi yang dikirimkan. Formulir ini memastikan setiap kolom wajib diisi dengan menambahkan atribut `required` pada elemen input.
<h3>Full Script Edit Member</h3>

```html
<!-- app/views/user/edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Member</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- <h2>Edit Member</h2> -->
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 600px;">
            <div class="card-header">
                <h5 class="text-center">Edit Member</h5>
            </div>
            <div class="card-body">
    <form action="/member/update/<?php echo $member['id_member']; ?>" method="POST">
    <table class="table table-borderless">
        <tr>
        <td>Nama </td>
        <td><input type="text" id="nama" name="nama" value="<?php echo $member['nama']; ?>" required></td>
        </tr>
        <tr>
        <td>Usia </td>
        <td><input type="text" id="usia" name="usia" value="<?php echo $member['usia']; ?>" required></td>
        </tr>
        <tr>
        <td>Jenis Kelamin </td>
        <td>
        <select name="jenis_kelamin" id="jenis_kelamin" required>
            <option value="L" <?php if ($member['jenis_kelamin'] == 'L') echo 'selected'; ?>>L</option>
            <option value="P" <?php if ($member['jenis_kelamin'] == 'P') echo 'selected'; ?>>P</option>
        </select>
        </td>
        </tr>
        <tr>
        <td>Paket Langganan </td>
        <td>
         <select name="paket_langganan" id="paket_langganan" required>
            <option value="Standard" <?php if ($member['paket_langganan'] == 'Standard') echo 'selected'; ?>>Standard</option>
            <option value="Premium" <?php if ($member['paket_langganan'] == 'Premium') echo 'selected'; ?>>Premium</option>
            <option value="VIP" <?php if ($member['paket_langganan'] == 'VIP') echo 'selected'; ?>>VIP</option>
        </select>
        </td>
        </tr>
    </table>
        <div class="d-flex justify-content-between gap-2">
                    <a href="/member/index_member" class="btn w-100 btn-outline-dark">Kembali</a>
                    <button type="submit" class="btn w-100 btn-dark">Update</button>
                    </div>
    </form>
</body>
</html>
```

<h3>Index Member</h3>

```css
 <style>
        body {
            background-color: #f8f9fa;
        }
        .card-header {
            background: rgb(0, 0, 0);
            color: white;
        }
        .table thead th {
            background-color: rgb(120, 125, 131);
            color: white;
        }
        .table td, .table th {
            text-align: center;
            vertical-align: middle;
        }
        .btn i {
            margin: 0 auto;
        }
        .table-responsive {
            overflow-y: auto;
            max-height: 400px;
        }
        .warna-card-footer {
            background-color: white;
        }
        /* Input Search Styling */
        #searchInput {
            width: 300px;
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
```

Skrip CSS ini dirancang untuk memberikan tampilan yang modern, bersih, dan responsif pada sebuah halaman web. Warna latar belakang halaman menggunakan abu-abu terang (#f8f9fa), memberikan kesan sederhana dan nyaman bagi pengguna. Bagian header pada komponen kartu memiliki latar belakang hitam dengan teks berwarna putih, menciptakan kontras yang tegas. Untuk tabel, bagian header diberi warna abu-abu gelap (rgb(120, 125, 131)) dengan teks putih agar lebih menonjol, sementara isi tabel disejajarkan secara horizontal dan vertikal di tengah, memberikan tampilan yang rapi dan teratur.<br>
Selain itu, tombol dengan ikon dirancang agar ikon berada tepat di tengah, memastikan estetika yang konsisten. Tabel juga dilengkapi dengan elemen gulir vertikal otomatis dan memiliki tinggi maksimal 400px, sehingga data tetap mudah dibaca pada perangkat dengan layar kecil. Footer pada kartu menggunakan warna putih untuk mempertahankan kesan bersih dan konsisten dengan latar belakang halaman.<br>
Pada bagian input pencarian, kotak pencarian didesain dengan lebar 300px, padding yang nyaman, batas berwarna abu-abu terang, serta sudut yang melengkung. Hal ini menciptakan antarmuka yang ramah pengguna dan estetis. Skrip ini secara keseluruhan meningkatkan estetika dan pengalaman pengguna, terutama dalam navigasi elemen seperti tabel, kartu, dan fitur pencarian di dalam halaman web.
```html
<div class="container mt-5">
        <div class="card shadow">
            <div class="card-header">
                <h2 class="text-center">Daftar Member</h2>
            </div>
            <div class="card-body">

                <div class="row align-items-center mb-3">
                    <!-- Kolom kiri: tombol tambah member -->
                    <div class="col-md-6 d-flex align-items-center">
                        <a href="/member/create_member" class="btn btn-success">
                            <i class="fas fa-user-plus"></i> Tambah Member Baru
                        </a>
                    </div>
                    <!-- Kolom kanan: input pencarian -->
                    <div class="col-md-6 text-end">
                        <input type="text" id="searchInput" placeholder="Cari Member..." onkeyup="searchTable()" class="form-control d-inline-block">
                    </div>
                </div>
```
Script ini menampilkan antarmuka daftar member dengan desain menggunakan komponen card yang responsif. Di dalam card, terdapat header dengan judul "Daftar Member" yang terpusat, diikuti oleh body yang memuat dua fitur utama: tombol hijau "Tambah Member Baru" di sisi kiri untuk mengarahkan pengguna ke halaman pembuatan member, dan kolom pencarian di sisi kanan untuk menyaring data secara real-time menggunakan JavaScript.
```html
<div class="table-responsive">
                    <table id="trainerTable" class="table table-responsive table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID Member</th>
                                <th>Nama</th>
                                <th>Usia</th>
                                <th>Jenis Kelamin</th>
                                <th>Paket Langganan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($member as $member): ?>
                                <tr>
                                    <td><?= htmlspecialchars((string)($member['id_member'] ?? '')) ?></td>
                                    <td><?= htmlspecialchars((string)($member['nama'] ?? '')) ?></td>
                                    <td><?= htmlspecialchars((string)($member['usia'] ?? '')) ?></td>
                                    <td><?= htmlspecialchars((string)($member['jenis_kelamin'] ?? '')) ?></td>
                                    <td><?= htmlspecialchars((string)($member['paket_langganan'] ?? '')) ?></td>
                                    <td>
                                        <a href="/member/edit/<?php echo $member['id_member']; ?>" class="btn btn-info me-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="/member/delete/<?php echo $member['id_member']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer warna-card-footer">
                    <a href="./../dashboard" class="btn btn-dark">Kembali ke Dashboard</a>
                </div>
            </div>
        </div>
    </div>
```
Script ini berfungsi untuk menampilkan daftar member dalam bentuk tabel yang datanya diambil secara dinamis menggunakan PHP melalui loop foreach. Setiap baris tabel merepresentasikan satu member, dengan informasi yang meliputi ID Member, Nama, Usia, Jenis Kelamin, dan Paket Langganan. Di kolom terakhir, terdapat dua tombol aksi: tombol edit yang mengarahkan ke halaman pengeditan member berdasarkan ID-nya dan tombol hapus yang disertai konfirmasi untuk menghindari penghapusan yang tidak disengaja. Tabel ini dirancang responsif agar tetap mudah diakses pada berbagai ukuran layar, dan di bagian bawah terdapat tombol navigasi untuk kembali ke dashboard utama.
 <h2>2. Trainers </h2>
        Tabel Trainers digunakan untuk menyimpan data pelatih kebugaran yang bekerja di fasilitas tersebut. Informasi yang dicatat meliputi nama pelatih, spesialisasi yang           dimiliki (misalnya yoga, angkat beban, atau kardio), dan jadwal kerja mereka.
        Fitur ini juga dilengkapi dengan fungsi CRUD (Create, Read, Update, Delete) untuk memudahkan pengelolaan data pelatih. Pengguna dapat menambahkan pelatih baru,               melihat daftar pelatih yang sudah terdaftar, memperbarui informasi seperti spesialisasi atau jadwal jika ada perubahan, serta menghapus data pelatih yang tidak lagi          aktif.
        Tabel ini dirancang untuk memastikan semua informasi terkait pelatih kebugaran tersimpan dengan terorganisir dan mudah diakses sesuai kebutuhan. <br>
    <h3>Trainer Controller</h3>
    
```php
    require_once '../app/models/Trainers.php';
```
requice once untuk menyambungkan trainer controler ke trainers.php

```php
class TrainerController
{
    private $trainerModel; // Properti untuk menyimpan instance dari model Trainers
}
```
Properti untuk menyimpan instance dari model Trainers dan bersifat private dan hanya dapat diakses oleh class tersebut
```php
public function __construct()
{
    $this->trainerModel = new Trainers();
}
```
digunakan untuk isialisasi properti objek, yaitu mengisi nilai awal pada properti

```php
public function index()
{
    $trainers = $this->trainerModel->getAllTrainers();
    require_once '../app/views/trainers/index_trainer.php';
}

```
Fungsi ini mengambil data semua Trainer menggunakan metode getAllTrainers() dari model Trainers.
Data tersebut dikirimkan ke View index_trainer.php, yang digunakan untuk menampilkan daftar trainer.

```php
public function create()
{
    require_once '../app/views/trainers/create_trainer.php';
}

```
berfungsi untuk menampilkan tambah trainer
```php
public function store()
{
    $name = $_POST['nama'];
    $specialization = $_POST['spesialisasi'];
    $schedule = $_POST['jadwal'];
    $this->trainerModel->add($name, $specialization, $schedule);
    header('Location: /trainers/index_trainer');
}

```
berfungsi  untuk menyimpan data trainer baru
```php
public function edit($id)
{
    $trainer = $this->trainerModel->find($id);
    require_once __DIR__ . '/../views/trainers/edit_trainer.php';
}

```
berfungsi menampilkan form edit
```php
public function update($id)
{
    $data = [
        'nama' => $_POST['nama'],
        'spesialisasi' => $_POST['spesialisasi'],
        'jadwal' => $_POST['jadwal'],
    ];
    $updated = $this->trainerModel->update($id, $data);
    if ($updated) {
        header("Location: /trainers/index_trainer");
    } else {
        echo "Failed to update trainer.";
    }
}

```
berfungsi untuk update trainer saat proses edit terjadi

```php
public function delete($id)
{
    $deleted = $this->trainerModel->delete($id);
    if ($deleted) {
        header("Location: /trainers/index_trainer");
    } else {
        echo "Failed to delete trainer.";
    }
}
```
berfungsi menghapus trainers apabila pelatih sudah tidak aktif atau keluar

<h3> Full Script Trainer Controller</h3>

```php

<?php
// app/controllers/TrainerController.php
// Memuat file model Trainers untuk digunakan dalam controller ini
require_once '../app/models/Trainers.php';// Deklarasi kelas TrainerController yang bertanggung jawab untuk mengatur logika aplikasi terkait trainer

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
        require_once '../app/views/trainers/index_trainer.php'; // Memuat view untuk menampilkan daftar trainer
    }

    // Metode untuk menampilkan form tambah trainer
    public function create()
    {
        require_once '../app/views/trainers/create_trainer.php'; // Memuat view form untuk menambahkan trainer baru
    }

    // Metode untuk memproses data dari form tambah trainer dan menyimpannya ke database
    public function store()
    {
        $name = $_POST['nama']; // Mengambil data nama dari form
        $specialization = $_POST['spesialisasi']; // Mengambil data spesialisasi dari form
        $schedule = $_POST['jadwal']; // Mengambil data jadwal dari form
        $this->trainerModel->add($name, $specialization, $schedule); // Menambahkan data trainer ke database melalui model
        header('Location: /trainers/index_trainer'); // Mengarahkan kembali ke halaman daftar trainer
    }

    // Menampilkan form edit dengan data trainer berdasarkan ID
    public function edit($id)
    {
        $trainer = $this->trainerModel->find($id); // Mengambil data trainer berdasarkan ID
        require_once __DIR__ . '/../views/trainers/edit_trainer.php'; // Memuat view form edit
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
            header("Location: /trainers/index_trainer"); // Mengarahkan kembali ke halaman daftar trainer jika berhasil
        } else {
            echo "Failed to update trainer."; // Menampilkan pesan error jika gagal
        }
    }

    // Memproses permintaan untuk menghapus data trainer
    public function delete($id)
    {
        $deleted = $this->trainerModel->delete($id); // Menghapus data trainer berdasarkan ID melalui model
        if ($deleted) {
            header("Location: /trainers/index_trainer"); // Mengarahkan kembali ke halaman daftar trainer jika berhasil
        } else {
            echo "Failed to delete trainer."; // Menampilkan pesan error jika gagal
        }
    }
}

```
<h3>Models Trainers</h3>


```php
require_once '../config/database.php';
```
mengkoneksikan trainers dengan database
```php
class Trainers
{
    private $db; // Properti untuk menyimpan koneksi database
}

```
mengkoneksikan dan menyimpan koneksi database yang diakses oleh class tersebut
```php
public function __construct()
{
    $this->db = (new Database())->connect(); // Membuat koneksi ke database
}

```
pemberian nama awal dan mengkoneksikan kedatabase
```php
public function getAllTrainers()
{
    $query = $this->db->query("SELECT * FROM trainer"); // Query untuk mengambil semua data trainer
    return $query->fetchAll(PDO::FETCH_ASSOC); // Mengembalikan data dalam bentuk array asosiatif
}

```
mengambil semua data trainers
```php
public function find($id)
{
    $query = $this->db->prepare("SELECT * FROM trainer WHERE id_trainer = :id"); // Query untuk mencari data berdasarkan ID
    $query->bindParam(':id', $id, PDO::PARAM_INT); // Mengikat parameter ID
    $query->execute(); // Menjalankan query
    return $query->fetch(PDO::FETCH_ASSOC); // Mengembalikan satu baris data sebagai array asosiatif
}

```
pencarian trainers berdasarkan id
```php
public function add($name, $specialization, $schedule)
{
    $query = $this->db->prepare("INSERT INTO trainer (nama, spesialisasi, jadwal) VALUES (:nama, :spesialisasi, :jadwal)");
    $query->bindParam(':nama', $name);
    $query->bindParam(':spesialisasi', $specialization);
    $query->bindParam(':jadwal', $schedule);
    return $query->execute(); // Menjalankan query dan mengembalikan status eksekusi
}

```
menambahkan trainer baru berisi nama, spesialisasi, dan jadwal
```php
public function update($id, $data)
{
    $query = "UPDATE trainer SET nama = :nama, spesialisasi = :spesialisasi, jadwal = :jadwal WHERE id_trainer = :id_trainer";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':nama', $data['nama']);
    $stmt->bindParam(':spesialisasi', $data['spesialisasi']);
    $stmt->bindParam(':jadwal', $data['jadwal']);
    $stmt->bindParam(':id_trainer', $id, PDO::PARAM_INT);
    return $stmt->execute();
}

```
melakukan update data dimana saat proses update data awal tidak hilang

```php
public function delete($id)
{
    $query = "DELETE FROM trainer WHERE id_trainer = :id"; // Query untuk menghapus data
    $stmt = $this->db->prepare($query); // Mempersiapkan query
    $stmt->bindParam(':id', $id); // Mengikat parameter ID
    return $stmt->execute(); // Menjalankan query dan mengembalikan status eksekusi
}
```

Menghapus Trainer Berdasarkan ID
<h3>View</h3>
<h3>Create Trainer</h3>

```html

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelatih Baru</title>

```

<!DOCTYPE html>: Menentukan bahwa dokumen ini menggunakan HTML5.
<html lang="en">: Menandakan bahwa bahasa utama dokumen ini adalah Bahasa Inggris.
    <meta charset="UTF-8">: Menentukan encoding karakter menjadi UTF-8.
    <meta name="viewport" content="width=device-width, initial-scale=1.0">: Mengoptimalkan tampilan untuk perangkat seluler dengan skala awal 1.0.
    <title>: Judul halaman, ditampilkan di tab browser.
    
```css

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-top: 30px;
            font-size: 24px;
            font-weight: bold;
        }

        form {
            background: #f8fbff;
            max-width: 400px;
            margin: 30px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #34495e;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 8px 10px;
            margin-bottom: 15px;
            border: 1px solid #dcdfe6;
            border-radius: 5px;
            font-size: 14px;
            color: #555;
            background-color: #fff;
        }

        input[type="text"]:focus,
        select:focus {
            border-color: #2980b9;
            outline: none;
            box-shadow: 0 0 4px rgba(41, 128, 185, 0.5);
        }

        .button-container {
            display: flex;
            gap: 10px; /* Jarak antara tombol */
        }

        button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s;
        }

        button[type="submit"] {
            background-color: #2c3e50;
            color: #fff;
            border: none;
        }

        button[type="submit"]:hover {
            background-color: #1a252f;
        }

        button[type="button"] {
            background-color: transparent;
            border: 2px solid #2c3e50;
            color: #2c3e50;
        }

        button[type="button"]:hover {
            background-color: #2c3e50;
            color: #fff;
        }
    </style>
</head>

```

Gaya di atas mencakup tampilan halaman, seperti latar belakang, warna teks, dan font, serta mengatur elemen seperti:
        Body: Warna latar belakang, font, margin, dan padding.
        h2: Heading utama dengan teks di tengah, ukuran, dan warna.
        Form: Memberikan gaya pada formulir, seperti lebar maksimum, padding, dan bayangan.
        
```html

<body>
    <!-- Halaman untuk menambahkan pelatih baru -->
    <h2>Tambah Pelatih Baru</h2>
    <!-- Formulir untuk memasukkan data pelatih -->
    <form action="/trainers/store" method="POST">
        <!-- Input untuk nama pelatih -->
        <label for="nama">Nama Pelatih:</label>
        <input type="text" id="nama" name="nama" required>

```
       
<label>: Memberikan deskripsi untuk input.
<input type="text">: Input teks untuk memasukkan nama pelatih.
required: Membuat kolom input wajib diisi sebelum dikirim.
merupakan form untuk memasukan nama pelatih

```

        <!-- Dropdown untuk spesialisasimemilih spesialisasi dari pelatih -->
        <label for="spesialisasi">Spesialisasi:</label>
        <select name="spesialisasi" id="spesialisasi" required>
            <option value="" disabled selected>Pilih Spesialisasi</option>
            <option value="Bodybuilding">Bodybuilding</option>
            <option value="Weight Loss">Weight Loss</option>
            <option value="CrossFit">CrossFit</option>
            <option value="Yoga">Yoga</option>
            <option value="Cardio Training">Cardio Training</option>
            <option value="Strength Training">Strength Training</option>
            <option value="Personal Training">Personal Training</option>
        </select>

    ```

    <select>: Membuat dropdown menu untuk memilih spesialisasi.
    <option>: Memberikan opsi yang dapat dipilih pengguna.
    disabled selected: Menandai opsi pertama sebagai default (tidak bisa dipilih).
    required: Wajib memilih salah satu opsi.

```php

        <!-- Input untuk jadwal -->
        <label for="jadwal">Jadwal Pelatih:</label>
        <input type="text" id="jadwal" name="jadwal" required>

```

menambahkan jadwal pelatih

``
        <!-- Tombol Simpan dan Batal -->
        <div class="button-container">
            <button type="button" onclick="window.location.href='/trainers/index_trainer';">Batal</button>
            <button type="submit">Simpan</button>
        </div>
    </form>
</body>

</html>

```

button untuk menyimpan dan membatalkan dalam form input pelatih

<h3>Edit Trainer</h3>

```html
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Trainer</title>
    <style>
   body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    color: #333;
    margin: 0;
    padding: 0;
}

h2 {
    text-align: center;
    color: #2c3e50;
    margin-top: 30px;
    font-size: 24px;
    font-weight: bold;
}

form {
    background: #f8fbff;
    max-width: 400px;
    margin: 30px auto;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #34495e;
}

input[type="text"],
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #dcdfe6;
    border-radius: 5px;
    font-size: 14px;
    margin-bottom: 15px;
    color: #333;
    background-color: #fff;
}

input[type="text"]:focus,
select:focus {
    border-color: #3498db;
    outline: none;
    box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
}

.button-container {
    display: flex;
    justify-content: center; /* Menyusun tombol secara horizontal di tengah */
    align-items: center;
    margin-top: 10px;
    gap: 20px; /* Menambahkan jarak 20px antara tombol */
}


.button-container a,
.button-container button {
    width: 48%; /* Membuat tombol memiliki lebar hampir sama */
    text-decoration: none;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
    transition: background-color 0.3s, color 0.3s;
}

button[type="submit"] {
    background-color: #000; /* Warna hitam */
    color: #fff;
}

button[type="submit"]:hover {
    background-color: #333; /* Hitam lebih terang saat hover */
}

a {
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.3)); /* Gradasi transparan */
    border: 2px solid #000; /* Border hitam */
    color: #000; /* Teks hitam */
    font-weight: bold; /* Teks tebal */
    text-align: center;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background 0.3s, color 0.3s;
}

a:hover {
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.8)); /* Gradasi hitam pekat saat hover */
    color: #fff; /* Teks putih saat hover */
}


</style>
</head>

<body>
    <h2>Edit Trainer</h2>

    <!-- Formulir untuk mengedit data pelatih -->
    <form action="/trainers/update/<?php echo $trainer['id_trainer']; ?>" method="POST">
        <!-- Input Nama -->
        <label for="nama">Nama Pelatih:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $trainer['nama']; ?>" required>

        <!-- Dropdown Spesialisasi -->
        <label for="spesialisasi">Spesialisasi:</label>
        <select name="spesialisasi" id="spesialisasi" required>
            <option value="Bodybuilding" <?php if ($trainer['spesialisasi'] == 'Bodybuilding') echo 'selected'; ?>>Bodybuilding</option>
            <option value="Weight Loss" <?php if ($trainer['spesialisasi'] == 'Weight Loss') echo 'selected'; ?>>Weight Loss</option>
            <option value="CrossFit" <?php if ($trainer['spesialisasi'] == 'CrossFit') echo 'selected'; ?>>CrossFit</option>
            <option value="Yoga" <?php if ($trainer['spesialisasi'] == 'Yoga') echo 'selected'; ?>>Yoga</option>
            <option value="Cardio Training" <?php if ($trainer['spesialisasi'] == 'Cardio Training') echo 'selected'; ?>>Cardio Training</option>
            <option value="Strength Training" <?php if ($trainer['spesialisasi'] == 'Strength Training') echo 'selected'; ?>>Strength Training</option>
            <option value="Personal Training" <?php if ($trainer['spesialisasi'] == 'Personal Training') echo 'selected'; ?>>Personal Training</option>
        </select>

        <!-- Input Jadwal -->
        <label for="jadwal">Jadwal Pelatih:</label>
        <input type="text" id="jadwal" name="jadwal" value="<?php echo $trainer['jadwal']; ?>" required>

        <!-- Tombol Update dan Back to List -->
        <div class="button-container">
        <a href="/trainers/index_trainer">Kembali</a>
            <button type="submit">Update</button>
        </div>
    </form>
</body>

</html>

```

<h3>Index Pelatih</h3>

```html
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelatih</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        /* Card Styling */
        .card {
            background-color: #ffffff;
            border: 1px solid #dcdcdc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 1200px;
            margin: 20px auto;
            overflow: hidden;
        }

        .card-header {
            background-color: #2C3E50;
            color: #ffffff;
            font-size: 1.5rem;
            color: #ffffff;
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            padding: 15px;
        }

        /* Table Container Styling */
        .table-container {
            max-height: 400px;
            overflow-y: auto;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        th {
            background-color: #A6C0E4;
            color: #ffffff;
            padding: 12px;
        }

        td {
            padding: 12px;
            color: #2C3E50;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f3f3f3;
            transition: background-color 0.3s ease;
        }

        /* Button Styling */
        .btn-custom {
            background-color: #A6C0E4;
            color: #2C3E50;
            font-weight: bold;
            border: none;
        }

        .btn-custom:hover {
            background-color: #7FA9D5;
            color: #ffffff;
        }

        /* Flex Container */
        .action-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        /* Input Search Styling */
        #searchInput {
            width: 300px;
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <!-- Card Container -->
    <div class="container">
        <div class="card">
            <!-- Header -->
            <div class="card-header">Daftar Pelatih</div>

            <!-- Body -->
            <div class="card-body">
                <!-- Pencarian & Tambah Pelatih Container -->
                <div class="action-container">
                    <!-- Tambah Pelatih Button -->
                    <a href="/trainer/create_trainer" class="btn btn-success">
                        <i class="fas fa-user-plus"></i> Tambah Pelatih Baru
                    </a>

                    <!-- Input Pencarian -->
                    <input type="text" id="searchInput" placeholder="Cari Pelatih..." onkeyup="searchTable()" class="form-control ms-3">
                </div>

                <!-- Tabel -->
                <div class="table-container table-responsive">
                    <table class="table table-hover align-middle" id="trainerTable">
                        <thead>
                            <tr>
                                <th>Id Trainer</th>
                                <th>Nama</th>
                                <th>Spesialisasi</th>
                                <th>Jadwal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($trainers as $trainer): ?>
                            <tr>
                                <td><?= htmlspecialchars($trainer['id_trainer'] ?? '') ?></td>
                                <td><?= htmlspecialchars($trainer['nama']) ?></td>
                                <td><?= htmlspecialchars($trainer['spesialisasi']) ?></td>
                                <td><?= htmlspecialchars($trainer['jadwal']) ?></td>
                                <td>
                                    <!-- Edit Button -->
                                    <a href="/trainers/edit/<?php echo $trainer['id_trainer']; ?>" class="btn btn-info me-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <!-- Delete Button -->
                                    <a href="/trainers/delete/<?php echo $trainer['id_trainer']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Back to Dashboard -->
                <div class="mt-3">
                    <a href="/dashboard" class="btn btn-custom">
                        <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Script Pencarian -->
    <script>
        function searchTable() {
            let input = document.getElementById('searchInput').value.toLowerCase();
            let rows = document.querySelectorAll('#trainerTable tbody tr');

            rows.forEach(row => {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(input) ? '' : 'none';
            });
        }
    </script>
</body>

</html>

```
 <h2>3. Workout Classes</h2>
        Tabel Workout Classes berfungsi untuk menyimpan data terkait kelas latihan kebugaran yang tersedia di fasilitas tersebut. Setiap baris dalam tabel ini mencatat               informasi tentang nama kelas, waktu kelas, pelatih yang bertanggung jawab, dan kuota peserta yang dapat mengikuti kelas tersebut.
        Tabel ini dilengkapi dengan fitur CRUD (Create, Read, Update, Delete) untuk mengelola jadwal kelas kebugaran. Pengguna dapat menambahkan kelas baru, melihat daftar           kelas yang tersedia, memperbarui jadwal atau informasi kelas, dan menghapus kelas yang sudah tidak diperlukan.
        Ada relasi antara tabel Workout Classes dan tabel Trainers melalui kolom ID pelatih. Hubungan ini memungkinkan setiap kelas untuk dihubungkan dengan pelatih yang             mengajarnya, sehingga memudahkan pengelolaan jadwal kelas berdasarkan pelatih.
        Dengan adanya relasi ini, sistem dapat mengatur siapa pelatih yang menangani kelas tersebut, serta memastikan bahwa kuota peserta untuk setiap kelas tercatat dengan          baik.
<h3>Controllers</h3><hr>

```php
require_once '../app/models/User.php';
```
Mengimpor file User.php, yang berisi definisi model User. File ini digunakan untuk berinteraksi dengan data (misalnya, mengakses database).
```php
class UserController {
    private $userModel;
```
Mendefinisikan kelas UserController, yang bertanggung jawab menangani logika aplikasi (Controller dalam MVC) dan $userModel Properti private yang digunakan untuk mengakses model Workout_Classes.
```php
public function __construct() {
    $this->userModel = new Workout_Classes();
}
```
Konstruktor ini dijalankan otomatis saat objek UserController dibuat dan Menginisialisasi properti $userModel dengan instance dari Workout_Classes.
```php
public function index() {
    $users = $this->userModel->getAllClasses();
    require_once '../app/views/user/index.php';
}
```
Mengambil semua data kelas menggunakan getAllClasses dari model dan Menampilkan halaman index.php yang ada di folder views/user dengan data kelas.
```php
public function dashboard() {
    $totalClasses = $this->userModel->getTotalClass();
    $totalTrainers = $this->userModel->getTotalTrainers();
    $totalMembers = $this->userModel->getTotalMembers();
    $totalEquipments = $this->userModel->getTotalEquipment();
    $latestMembers = $this->userModel->getLatestMembers();
    $popularClasses = $this->userModel->getPopularClasses();
    $equipmentStatus = $this->userModel->getEquipmentStatus();
    require_once '../app/views/dashboard.php';
}
```
Mengambil berbagai data statistik (kelas, pelatih, anggota, peralatan) dari model Workout_Classes dan
Menampilkan data tersebut pada halaman dashboard.php.
```php
public function create() {
    $trainers = $this->userModel->getAllTrainers();
    require_once '../app/views/user/create.php';
}
```
Mengambil daftar pelatih dari model Workout_Classes menggunakan getAllTrainers dan Menampilkan form pembuatan kelas pada halaman create.php.
```php
public function store() {
    $nama_kelas = $_POST['nama_kelas'];
    $id_class = $_POST['id_class'];
    $waktu = $_POST['waktu'];
    $id_trainer = $_POST['id_trainer'];
    $kuota = $_POST['kuota'];
    $this->userModel->add($id_class,$nama_kelas, $waktu, $id_trainer, $kuota);
    header('Location: /user/index');
}
```
Mengambil data dari form (POST), kemudian menyimpan data ke database dengan memanggil method add pada model dan
mengarahkan pengguna ke halaman daftar user (/user/index) setelah data berhasil disimpan.
```php
public function edit($id_class) {
    $user = $this->userModel->find($id_class); 
    $trainers = $this->userModel->getAllTrainers();
    require_once __DIR__ . '/../views/user/edit.php';
}
```
Mengambil data kelas berdasarkan id_class menggunakan method find, dan mengambil daftar pelatih untuk ditampilkan di form edit. Kemudian, menampilkan halaman edit.php dengan data kelas dan pelatih.
```php
public function update($id_class, $data) {
    $updated = $this->userModel->update($id_class, $data);
    if ($updated) {
        header("Location: /user/index");
    } else {
        echo "Failed to update user.";
    }
}
```
Memperbarui data kelas berdasarkan id_class menggunakan method update pada model dan jika berhasil, pengguna diarahkan ke halaman daftar user. Jika gagal, menampilkan pesan kesalahan.
```php
public function delete($id_class) {
    $deleted = $this->userModel->delete($id_class);
    if ($deleted) {
        header("Location: /user/index");
    } else {
        echo "Failed to delete user.";
    }
}
```
Menghapus data kelas berdasarkan id_class menggunakan method delete dan jika berhasil, pengguna diarahkan ke halaman daftar user. Jika gagal, menampilkan pesan kesalahan.
<h3>Models</h3><hr>

```php
require_once '../config/database.php';

```
File ini memuat ../config/database.php, yang berisi konfigurasi untuk koneksi ke database.

```php
class Workout_Classes
{
    private $db;
```
Workout_Classes: Class ini bertanggung jawab untuk mengelola data terkait kelas workout dan $db: Properti privat untuk menyimpan objek koneksi ke database.
```php
public function __construct()
{
    $this->db = (new Database())->connect();
}
```
Fungsi konstruktor yang secara otomatis memanggil metode connect() dari class Database untuk membuat koneksi ke database dan menyimpannya dalam properti $db.
<h3>Views</h3><hr>
<h3>Create</h3>

```html
<!DOCTYPE html>
<html class="font-[poppins]" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kelas Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
</head>

```
1. HTML Structure
Fungsi:

    Membuat struktur dasar dari halaman web menggunakan elemen HTML.
    Elemen-elemen ini memberikan tata letak dan penempatan elemen untuk formulir.
   
```
<body class="min-h-dvh bg-[#ddd] text-black flex justify-center items-center">
    <form class="p-4 w-[95%] max-w-[30rem] flex flex-col bg-white rounded-md" action="/user/store" method="POST">
        <h2 class="text-center mb-10 text-2xl sm:text-3xl font-[500]">Tambah Kelas Baru</h2>

```
Membuat tata letak formulir yang terpusat dengan gaya responsif menggunakan Tailwind CSS.

```html
<div class="mb-4">
    <label for="nama_kelas">Nama kelas:</label>
    <input type="text" name="nama_kelas" id="nama_kelas" required 
        class="border-2 border-[#3b3b3b2e] transition-all duration-200 hover:border-blue-600 outline-none focus:border-blue-600 rounded px-2 py-[.35rem] w-full">
</div>

```
Input ini berfungsi untuk mengisi nama kelas yang akan ditambahkan.

```

<div class="mb-4">
    <label for="waktu">Waktu:</label>
    <input type="text" name="waktu" id="waktu" required 
        class="border-2 border-[#3b3b3b2e] transition-all duration-200 hover:border-blue-600 outline-none focus:border-blue-600 rounded px-2 py-[.35rem] w-full">
</div>

```
Input Waktu : Input ini berfungsi untuk memasukkan jadwal waktu kelas.

```html
<div class="mb-4">
    <label for="id_trainer">Trainer:</label>
    <select name="id_trainer" id="id_trainer" required 
        class="border-2 border-[#3b3b3b2e] transition-all duration-200 hover:border-blue-600 outline-none focus:border-blue-600 rounded px-2 py-[.35rem] w-full">
        <?php foreach ($trainers as $trainer) : ?>
            <option value="<?= $trainer['id_trainer'] ?>">
                <?= $trainer['nama'] ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

```
Dropdown ini akan diisi secara dinamis dengan daftar pelatih yang tersedia dari variabel PHP $trainers.
```html

<div class="mb-4">
    <label for="kuota">Kuota:</label>
    <input type="text" name="kuota" id="kuota" required 
        class="border-2 border-[#3b3b3b2e] transition-all duration-200 hover:border-blue-600 outline-none focus:border-blue-600 rounded px-2 py-[.35rem] w-full">
</div>

```
Input ini berfungsi untuk menentukan jumlah maksimal peserta kelas.

```html

<div class="flex gap-2">
    <a href="./index" class="bg-white text-black font-[500] border-2 border-black text-center px-6 py-2 w-full rounded">Batal</a>
    <button type="submit" class="bg-black text-white px-6 py-2 w-full rounded">Simpan</button>
</div>
</form>
</body>
</html>

```
Bagian ini berisi tombol untuk membatalkan dan menyimpan formulir.

```html

<!DOCTYPE html>
<html class="font-[poppins]" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kelas Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
</head>
<body class="min-h-dvh bg-[#ddd] text-black flex justify-center items-center">
    <form class="p-4 w-[95%] max-w-[30rem] flex flex-col bg-white rounded-md" action="/user/store" method="POST">
        <h2 class="text-center mb-10 text-2xl sm:text-3xl font-[500]">Tambah Kelas Baru</h2>
        <div class="mb-4">
            <label for="nama_kelas">Nama kelas:</label>
            <input type="text" name="nama_kelas" id="nama_kelas" required 
                class="border-2 border-[#3b3b3b2e] transition-all duration-200 hover:border-blue-600 outline-none focus:border-blue-600 rounded px-2 py-[.35rem] w-full">
        </div>
        <div class="mb-4">
            <label for="waktu">Waktu:</label>
            <input type="text" name="waktu" id="waktu" required 
                class="border-2 border-[#3b3b3b2e] transition-all duration-200 hover:border-blue-600 outline-none focus:border-blue-600 rounded px-2 py-[.35rem] w-full">
        </div>
        <div class="mb-4">
            <label for="id_trainer">Trainer:</label>
            <select name="id_trainer" id="id_trainer" required 
                class="border-2 border-[#3b3b3b2e] transition-all duration-200 hover:border-blue-600 outline-none focus:border-blue-600 rounded px-2 py-[.35rem] w-full">
                <?php foreach ($trainers as $trainer) : ?>
                    <option value="<?= $trainer['id_trainer'] ?>">
                        <?= $trainer['nama'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-4">
            <label for="kuota">Kuota:</label>
            <input type="text" name="kuota" id="kuota" required 
                class="border-2 border-[#3b3b3b2e] transition-all duration-200 hover:border-blue-600 outline-none focus:border-blue-600 rounded px-2 py-[.35rem] w-full">
        </div>
        <div class="flex gap-2">
            <a href="./index" class="bg-white text-black font-[500] border-2 border-black text-center px-6 py-2 w-full rounded">Batal</a>
            <button

```

<h3> Edit </h3>

```html

<!DOCTYPE html>
<html class="font-[poppins]" lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Kelas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
</head>

```
Bagian ini mendefinisikan elemen dasar seperti tipe dokumen, bahasa, metadata, dan sumber daya eksternal (Tailwind CSS, font).

```html

<body class="min-h-screen bg-[#ddd] text-black flex justify-center items-center">
    <form class="p-4 w-[95%] max-w-[30rem] flex flex-col bg-white rounded-md" 
          action="/user/update/<?php echo $user['id_class']; ?>" method="POST">
        <h2 class="text-center mb-10 text-2xl sm:text-3xl font-[500]">Edit Kelas</h2>

```

Bagian ini membuat tata letak halaman dan formulir untuk edit kelas. Formulir ini menggunakan metode POST untuk mengirimkan data ke URL endpoint update.

```html

<div class="mb-4">
    <label for="nama_kelas">Nama kelas:</label>
    <input type="text" id="nama_kelas" name="nama_kelas" value="<?php echo $user['nama_kelas']; ?>" 
           required class="border-2 border-[#3b3b3b2e] transition-all duration-200 hover:border-blue-600 outline-none focus:border-blue-600 rounded px-2 py-[.35rem] w-full">
</div>

```

Input ini menampilkan nama kelas yang sudah ada untuk diedit.

```html

<div class="mb-4">
    <label for="waktu">Waktu:</label>
    <input type="text" id="waktu" name="waktu" value="<?php echo $user['waktu']; ?>" 
           required class="border-2 border-[#3b3b3b2e] transition-all duration-200 hover:border-blue-600 outline-none focus:border-blue-600 rounded px-2 py-[.35rem] w-full">
</div>

```

Input ini menampilkan waktu kelas yang sudah ada untuk diedit.

```html

<div class="mb-4">
    <label for="id_trainer">Trainer:</label>
    <select name="id_trainer" id="id_trainer" required 
            class="border-2 border-[#3b3b3b2e] transition-all duration-200 hover:border-blue-600 outline-none focus:border-blue-600 rounded px-2 py-[.35rem] w-full">
        <?php foreach ($trainers as $trainer) : ?>
            <option value="<?= $trainer['id_trainer'] ?>" <?php echo ($trainer['id_trainer'] == $user['id_trainer']) ? 'selected' : ''; ?>>
                <?= $trainer['nama'] ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

```

Dropdown ini memungkinkan pengguna untuk memilih pelatih, dengan opsi yang sudah terpilih sesuai data yang ada.

```html

<div class="mb-4">
    <label for="kuota">Kuota:</label>
    <input type="text" id="kuota" name="kuota" value="<?php echo $user['kuota']; ?>" 
           required class="border-2 border-[#3b3b3b2e] transition-all duration-200 hover:border-blue-600 outline-none focus:border-blue-600 rounded px-2 py-[.35rem] w-full">
</div>

```
Input ini digunakan untuk mengedit jumlah maksimal peserta kelas.

```html

<div class="flex gap-2">
    <a href="/user/index" class="bg-white text-black font-[500] border-2 border-black text-center px-6 py-2 w-full rounded">Batal</a>
    <button type="submit" class="bg-black text-white px-6 py-2 w-full rounded">Update</button>
</div>
 </form>
</body>
</html>

```

Dua tombol untuk membatalkan perubahan atau menyimpan perubahan yang dilakukan.

```html

<!DOCTYPE html>
<html class="font-[poppins]" lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Kelas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body class="min-h-screen bg-[#ddd] text-black flex justify-center items-center">
    <form class="p-4 w-[95%] max-w-[30rem] flex flex-col bg-white rounded-md" 
          action="/user/update/<?php echo $user['id_class']; ?>" method="POST">
        <h2 class="text-center mb-10 text-2xl sm:text-3xl font-[500]">Edit Kelas</h2>
        <div class="mb-4">
            <label for="nama_kelas">Nama kelas:</label>
            <input type="text" id="nama_kelas" name="nama_kelas" value="<?php echo $user['nama_kelas']; ?>" 
                   required class="border-2 border-[#3b3b3b2e] transition-all duration-200 hover:border-blue-600 outline-none focus:border-blue-600 rounded px-2 py-[.35rem] w-full">
        </div>
        <div class="mb-4">
            <label for="waktu">Waktu:</label>
            <input type="text" id="waktu" name="waktu" value="<?php echo $user['waktu']; ?>" 
                   required class="border-2 border-[#3b3b3b2e] transition-all duration-200 hover:border-blue-600 outline-none focus:border-blue-600 rounded px-2 py-[.35rem] w-full">
        </div>
        <div class="mb-4">
            <label for="id_trainer">Trainer:</label>
            <select name="id_trainer" id="id_trainer" required 
                    class="border-2 border-[#3b3b3b2e] transition-all duration-200 hover:border-blue-600 outline-none focus:border-blue-600 rounded px-2 py-[.35rem] w-full">
                <?php foreach ($trainers as $trainer) : ?>
                    <option value="<?= $trainer['id_trainer'] ?>" <?php echo ($trainer['id_trainer'] == $user['id_trainer']) ? 'selected' : ''; ?>>
                        <?= $trainer['nama'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-4">
            <label for="kuota">Kuota:</label>
            <input type="text" id="kuota" name="kuota" value="<?php echo $user['kuota']; ?>" 
                   required class="border-2 border-[#3b3b3b2e] transition-all duration-200 hover:border-blue-600 outline-none focus:border-blue-600 rounded px-2 py-[.35rem] w-full">
        </div>
        <div class="flex gap-2">
            <a href="/user/index" class="bg-white text-black font-[500] border-2 border-black text-center px-6 py-2 w-full rounded">Batal</a>
            <button type="submit" class="bg-black text-white px-6 py-2 w-full rounded">Update</button>
        </div>
    </form>
</body>

</html>

```
<h2> 4. Equipment</h2>   
        Tabel Gym Equipment menyimpan data alat kebugaran, seperti nama alat, jenis alat, dan kondisi (baik, rusak, perlu perbaikan). Tabel ini dilengkapi fitur CRUD untuk           mengelola inventaris alat kebugaran, memungkinkan pengguna untuk menambah, melihat, memperbarui, dan menghapus data alat.
        Sistem ini memudahkan pengelolaan dan pemantauan kondisi alat kebugaran di fasilitas.

### Fitur Utama
1. Tambah Data: Menambahkan informasi alat kebugaran baru ke dalam sistem.
2. Lihat Data: Menampilkan daftar alat kebugaran beserta informasi detailnya.
3. Perbarui Data: Memperbarui informasi alat yang ada, termasuk nama, jenis, dan kondisi.
4. Hapus Data: Menghapus data alat yang tidak lagi digunakan.

## Penjelasan EquipmentController.php
   1. Konstruktor : Menginisialisasi model Equipment agar bisa digunakan dalam semua metode.
    ```php
    public function __construct() {
    $this->equipmentModel = new Equipment();
}
```
   2. index()
    * Mengambil semua data alat dari model.
    * Menampilkan halaman utama (index-equipment.php) untuk melihat daftar alat.
    ```php
    public function index() {
    $equipment = $this->equipmentModel->getAllEquipment();
    require_once '../app/views/equipment/index-equipment.php';
}
```
   3. create() : Menampilkan form untuk menambahkan alat baru.
    ```php
    public function create() {
    require_once '../app/views/equipment/create-equipment.php';
}
```
    4. store()
    * Memproses data dari form tambah alat.
    * Menyimpan data ke database menggunakan metode add() dari model.
    * Mengarahkan pengguna kembali ke daftar alat.
    ```php
    public function store() {
    $nama_alat = $_POST['nama_alat'];
    $jenis_alat = $_POST['jenis_alat'];
    $kondisi = $_POST['kondisi'];
    $this->equipmentModel->add($nama_alat, $jenis_alat, $kondisi);
    header('Location: /equipment/index-equipment');
}
```
    5. edit($id_equipment)
    * Menampilkan form edit berdasarkan ID alat.
    * Mengambil data alat tertentu menggunakan metode find().
    ```php
    public function edit($id_equipment) {
    $equipment = $this->equipmentModel->find($id_equipment);
    require_once __DIR__ . '/../views/equipment/edit-equipment.php';
}
```
    6. update($id_equipment, $data)
    * Memproses data dari form edit.
    * Memperbarui data alat menggunakan metode update().
    ```php
public function update($id_equipment, $data) {
    $updated = $this->equipmentModel->update($id_equipment, $data);
    if ($updated) {
        header("Location: /equipment/index-equipment");
    } else {
        echo "Failed to update equipment.";
    }
}
```
    7. delete($id_equipment)
    * Menghapus data alat berdasarkan ID.
    * Mengarahkan kembali ke daftar alat setelah penghapusan berhasil.
```php
public function delete($id_equipment) {
    $deleted = $this->equipmentModel->delete($id_equipment);
    if ($deleted) {
        header("Location: /equipment/index-equipment");
    } else {
        echo "Failed to delete equipment.";
    }
}
```

### Cara Menggunakan
1. Clone repositori ini ke server lokal Anda.
2. Pastikan file konfigurasi database telah diatur dengan benar di model Equipment.php.
3. Akses kontroler menggunakan URL yang sesuai:
    /equipment/index-equipment untuk melihat daftar alat.
    /equipment/create-equipment untuk menambah alat baru.
    /equipment/edit-equipment?id=ID_ALAT untuk mengedit alat.
4. Gunakan browser untuk berinteraksi dengan aplikasi.

## Penjelasan create-equipment.php
    Halaman ini merupakan bagian dari sistem manajemen alat kebugaran yang digunakan untuk menambahkan data alat baru ke dalam database. Halaman ini dirancang dengan antarmuka sederhana dan responsif untuk mempermudah pengguna.
    
### Penjelasan Komponen  
1. Formulir Tambah Alat
    * Formulir ini mengirim data ke server melalui metode POST ke URL /equipment/store.
    * Memuat tiga input utama:
        1. Nama Alat: Input teks untuk nama alat (wajib diisi).
        2. Jenis Alat: Input teks untuk jenis alat (wajib diisi).
        3. Kondisi: Dropdown untuk memilih kondisi alat.
```php
<form action="/equipment/store" method="POST">
```
2. Field Input
   * Label dan input digunakan untuk memasukkan nama alat.
   * Atribut required memastikan pengguna mengisi data sebelum mengirim.
```php
     <label for="nama_alat">Nama Alat:</label>
<input type="text" name="nama_alat" id="nama_alat" required>
```
3. Dropdown Pilihan Kondisi
* Memungkinkan pengguna memilih kondisi alat dari opsi yang tersedia: Baik, Perbaikan, Rusak, atau Terjual.
* Pilihan ini wajib diisi.
```php
<select name="kondisi" id="kondisi" required>
    <option value="Baik">Baik</option>
    <option value="Perbaikan">Perbaikan</option>
    <option value="Rusak">Rusak</option>
    <option value="Terjual">Terjual</option>
</select>
```
4. Tombol Navigasi
* Kembali: Mengarahkan pengguna kembali ke halaman daftar alat tanpa menyimpan perubahan.
* Simpan: Mengirim data ke server untuk diproses.
```php
<div class="button-container">
    <a href="/equipment/index-equipment" class="btn-link">Kembali</a>
    <button type="submit">Simpan</button>
</div>
```

### Styling
1. Global Styling:
    Font default: Arial, sans-serif.
    Warna teks: #2c3e50.
    Latar belakang: Putih dengan margin 20px.
2. Form Styling:
    Formulir memiliki padding, border-radius, dan bayangan untuk tampil modern.
3. Tombol Styling:
    Tombol memiliki gaya konsisten, dengan warna biru navy dan efek hover lebih gelap.
    Tombol "Kembali" memiliki tampilan transparan dengan border biru navy.

### Cara Menggunakan
1. Akses halaman ini di URL /equipment/create-equipment.
2. Isi form dengan data alat yang sesuai:
    * Nama Alat
    * Jenis Alat
    * Kondisi Alat
3. Klik Simpan untuk menyimpan data atau Kembali untuk membatalkan.

## Penjelasan edit-equipment.php
Halaman ini digunakan untuk mengedit informasi alat kebugaran yang sudah ada. Data yang dapat diubah meliputi nama alat, jenis alat, dan kondisi alat.

### Penjelasan Komponen
1. Formulir Edit Alat
   * Formulir ini mengirim data yang diperbarui ke server menggunakan metode POST.
   * URL mencantumkan id_equipment untuk mengidentifikasi alat yang akan diperbarui.
   * Memuat tiga input utama:
        1. Nama Alat: Input teks untuk nama alat (wajib diisi).
        2. Jenis Alat: Input teks untuk jenis alat (wajib diisi).
        3. Kondisi: Dropdown untuk memilih kondisi alat.
```php
<form action="/equipment/update/<?php echo $equipment['id_equipment']; ?>" method="POST">
```
2. Field Input
   * Field ini menampilkan nama alat yang sudah ada dengan nilai default yang diambil dari variabel PHP $equipment.
    * Atribut required memastikan pengguna mengisi data sebelum mengirim.
```php
<input type="text" id="nama_alat" name="nama_alat" value="<?php echo htmlspecialchars($equipment['nama_alat'] ?? ''); ?>" required>
```
3. Dropdown Pilihan Kondisi
   Dropdown ini memuat kondisi alat dengan pilihan: Baik, Perbaikan, Rusak, dan Terjual. Opsi yang sesuai dengan kondisi alat saat ini akan dipilih secara otomatis menggunakan PHP.
```php
<select id="kondisi" name="kondisi" required>
    <option value="Baik" <?php echo ($equipment['kondisi'] == 'Baik') ? 'selected' : ''; ?>>Baik</option>
    <option value="Perbaikan" <?php echo ($equipment['kondisi'] == 'Perbaikan') ? 'selected' : ''; ?>>Perbaikan</option>
    <option value="Rusak" <?php echo ($equipment['kondisi'] == 'Rusak') ? 'selected' : ''; ?>>Rusak</option>
    <option value="Terjual" <?php echo ($equipment['kondisi'] == 'Terjual') ? 'selected' : ''; ?>>Terjual</option>
</select>
```
4. Tombol Navigasi
   * Kembali: Mengarahkan pengguna ke halaman daftar alat tanpa menyimpan perubahan.
   * Update: Mengirimkan data yang diperbarui ke server untuk diproses.
```php
<div class="button-container">
    <a href="/equipment/index-equipment">Kembali</a>
    <button type="submit">Update</button>
</div>
```
### Styling
1. Global Styling: Menggunakan font Arial, sans-serif dengan latar belakang putih dan warna teks biru navy (#2c3e50).
2. Form Styling: Formulir memiliki padding, border-radius, dan bayangan lembut untuk estetika modern.
3. Tombol Styling: Tombol "Kembali" dan "Update" memiliki lebar yang sama dengan efek hover untuk pengalaman pengguna yang lebih baik.

### Cara Menggunakan
1. Akses halaman ini di URL /equipment/edit/<id_equipment> dengan mengganti <id_equipment> sesuai dengan ID alat yang ingin diedit.
2. Perbarui informasi alat:
    * Nama Alat: Perbarui nama alat jika diperlukan.
    * Jenis Alat: Ubah jenis alat sesuai kebutuhan.
    * Kondisi: Pilih kondisi terbaru dari dropdown.
3. Klik Update untuk menyimpan perubahan atau Kembali untuk membatalkan.

## Penjelasan index-equipment.php
    Halaman ini digunakan untuk menampilkan daftar alat kebugaran yang tersedia. Pengguna dapat mencari alat berdasarkan nama, jenis, atau kondisi, menambahkan alat baru, atau melakukan aksi seperti mengedit dan menghapus alat yang sudah ada.
    
### Penjelasan Komponen
1. Header Halaman: Menampilkan judul halaman dengan latar belakang biru gelap dan teks putih.
```php
<div class="card-header">Daftar Alat Kebugaran</div>
```
2. Tombol Tambah Alat Baru: Mengarahkan pengguna ke halaman untuk menambahkan alat kebugaran baru.
```php
<a href="/equipment/create-equipment" class="btn btn-success">
    <i class="fas fa-user-plus"></i> Tambah Alat Baru
</a>
```
3. Input Pencarian: Menggunakan JavaScript untuk menyaring hasil tabel secara langsung saat pengguna mengetikkan kata kunci.
```php
<input type="text" id="searchInput" class="form-control" placeholder="Cari berdasarkan Nama Alat, Jenis, atau Kondisi...">
```
4. Tabel Data: Tabel ini menampilkan data alat kebugaran, termasuk ID, nama, jenis, kondisi, dan tombol aksi untuk mengedit atau menghapus alat.
```php
<table class="table table-bordered" id="dataTable">
    <thead>
        <tr>
            <th>ID Equipment</th>
            <th>Nama Alat</th>
            <th>Jenis Alat</th>
            <th>Kondisi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($equipment as $item): ?>
            <tr>
                <td><?= htmlspecialchars((string)($item['id_equipment'] ?? '')) ?></td>
                <td><?= htmlspecialchars((string)($item['nama_alat'] ?? '')) ?></td>
                <td><?= htmlspecialchars((string)($item['jenis_alat'] ?? '')) ?></td>
                <td><?= htmlspecialchars((string)($item['kondisi'] ?? '')) ?></td>
                <td>
                    <a href="/equipment/edit/<?php echo htmlspecialchars($item['id_equipment'] ?? ''); ?>" class="btn btn-info me-2"><i class="fas fa-edit"></i></a>
                    <a href="/equipment/delete/<?php echo htmlspecialchars($item['id_equipment'] ?? ''); ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
```
5. Navigasi Kembali: Tombol ini mengarahkan pengguna kembali ke halaman dashboard utama.
```php
<a href="./../dashboard" class="btn btn-primary" style="background-color:rgb(130, 153, 185); color: white; border-color: navy;">
    Back To Dashboard
</a>
```
6. Fungsi Pencarian: Fungsi JavaScript ini memfilter baris tabel berdasarkan teks yang dimasukkan pengguna pada kolom pencarian.
```php
document.getElementById('searchInput').addEventListener('keyup', function () {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('#dataTable tbody tr');

    rows.forEach(row => {
        const cells = row.querySelectorAll('td');
        const match = Array.from(cells).some(cell => 
            cell.textContent.toLowerCase().includes(filter)
        );

        row.style.display = match ? '' : 'none';
    });
});
```

### Fitur Utama
1. Tombol Aksi:
    * Tambah Alat Baru: Membuka formulir untuk menambahkan data alat kebugaran.
    * Edit: Mengarahkan ke halaman edit untuk memperbarui informasi alat.
    * Hapus: Menghapus data alat setelah konfirmasi.
2. Pencarian Dinamis: Fitur pencarian memungkinkan pengguna mencari alat secara real-time berdasarkan nama, jenis, atau kondisi.
3. Tabel Responsif: Tabel mendukung tampilan yang optimal di berbagai perangkat.

### Cara Menggunakan
1. Buka halaman daftar alat kebugaran di URL /equipment/index-equipment.
2. Gunakan input pencarian untuk menemukan alat tertentu.
3. Pilih tombol Edit untuk memperbarui alat atau Hapus untuk menghapus alat yang tidak dibutuhkan.
4. Klik tombol Tambah Alat Baru untuk menambahkan data alat baru.
5. Gunakan tombol Back To Dashboard untuk kembali ke halaman utama.

## Penjelasan routes.php
Digunakan untuk mengatur rute (routing) dalam aplikasi web berbasis PHP. Kode ini memetakan URL tertentu ke metode dalam EquipmentController, memungkinkan aplikasi untuk menampilkan halaman daftar alat kebugaran (index), menambah alat baru (create dan store), mengedit alat (edit dan update), dan menghapus alat (delete). Jika URL yang diminta tidak cocok dengan rute yang ditentukan, aplikasi akan memberikan respons "404 Not Found".

### Penjelasan Komponen
1. Membuat Instansi Controller
   Membuat instansi dari kelas EquipmentController yang akan digunakan untuk memanggil metode-metode sesuai dengan permintaan yang datang.
   ```php
   $controller = new EquipmentController();
    ```
   
2. Menangani URL dan Metode Permintaan
    Script ini memeriksa URL yang masuk dan metode HTTP (GET atau POST) untuk menentukan metode controller mana yang akan dipanggil. $url diambil dari URI permintaan, dan $requestMethod menangkap metode HTTP.
    ```php
    $url = $_SERVER['REQUEST_URI'];
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    ```
    
3. Menentukan Logika Routing
   * Halaman Utama dan Daftar Alat Kebugaran : Jika URL adalah /equipment/index atau /, maka metode index dari controller dipanggil untuk menampilkan daftar alat kebugaran.
     ```php
     if ($url == '/equipment/index' || $url == '/') {
    $controller->index();
    }
    ```
    * Menambah Alat Kebugaran (Permintaan GET): Jika URL adalah /equipment/create dan metode yang digunakan adalah GET, maka metode create dipanggil untuk menampilkan formulir untuk menambah alat baru.
    ```php
    elseif ($url == '/equipment/create' && $requestMethod == 'GET') {
    $controller->create();
    }
    ```
    * Menyimpan Alat Kebugaran Baru (Permintaan POST): Jika URL adalah /equipment/store dan metode yang digunakan adalah POST, maka metode store dipanggil untuk menyimpan data alat kebugaran yang baru.
    ```php
    elseif ($url == '/equipment/store' && $requestMethod == 'POST') {
    $controller->store();
    }
    ```
    * Mengedit Alat Kebugaran (Permintaan GET): Jika URL sesuai dengan /equipment/edit/{id}, di mana {id} adalah nilai numerik, maka metode edit dipanggil dengan ID alat untuk menampilkan form edit alat tersebut.
    ```php
    elseif (preg_match('/\/equipment\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $equipmentId = $matches[1];
    $controller->edit($equipmentId);
    }
    ```
    * Memperbarui Alat Kebugaran (Permintaan POST): Jika URL sesuai dengan /equipment/update/{id} dan metode yang digunakan adalah POST, maka metode update dipanggil dengan ID alat dan data yang diperbarui.
    ```php
    elseif (preg_match('/\/equipment\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $equipmentId = $matches[1];
    $controller->update($equipmentId, $_POST);
    }
    ```
    * Menghapus Alat Kebugaran (Permintaan GET): Jika URL sesuai dengan /equipment/delete/{id}, di mana {id} adalah nilai numerik, maka metode delete dipanggil dengan ID alat untuk menghapus alat tersebut.
    ```php
    elseif (preg_match('/\/equipment\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $equipmentId = $matches[1];
    $controller->delete($equipmentId);
    }
    ```
    
4. 404 Not Found
   Jika URL tidak cocok dengan salah satu rute yang telah didefinisikan, maka script ini akan mengembalikan kode status 404 dan menampilkan pesan "404 Not Found".
   ```php
   else {
    http_response_code(404);
    echo "404 Not Found";
    }
    ```
### Cara Penggunaan
1. Tempatkan file routes.php ini di direktori root proyek Anda.
2. Pastikan Anda memiliki file controller yang sesuai (EquipmentController.php) di direktori app/controllers/.
3. Definisikan metode-metode yang diperlukan (index, create, store, edit, update, dan delete) di dalam kelas EquipmentController.
