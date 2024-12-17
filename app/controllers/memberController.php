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
}
