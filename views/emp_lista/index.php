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
      
    </style>
</head>
<body>
    <div>
    <?php require 'views/sidebar.php'?>
        <div class="content-wrapper">
            <div class="container justify-content-center">
              
              <section class="content-header">
                <h1>LISTADO DE EMPRESAS</h1>
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
                                        <th>RUC</th>
                                        <th>RAZON SOCIAL</th>
                                        <th>DIRECCION</th>
                                        <th>ESTADO</th>
                                        <th>CONDICION</th>
                                        <th>MANTENEDOR</th>
                                        
                                      </thead>
                                      <tbody>
                                        <?php
                                          include_once 'models/empresa.php';
                                          foreach ($this->empresas as $row) { 
                                            $empresa = new Empresa();
                                            $empresa = $row;
                                        ?>
                                        <tr>
                                          <td><?php echo $empresa->emp_ruc ?></td>
                                          <td><?php echo $empresa->emp_razon_social ?></td>
                                          <td><?php echo $empresa->emp_direccion ?></td>
                                          <td><?php echo $empresa->emp_estado ?></td>
                                          <td><?php echo $empresa->emp_condicion ?></td>
                                          <td>
                                            <a class="btn btn-outline-warning" href="<?php echo constant('URL').'reg_foda/registrar/'.$empresa->emp_ruc ?>">Editar</a>
                                            <button type="button" class="btn btn-outline-danger">Eliminar</button>
                                            
                                          </td>
                                          <td></td>
                                          
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
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modalMatriz" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <label for="" id="tituloElemento">Valor</label>
                </div>
                <div class="modal-body">
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
                          <table id="est_fo">
                            <tbody>
                            
                            </tbody>
                          </table>                      
                        </div>    
                        <div class="col bg-info">
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
                            <table id="est_fa">
                              <tbody>
                              
                              </tbody>
                            </table>                      
                          </div>    
                          <div class="col bg-success">
                            <table id="est_da">
                              <tbody>
                              
                              </tbody>
                            </table>                      
                          </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success" data-dismiss="modal">Close</button>
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
    let ruc_global;
    function abrirMatriz(button){
       $("#modalMatriz").modal("show");
        const ruc= button.dataset.ruc;
        ruc_global=ruc;
        mostrarElemento("fortaleza","F");
        mostrarElemento("debilidad","D");
        mostrarElemento("oportunidad","O");
        
        mostrarElemento("fortaleza","F");
        mostrarEstrategia("est_fo","FO");
        mostrarEstrategia("est_do","DO");
        mostrarElemento("amenaza","A");
        mostrarEstrategia("est_fa","FA");
        mostrarEstrategia("est_da","DA");
    }
    function mostrarElemento(tabla,valor){
        var url="http://localhost:82/AppEmpresas/reg_foda/getElemento/"+ruc_global+"/"+valor;
        var tabla_cont = "#"+tabla+" tbody";
        httpRequest(url,function(){
             var array=JSON.parse(this.responseText);
             $(tabla_cont).empty();
             for(let item of array){
                
                var tablaRef = $(tabla_cont);
                var tr = '<tr>';
                tr = tr + '<td>' + item.ELE_ID + '</td> ';
                tr = tr + '<td>' + item.ELE_DESC + '</td> ';
                tr = tr + '</tr>';
                
                tablaRef.append(tr);
             }
            
                        
            });
            
             
        
        
    }
    function mostrarEstrategia(tabla,valor){
      var url="http://localhost:82/AppEmpresas/reg_foda/getEstrategia/"+ruc_global+"/"+valor;
        var tabla_cont = "#"+tabla+" tbody";
        httpRequest(url,function(){
             var array=JSON.parse(this.responseText);
             $(tabla_cont).empty();
             for(let item of array){
                
                var tablaRef = $(tabla_cont);
                var tr = '<tr>';
                tr = tr + '<td>' + item.EST_ID + '</td> ';
                tr = tr + '<td>' + item.EST_DESC + '</td> ';
                tr = tr + '</tr>';
                
                tablaRef.append(tr);
             }
            
                        
            });
            
             
        
        
    }
    function httpRequest(url,callback){
    
    const http = new XMLHttpRequest();
    http.open("GET",url);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            callback.apply(http);
        }
    }
    
    }
    
    
    </script>
</body>
</html>