<?php
// app/controllers/UserController.php
require_once '../app/models/User.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new Workout_Classes();
    }

    public function index() {
        $users = $this->userModel->getAllClasses();
        require_once '../app/views/user/index.php';

    }

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

    public function create() {
        $trainers = $this->userModel->getAllTrainers();
        require_once '../app/views/user/create.php';
    }

    public function store() {
        $nama_kelas = $_POST['nama_kelas'];
        $id_class = $_POST['id_class'];
        $waktu = $_POST['waktu'];
        $id_trainer = $_POST['id_trainer'];
        $kuota = $_POST['kuota'];
        $this->userModel->add($id_class,$nama_kelas, $waktu, $id_trainer, $kuota);
        header('Location: /user/index');
    }
    // Show the edit form with the user data
    public function edit($id_class) {
        $user = $this->userModel->find($id_class); // Assume find() gets user by ID
        $trainers = $this->userModel->getAllTrainers();
        require_once __DIR__ . '/../views/user/edit.php';
    }

    // Process the update request
    public function update($id_class, $data) {
        $updated = $this->userModel->update($id_class, $data);
        if ($updated) {
            header("Location: /user/index"); // Redirect to user list
        } else {
            echo "Failed to update user.";
        }
    }

    // Process delete request
    public function delete($id_class) {
        $deleted = $this->userModel->delete($id_class);
        if ($deleted) {
            header("Location: /user/index"); // Redirect to user list
        } else {
            echo "Failed to delete user.";
        }
    }
}
