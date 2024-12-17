<?php
// app/models/User.php
require_once '../config/database.php';

class Workout_Classes
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->connect();
    }

    public function getAllClasses()
    {
        $query = $this->db->query("SELECT * FROM workout_classes 
        JOIN trainer ON workout_classes.id_trainer = trainer.id_trainer");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllTrainers()
    {
        $query = $this->db->query("SELECT * FROM trainer");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalMembers()
    {
        $query = $this->db->query("SELECT COUNT(*) as total_members FROM member");
        return $query->fetch(PDO::FETCH_ASSOC)['total_members'];
    }
    public function getTotalTrainers()
    {
        $query = $this->db->query("SELECT COUNT(*) as total_members FROM trainer");
        return $query->fetch(PDO::FETCH_ASSOC)['total_members'];
    }
    public function getTotalClass()
    {
        $query = $this->db->query("SELECT COUNT(*) as total_members FROM workout_classes");
        return $query->fetch(PDO::FETCH_ASSOC)['total_members'];
    }
    public function getTotalEquipment()
    {
        $query = $this->db->query("SELECT COUNT(*) as total_members FROM equipment");
        return $query->fetch(PDO::FETCH_ASSOC)['total_members'];
    }
    public function getPopularClasses()
    {
        $query = $this->db->query("SELECT nama_kelas, waktu, kuota FROM workout_classes order by kuota desc limit 5");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getEquipmentStatus()
    {
        $query = $this->db->query("SELECT nama_alat, jenis_alat, kondisi FROM equipment");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // In your Member Model (e.g., Member.php)
    public function getLatestMembers($limit = 3)
    {
        $query = $this->db->prepare("
        SELECT * FROM member 
        ORDER BY id_member DESC 
        LIMIT :limit
    ");
        $query->bindParam(':limit', $limit, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $query = $this->db->prepare("SELECT * FROM workout_classes WHERE id_class = :id_class");
        $query->bindParam(':id_class', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function add($id_class, $nama_kelas, $waktu, $id_trainer, $kuota)
    {
        $query = $this->db->prepare("INSERT INTO workout_classes (id_class, nama_kelas, waktu, id_trainer, kuota) VALUES (:id_class, :nama_kelas, :waktu, :id_trainer, :kuota)");
        $query->bindParam(':id_class', $id_class);
        $query->bindParam(':nama_kelas', $nama_kelas);
        $query->bindParam(':waktu', $waktu);
        $query->bindParam(':id_trainer', $id_trainer);
        $query->bindParam(':kuota', $kuota);
        return $query->execute();
    }

    // Update user data by ID
    public function update($id_class, $data)
    {
        $query = "UPDATE workout_classes SET nama_kelas = :nama_kelas, waktu = :waktu, id_trainer = :id_trainer, kuota = :kuota WHERE id_class = :id_class";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nama_kelas', $data['nama_kelas']);
        $stmt->bindParam(':waktu', $data['waktu']);
        $stmt->bindParam(':id_trainer', $data['id_trainer']);
        $stmt->bindParam(':kuota', $data['kuota']);
        $stmt->bindParam(':id_class', $id_class);
        return $stmt->execute();
    }

    // Delete user by ID
    public function delete($id_class)
    {
        $query = "DELETE FROM workout_classes WHERE id_class = :id_class";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_class', $id_class);
        return $stmt->execute();
    }
}
