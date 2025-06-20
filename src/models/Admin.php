<?php 

namespace App\Models\Admin;

require_once __DIR__ . "/../../config/config.php";
require_once __DIR__ . "/../User.php";

use App\Models\User\User;

class Admin {
    private $db;

    public function __construct(){
        global $db;
        $this->db = $db;
    }

    /**
     * Add a new user (admin-level)
     */
    public function addUser(array $data): bool {
        if (empty($data['name']) || empty($data['email']) || empty($data['password']) || empty($data['role'])) {
            return false;
        }

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $data['username'] = $data['username'] ?? $data['email']; // default username
        $data['phone'] = $data['phone'] ?? '';
        $data['address'] = $data['address'] ?? '';

        $user = new User();
        return $user->create($data);
    }

    /**
     * Update an existing user
     */
    public function updateUser(int $id, array $data): bool {
        $fields = [];
        $params = [];
        $types = '';

        foreach ($data as $key => $value) {
            $fields[] = "$key = ?";
            $params[] = $value;
            $types .= is_int($value) ? 'i' : 's';
        }

        if (empty($fields)) return false;

        $stmt = $this->db->prepare("UPDATE users SET " . implode(', ', $fields) . " WHERE id = ?");
        $params[] = $id;
        $types .= 'i';

        $stmt->bind_param($types, ...$params);
        return $stmt->execute();
    }

    /**
     * Delete a user by ID
     */
    public function deleteUser(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

    /**
     * Get all users
     */
    public function allUsers(): array {
        $user = new User();
        return $user->all();
    }

    /**
     * Find a user by ID
     */
    public function findUser(int $id): ?array {
        $user = new User();
        return $user->findById($id);
    }

    /**
     * Get users by role
     */
    public function getUsersByRole(string $role): array {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE role = ?");
        $stmt->bind_param('s', $role);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
