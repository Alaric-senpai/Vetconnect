<?php


require_once __DIR__ . '/../models/Admin.php';

use App\Models\Admin\Admin;

class AdminController {
    private $admin;

    public function __construct() {
        $this->admin = new Admin();
    }

    public function createUser($data) {
        return $this->admin->addUser($data);
    }

    public function updateUser($id, $data) {
        return $this->admin->updateUser($id, $data);
    }

    public function deleteUser($id) {
        return $this->admin->deleteUser($id);
    }

    public function getUser($id) {
        return $this->admin->findUser($id);
    }

    public function getAllUsers() {
        return $this->admin->allUsers();
    }

    public function getUsersByRole($role) {
        return $this->admin->getUsersByRole($role);
    }
}
