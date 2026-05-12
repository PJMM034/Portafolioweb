<?php
// Incluye el archivo de verificación de sesión para asegurar que el usuario ha iniciado sesión antes de acceder a esta página.
require_once 'PHP/Login/check.php';
//mando a llamar la funcion para validar el inicio de sesion
require_role('ADMIN');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>--Admin--</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body class="bg-ligth">
    <nav class="navbar bg-white border-bottom">
        <div class="container">
             <span class="navabar-brand fw-semibold">Asistencia</span>
             <div class="d-flex align-items-center gap-2">
             <span class="badge text-bg-secondary">Docentes</span>
             <!--aqui se redirige a la pagina de inicio para cerrar sesion-->
             <a class="btn btn-outline-danger" href="PHP/Login/logout.php">Cerrar sesion</a>
            </div>
        </div>
    </nav>
    <main class="container py-4">
    <h1 class="h4 fw-bold mb-3">Menu Administrador</h1>
    <div class="row g-3">
        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm h-100">
                 <a href="PHP/admin/alumnos_new.php">
                <div class="card-body">
                    <h2 class="h6 fw-semibold">Registro Alumnos</h2>
                    <p class="text-secondary mb-0">Alta y Gestion Alumnos</p>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <button class="btn btn-outline-secondary w-100">
                      <a href="PHP/admin/alumnos_new.php">
                        Entrar
                    </button>
                </div>
                 </a>
            </div>
        </div>
         <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h2 class="h6 fw-semibold">Grupo</h2>
                    <p class="text-secondary mb-0">Crear y Administrar Grupos</p>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <button class="btn btn-outline-secondary w-100">
                        Entrar
                    </button>
                </div>
            </div>
        </div>
         <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h2 class="h6 fw-semibold">Usuario y Roles</h2>
                    <p class="text-secondary mb-0">Docentes y Permisos</p>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <button class="btn btn-outline-secondary w-100">
                        Entrar
                    </button>
                </div>
            </div>
        </div>

        <hr class="border-success border-2 my-4 opacity-30">

        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h2 class="h6 fw-semibold">Asistencia</h2>
                    <p class="text-secondary mb-0">Consultar Resgistro por fecha</p>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <button class="btn btn-outline-secondary w-100">
                        Entrar
                    </button>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 ">
            <div class="card border-0 shadow-sm h-100 ">
                <div class="card-body">
                    <h2 class="h6 fw-semibold">Reporte</h2>
                    <p class="text-secondary mb-0">Resumen por grupo/alumnos</p>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <button class="btn btn-outline-secondary w-100">
                        Entrar
                    </button>
                </div>
            </div>
        </div>
     </div>
    </main>
</body>
</html>
