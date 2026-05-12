
<?php
require_once '../Login/check.php';
//mando a llamar la funcion para validar el inicio de sesion
require_role('ADMIN');  
require_once "../../Conexion/Conexion.php";
$queryA = "SELECT * FROM alumnos";
//aquui 
$datos_alumnos = $Connection->query($queryA);


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Alumnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="../../js/jquery-4.0.0.js"></script>
    
    <script>
        $(document).ready(function(){
            const modalidet = new bootstrap.Modal(document.getElementById('modalidet'));
           
            function showAlert(type, msg) {
                $("#alertBox").html(`
                <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                    ${msg}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                `);

            } 


            function cargaalumnos(){
                $.getJSON ("../api/alumnoslist.php", function(resp){
                    // Procesar los datos recibidos
                   if(!resp.ok) {
                     showAlert('danger', resp.msg || 'datos');
                     //return;
                   }
                   /*  const row = resp.data.map(s =>`
                     <tr>   
                     <td class="text-end">
                              <button class="btn btn-sm btn-outline-primary me-1 btn-edit" data-id="${s.id}" title="Editar">
                                <i class="bi bi-pencil"></i>
                              </button>
                        </td> </tr>
                     `);
                     */
                        const row = resp.data.map(s =>`
                          <tr> 
                            <td>${s.id}</td>
                            <td>${s.full_name}</td>
                            <td>${s.group_name}</td>
                            <td>${s.email}</td>
                            <td>${s.phone}</td>
                            <td>${s.is_active}</td>
                            <td class="text-end">
                              <button class="btn btn-sm btn-outline-primary me-1 btn-edit" data-id="${s.id}" title="Editar">
                                <i class="bi bi-pencil"></i>
                              </button>
                          </td>
                          </tr>
                     `);
                    //aqui se muestra la informacion de los alumnos en la tabla
                    $("#tblstudents tbody").html(row);
                     
                });
            }
            //crea el evento click para el boton editar
            $(document).on("click",".btn-edit", function(){
                  //alert("diste click en editar");
                  //aqui se obtiene el id de para mostrarl o jalar la informaion 
                  const id = $(this).data("id");
                
                  $.getJSON("../api/Getalumno.php", {id:id}, function(resp){
                     if(!resp.ok) {
                     showAlert('danger', resp.msg || 'ERROR ID NO ENCONTRADO');
                     //return;
                   }

                   const data = resp.data;
                     $("#id").val(data.id);
                     $("#full_name").val(data.full_name);
                     $("#group_name").val(data.group_name);
                     $("#email").val(data.email);
                     $("#phone").val(data.phone);
                     

                     $("#modalidet").modal('show');
                  });
                  
            });
             
             $("#frmEditar").on("submit", function(e){
            // el preventDefault es para evitar que mande el formulario    
                 e.preventDefault();
                 $.post("../api/Editalumno.php",$(this).serialize(), function(resp){ 
                 try{resp = JSON.parse(resp); } catch(e){resp = {ok:false, msg:'Error al editar'};}
                  if(!resp.ok) {
                     showAlert('danger', resp.msg || 'ERROR AL EDITAR');
                     return;
                   }
                   $("#modalidet").modal('hide');
                     showAlert('success', 'Alumno editado correctamente');
                     cargaalumnos();

                 });

            });

           cargaalumnos();
           
        });
    </script>
    
</head>
<body>
    <div class="container py-4">
        <div class = "d-flex justify-content-between align-items-center mb-3">
            <h1 class = "h4 mb=0">CONSULTA DE ALUMNOS</h1>
            <a href="../../Admin.php">REGRESAR</a>
        </div>
        <div id="alertBox">
             
        </div>
        <div class = "card border-0 shadow-sm">
            <div class = "card-body p-4">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="tblstudents">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Grupo</th>
                                <th>Email</th>
                                <th>Celular</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <!-- aqui uso el colspan para unir las celdas y para usar usar ajax  -->
                            <td colspan="7" class="text-center" text-secondary p-4>Cargando...</td>
                            
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" aria-hidden ="true" id="modalidet">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Alumnos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="frmEditar">
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id">
                            <div class="mb-3">
                                <label for="full_name" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" required maxlength="100" minlength="3">
                            </div>
                            <div class="mb-3">
                                <label for="group_name" class="form-label">Grupo</label>
                                <input type="text" class="form-control" id="group_name" name="group_name" required maxlength="5" minlength="3">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required maxlength="50" minlength="6">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Celular</label>
                                <input type="text" class="form-control" id="phone" name="phone" required maxlength="10" minlength="10">
                            </div>
                        </div>
                         <div class="modal-footer">
                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                             <button type="submit" class="btn btn-primary">Guardar</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>