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
    <?php require 'views/sidebar_own.php' ?>
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
                                    <input type="text" class="form-control" id="emp_ruc" readonly />
                                </div>
                                <div class="form-group col-9">
                                    <label for="emp_ruc">RAZON SOCIAL</label>
                                    <input type="text" class="form-control" id="emp_razon_social" readonly />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-2">
                                    <label for="emp_ruc">ESTADO</label>
                                    <input type="text" class="form-control" id="emp_estado" readonly />
                                </div>
                                <div class="form-group col-2">
                                    <label for="emp_ruc">CONDICION</label>
                                    <input type="text" class="form-control" id="emp_condicion" readonly />
                                </div>
                                <div class="form-group col-8">
                                    <label for="emp_ruc">DIRECCION</label>
                                    <input type="text" class="form-control" id="emp_direccion" readonly />
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
                                    <textarea class="form-control" id="emp_mision" rows="4" readonly></textarea>

                                </div>
                                <div class="form-group col-6">
                                    <label for="emp_ruc">VISION</label>
                                    <textarea class="form-control" id="emp_vision" rows="4" readonly></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="emp_ruc">FACTOR DIRENCIADOR</label>
                                    <textarea class="form-control" id="emp_factor" rows="4" readonly></textarea>

                                </div>
                                <div class="form-group col-6">
                                    <label for="emp_ruc">PROPUESTA DE VALOR</label>
                                    <textarea class="form-control" id="emp_propuesta" rows="4" readonly></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="emp_ruc">OBJETIVOS ESTRATEGICOS</label>
                                    <textarea class="form-control" id="emp_objetivo" rows="4" readonly></textarea>

                                </div>

                            </div>
                            <div class="row d-flex">
                                <button type="button" class="btn btn-primary ml-auto" onclick="abrir();">Editar</button>
                                <button type="button" class="btn btn-primary ml-1" onclick="guardar();">Guardar</button>
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
        cargar();
        function abrir(){
            document.getElementById('emp_mision').removeAttribute('readonly');
            document.getElementById('emp_vision').removeAttribute('readonly');
            document.getElementById('emp_factor').removeAttribute('readonly');
            document.getElementById('emp_propuesta').removeAttribute('readonly');
            document.getElementById('emp_objetivo').removeAttribute('readonly');
            
        }
        function cargar() {
            let url = "http://localhost:82/AppEmpresas/emp_own/getEmpresabyRuc"
            httpRequest_GET(url, function() {
            var array = JSON.parse(this.responseText);
            console.log(this.responseText);
            document.getElementById('emp_ruc').value=array.EMP_RUC;
            document.getElementById('emp_razon_social').value=array.EMP_RAZON_SOCIAL;
            document.getElementById('emp_estado').value=array.EMP_ESTADO;
            document.getElementById('emp_condicion').value=array.EMP_CONDICION;
            document.getElementById('emp_direccion').value=array.EMP_DIRECCION;
            document.getElementById('emp_mision').value=array.EMP_MISION;
            document.getElementById('emp_vision').value=array.EMP_VISION;
            document.getElementById('emp_factor').value=array.EMP_FACTOR;
            document.getElementById('emp_propuesta').value=array.EMP_PROPUESTA;
            document.getElementById('emp_objetivo').value=array.EMP_OBJETIVO;
            })
        }

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

            var fm = new FormData();
            fm.append("emp_mision", emp_mision);
            fm.append("emp_vision", emp_mision);
            fm.append("emp_factor", emp_factor);
            fm.append("emp_propuesta", emp_propuesta);
            fm.append("emp_objetivo", emp_objetivo);
            httpRequest("http://localhost:82/AppEmpresas/emp_own/updateEmpresa", fm, function() {
                console.log(this.responseText);
                if(this.responseText.trim()=='02'){
                    mostrarError("No está autorizado para esta operación");
                }else{
                    showSave();
                }
                
            });
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
    </script>
</body>

</html>