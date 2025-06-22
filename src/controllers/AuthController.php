<?php
/**
 * Global auth controller
 */

require_once __DIR__ . '/../models/User.php';

use App\Models\User\User;

class AuthController {
    public function showLogin() {
        $flash = $_SESSION['flash'] ?? null;
        unset($_SESSION['flash']);
        require_once __DIR__ . '/../views/login.php';
    }

    public function showRegister() {
        $flash = $_SESSION['flash'] ?? null;
        unset($_SESSION['flash']);
        require_once __DIR__ . '/../views/register.php';
    }

public function handleRegister() {
    $name     = $_POST['name']     ?? null;
    $username = $_POST['username'] ?? null;
    $email    = $_POST['email']    ?? null;
    $phone    = $_POST['phone']    ?? null;
    $address  = $_POST['address']  ?? null;
    $password = $_POST['password'] ?? null;

    if (!$name || !$email || !$password) {
        $_SESSION['flash'] = "Name, Email and Password are required.";
        header("Location: ?page=register");
        exit;
    }

    require_once __DIR__ . '/../models/User.php';
    $userModel = new User();

    // Check for existing email
    if ($userModel->findByEmail($email)) {
        $_SESSION['flash'] = "Email already exists.";
        header("Location: ?page=register");
        exit;
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $data = [
        'name'     => $name,
        'username' => $username,
        'email'    => $email,
        'phone'    => $phone,
        'address'  => $address,
        'password' => $hashedPassword,
        'role'     => 'client'
    ];

    $created = $userModel->create($data);

    if ($created) {
        $_SESSION['flash'] = "Account created. Please login.";
        header("Location: ?page=login");
        exit;
    } else {
        $_SESSION['flash'] = "Something went wrong. Please try again.";
        header("Location: ?page=register");
        exit;
    }
}


    public function handleLogin() {
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        if (!$email || !$password) {
            $_SESSION['flash'] = 'Email and password are required.';
            header('Location: ?page=login');
            exit;
        }

        $userModel = new User();
        $user = $userModel->login($email, $password);

        if ($user) {
            header('Location: ?page=dashboard');
            exit;
        } else {
            $_SESSION['flash'] = 'Invalid email or password.';
            header('Location: ?page=login');
            exit;
        }
    }

    public function showResetPassword(){
        require_once __DIR__ . "/../views/resetpassword.php";
    }
}
