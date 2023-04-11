<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  
  
   <!-- Modal trigger button -->
   <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modal-estudiante">
     VEN
   </button>
   
   <!-- Modal Body -->
   <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
   <div class="modal fade" id="modal-estudiante" tabindex="-1"  role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Registro de estudiante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form  action= "" autocomplete="off">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label  for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos">
                </div>
                <div class="mb-3 col-md-6">
                        <label for="nombres" class="form-label">Nombres</label>
                        <input type="text" class="form-control form-control-sm" id="nombres">
                    </div>
                <div class="row">
                    <div class="mb-3 cold-md-6">
                        <label for="tipodocumento" class="form-label">Tipo Documento</label>
                        <input name="tipodocumento" class="form-select form-select-sm" id="tipodocumento">
                    </div>
                <div class="row">
                    <div class="mb-3 cold-md-6">
                        <label for="nrodocumento" class="form-control">Nro de Documento</label>
                        <input type="text"class="form-control form-control-sm" id="nrodocumento">
                    </div>
                <div class="row">
                    <div class="mb-3 cold-md-6">
                        <label for="fechanacimiento" class="form-label">Fecha Nacimiento</label>
                        <input type="date" class="form-control form-control-sm" id="fechanacimiento">
                    </div>
                    <div class="mb-3 cold-md-6">
                        <label for="sede" class="form-control">Sede</label>
                        <input name="sede" class="form-select form-select-sm" id="sede">
                        <option value=""> Selecione</option>
                    </div>
                <div class="row">
                    <div class="mb-3 cold-md-6">
                        <label for="escuela" class="form-select">Escuela</label>
                        <input name="escuela" class="form-select form-select-sm" id="escuela">
                        <option value=""> Selecione</option>
                    </div>
                    <div class="mb-3 cold-md-6">
                        <label for="carrera" class="form-label">Carreras</label>
                        <input name="carrera"class="form-select form-select-sm" id="carrera">
                        <option value=""> Selecione</option>
                    </div>
                
                    <div class="mb-3">
                        <label for="fotografia">Fotografia:</label>
                        <input type="file" class="form-control form-control-sm" id="fotografia">
                    </div>
                
                
                
                

            </form>    


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
   </div>
   
   
   <!-- Optional: Place to the bottom of scripts -->
   <script>
    const myModal = new bootstrap.Modal(document.getElementById('guardar-estudiante'), options)
   
   </script>  
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
<!--jquery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<!--SweetAlert2-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function (){

        function obtenerSedes(){
                $.ajax({
                    url: '../controllers/sede.controller.php',
                    type: 'POST',
                    data: {operacion: 'listar'},
                    dataType: 'text',
                    success: function(result){
                        $("#sede").html(result);
                    }

                });
            };
        });
        function obtenerEscuelas(){
            $.ajax({
                url:       '../controllers/escuela.controller.php',
                type:       'POST',
                data:       {operacion: 'listar'},
                dataType:   'text',
                success:    function(result){
                    $("#escuela").html(result);
                }
            });
            }

            function registrarEstudiantes(){
                Swal.fire({
                    icon:       'question',
                    tilte:      'Matriculas',
                    text:       '¿Seguro de Registra al estudiante?',
                    footer:     'Desarrollado con PHP',
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#41B3F5 ',
                    showCancelButton: true,
                    cancelButtonText:   'Cancelar'

                }).then((result) =>{
                    //Identificando accion del usuario
                    if(result.isConfirmed){
                        console.log("Guardando Datos...");
                    }
                });

            }
            $("guardar-estudiante").click(registrarEstudiantes);




            // Al cambiar una escuela, se actualizara las carreras
            $("#escuela").change(function (){
                const idescuelaFiltro = $ (this).val();

                $ajax({
                    url:    '../controllers/carrera.controller.php',
                    type:   'POST',
                    data: {
                        operacion       :  'listar',
                        idescuela       : idescuelaFiltro
                    },
                    dataType:  'text',
                    success: function(result){
                        $("#carrera").html(result);
                    }
                });
            });
            
        




        // predeterminamos un control dentro del modal
        $("#modal-estudiante").on("shown.bs.modal",event => {
            $('#apellidos').focus();


            obtenerSedes();
            obtenerEscuelas();
        });
    

    


</script>
</body>

</html>