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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js" />

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style>
    tr.highlighted td {
        background: #E1F7EC;
    }
</style>

<body>
    <div>
        <?php require 'views/sidebar_own.php' ?>
        <div class="content-wrapper">
            <div class="container justify-content-center">
                <section class="content-header">
                    <h1>LISTA DE AREAS DE LA EMPRESA</h1>
                </section>
                <section class="content">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <button type="button" class="btn btn-primary" id="addbutton"><i class="fas fa-plus-square"></i> </button>
                                    <button type="button" class="btn btn-warning" id="editbutton"><i class="fas fa-edit"></i> </button>
                                    <button type="button" class="btn btn-danger" id="deletebutton"> <i class="fas fa-trash"></i> </button>
                                </div>
                            </div>

                            <table id="areaTable">
                                <thead>
                                    <tr>
                                        <th>Cod</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Descripcion</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyArea">

                                </tbody>
                            </table>


                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="modal fade" id="modalAddArea" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="accionModalArea"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nombre del Area</label>
                                <input type="text" class="form-control" id="namearea">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Descripcion</label>
                                <textarea class="form-control" id="descarea"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="savearea">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo constant('URL'); ?>public/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo constant('URL'); ?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo constant('URL'); ?>public/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo constant('URL'); ?>public/dist/js/demo.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script type="text/javascript" src="<?php echo constant('URL'); ?>public/dist/js/function.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        //VARIABLES DE SELECCION
        var codArea;
        var codNombre;
        var codDesc;
        var edicion = 0;
        var table;
        $(document).ready(function() {

            getArea();
            //estructuraArea();
        });
        $("#modalAddArea").on('hidden.bs.modal', function() {
            //limpiaModalIngreso('modalAddArea');
            document.getElementById('accionModalArea').innerHTML = "";
            document.getElementById('namearea').value = "";
            document.getElementById('descarea').value = "";
        });
        document.getElementById('addbutton').addEventListener('click', function(e) {
            document.getElementById('accionModalArea').innerHTML = "Agregar nueva área";
            showModal('modalAddArea');
        })
        document.getElementById('deletebutton').addEventListener('click', function(e) {

            Swal.fire({
                title: '¿Estás seguro?',
                text: "Se eliminará el area seleccionada",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteArea();
                }
            })
        })
        document.getElementById('editbutton').addEventListener('click', function(e) {
            edicion = 1;
            document.getElementById('accionModalArea').innerHTML = "Edición de área";
            document.getElementById('namearea').value = codNombre;
            document.getElementById('descarea').value = codDesc;
            showModal('modalAddArea');

        })
        document.getElementById('savearea').addEventListener('click', function(e) {
            if (edicion == 0) {
                saveArea();
            } else {
                updateArea();
            }

        })

        function deleteArea() {
            let fr = new FormData();
            fr.append('codArea', codArea);
            let url = "http://localhost:82/AppProcesos/areaController/deleteArea";

            httpRequest_POST(url, fr, function() {
                if (this.responseText == '01') {
                    showConfirm("Area eliminada!")
                    closeModal('modalAddArea');
                    getArea();
                    //estructuraArea();
                }
                console.log(this.responseText);
            });
        }

        function saveArea() {
            edicion = 0;
            let area;
            let descarea;
            area = document.getElementById('namearea').value;
            descarea = document.getElementById('descarea').value;
            let fr = new FormData();
            fr.append('namearea', area);
            fr.append('descarea', descarea);

            let url = "http://localhost:82/AppProcesos/areaController/saveArea";

            httpRequest_POST(url, fr, function() {
                if (this.responseText == '01') {
                    showConfirm("Area registrada!")
                    closeModal('modalAddArea');


                    getArea();
                    //estructuraArea();
                }

            });
        }

        function updateArea() {
            edicion = 0;
            let area;
            let descarea;
            area = document.getElementById('namearea').value;
            descarea = document.getElementById('descarea').value;
            let fr = new FormData();
            fr.append('namearea', area);
            fr.append('descarea', descarea);
            fr.append('codArea', codArea);
            let url = "http://localhost:82/AppProcesos/areaController/updateArea";

            httpRequest_POST(url, fr, function() {
                if (this.responseText == '01') {
                    showConfirm("Area Editada!")
                    closeModal('modalAddArea');
                    getArea();
                    //estructuraArea();
                }

            });
        }

        function getArea() {
            url = "http://localhost:82/AppProcesos/areaController/getArea";

            httpRequest(url, function() {

                let resultado = JSON.parse(this.responseText);



                $('#areaTable').dataTable().fnDestroy();
                table = $('#areaTable').DataTable({

                    "bPaginate": false,
                    "bLengthChange": false,
                    "bFilter": true,
                    "bInfo": false,
                    "bAutoWidth": false,
                    select: true,
                    "data": resultado,

                    columns: [{
                            data: "ARE_COD",
                            "visible": false
                        },
                        {
                            data: "ARE_NOMBRE"
                        },
                        {
                            data: "ARE_DESC"
                        },
                        {
                            data: "EMP_RUC",
                            "visible": false
                        }


                    ]
                });

                $('#areaTable tbody').on('click', 'tr', function() {

                    var data = table.row(this).data();
                    console.log(table.row(this).data());
                    codArea = data.ARE_COD;
                    codNombre = data.ARE_NOMBRE;
                    codDesc = data.ARE_DESC;
                    console.log(codNombre);
                    //alert('You clicked on ' + data[0] + '\'s row');
                });
            });



        }
        var indice_area

        function estructuraArea() {
            table = document.getElementById('areaTable');
            for (var i = 1; i < table.rows.length; i++) {
                table.rows[i].onclick = function() {
                    indice_area = this.rowIndex;
                };
            }
            $('#bodyArea tr').click(function(e) {
                $('#bodyArea tr').removeClass('highlighted');
                $(this).addClass('highlighted');
            });
        }
    </script>
</body>

</html>