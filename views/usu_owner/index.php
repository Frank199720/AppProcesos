<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        tr.highlighted td {
            background: #E1F7EC;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php require 'views/sidebar_own.php' ?>
    <div class="content-wrapper">
        <div class="container justify-content-center">
            <section class="content-header">
                <h1>REGISTRO DE USUARIOS</h1>
            </section>
            <section class="content">
                <div class="card col-11">
                    <div class="card-header">
                        <h4>Información personal</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="emp_ruc">DNI</label>
                                <input type="text" class="form-control" id="per_dni" readonly />
                            </div>
                            <div class="form-group col">
                                <label for="emp_ruc">NOMBRE</label>
                                <input type="text" class="form-control" id="per_nombre" readonly />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="emp_ruc">APELLIDO PATERNO</label>
                                <input type="text" class="form-control" id="per_paterno" readonly />
                            </div>
                            <div class="form-group col-6">
                                <label for="emp_ruc">APELLIDO MATERNO</label>
                                <input type="text" class="form-control" id="per_materno" readonly />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="emp_ruc">EMAIL</label>
                                <input type="text" class="form-control" id="per_email" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="emp_ruc">DIRECCION</label>
                                <input type="text" class="form-control" id="per_direccion" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-11">
                    <div class="card-header">
                        <h4>Información de acceso</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="emp_ruc">USUARIO</label>
                                <input type="text" class="form-control" id="usu_login" readonly value="<?php echo ($this->user_info->getLogin()) ?>" />
                            </div>
                            <div class="col-5">
                                <label for="emp_ruc">CONTRASEÑA</label>
                                <div class="input-group">
                                    
                                    <span class="input-group-btn ml-1">
                                        <button id="show_password" class="btn btn-success" data-toggle="modal" data-target="#modalContraseña" type="button" onclick="">
                                            Cambiar
                                        </button>
                                    </span>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-11 d-flex mb-3">
                        <button type="button" class="btn btn-success ml-auto" onclick="newUser()">Guardar</button>
                    </div>
                </div>
                <div class="modal fade" id="modalContraseña" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cambio de contraseña</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Anterior contraseña</label>
                                        <input type="password" class="form-control" id="contraseña">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nueva contraseña</label>
                                        <input type="password" class="form-control" id="contraseña_repet">
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="asignarPassword()">Asignar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="<?php echo constant('URL'); ?>public/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo constant('URL'); ?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo constant('URL'); ?>public/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo constant('URL'); ?>public/dist/js/demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        dataRol();
        getPersona();

        function asignarPassword() {
            var contraseña_curren = document.getElementById('contraseña').value;
            var contraseña_new = document.getElementById('contraseña_repet').value;
            let url = "http://localhost:82/AppEmpresas/user_own/updatePassword";
            let fm = new FormData();
            fm.append('current_password', contraseña_curren);
            fm.append('new_password', contraseña_new);
            httpRequest_POST(url, fm, function() {
                console.log(this.responseText);
                if(this.responseText.trim()=='pi'){
                    mostrarError('Contraseña inválida');
                }else{
                    showSave("La contraseña ha sido editada correctamente");
                }
            })
            // document.getElementById('password').value = contraseña_two;
            // $('#modalContraseña').modal('hide');

        }

        function getPersona() {
            let url = "http://localhost:82/AppEmpresas/user_own/getPersonaById";
            tabla = $("#eleRol");
            httpRequest_GET(url, function() {
                //$("#externo").empty();
                var array = JSON.parse(this.responseText);
                console.log(this.responseText);
                document.getElementById('per_dni').value = array.PER_ID;
                document.getElementById('per_nombre').value = array.PER_NOMBRE;
                document.getElementById('per_paterno').value = array.PER_APELLIDO;
                document.getElementById('per_materno').value = array.PER_APELLIDO_M;
                document.getElementById('per_direccion').value = array.EMP_DIRECCION;
                document.getElementById('per_email').value = "asdsa";

            })
        }

        function dataRol() {
            let url = "http://localhost:82/AppEmpresas/user_own/getRol";
            tabla = $("#eleRol");
            httpRequest_GET(url, function() {
                $("#externo").empty();
                var emp = JSON.parse(this.responseText);
                console.log(this.responseText);
                for (var op of emp) {
                    var option = '<option value="' + op.ROL_ID + '">' + op.ROL_NAME + '</option>';
                    tabla.append(option);
                }
            })
        }

        function httpRequest_GET(url, callback) {

            const http = new XMLHttpRequest();
            http.open("GET", url);
            http.send();
            http.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    callback.apply(http);
                }
            }

        }

        function httpRequest_POST(url, fr, callback) {

            const http = new XMLHttpRequest();
            http.open("POST", url);
            http.send(fr);
            http.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    callback.apply(http);
                }
            }
        }

        function newUser() {

            let email = document.getElementById('per_email').value;
            let direccion = document.getElementById('per_direccion').value;

            


            let fm = new FormData();

            fm.append('per_email', email);
            fm.append('per_direccion', direccion);

            

            let url = "http://localhost:82/AppEmpresas/user_own/updatePersona";
            httpRequest_POST(url, fm, function() {
                console.log(this.responseText);
            })
        }
        function showSave(mensaje) {
            Swal.fire({
                icon: 'success',
                title: mensaje,
                showConfirmButton: false
            })

        }

        function mostrarError(mensaje) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: mensaje

            })

        }
    </script>
</body>

</html>