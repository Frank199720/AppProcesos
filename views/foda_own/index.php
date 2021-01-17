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
    <div>
        <?php require 'views/sidebar_own.php' ?>
        <div class="content-wrapper">
            <div class="container justify-content-center">

                <section class="content-header">
                    <h1>ELEMENTOS Y ESTRATEGIAS FODA</h1>

                </section>
                <section class="content">
                    <div class="card">

                        <div class="card-body">
                            <div class="container justify-content-center">
                                <div class="row mb-5">
                                    <div class="col">
                                        <select class="browser-default custom-select" id="eleFoda">
                                            <option value="0" selected>ELEMENTOS FODA</option>
                                            <option value="F">Fortalezas</option>
                                            <option value="O">Oportunidades</option>
                                            <option value="D">Debilidades</option>
                                            <option value="A">Amenazas</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-outline-success" data-ruc="<?php echo $this->emp_ruc ?>" onclick="mostrarElemento(this);">Ver/Registrar</button>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col">
                                        <select class="browser-default custom-select" id="estFoda">
                                            <option value="0" selected>ESTRATEGIAS FODA</option>
                                            <option value="FO">FO</option>
                                            <option value="FA">FA</option>
                                            <option value="DO">DO</option>
                                            <option value="DA">DA</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-outline-success" data-ruc="<?php echo $this->emp_ruc ?>" onclick="mostrarEstrategia(this);">Ver/Registrar</button>
                                    </div>


                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modalElemento" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <label for="" id="tituloElemento">Mantenedor de elemento</label>
                                </div>
                                <div class="modal-body">
                                    <div class="row d-flex">
                                        <div class="col-2 ml-auto">
                                            <button type="button" class="btn btn-primary btn-sm" onclick="guardarElemento()"><i class="far fa-plus-square"></i></button>
                                            <button type="button" class="btn btn-warning btn-sm" onclick="editarElemento()"><i class="far fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminarElemento()"><i class="fas fa-trash"></i></button>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <table class="table table-hover" id="tableElemento">
                                            <thead>
                                                <th>ID</th>
                                                <th>DESCRIPCION</th>

                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-success" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modalElementoInsert" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <label for="" id="tituloOp"></label>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col">
                                            <input type="text" class="form-control" id="desc_elemento" />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-success" onclick="guardarElementoConfirm()">Guardar</button>
                                    <button type="button" class="btn btn-outline-success" data-dismiss="modal">Close</button>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modalEditEstrategia" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <label for="">Estrategia</label>
                                </div>
                                <div class="modal-body">
                                    <div class="row d-flex">
                                        <div class="col-2 ml-auto">
                                            <button type="button" class="btn btn-primary btn-sm" onclick="guardarEstr()"><i class="far fa-plus-square"></i></button>
                                            <button type="button" class="btn btn-warning btn-sm" onclick="editEstr()"><i class="far fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteEstr()"><i class="fas fa-trash"></i></button>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <table class="table table-hover" id="tableElementoEstrategia">
                                            <thead>
                                                <th>
                                                    <div style="width: 5px;">ID</div>
                                                </th>
                                                <th>DESCRIPCION</th>

                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-outline-success" data-dismiss="modal">Close</button>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modalEditEstrategia2" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <label for="" id="">Mantenedor</label>

                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <label for="" id="estrategia_edit"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <table class="table table-hover" id="tableEstrategiaiz">
                                                <thead>
                                                    <th>ID</th>
                                                    <th>DESCRIPCION</th>

                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col">
                                            <table class="table table-hover" id="tableEstrategiader">
                                                <thead>
                                                    <th>ID</th>
                                                    <th>DESCRIPCION</th>

                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="emp_ruc">INGRESE LA ESTRATEGIA</label>
                                        <input type="text" class="form-control" id="descripcion_estrategia">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-success" onclick="guardarEstSi()">Guardar</button>
                                    <button type="button" class="btn btn-outline-success" data-dismiss="modal">Close</button>
                                </div>

                            </div>

                        </div>
                    </div>
                </section>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        // Material Select Initialization

        // para cada checkbox "chequeado"



        let ruc_global = <?php echo $this->emp_ruc ?>;
        let rol = <?php echo $this->rol ?>;
        let ele_foda;
        let ele_estrategia;
        let id_EditElemento;
        let edicion_estrategia = 0;
        let edicion_elemento = 0;
        let indice_estrategia;
        let indice_elemento;
        let edit_estrategia = 0;

        function estructuraTableElemento() {
            table = document.getElementById('tableElementoEstrategia');
            for (var i = 1; i < table.rows.length; i++) {
                table.rows[i].onclick = function() {
                    indice_estrategia = this.rowIndex;
                };
            }
            $('#tableElementoEstrategia tr').click(function(e) {
                $('#tableElementoEstrategia tr').removeClass('highlighted');
                $(this).addClass('highlighted');
            });
        }

        function estructuraTableElemento_E() {
            table = document.getElementById('tableElemento');
            for (var i = 1; i < table.rows.length; i++) {
                table.rows[i].onclick = function() {
                    indice_elemento = this.rowIndex;
                };
            }
            $('#tableElemento tr').click(function(e) {
                $('#tableElemento tr').removeClass('highlighted');
                $(this).addClass('highlighted');
            });
        }

        function mostrarElemento(button) {
            const ruc = button.dataset.ruc;
            ruc_global = ruc;
            ele_foda = document.getElementById('eleFoda').value;
            if (ele_foda != '0') {
                var url = "http://localhost:82/AppEmpresas/reg_foda/getElemento/" + ruc_global + "/" + ele_foda;
                httpRequest(url, function() {
                    var array = JSON.parse(this.responseText);
                    $("#tableElemento tbody").empty();
                    for (let item of array) {

                        var tablaRef = $("#tableElemento tbody");
                        var tr = '<tr>';
                        tr = tr + '<td>' + item.ELE_ID + '</td> ';
                        tr = tr + '<td>' + item.ELE_DESC + '</td> ';

                        tr = tr + '</tr>';

                        tablaRef.append(tr);
                    }
                    estructuraTableElemento_E();
                    $(document).ready(function() {
                        $('#modalElemento').modal({
                            backdrop: 'static',
                            keyboard: false
                        })
                        $("#modalElemento").modal('show');

                    });


                });
            } else {
                mostrarError("Seleccione un elemento");
            }

        }

        function mostrarEstrategia(button) {
            ele_estrategia = document.getElementById('estFoda').value;
            if (ele_estrategia != '0') {
                const ruc = button.dataset.ruc;
                ruc_global = ruc;
                let izq = "";
                let der = "";
                switch (ele_estrategia) {
                    case "FA":
                        izq = "F";
                        der = "A";
                        break;
                    case "FO":
                        izq = "F";
                        der = "O";
                        break;
                    case "DO":
                        izq = "D";
                        der = "O";
                        break;
                    case "DA":
                        izq = "D";
                        der = "A";
                        break;
                    default:
                        break;
                }
                getElementobyEstrategia("tableEstrategiaiz", izq);
                getElementobyEstrategia("tableEstrategiader", der);
                getEstrategia();
            } else {
                mostrarError("Seleccione una estrategia");
            }


        }

        function getEstrategia() {
            var url = "http://localhost:82/AppEmpresas/reg_foda/getEstrategia/" + ruc_global + "/" + ele_estrategia;
            httpRequest(url, function() {
                var array = JSON.parse(this.responseText);

                $("#tableElementoEstrategia tbody").empty();
                for (let item of array) {

                    var tablaRef = $("#tableElementoEstrategia tbody");
                    var tr = '<tr>';
                    tr = tr + '<td>' + item.EST_ID + '</td> ';
                    tr = tr + '<td>' + item.EST_DESC + '</td> ';
                    tr = tr + '</tr>';

                    tablaRef.append(tr);
                }
                estructuraTableElemento();
                $(document).ready(function() {
                    $('#modalEditEstrategia').modal({
                        backdrop: 'static',
                        keyboard: false
                    })
                    $("#modalEditEstrategia").modal('show');

                });


            });
        }

        // function editarElemento(button, num) {
        //     if (num == "0") {
        //         document.getElementById('tituloOp').innerHTML = "Editar Elemento";
        //         id_EditElemento = button.dataset.id;

        //         $("#modalEditElemento").modal('show');
        //         edicion = 1;
        //     } else {
        //         document.getElementById('tituloOp').innerHTML = "Insertar Elemento";
        //         $("#modalEditElemento").modal('show');
        //         edicion = 0;
        //     }


        // }

        function guardarElementoConfirm() {
            if (edicion_elemento == 1) {
                let tabla = document.getElementById('tableElemento')
                let id_EditElemento = tabla.rows[indice_elemento].cells[0].innerHTML;
                var desc = document.getElementById('desc_elemento').value;
                var url = "http://localhost:82/AppEmpresas/reg_foda/editElemento/" + ruc_global + "/" + id_EditElemento + "/" + desc;
                httpRequest(url, function() {
                    console.log(this.responseText);
                    $("#modalElementoInsert").modal('hide');
                    document.getElementById('desc_elemento').value = "";
                    getElemento()
                });
            } else {
                let tabla = document.getElementById('tableElemento');
                var url = "http://localhost:82/AppEmpresas/reg_foda/insertElemento";
                let fm = new FormData();
                var desc = document.getElementById('desc_elemento').value;
                var rowCount = $('#tableElemento tr').length;
                ele_id = ele_foda + "1";
                if (rowCount != 1) {
                    for (let i = 1; i < rowCount; i++) {
                        if (ele_id == tabla.rows[i].cells[0].innerHTML) {
                            ele_id = ele_foda + (i + 1);
                        } else {

                            break;
                        }
                    }
                }

                console.log(ele_id);
                fm.append("emp_ruc", ruc_global);
                fm.append("ele_desc", desc);
                fm.append("ele_id", ele_id);
                fm.append("ele_tipo", ele_foda);

                httpRequest_POST(url, fm, function() {
                    console.log(this.responseText);
                    getElemento();
                    $("#modalElementoInsert").modal('hide');
                    document.getElementById('desc_elemento').value;
                })
            }

        }

        function guardarEstSi() {
            var result = [];
            var i = 0;
            var est_id = "";
            var est_desc = document.getElementById('descripcion_estrategia').value;
            $("input[type=checkbox]:checked").each(function() {

                // buscamos el td más cercano en el DOM hacia "arriba"
                // luego encontramos los td adyacentes a este
                $(this).closest('td').siblings().each(function() {

                    // obtenemos el texto del td
                    if (i == 0 || i % 2 == 0) {
                        est_id += $(this).text();
                    }
                    result[i] = $(this).text();
                    ++i;

                });
            });
            let izq = ele_estrategia.charAt(0);
            let der = ele_estrategia.charAt(1);
            console.log(izq)
            console.log(der)
            console.log(est_id)
            if (est_id.includes(izq) && est_id.includes(der)) {
                if (edicion_estrategia == 0) {
                    var url = "http://localhost:82/AppEmpresas/reg_foda/insertEstrategia";
                    let fm = new FormData();
                    var desc = document.getElementById('descripcion_estrategia').value;
                    var rowCount = $('#tableElemento tr').length;
                    ele_id = ele_foda + rowCount;
                    if (desc == "") {
                        mostrarError("Ingrese una descripcion")
                    } else {
                        fm.append("emp_ruc", ruc_global);
                        fm.append("est_desc", est_desc);
                        fm.append("est_id", est_id);
                        fm.append("est_tipo", ele_estrategia);

                        httpRequest_POST(url, fm, function() {
                            console.log(this.responseText);
                            if (this.responseText.trim() == '01') {
                                mostrarError("La estrategia ya existe");
                            } else {
                                showSave("Estrategia agregada!");
                                getEstrategia();
                                $("#modalEditEstrategia2").modal('hide');
                                document.getElementById('descripcion_estrategia').value = "";
                                let checks = $("input[type=checkbox]:checked");
                                for (let i = 0; i < checks.length; i++) {
                                    checks[i].checked = false;
                                }
                            }

                        })
                    }

                } else {
                    let tabla = document.getElementById('tableElementoEstrategia')
                    var url = "http://localhost:82/AppEmpresas/reg_foda/ediEstrategia";
                    let fm = new FormData();
                    var desc = document.getElementById('descripcion_estrategia').value;
                    var rowCount = $('#tableElemento tr').length;
                    var id_ant = tabla.rows[indice_estrategia].cells[0].innerHTML;
                    ele_id = ele_foda + rowCount;
                    if (desc == "") {
                        mostrarError("Ingrese una descripcion")
                    } else {
                        fm.append("emp_ruc", ruc_global);
                        fm.append("est_desc", est_desc);
                        fm.append("est_id", est_id);
                        fm.append("est_tipo", ele_estrategia);
                        fm.append("id_ant", id_ant);
                        console.log(id_ant);
                        console.log(ruc_global);

                        httpRequest_POST(url, fm, function() {
                            console.log(this.responseText);

                            if (this.responseText.trim() == '01') {
                                mostrarError("La estrategia ya existe");
                            } else {
                                showSave("Estrategia actualizada!");
                                getEstrategia();
                                $("#modalEditEstrategia2").modal('hide');
                                document.getElementById('descripcion_estrategia').value = "";
                                document.getElementById('estrategia_edit').innerHTML = "";
                                let checks = $("input[type=checkbox]:checked");
                                for (let i = 0; i < checks.length; i++) {
                                    checks[i].checked = false;
                                }


                            }
                        })
                    }

                }
            } else {
                mostrarError("Seleccione ambos lados por favor");
            }


        }

        function guardarEstr() {
            if (rol == '003') {
                mostrarError("No tienes permisos para realizar la acción");
            } else {
                $("#modalEditEstrategia2").modal('show');
                edicion_estrategia = 0;
            }
        }

        function guardarElemento() {
            if (rol == '003') {
                mostrarError("No tienes permisos para realizar la acción");
            } else {
                $("#modalElementoInsert").modal('show');
                edicion_elemento = 0;
            }

        }

        function editarElemento() {
            if (rol == '003') {
                mostrarError("No tienes permisos para realizar la acción");
            } else {
                let tabla = document.getElementById('tableElemento')
                if (indice_elemento == null) {
                    alert("Selecciona una fila");
                } else {
                    document.getElementById('tituloOp').innerHTML = "Está editando el elemento: " + tabla.rows[indice_elemento].cells[0].innerHTML;
                    document.getElementById('desc_elemento').value = tabla.rows[indice_elemento].cells[1].innerHTML;
                    $("#modalElementoInsert").modal('show');
                    edicion_elemento = 1;
                }
            }

        }

        function editEstr() {
            if (rol == '003') {
                mostrarError("No tienes permisos para realizar la acción");
            } else {
                let tabla = document.getElementById('tableElementoEstrategia')
                if (indice_estrategia == null) {
                    alert("Selecciona una fila");
                } else {
                    document.getElementById('estrategia_edit').innerHTML = "Está editando la estrategia: " + tabla.rows[indice_estrategia].cells[0].innerHTML;
                    document.getElementById('descripcion_estrategia').value = tabla.rows[indice_estrategia].cells[1].innerHTML;
                    $("#modalEditEstrategia2").modal('show');
                    edicion_estrategia = 1;
                }
            }



        }
        $('#modalEditEstrategia2').on('hidden.bs.modal', function() {
            document.getElementById('descripcion_estrategia').value = "";
            document.getElementById('estrategia_edit').innerHTML = "";
            let checks = $("input[type=checkbox]:checked");
            for (let i = 0; i < checks.length; i++) {
                checks[i].checked = false;
            }
        });
        $('#modalEditEstrategia2').on('hidden.bs.modal', function() {
            document.getElementById('desc_elemento').value = "";
            document.getElementById('tituloOp').innerHTML = "";
            
        });

        function getElementobyEstrategia(tabla, ele) {

            var str = "#" + tabla + " tbody";
            var url = "http://localhost:82/AppEmpresas/reg_foda/getElemento/" + ruc_global + "/" + ele;
            httpRequest(url, function() {
                var array = JSON.parse(this.responseText);
                console.log(array);
                $(str).empty();
                for (let item of array) {

                    var tablaRef = $(str);
                    var tr = '<tr>';
                    tr = tr + '<td>' + item.ELE_ID + '</td> ';
                    tr = tr + '<td>' + item.ELE_DESC + '</td> ';
                    tr = tr + `<td><input type="checkbox" class="form-check-input" id="exampleCheck1"></td>`

                    tr = tr + '</tr>';

                    tablaRef.append(tr);
                }


            });
        }

        function getElemento() {


            var url = "http://localhost:82/AppEmpresas/reg_foda/getElemento/" + ruc_global + "/" + ele_foda;
            httpRequest(url, function() {
                var array = JSON.parse(this.responseText);
                $("#tableElemento tbody").empty();
                for (let item of array) {

                    var tablaRef = $("#tableElemento tbody");
                    var tr = '<tr>';
                    tr = tr + '<td>' + item.ELE_ID + '</td> ';
                    tr = tr + '<td>' + item.ELE_DESC + '</td> ';

                    tr = tr + '</tr>';

                    tablaRef.append(tr);
                }
                estructuraTableElemento_E();
                $("#modalElemento").modal('show');

            });
        }

        function httpRequest(url, callback) {

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

        function eliminarElemento() {
            if (rol == '003') {
                mostrarError("Usted no cuenta con permisos para realizar la acción");
            } else {
                let tabla = document.getElementById('tableElemento')
                if (indice_elemento == null) {
                    alert("Selecciona una fila");
                } else {
                    let id = tabla.rows[indice_elemento].cells[0].innerHTML;
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "Se eliminaran las estrategias asociadas",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            eliminarElementoConfirm(id);
                        }
                    })

                }
            }

        }

        function eliminarElementoConfirm(id) {
            var url = "http://localhost:82/AppEmpresas/reg_foda/deleteElemento/" + ruc_global + "/" + id;
            httpRequest(url, function() {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                getElemento();


            });
        }

        function deleteEstr() {
            if (rol == '003') {
                mostrarError("Usted no cuenta con permisos para realizar la acción");
            } else {
                let tabla = document.getElementById('tableElementoEstrategia')
                if (indice_estrategia == null) {
                    alert("Selecciona una fila");
                } else {
                    let id = tabla.rows[indice_estrategia].cells[0].innerHTML;
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "Se eliminaran las estrategias asociadas",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            eliminarEstrConfirm(id);
                        }
                    })

                }
            }

        }

        function eliminarEstrConfirm(id) {
            var url = "http://localhost:82/AppEmpresas/reg_foda/deleteEstrategia/" + ruc_global + "/" + id;
            httpRequest(url, function() {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                getEstrategia();


            });
        }

        function mostrarError(mensaje) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: mensaje

            })

        }

        function showSave(mensaje) {
            Swal.fire({
                icon: 'success',
                title: mensaje,
                showConfirmButton: false
            })

        }
    </script>
</body>

</html>