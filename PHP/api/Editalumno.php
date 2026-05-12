<?php
require_once "../../Conexion/Conexion.php";

$id = (int)($_POST['id'] ?? 0);
$full_name  = trim($_POST['full_name']  ?? '');
$group_name = trim($_POST['group_name'] ?? '');
$email      = trim($_POST['email']      ?? '');
$phone      = trim($_POST['phone']      ?? '');

if ($id <= 0 || $full_name == '' || $group_name == '' || $email == '' || $phone == '') {
    echo json_encode(['ok' => false, 'msg' => 'Datos inválidos']);
    exit;
}

$row = $Connection->prepare("UPDATE alumnos SET full_name=?, group_name=?, email=?, phone=? WHERE id=?");
$row->bind_param("ssssi", $full_name, $group_name, $email, $phone, $id);
$row->execute();

echo json_encode(['ok' => true], JSON_UNESCAPED_UNICODE);
?>