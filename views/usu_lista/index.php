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
    <style>
        table th {
            text-align: center;
        }
    </style>
</head>

<body>
    <div>
        <?php require 'views/sidebar.php' ?>
        <div class="content-wrapper">
            <div class="container justify-content-center">

                <section class="content-header">
                    <h1>LISTADO DE USUARIOS</h1>
                </section>
                <section class="content">
                    <div class="card">
                        <div class="card-header">
                            <h3>Información general</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <table class="table table-hover">
                                        <thead>
                                            <th class="align-center">DNI</th>
                                            <th>NOMBRE</th>
                                            <th>APELLIDOS</th>
                                            <th>DOMICILIO</th>
                                            <th>USUARIO</th>
                                            <th>EMPRESA</th>
                                            <th colspan="2">MANTENEDOR</th>

                                        </thead>
                                        <tbody>
                                            <?php
                                            include_once 'models/persona.php';
                                            foreach ($this->persona as $row) {
                                                $persona = new Persona();
                                                $persona = $row;
                                            ?>
                                                <tr>
                                                    <td><?php echo $persona->dni ?></td>
                                                    <td><?php echo $persona->nombre ?></td>
                                                    <td><?php echo $persona->apellido_paterno.' '.$persona->apellido_materno?></td>
                                                    <td><?php echo $persona->direccion ?></td>
                                                    <td><?php echo $persona->login ?></td>
                                                    
                                                    <td><?php echo $persona->empresa ?></td>
                                                    
                                                    <td><button type="button" class="btn btn-outline-danger">Eliminar</button></td>
                                                    <td><a class="btn btn-outline-warning" href="<?php echo constant('URL') . 'reg_foda/registrar/' . $persona->emp_ruc ?>">Editar</a></td>
                                                    
                                                    <td></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
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



        </script>
</body>

</html>