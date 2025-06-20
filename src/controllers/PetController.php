<?php
require_once __DIR__ . '/../helpers/AuthHelper.php';
require_once __DIR__ . '/../models/Pet.php';

use App\Models\Pet\Pet;

class PetController {

    public function __construct() {
        require_login(); // Restrict access
    }

    public function createPet() {
        $pet = new Pet();

        $data = [
            'name' => $_POST['name'] ?? '',
            'gender' => $_POST['gender'] ?? '',
            'breed' => $_POST['breed'] ?? '',
            'age' => $_POST['age'] ?? '',
            'species' => $_POST['species'] ?? ''
        ];

        $savepet = $pet->create($data);

        if ($savepet) {
            $_SESSION['flash'] = "Pet registered successfully.";
            $_SESSION['success'] = true;
        } else {
            $_SESSION['flash'] = "Error registering pet. Try again.";
            $_SESSION['success'] = false;
        }

        header("Location: ?page=dashboard");
        exit;
    }

    public function showCreatePet() {
        require_once __DIR__ . '/../views/createpet.php';
    }

    public function editPet() {}
    public function deletePet() {}
    public function allPets() {}
}
