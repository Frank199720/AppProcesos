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
        td {
            
            height: 180px;
            width: 800px;
            border: black 1px solid
        }
    </style>
</head>

<body>
    <?php require 'views/sidebar_own.php' ?>
    <div class="content-wrapper">
        <div class="container justify-content-center">
            <section class="content-header">
                <h1>MATRIZ FODA</h1>
            </section>
            <section class="content">
                <div id="ah">
                <table style="width:100%;" id="tabla">
                    <tr>
                        <td align="center">
                            <h2>MATRIZ FODA</h2>
                            <h3>(<?php echo $this->nameEmpresa?>)</h3>
                        </td>
                        <td  align="center" id="fortaleza_r">
                            
                        </td>
                        <td id="debilidad-r" align="center">

                        </td>
                    </tr>
                    <tr>
                        <td id=oportunidad_r align="center">

                        </td>
                        <td id="est_fo_r" align="center">

                        </td>
                        <td id="est_do_r" align="center">

                        </td>
                    </tr>
                    <tr>
                        <td id=amenaza_r align="center">

                        </td>
                        <td id="est_fa_r" align="center">

                        </td>
                        <td id="est_da_r" align="center">

                        </td>
                    </tr>
                </table>
                </div>
                
                <!-- <div id="pdfexport">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col bg-dark">
                            <h5>FORTALEZAS</h5>
                            <table id="fortaleza">
                                <tbody>


                                </tbody>
                            </table>
                        </div>
                        <div class="col bg-light">
                            <h5>DEBILIDADES</h5>
                            <table id="debilidad">
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h5>OPORTUNIDADES</h5>
                            <table id="oportunidad">
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <div class="col">
                            <h5>ESTRATEGIAS FO</h5>
                            <table id="est_fo">
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <div class="col bg-info">
                            <h5>ESTRATEGIAS DO</h5>
                            <table id="est_do">
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col bg-primary">
                            <h5>AMENAZAS</h5>
                            <table id="amenaza">
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <div class="col bg-secondary">
                            <h5>ESTRATEGIAS FA</h5>
                            <table id="est_fa">
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <div class="col bg-success">
                            <h5>ESTRATEGIAS DA</h5>
                            <table id="est_da">
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> -->

                <div class="row mt-2 d-flex">
                    <button type="button" class="btn btn-primary ml-auto" id="pdf">Exportar a PDF</button>
                    
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
    <script src="<?php echo constant('URL'); ?>public/dist/jspdf.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript" src="<?php echo constant('URL'); ?>public/dist/js/tableExport.js"></script>
    <script type="text/javascript" src="<?php echo constant('URL'); ?>public/dist/js/jquery.base64.js"></script>
    <script type="text/javascript" src="<?php echo constant('URL'); ?>public/dist/js/exportarWord.js"></script>
    <script type="text/javascript" src="<?php echo constant('URL'); ?>public/dist/js/exportarPDF.js"></script>
    <script>
        let ruc_global = <?php echo $this->emp_ruc ?>;
        abrirMatriz();

        
        function abrirMatriz() {

            mostrarElemento("fortaleza_r", "F");
            mostrarElemento("debilidad-r", "D");
            mostrarElemento("oportunidad_r", "O");
            
            mostrarEstrategia("est_fo_r", "FO");
            mostrarEstrategia("est_do_r", "DO");
            mostrarElemento("amenaza_r", "A");
            mostrarEstrategia("est_fa_r", "FA");
            mostrarEstrategia("est_da_r", "DA");
        }

        function mostrarElemento(tabla, valor) {
            var url = "http://localhost:82/AppEmpresas/reg_foda/getElemento/" + ruc_global + "/" + valor;
            var tabla_cont = "#" + tabla;
            httpRequest(url, function() {
                var array = JSON.parse(this.responseText);
                console.log(this.responseText);
                $(tabla_cont).empty();
                var tablaRef = $(tabla_cont);
                let title;
                switch(valor){
                    case 'F':
                        valor="FORTALEZAS"; break;
                    case 'O':
                        valor="OPORTUNIDADES"; break;
                    case 'D':
                        valor="DEBILIDADES"; break;
                    case 'A':
                        valor="AMENAZAS"; break;
                }
                var ad="<h5>"+valor+"</h5>"
                tablaRef.append(ad);
                for (let item of array) {

                    var ad = '<strong>('+item.ELE_ID+')</strong>'+item.ELE_DESC + '<br>';


                    tablaRef.append(ad);
                }


            });
        }

        function mostrarEstrategia(tabla, valor) {
            var url = "http://localhost:82/AppEmpresas/reg_foda/getEstrategia/" + ruc_global + "/" + valor;
            var tabla_cont = "#" + tabla;
            httpRequest(url, function() {
                var array = JSON.parse(this.responseText);
                console.log(this.responseText)
                var tablaRef = $(tabla_cont)
                $(tabla_cont).empty();
                switch(valor){
                    case 'FO':
                        valor="ESTRATEGIAS FO"; break;
                    case 'DO':
                        valor="ESTRATEGIAS DO"; break;
                    case 'DA':
                        valor="ESTRATEGIAS DA"; break;
                    case 'FA':
                        valor="ESTRATEGIAS FA"; break;
                }
                var ad="<h6>"+valor+"</h6>"
                tablaRef.append(ad);
                for (let item of array) {

                    var ad = '<strong>('+item.EST_ID+')</strong>'+item.EST_DESC + '<br>';


                    tablaRef.append(ad);
                }


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
    </script>
</body>

</html>