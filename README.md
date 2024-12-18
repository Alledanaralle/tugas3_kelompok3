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
        
        ```
        <?php
        // app/controllers/memberController.php
        require_once '../app/models/member.php';
        class MemberController {
        private $memberModel;
        ````
        
Kode ini mendefinisikan MemberController, yang mengelola logika fitur anggota dalam MVC. Model Member disertakan untuk mengakses data, dan properti $memberModel             digunakan sebagai penghubung ke model, diinisialisasi melalui konstruktor
```
public function __construct() {
    $this->memberModel = new Member();
}

```
Menginisialisasi objek model Member, yang digunakan untuk berinteraksi dengan data anggota di basis data.
```
public function index() {
    $member = $this->memberModel->getAllMember();
    require_once '../app/views/member/index_member.php';
}

```
Mengambil seluruh data anggota menggunakan method getAllMember() dari model, dan memuat view index_member.php untuk menampilkan daftar anggota.

```
public function create() {
    require_once '../app/views/member/create_member.php';
}
```
Memuat form view create_member.php untuk menambahkan anggota baru.
```
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
```
public function edit($id_member) {
    $member = $this->memberModel->find($id_member);
    require_once __DIR__ . '/../views/member/edit_member.php';
}
```
Fungsi `edit($id_member)` mengambil data anggota berdasarkan ID yang diberikan menggunakan metode `find()` dari model `memberModel`. Setelah itu, data anggota dimuat ke dalam tampilan `edit_member.php`, yang memungkinkan pengguna untuk mengedit informasi anggota tersebut.
```
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
```
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

```

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

```
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
```
public function getAllMember() {
        $query = $this->db->query("SELECT * FROM member");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
```
Script ini digunakan untuk mengambil semua data anggota (member) dari tabel `member` dalam database. Fungsi `getAllMember()` menjalankan query SQL `SELECT * FROM member` untuk mendapatkan seluruh baris data dari tabel tersebut. Hasilnya kemudian diambil dan dikembalikan dalam bentuk array asosiatif yang bisa digunakan untuk menampilkan data anggota dalam aplikasi.
```
 public function find($id_member) {
        $query = $this->db->prepare("SELECT * FROM member WHERE id_member = :id_member");
        $query->bindParam(':id_member', $id_member, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
```
Script ini digunakan untuk mencari data anggota berdasarkan `id_member`. Fungsi `find($id_member)` menyiapkan query SQL untuk memilih data anggota yang memiliki `id_member` tertentu, kemudian mengeksekusi query dan mengembalikan hasilnya dalam bentuk array asosiatif.
```
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
```
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
```
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
    
<h3>Views</h3><hr>
<h3>Create Member</h3>

```
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
```
Script tersebut digunakan untuk mengimpor file CSS Bootstrap versi 5.3.3 dari CDN, yang berfungsi untuk memberikan styling otomatis pada halaman HTML. Dengan ini, halaman akan menggunakan desain responsif dan elemen UI yang telah disediakan oleh Bootstrap.
```
<div class="container mt-5">
        <div class="card mx-auto" style="max-width: 600px;">
            <div class="card-header">
                <h5 class="text-center">Tambah Pengguna Baru</h5>
            </div>
            <div class="card-body">
```
Script ini membuat sebuah **kontainer** yang berisi **card** dengan lebar maksimal 600px. Card ini memiliki **header** yang menampilkan judul "Tambah Pengguna Baru" yang diposisikan di tengah. Bagian **card-body** adalah tempat utama untuk menampilkan konten form atau elemen lainnya. 
```
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

```
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

```
<body>
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 600px;">
            <div class="card-header">
                <h5 class="text-center">Edit Member</h5>
            </div>
            <div class="card-body">
```
Script ini membuat tampilan dengan kontainer utama yang memiliki margin atas, berisi sebuah card dengan lebar maksimal 600px yang dipusatkan. Card ini memiliki header dengan judul "Edit Member" yang diposisikan di tengah, diikuti oleh body card yang akan menampung elemen lainnya seperti form 
```
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


 <h2>2. Trainers </h2>
        Tabel Trainers digunakan untuk menyimpan data pelatih kebugaran yang bekerja di fasilitas tersebut. Informasi yang dicatat meliputi nama pelatih, spesialisasi yang           dimiliki (misalnya yoga, angkat beban, atau kardio), dan jadwal kerja mereka.
        Fitur ini juga dilengkapi dengan fungsi CRUD (Create, Read, Update, Delete) untuk memudahkan pengelolaan data pelatih. Pengguna dapat menambahkan pelatih baru,               melihat daftar pelatih yang sudah terdaftar, memperbarui informasi seperti spesialisasi atau jadwal jika ada perubahan, serta menghapus data pelatih yang tidak lagi          aktif.
        Tabel ini dirancang untuk memastikan semua informasi terkait pelatih kebugaran tersimpan dengan terorganisir dan mudah diakses sesuai kebutuhan. <br>
    <h3>Trainer Controller</h3>
    
    ```php
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

<h3>Models Trainers</h3>


```
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

