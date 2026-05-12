<?php
// Inicia una nueva sesión o reanuda la existente.
session_start();
require_once '../../Conexion/Conexion.php';

// Obtiene el 'usuario' y la 'contraseña' de la solicitud POST, con un valor vacío predeterminado.
$usuario = $_POST['usuario'] ?? '';
$password = $_POST['password'] ?? '';

// estamos preparando para la consulta sobre el username  y limitando
$sql = $Connection->prepare("SELECT * FROM user WHERE username = ? LIMIT 1");
   // 
    $sql->bind_param("s",$usuario);
    $sql->execute();
$res = $sql->get_result();
$user = $res->fetch_assoc();
//checar el statu
if((int)$user['is_active'] == 0){
    header('Location: ../../index.php?error=1');
    exit();

}
if(!password_verify($password, $user['password'])){
    header('Location: ../../index.php?error=1');
    exit();
}
$_SESSION['username'] = $user['username'];
$_SESSION['role'] = $user['role'];
$_SESSION['id'] = $user['id'];
if($user['role'] == 'ADMIN'){
    header('Location: ../../admin.php');
    exit();

}
if($user['role'] == 'DOCENTE'){
    header('Location: ../../docente.php');
    exit();
}


/*

// Comprueba si el 'usuario' proporcionado existe en el array $username y si la contraseña coincide.
if (isset($username[$usuario]) && $username[$usuario]['password'] === $password) {
    // Si las credenciales son correctas, almacena los datos del usuario en la sesión.
    $_SESSION['usuario'] = $username[$usuario];
    $_SESSION['rol'] = $username[$usuario]['rol'];
    // Redirige al usuario según su rol.
    if ($username[$usuario]['rol'] === 'admin') {
        // Redirige a la página de administrador.
        header('Location: ../../admin.php');
        exit();
    } if ($username[$usuario]['rol'] === 'docente') {
        // Redirige a la página de docente.
        header('Location: ../../docente.php');
        exit();
    }
} else {
    // Si las credenciales son incorrectas, redirige a la página de inicio con un error.
    header('Location: ../../index.php?error=1');
    exit();
}
*/

?>
