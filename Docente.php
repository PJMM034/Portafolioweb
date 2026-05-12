<?php
session_start();
// Incluye el archivo de verificación de sesión para asegurar que el usuario ha iniciado sesión antes de acceder a esta página.
require_once 'PHP/Login/check.php';
//mando a llamar la funcion para validar el inicio de sesion
require_role('DOCENTE');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>--Docentes--</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body class="bg-ligth">
    <nav class="navbar bg-white border-bottom">
        <div class="container">
             <span class="navabar-brand fw-semibold">Asistencia</span>
             <div class="d-flex align-items-center gap-2">
             <span class="badge text-bg-primary">Docentes</span>
             <a class="btn btn-outline-danger" href="PHP/Login/logout.php">Cerrar sesion</a>
            </div>
        </div>
    </nav>
    <main class="container py-4">
    <h1 class="h4 fw-bold mb-3">Menu Docentes</h1>
    <div class="row g-3">
        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h2 class="h6 fw-semibold">Marcar Asistencia</h2>
                    <p class="text-secondary mb-0">Presente / Ausente por alumno</p>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <button class="btn btn-primary w-100">
                        Entrar
                    </button>
                </div>
            </div>
        </div>
         <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h2 class="h6 fw-semibold">Ver Lista De Dia</h2>
                    <p class="text-secondary mb-0">Confirmar asistencia resgitrada</p>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <button class="btn btn-primary w-100">
                        Entrar
                    </button>
                </div>
            </div>
        </div>
         <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h2 class="h6 fw-semibold">Reportes</h2>
                    <p class="text-secondary mb-0">Porcentaje por alumno</p>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <button class="btn btn-primary w-100">
                        Entrar
                    </button>
                </div>
            </div>
        </div>
     </div>
    </main>
</body>
</html>