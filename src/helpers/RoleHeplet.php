<?php

function requireVet() {
    
    if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "vet") {
        header("Location: ?page=login");
        exit;
    }
    return true;
}

function require_admin() {

    if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
        header("Location: ?page=login");
        exit;
    }
    return true;
}
