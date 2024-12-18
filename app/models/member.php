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
}
