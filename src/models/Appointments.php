<?php 

namespace App\Models\Appointment;

require_once __DIR__ . "/../../config/config.php";

class Appointment {

    private $db;
    protected $table = "appointments"; // NOTE: Fix typo in DB if needed

    public function __construct() {
        global $db;
        $this->db = $db;
    }

    public function all() {
        $result = $this->db->query("SELECT * FROM {$this->table}");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (name, pet_id,owner_id ,appointment_time, reason) VALUES (?, ?, ?, ?,?)");
        $stmt->bind_param(
            'siiss',
            $data['name'],
            $data['pet'],
            $_SESSION['user_id'],
            $data['date'],
            $data['reason'],
        );
        $result =  $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET name = ?, pet_id = ?, vet_id = ?, appointment_time = ?, reason = ?, status = ? WHERE id = ?");
        $stmt->bind_param(
            'siisssi',
            $data['name'],
            $data['pet_id'],
            $data['vet_id'],
            $data['appointment_time'],
            $data['reason'],
            $data['status'],
            $id
        );
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

    public function setStatus($id, $status) {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET status = ? WHERE id = ?");
        $stmt->bind_param('si', $status, $id);
        return $stmt->execute();
    }

        public function AssignVet($id, $vet) {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET vet_id = ? WHERE id = ?");
        $stmt->bind_param('si', $vet, $id);
        return $stmt->execute();
    }

    public function findByPet($pet_id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE pet_id = ?");
        $stmt->bind_param('i', $pet_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function findByVet($vet_id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE vet_id = ? order by id desc");
        $stmt->bind_param('i', $vet_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }



        public function findByUser() {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE owner_id = ?");
        $stmt->bind_param('i', $_SESSION['user_id']);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function countByStatus($status) {
        $stmt = $this->db->prepare("SELECT COUNT(*) as count FROM {$this->table} WHERE status = ?");
        $stmt->bind_param('s', $status);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc()['count'];
    }
        public function countAllAppointments() {
        $stmt = $this->db->prepare("SELECT COUNT(*) as count FROM {$this->table}");
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc()['count'];
    }


}
