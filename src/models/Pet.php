<?php
namespace App\Models\Pet;

require_once __DIR__ . '/../../config/config.php';

class Pet {
    protected $table = "pets";

    private $db;
    public function __construct(){
        global $db;
        $this->db = $db;
    }
    /**
     * Create a new pet record
     */
    public function create($data): bool {
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (user_id, name, species, breed, age, sex) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param(
            "isssis",
            $_SESSION['user_id'],
            $data['name'],
            $data['species'],
            $data['breed'],
            $data['age'],
            $data['gender']
        );
        return $stmt->execute();
    }

    /**
     * Update an existing pet record
     */
    public function update($id, $data): bool {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET name = ?, species = ?, breed = ?, age = ?, sex = ? WHERE id = ? AND user_id = ?");
        $stmt->bind_param(
            "sssiiii",
            $data['name'],
            $data['species'],
            $data['breed'],
            $data['age'],
            $data['gender'],
            $id,
            $_SESSION['user_id']
        );
        return $stmt->execute();
    }

    /**
     * Delete a pet by ID
     */
    public function delete($id): bool {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ? AND user_id = ?");
        $stmt->bind_param("ii", $id, $_SESSION['user_id']);
        return $stmt->execute();
    }

    /**
     * Get a single pet record by ID
     */
    public function getByID($id): ?array {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ? ");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc() ?: null;
    }

    /**
     * Get all pets belonging to a user
     */
    public function getAllByUser(): array {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE user_id = ?");
        $stmt->bind_param("i", $_SESSION['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
