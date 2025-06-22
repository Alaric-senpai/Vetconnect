<?php


require_once __DIR__ .'/../helpers/AuthHelper.php';
require_once __DIR__ .'/../helpers/RoleHeplet.php';
require_once __DIR__ .'/../models/User.php';
use App\Models\User\User;

class AdminController {

    public function __construct() {
        require_login();
        require_admin();
    }

    public function showCreateUser(){
        require_once __DIR__ .'/../views/newuser.php';
    }

    public function adminstrativeUserAdd(){
        $user = new User();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name'     => $_POST['name'],
                'username' => $_POST['username'],
                'email'    => $_POST['email'],
                'phone'    => $_POST['phone'],
                'address'  => $_POST['address'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'role'     => $_POST['role']
            ];

            $save = $user->create($data);

            if( $save ){
                $_SESSION['flash']=" User {$data['name'] } created with role {$data['role']}";
                $_SESSION["success"]= true;
            } else {
                $_SESSION["flash"]= "Error adding user";
                $_SESSION["success"]= false;
            }
        }else{
            $_SESSION['flash']="unauthorised method";
            $_SESSION["success"]= "false";
        }

        header("location: ?page=dashboard");

    }

    public function showManageUsers(){
        require_once __DIR__ ."/../views/manageusers.php";
        
    }
    

    public function adminstrativeUserEdit(){
        $user = new User();
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = [
                "name"=> $_POST["name"],
                "email"=> $_POST["email"],
                "phone"=> $_POST["phone"],
                "address"=> $_POST["address"],
                "role"=> $_POST["role"]
                ];
            $id = $_POST['id'];
            $save = $user->Update($id,$data);
             if( $save ){
                $_SESSION['flash']=" User {$data['name'] } updated";
                $_SESSION["success"]= true;
            } else {
                $_SESSION["flash"]= "Error updating user";
                $_SESSION["success"]= false;
            }
        }else{
            $_SESSION['flash']="unauthorised method";
            $_SESSION["success"]= "false";
        }

        header("location: ?page=dashboard");

        
    }

    public function adminstrativeUserDelete(){

        $id = $_POST['id'];

        $user = new User();

        $delete = $user->delete($id);

        if( $delete ){
            $_SESSION["flash"]= "User successfully removed from system";
            $_SESSION["success"]= true;
        } else {
            $_SESSION["flash"]= "Error removing user from system";
            $_SESSION["success"]= false;
        }

        header("location: ?page=manage_users");
        
    }

    public function showSystemLogs(){
        require_once __DIR__ ."/../views/systemlogs.php";
    }
}
