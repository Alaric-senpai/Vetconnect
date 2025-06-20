<?php

namespace App\Models\MedicalReport;

require_once __DIR__ . '/../../config/config.php';

class MedicalReport {
    private $db;
    protected $table = 'medical_records';

    public function __construct() {
        global $db;
        $this->db = $db;
    }

    public function save(array $data) {
        $stmt = $this->db->prepare("
            INSERT INTO {$this->table} (pet_id, vet_id, visit_date, diagnosis, treatment, notes)
            VALUES (?, ?, ?, ?, ?, ?)
        ");

        if (!$stmt) {
            die("Prepare failed: " . $this->db->error);
        }

        $stmt->bind_param(
            "iissss",
            $data['pet_id'],
            $data['vet_id'],
            $data['visit_date'],
            $data['diagnosis'],
            $data['treatment'],
            $data['notes']
        );

        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    // ✅ Get all reports for a specific vet
    public function getReportsByVet($vetId) {
        $stmt = $this->db->prepare("
            SELECT * FROM {$this->table}
            WHERE vet_id = ?
            ORDER BY visit_date DESC
        ");
        $stmt->bind_param("i", $vetId);
        $stmt->execute();
        $result = $stmt->get_result();
        $reports = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $reports;
    }

    // ✅ Get all reports for a specific pet
    public function getReportsByPet($petId) {
        $stmt = $this->db->prepare("
            SELECT * FROM {$this->table}
            WHERE pet_id = ?
            ORDER BY visit_date DESC
        ");
        $stmt->bind_param("i", $petId);
        $stmt->execute();
        $result = $stmt->get_result();
        $reports = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $reports;
    }

    // ✅ Get a specific report by ID
    public function find($id) {
        $stmt = $this->db->prepare("
            SELECT * FROM {$this->table} WHERE id = ?
        ");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $report = $result->fetch_assoc();
        $stmt->close();

        return $report;
    }

    // ✅ Get all medical records (e.g., for admin)
    public function getAll() {
        $query = "SELECT * FROM {$this->table} ORDER BY visit_date DESC";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
