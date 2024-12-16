<?php
// app/controllers/EquipmentController.php
require_once '../app/models/Equipment.php';

class EquipmentController {
    private $equipmentModel;

    public function __construct() {
        $this->equipmentModel = new Equipment();
    }

    public function index() {
        // Mengambil semua data alat dari model
        $equipment = $this->equipmentModel->getAllEquipment();
        // Menampilkan view index
        require_once '../app/views/equipment/index.php';
    }

    public function create() {
        // Menampilkan form untuk menambah alat
        require_once '../app/views/equipment/create.php';
    }

    public function store() {
        // Menangani data yang dikirim dari form create
        $nama_alat = $_POST['nama_alat'];
        $jenis_alat = $_POST['jenis_alat'];
        $kondisi = $_POST['kondisi'];

        // Menyimpan data alat ke database
        $this->equipmentModel->add($nama_alat, $jenis_alat, $kondisi);
        // Redirect ke daftar alat setelah berhasil disimpan
        header('Location: /equipment/index');
    }

    // Menampilkan form edit dengan data alat berdasarkan ID
    public function edit($id_equipment) {
        $equipment = $this->equipmentModel->find($id_equipment); // Ambil data alat berdasarkan ID
        require_once __DIR__ . '/../views/equipment/edit.php';
    }

        // Update data alat berdasarkan ID
    public function update($id_equipment, $data) {
        $updated = $this->equipmentModel->update($id_equipment, $data);
        if ($updated) {
            header("Location: /equipment/index"); // Redirect to member list
        } else {
            echo "Failed to update equipment.";
        }
    }

    // Menangani permintaan hapus data alat
    public function delete($id_equipment) {
        $deleted = $this->equipmentModel->delete($id_equipment);
        if ($deleted) {
            header("Location: /equipment/index"); // Redirect ke daftar alat
        } else {
            echo "Failed to delete equipment.";
        }
    }
}
