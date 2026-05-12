<?php
require_once '../Login/check.php';
//mando a llamar la funcion para validar el inicio de sesion
require_role('ADMIN');
require_once "../../Conexion/Conexion.php";

$full_name = $_POST['full_name'] ?? "";
$group_name = $_POST['group_name'] ?? "";
$email = $_POST['email'] ?? "";
$phone = $_POST['phone'] ?? "";


$sql_inser_alumno = "INSERT INTO alumnos (full_name, group_name, email, phone) VALUES (?,?,?,?)";
$inser_alumno = $Connection->prepare($sql_inser_alumno);
$inser_alumno->bind_param("ssss", $full_name, $group_name, $email, $phone);
$inser_alumno->execute();

header('Location: alumnos_new.php?insert=1');
exit;
?>