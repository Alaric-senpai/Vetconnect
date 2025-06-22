<?php
// public/index.php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../src/helpers/AuthHelper.php';

// Autoloader (you can refine to PSR-4 later)
spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . "/../src/controllers/$class.php",
        __DIR__ . "/../src/helpers/$class.php",
    ];
    foreach ($paths as $file) {
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Start session

$page = $_GET['page'] ?? 'home';
$appointment = $_GET['appointment'] ?? null;
$report = $_GET['report_id'] ?? null;
$pet= $_GET['pet_id'] ?? null;

$routes = [
    'home'              => fn() => require_once __DIR__ . '/../src/views/home.php',
    'about'             => fn() => require_once __DIR__ . '/../src/views/about.php',
    'contact'           => fn() => require_once __DIR__ . '/../src/views/contact.php',
    'login'             => fn() => (new AuthController())->showLogin(),
    'signup'            => fn() => (new AuthController())->showRegister(),
    'login_submit'      => fn() => (new AuthController())->handleLogin(),
    'register_submit'   => fn() => (new AuthController())->handleRegister(),
    'reset_password'=> fn() => (new AuthController())->showResetPassword(),
    'logout'            => function () {
        session_destroy();
        session_start();
        $_SESSION['flash'] = "You have been logged out.";
        header("Location: ?page=login");
        exit;
    },
    'dashboard'         => function () {
        require_login();
        require_once __DIR__ . '/../src/views/dashboard.php';
    },
    'register_pet'      => fn() => (new PetController())->showCreatePet(),
    'save_pet'          => fn() => (new PetController())->createPet(),
    'new_appointment'   => fn() => (new AppointmentController())->showNewAppointmentPage(),
    'submit_appointment'=> fn() => (new AppointmentController())->saveAppointment(),
    'update_status'     => fn() => (new AppointmentController())->updateAppointmentStatus(),
    'assign_doctor'     => fn() => (new AppointmentController())->assignVet(),
    'add_medical_record'=> fn() => (new MedicalController())->showAddMedicalReport($appointment),
    'save_medical_report'=> fn() => (new MedicalController())->saveMedicalReport(),
    'view_medical_report'=> fn() => (new MedicalController())->viewMedicalReport($report),
    'pets_medical_records'=> fn()=> (new MedicalController())->showPetsMedicalRecords($pet),
    'add_user'=> fn()=> (new AdminController())->showCreateUser(),
    'administrative_user_add'=> fn() => (new AdminController())->adminstrativeUserAdd(),
    'manage_users'=> fn() => (new AdminController())->showManageUsers(),
    'system_logs'=> fn() => (new AdminController())->showSystemLogs(),
    'administrative_user_delete'=> fn() => (new AdminController())->adminstrativeUserDelete(),
    'administrative_user_edit'=> fn() => (new AdminController())->adminstrativeUserEdit(),
];

// Call route handler or fallback
if (isset($routes[$page])) {
    $routes[$page]();
} else {
    http_response_code(404);
    echo "<h1>404 Not Found</h1><p>The requested page '{$page}' does not exist.</p>";
}
