<?php 

function requireVet(){
    if(!isset($_SESSION["role"]) ){
        if($_SESSION['role'] !==  'vet' ){
        header("Location: ?page=login");
        exit;
        }else{
            return true;
        }

    }else {
        header("Location: ?page=login");
        exit;
    }
}