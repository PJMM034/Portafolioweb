<?php
require_once "Conexion.php";
$u1 = "admin01";
$p1 = password_hash("admin123", PASSWORD_DEFAULT);
$r1 = "ADMIN";

$u2 = "docente01";
$p2 = password_hash("docente123", PASSWORD_DEFAULT);
$r2 = "DOCENTE";

$sql = $Connection ->prepare ("
INSERT IGNORE INTO user (username , password , role) VALUES (?,?,?)");

$sql->bind_param("sss",$u1,$p1,$r1);
$sql->execute();

$sql->bind_param("sss",$u2,$p2,$r2);
$sql->execute();

echo  "usuarios insertado corretamente "

?>