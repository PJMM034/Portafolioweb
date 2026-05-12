<?php
session_start();
// Función para verificar si el usuario está logueado
function require_login() {
    if (!isset($_SESSION['username'])) {
        header('Location: index.php?error=2');
    exit();
    }
}
// Función para verificar el rol del usuario
function require_role($role) {
     require_login(); // Asegura que el usuario esté logueado antes de verificar el rol
     // Verifica si el rol del usuario en la sesión coincide con el rol requerido
     if($_SESSION['role'] !== $role) {
        header('Location: index.php?error=3');
        exit();
     }
}
?>