```

<h3>View</h3>
<h3>Create Trainer</h3>

```
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelatih Baru</title>
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

<body>
    <!-- Halaman untuk menambahkan pelatih baru -->
    <h2>Tambah Pelatih Baru</h2>

    <!-- Formulir untuk memasukkan data pelatih -->
    <form action="/trainers/store" method="POST">
        <!-- Input untuk nama pelatih -->
        <label for="nama">Nama Pelatih:</label>
        <input type="text" id="nama" name="nama" required>

        <!-- Dropdown untuk spesialisasi -->
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

        <!-- Input untuk jadwal -->
        <label for="jadwal">Jadwal Pelatih:</label>
        <input type="text" id="jadwal" name="jadwal" required>

        <!-- Tombol Simpan dan Batal -->
        <div class="button-container">
            <button type="button" onclick="window.location.href='/trainers/index_trainer';">Batal</button>
            <button type="submit">Simpan</button>
        </div>
    </form>
</body>

</html>
```

<h3>Edit Trainer</h3>

```
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

```php
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
    ```
    public function __construct() {
    $this->equipmentModel = new Equipment();
}
```
   2. index()
    * Mengambil semua data alat dari model.
    * Menampilkan halaman utama (index-equipment.php) untuk melihat daftar alat.
    ```
    public function index() {
    $equipment = $this->equipmentModel->getAllEquipment();
    require_once '../app/views/equipment/index-equipment.php';
}
```
   3. create() : Menampilkan form untuk menambahkan alat baru.
    ```
    public function create() {
    require_once '../app/views/equipment/create-equipment.php';
}
```
    4. store()
    * Memproses data dari form tambah alat.
    * Menyimpan data ke database menggunakan metode add() dari model.
    * Mengarahkan pengguna kembali ke daftar alat.
    ``` 
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
    ```
    public function edit($id_equipment) {
    $equipment = $this->equipmentModel->find($id_equipment);
    require_once __DIR__ . '/../views/equipment/edit-equipment.php';
}
```
    6. update($id_equipment, $data)
    * Memproses data dari form edit.
    * Memperbarui data alat menggunakan metode update().
    ```
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
```
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
```
<form action="/equipment/store" method="POST">
```
2. Field Input
   * Label dan input digunakan untuk memasukkan nama alat.
   * Atribut required memastikan pengguna mengisi data sebelum mengirim.
```
     <label for="nama_alat">Nama Alat:</label>
<input type="text" name="nama_alat" id="nama_alat" required>
```
3. Dropdown Pilihan Kondisi
* Memungkinkan pengguna memilih kondisi alat dari opsi yang tersedia: Baik, Perbaikan, Rusak, atau Terjual.
* Pilihan ini wajib diisi.
```
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
```
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
```
<form action="/equipment/update/<?php echo $equipment['id_equipment']; ?>" method="POST">
```
2. Field Input
   * Field ini menampilkan nama alat yang sudah ada dengan nilai default yang diambil dari variabel PHP $equipment.
    * Atribut required memastikan pengguna mengisi data sebelum mengirim.
```
<input type="text" id="nama_alat" name="nama_alat" value="<?php echo htmlspecialchars($equipment['nama_alat'] ?? ''); ?>" required>
```
3. Dropdown Pilihan Kondisi
   Dropdown ini memuat kondisi alat dengan pilihan: Baik, Perbaikan, Rusak, dan Terjual. Opsi yang sesuai dengan kondisi alat saat ini akan dipilih secara otomatis menggunakan PHP.
```
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
```
<div class="button-container">
    <a href="/equipment/index-equipment">Kembali</a>
    <button type="submit">Update</button>
</div>
```
### Styling
1. Global Styling: Menggunakan font Arial, sans-serif dengan latar belakang putih dan warna teks biru navy (#2c3e50).
2. Form Styling: Formulir memiliki padding, border-radius, dan bayangan lembut untuk estetika modern.
3. Tombol Styling: Tombol "Kembali" dan "Update" memiliki lebar yang sama dengan efek hover untuk pengalaman pengguna yang lebih baik.

## Penjelasan index-equipment.php
    Halaman ini digunakan untuk menampilkan daftar alat kebugaran yang tersedia. Pengguna dapat mencari alat berdasarkan nama, jenis, atau kondisi, menambahkan alat baru, atau melakukan aksi seperti mengedit dan menghapus alat yang sudah ada.
    
