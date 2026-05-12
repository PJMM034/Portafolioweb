<?php

// Incluye el archivo de verificación de sesión para asegurar que el usuario ha iniciado sesión antes de acceder a esta página.
require_once '../Login/check.php';
//mando a llamar la funcion para validar el inicio de sesion
require_role('ADMIN');

$insert = $_GET['insert'] ?? '';
if ($insert === '1') {
    echo '<div class="alert alert-success text-center" role="alert">
    Alumno registrado correctamente.</div>';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUEVO ALUMNO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body class="bg-ligth">
    <div class="container">
        <div class = "d-flex justify-content-between align-items-center mb-3">
            <h1 class = "h4 mb=0">NUEVO ALUMNO</h1>
             <a href="list_alumnos.php">Consulta</a>
            <a href="../../Admin.php">REGRESAR</a>
        </div>
        <div class = "card border-0 shadow-sm">
            <div class = "card-body p-4">
             <form action="alumnos_ins.php" method="post">
                <div class = "mb-3">
                    <label class="form-label" for="full_name">Nombre Completo *</label>
                    <input class="form-control" id="full_name" name="full_name" type="text" 
                    required placeholder="Introduce tu Nombre Completo" maxlenfth="100" minlength="3">
                </div>
                <div class = "mb-3">
                    <label class="form-label" for="group_name">Grupo *</label>
                    <input class="form-control" id="group_name" name="group_name" type="text" 
                    required placeholder="Introduce tu Grupo" maxlenfth="5" minlength="3">
                </div>
                <div class = "mb-3">
                    <label class="form-label" for="email">Email *</label>
                    <input class="form-control" id="email" name="email" type="text" 
                    required placeholder="Introduce tu Grupo" maxlenfth="50" minlength="6">
                </div>
                <div class = "mb-3">
                    <label class="form-label" for="phone">Numero de Celular *</label>
                    <input class="form-control" id="phone" name="phone" type="text" 
                    required placeholder="Introduce tu Numero de Celular" maxlenfth="10" minlength="10">
                </div>
                
                <button type="submit" class="btn btn-primary" >Guardar</button>
             </form>
            </div>
        </div>
    </div>

</body>
</html>