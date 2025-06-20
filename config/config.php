<?php
// config/config.php
// session_save_path(__DIR__ . '/../storage/sessions');
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$db = new mysqli(
    $_ENV['DB_HOST'],
    $_ENV['DB_USER'],
    $_ENV['DB_PASS'],
    $_ENV['DB_NAME']
);

if ($db->connect_error) {
    die("Database connection failed: " . $db->connect_error);
}
