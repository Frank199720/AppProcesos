<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="public/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div>
        <?php require 'views/sidebar.php' ?>
        <div class="content-wrapper">
            <div class="container justify-content-center">
                <section class="content-header">
                    <h1>REGISTRO DE EMPRESA</h1>
                </section>
                <section class="content">
                    <div class="card">
                        <div class="card-header">
                            <h3>Información general</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-3">
                                    <label for="emp_ruc">RUC</label>
                                    <input type="text" class="form-control" id="emp_ruc" onkeypress="soloNumeros(event)" />
                                </div>
                                <div class="form-group col-9">
                                    <label for="emp_ruc">RAZON SOCIAL</label>
                                    <input type="text" class="form-control" id="emp_razon_social" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-2">
                                    <label for="emp_ruc">ESTADO</label>
                                    <input type="text" class="form-control" id="emp_estado" />
                                </div>
                                <div class="form-group col-2">
                                    <label for="emp_ruc">CONDICION</label>
                                    <input type="text" class="form-control" id="emp_condicion" />
                                </div>
                                <div class="form-group col-8">
                                    <label for="emp_ruc">DIRECCION</label>
                                    <input type="text" class="form-control" id="emp_direccion" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3>Información institucional</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="emp_ruc">MISION</label>
                                    <textarea class="form-control" id="emp_mision" rows="4"></textarea>

                                </div>
                                <div class="form-group col-6">
                                    <label for="emp_ruc">VISION</label>
                                    <textarea class="form-control" id="emp_vision" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="emp_ruc">FACTOR DIRENCIADOR</label>
                                    <textarea class="form-control" id="emp_factor" rows="4"></textarea>

                                </div>
                                <div class="form-group col-6">
                                    <label for="emp_ruc">PROPUESTA DE VALOR</label>
                                    <textarea class="form-control" id="emp_propuesta" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="emp_ruc">OBJETIVOS ESTRATEGICOS</label>
                                    <textarea class="form-control" id="emp_objetivo" rows="4"></textarea>

                                </div>

                            </div>
                            <div class="row d-flex">
                                <button type="button" class="btn btn-primary ml-auto" onclick="guardar();">Guardar</button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script src="public/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="public/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="public/dist/js/demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        function guardar() {
            var emp_ruc = document.getElementById('emp_ruc').value;
            var emp_razon_social = document.getElementById('emp_razon_social').value;
            var emp_estado = document.getElementById('emp_estado').value;
            var emp_condicion = document.getElementById('emp_condicion').value;
            var emp_direccion = document.getElementById('emp_direccion').value;
            var emp_mision = document.getElementById('emp_mision').value;
            var emp_vision = document.getElementById('emp_vision').value;
            var emp_factor = document.getElementById('emp_factor').value;
            var emp_propuesta = document.getElementById('emp_propuesta').value;
            var emp_objetivo = document.getElementById('emp_objetivo').value;
            let validacion = validar();
            if (validacion == 'ok') {
                var fm = new FormData();
                fm.append("emp_ruc", emp_ruc);
                fm.append("emp_razon_social", emp_razon_social);
                fm.append("emp_estado", emp_estado);
                fm.append("emp_condicion", emp_condicion);
                fm.append("emp_direccion", emp_direccion);
                fm.append("emp_mision", emp_mision);
                fm.append("emp_vision", emp_mision);
                fm.append("emp_factor", emp_factor);
                fm.append("emp_propuesta", emp_propuesta);
                fm.append("emp_objetivo", emp_objetivo);
                httpRequest("http://localhost:82/AppEmpresas/emp_register/registrarEmpresa", fm, function() {
                    console.log(this.responseText);
                    if (this.responseText.trim() == '01') {
                        mostrarError("La empresa ingresada ya existe en el sistema");
                    } else {
                        showSave();
                    }
                    //
                });
            }else{
                mostrarError(validacion);
            }

        }

        function httpRequest(url, fr, callback) {
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
            var emp_ruc = document.getElementById('emp_ruc').value;
            var emp_razon_social = document.getElementById('emp_razon_social').value;
            var emp_estado = document.getElementById('emp_estado').value;
            var emp_condicion = document.getElementById('emp_condicion').value;
            var emp_direccion = document.getElementById('emp_direccion').value;
            var emp_mision = document.getElementById('emp_mision').value;
            var emp_vision = document.getElementById('emp_vision').value;
            var emp_factor = document.getElementById('emp_factor').value;
            var emp_propuesta = document.getElementById('emp_propuesta').value;
            var emp_objetivo = document.getElementById('emp_objetivo').value;
            if (emp_ruc.length > 11 || emp_ruc.length < 11)
                return "RUC no valido";
            if (emp_razon_social == '' || emp_estado == '' || emp_condicion == '' || emp_direccion == '' || emp_mision == '' || emp_vision == '' || emp_factor == '' || emp_propuesta == '' || emp_objetivo == '')
                return "Complete todos los campos"
            return "ok"
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