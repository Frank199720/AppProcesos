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
    <?php require 'views/sidebar.php' ?>
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
                                <input type="text" class="form-control" onkeypress="soloNumeros(event)" id="per_dni" />
                            </div>
                            <div class="form-group col">
                                <label for="emp_ruc">NOMBRE</label>
                                <input type="text" class="form-control" id="per_nombre" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="emp_ruc">APELLIDO PATERNO</label>
                                <input type="text" class="form-control" id="per_paterno" />
                            </div>
                            <div class="form-group col-6">
                                <label for="emp_ruc">APELLIDO MATERNO</label>
                                <input type="text" class="form-control" id="per_materno" />
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
                        <div class="row d-flex">
                            <button type="button" class="btn btn-warning ml-auto" onclick="generarAcceso()">Generar</button>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="emp_ruc">USUARIO</label>
                                <input type="text" class="form-control" id="usu_login" readonly />
                            </div>
                            <div class="form-group col-6">
                                <label for="emp_ruc">CONTRASEÑA</label>
                                <input type="text" class="form-control" id="usu_password" readonly />
                            </div>
                        </div>
                        <div class="row">

                            <div class="form-group col-4">
                                <label for="emp_ruc">ROL</label>
                                <div class="input-group">
                                    <select class="browser-default custom-select" id="eleRol">


                                    </select>

                                </div>

                            </div>
                            <div class="col-4">
                                <label for="emp_ruc">RUC DE LA EMPRESA</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" readonly id="emp_ruc">
                                    <span class="input-group-btn ml-1">
                                        <button id="show_password" class="btn btn-success" data-toggle="modal" data-target="#modalEmpresas" type="button" onclick="">
                                            Consultar
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
                <div class="modal fade" id="modalEmpresas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Lista de empresas</h5>

                            </div>
                            <div class="modal-body">
                                <table class="table" id="tablaEmpresa">
                                    <thead class="thead-dark">
                                        <th>RUC</th>
                                        <th>RAZON SOCIAL</th>
                                    </thead>

                                    <tbody>

                                        <?php
                                        include_once 'models/empresa.php';
                                        foreach ($this->empresas as $row) {
                                            $empresa = new Empresa();
                                            $empresa = $row;
                                        ?>
                                            <tr ondblclick="seleccionarEmpresa()">
                                                <td><?php echo $empresa->emp_ruc ?></td>
                                                <td><?php echo $empresa->emp_razon_social ?></td>

                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="seleccionarEmpresa()">Aceptar</button>
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
        let index_empresa;

        function seleccionarEmpresa() {
            table = document.getElementById('tablaEmpresa');
            document.getElementById('emp_ruc').value = table.rows[index_empresa].cells[0].innerHTML;
            $("#modalEmpresas").modal('hide');
        }

        function generarAcceso() {
            let dni = document.getElementById('per_dni').value;
            let app = document.getElementById('per_paterno').value;
            if (dni == '' || app == '') {
                mostrarError("Por favor rellene el dni y apellido paterno de la persona");
            } else {
                let user = app.replace(/ /g, "");
                let login = user + dni + "@pesi.com";
                let password = dni;
                document.getElementById('usu_login').value = login.toLowerCase();
                document.getElementById('usu_password').value = password;
            }
        }
        estructuraTableEmpresas();

        function estructuraTableEmpresas() {
            table = document.getElementById('tablaEmpresa');
            for (var i = 1; i < table.rows.length; i++) {
                table.rows[i].onclick = function() {
                    index_empresa = this.rowIndex;
                };
            }
            $('#tablaEmpresa tr').click(function(e) {
                $('#tablaEmpresa tr').removeClass('highlighted');
                $(this).addClass('highlighted');
            });
        }

        function dataRol() {
            let url = "http://localhost:82/AppEmpresas/user/getRol";
            tabla = $("#eleRol");
            httpRequest_GET(url, function() {
                $("#externo").empty();
                var emp = JSON.parse(this.responseText);
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

        function validar() {
            let dni = document.getElementById('per_dni').value;
            let nombre = document.getElementById('per_nombre').value;
            let apellido_paterno = document.getElementById('per_paterno').value;
            let apellido_materno = document.getElementById('per_materno').value;
            let email = document.getElementById('per_email').value;
            let direccion = document.getElementById('per_direccion').value;
            let login = document.getElementById('usu_login').value;
            let password = document.getElementById('usu_password').value;
            let rol = document.getElementById('eleRol').value;
            let ruc = document.getElementById('emp_ruc').value;
            if (dni == '' || nombre == '' || apellido_materno == '' || apellido_paterno == '' || email == '' || direccion == '' || login == '' || password == '' || ruc == '')
                return "Rellene todos los campos"
            if (dni.length < 8 || dni.length > 8)
                return "El DNI no tiene el formato correcto"
            return "ok";
        }

        function newUser() {
            let dni = document.getElementById('per_dni').value;
            let nombre = document.getElementById('per_nombre').value;
            let apellido_paterno = document.getElementById('per_paterno').value;
            let apellido_materno = document.getElementById('per_materno').value;
            let email = document.getElementById('per_email').value;
            let direccion = document.getElementById('per_direccion').value;
            let login = document.getElementById('usu_login').value;
            let password = document.getElementById('usu_password').value;
            let rol = document.getElementById('eleRol').value;
            let ruc = document.getElementById('emp_ruc').value;
            let validacion = validar();
            if (validacion == "ok") {
                let fm = new FormData();
                fm.append('per_dni', dni);
                fm.append('per_nombre', nombre);
                fm.append('per_paterno', apellido_paterno);
                fm.append('per_materno', apellido_materno);
                fm.append('per_email', email);
                fm.append('per_direccion', direccion);
                fm.append('usu_login', login);
                fm.append('usu_password', password);
                fm.append('eleRol', rol);
                fm.append('emp_ruc', ruc);
                let url = "http://localhost:82/AppEmpresas/user/newPersona";
                httpRequest_POST(url, fm, function() {
                    console.log(this.responseText);
                    if (this.responseText.trim() === '01') {
                        mostrarError("El usuario ya existe en la base de datos");
                    } else {
                        showSave();
                    }
                })
            } else {
                mostrarError(validacion);
            }

        }

        function showSave() {
            Swal.fire({
                icon: 'success',
                title: 'EL REGISTRO SE GUARDO CORRECTAMENTE',
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

        function soloNumeros(e) {
            var key = window.event ? e.which : e.keyCode;
            if (key < 48 || key > 57) {
                e.preventDefault();
            }
        }
    </script>
</body>

</html>