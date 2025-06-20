<?php
namespace App\Models\Basemodel;

require_once __DIR__ . '/../../config/config.php';
/**
 * base model containig the constructor and initializing the db
 */
class BaseModel {
    protected $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }
}
