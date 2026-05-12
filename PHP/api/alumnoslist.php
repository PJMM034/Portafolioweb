<?php
//require_once '../Login/check.php';
//mando a llamar la funcion para validar el inicio de sesion
//require_role('ADMIN');
require_once "../../Conexion/Conexion.php";

$res = $Connection->query("SELECT * FROM alumnos order by id desc");
$data = [];
// recorremos los resultados y los almacenamos en un array
while($row = $res->fetch_assoc()){
    $row['id'] = (int)$row['id'];
    $row['is_active'] = (int)$row['is_active'];
    $data[] = $row;
}
echo json_encode(['ok'=> true , 'data'=>$data, JSON_UNESCAPED_UNICODE]);

?>