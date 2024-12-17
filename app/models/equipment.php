<?php
// app/models/Equipment.php
require_once '../config/database.php';

class Equipment {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    // Get all equipment
    public function getAllEquipment() {
        $query = $this->db->query("SELECT * FROM equipment");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Find equipment by ID
    public function find($id_equipment) {
        $query = $this->db->prepare("SELECT * FROM equipment WHERE id_equipment = :id_equipment");
        $query->bindParam(':id_equipment', $id_equipment, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    // Add new equipment
    public function add($nama_alat, $jenis_alat, $kondisi) {
        $query = $this->db->prepare("INSERT INTO equipment (nama_alat, jenis_alat, kondisi) VALUES (:nama_alat, :jenis_alat, :kondisi)");
        $query->bindParam(':nama_alat', $nama_alat);
        $query->bindParam(':jenis_alat', $jenis_alat);
        $query->bindParam(':kondisi', $kondisi);
        return $query->execute();
    }

    // Update equipment data by ID
    public function update($id_equipment, $data) {
        $query = "UPDATE equipment SET nama_alat = :nama_alat, jenis_alat = :jenis_alat, kondisi = :kondisi WHERE id_equipment = :id_equipment";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_equipment', $id_equipment);
        $stmt->bindParam(':nama_alat', $data['nama_alat']);
        $stmt->bindParam(':jenis_alat', $data['jenis_alat']);
        $stmt->bindParam(':kondisi', $data['kondisi']);
        return $stmt->execute();
    }

    // Delete equipment by ID
    public function delete($id_equipment) {
        $query = "DELETE FROM equipment WHERE id_equipment = :id_equipment";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_equipment', $id_equipment);
        return $stmt->execute();
    }
}
?>
