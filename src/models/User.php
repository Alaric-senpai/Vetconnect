<?php
// models/User.php

namespace App\Models\User;
require_once __DIR__ . '/../../config/config.php';

class User{
    protected $table = 'users';

    private $db;
    public function __construct(){
        global $db;
        $this->db = $db;
    }

    public function findById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }


    public function findByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (name, username, email, phone, address, password, role) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param(
            'sssssss',
            $data['name'],
            $data['username'],
            $data['email'],
            $data['phone'],
            $data['address'],
            $data['password'], // Already hashed!
            $data['role']
        );
        
        $result = $stmt->execute();
            $stmt->close();

        $user = $this->findByEmail($data['email']);

        if($data['role'] === 'vet'){
            $stmt2 = $this->db->prepare('insert into vets (user_id) values(?)');
            $stmt2->bind_param('s', $user['id']);
            $newres =$stmt2->execute();
            $stmt2->close();
            return $newres;
        }else {
            return $result;
        }
    }


    /**
     * Method to fetch aall user from db
     */
    public function all()
    {
        $result = $this->db->query("SELECT * FROM {$this->table}");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function allByRole($role)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE role = ?");
        $stmt->bind_param("s", $role);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

    public function fetchAllvets()
    {
        $stmt = $this->db->prepare("
            SELECT 
                users.id AS user_id,
                users.name,
                users.role,
                users.created_at,
                vets.id AS vet_id
            FROM users
            INNER JOIN vets ON users.id = vets.user_id
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function login($email, $password)
{
    $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user["password"])) {
            // Set session
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            return true;
        }
        
    }

    return false;
}

    public function findUserByVetId($vetId)
    {   
        $stmt = $this->db->prepare("
            SELECT 
                users.id AS user_id,
                users.name,
                users.role,
                users.created_at
            FROM users
            INNER JOIN vets ON users.id = vets.user_id
            WHERE vets.id = ?
        ");
        $stmt->bind_param("i", $vetId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function findUserByPetId($petId)
{
    $stmt = $this->db->prepare("
        SELECT 
            users.id AS user_id,
            users.name,
            users.role,
            users.created_at
        FROM users
        INNER JOIN pets ON users.id = pets.user_id
        WHERE pets.id = ?
    ");
    $stmt->bind_param("i", $petId);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}
    public function findVetByUserId($userId)
    {
        $stmt = $this->db->prepare("
            SELECT 
                vets.id AS vet_id,
                users.id AS user_id,
                users.name,
                users.role
            FROM vets
            INNER JOIN users ON users.id = vets.user_id
            WHERE users.id = ?
        ");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }


}
