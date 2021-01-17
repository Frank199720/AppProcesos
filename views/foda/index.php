<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo constant('URL');?>public/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div>
    <?php require 'views/sidebar.php'?>
        <div class="content-wrapper">
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"style="!important;" id="modalEditEstrategia" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <label for="">Estrategia</label>
                    </div>
                    <div class="modal-body">
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
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-outline-success" onclick="guardarEstr()"  >Insertar</button>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table table-hover" id="tableElementoEstrategia">
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
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modalEditEstrategia2" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <label for="" id="">Ingresar Estrategia</label>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col">
                            <input type="text" class="form-control" id="desc_est"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success" onclick="guardarEstSi()">Guardar</button>
                    <button type="button" class="btn btn-outline-success" data-dismiss="modal">Close</button>
                </div>
                
            </div>
            
        </div>
    </div>
            <div class="container justify-content-center">
            <div class="card">
                        <div class="card-header">
                            <h3>Información institucional</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="emp_ruc">MISION</label>
                                    <textarea  class="form-control"  id="emp_mision" rows="4"></textarea>
                                    
                                </div>
                                <div class="form-group col-6">
                                    <label for="emp_ruc">VISION</label>
                                    <textarea  class="form-control"  id="emp_vision" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="emp_ruc">FACTOR DIRENCIADOR</label>
                                    <textarea  class="form-control"  id="emp_factor" rows="4"></textarea>
                                    
                                </div>
                                <div class="form-group col-6">
                                    <label for="emp_ruc">PROPUESTA DE VALOR</label>
                                    <textarea  class="form-control"  id="emp_propuesta" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="emp_ruc">OBJETIVOS ESTRATEGICOS</label>
                                    <textarea  class="form-control"  id="emp_objetivo" rows="4"></textarea>
                                    
                                </div>
                                
                            </div>
                            <div class="row d-flex">
                            <button type="button" class="btn btn-primary ml-auto" onclick="guardar();">Editar</button>
                            </div>
                        </div>
                    </div>
              <section class="content-header">
                <h1>REGISTRO DE FODA</h1>
                </section>
                <section class="content">
                    <div class="card">
                        <div class="card-header">
                            <h3>ELEMENTOS Y ESTRATEGIAS FODA</h3>
                        </div>
                        <div class="card-body">
                            <div class="container justify-content-center">
                                <div class="row mb-5">
                                    <div class="col">
                                    <select class="browser-default custom-select" id="eleFoda">
                                        <option selected>ELEMENTOS FODA</option>
                                        <option value="F">Fortalezas</option>
                                        <option value="O">Oportunidades</option>
                                        <option value="D">Debilidades</option>
                                        <option value="A">Amenazas</option>
                                    </select>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-outline-success" data-ruc="<?php echo $this->emp_ruc?>" onclick="mostrarElemento(this);">Ver/Registrar</button>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col">
                                    <select class="browser-default custom-select" id="estFoda">
                                        <option selected>ESTRATEGIAS FODA</option>
                                        <option value="FO">FO</option>
                                        <option value="FA">FA</option>
                                        <option value="DO">DO</option>
                                        <option value="DA">DA</option>
                                    </select>
                                    </div>
                                    <div class="col">
                                    <button class="btn btn-outline-success" data-ruc="<?php echo $this->emp_ruc?>" onclick="mostrarEstrategia(this);">Ver/Registrar</button>
                                    </div>
                                    
                                    
                                </div>
                            
                            </div>
                            
                        </div>
                    </div>
                    
                    </div>
                </section>
              
                
            </div>
        </div>
        
        
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modalEditElemento" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <label for="" id="tituloOp"></label>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col">
                            <input type="text" class="form-control" id="desc_elemento"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success" onclick="guardarEdit()">Guardar</button>
                    <button type="button" class="btn btn-outline-success" data-dismiss="modal">Close</button>
                </div>
                
            </div>
            
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modalElemento" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <label for="" id="tituloElemento">Valor</label>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-outline-success" onclick="editarElemento(this,1)"  >Insertar</button>
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
    
            
    <script src="<?php echo constant('URL');?>public/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo constant('URL');?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo constant('URL');?>public/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo constant('URL');?>public/dist/js/demo.js"></script>
    <script>
     // Material Select Initialization
    
  // para cada checkbox "chequeado"
  

  
    let ruc_global=<?php echo $this->emp_ruc?>;
    let ele_foda;
    let ele_estrategia;
    let id_EditElemento;
    let edicion=0;
    function mostrarElemento(button){
        const ruc= button.dataset.ruc;
        ruc_global=ruc;
        ele_foda = document.getElementById('eleFoda').value;
        var url="http://localhost:82/AppEmpresas/reg_foda/getElemento/"+ruc_global+"/"+ele_foda;
        httpRequest(url,function(){
             var array=JSON.parse(this.responseText);
             $("#tableElemento tbody").empty();
             for(let item of array){
                
                var tablaRef = $("#tableElemento tbody");
                var tr = '<tr>';
                tr = tr + '<td>' + item.ELE_ID + '</td> ';
                tr = tr + '<td>' + item.ELE_DESC + '</td> ';
                tr = tr +`<td><button type="button" data-id="${item.ELE_ID}" class="btn btn-outline-success" onclick="editarElemento(this,0)">Editar</button></td>`
                tr = tr +`<td><button type="button"  class="btn btn-outline-danger">Eliminar</button></td>`
                
                tr = tr + '</tr>';
                
                tablaRef.append(tr);
             }
             $(document).ready(function () {
                        $('#modalElemento').modal({
                            backdrop: 'static',
                            keyboard: false
                        })
                        $("#modalElemento").modal('show');
                        
            });
            
             
        });
    }
    
    function mostrarEstrategia(button){
        ele_estrategia = document.getElementById('estFoda').value;
        const ruc= button.dataset.ruc;
        ruc_global=ruc;
        let izq="";
        let der="";
        switch (ele_estrategia) {
            case "FA":
                izq="F";
                der="A";
                break;
            case "FO":
                izq="F";
                der="O";
                break;
            case "DO":
                izq="D";
                der="O";
                break;
            case "DA":
                izq="D";
                der="A";
                break;    
            default:
                break;
        }
        getElementobyEstrategia("tableEstrategiaiz",izq);
        getElementobyEstrategia("tableEstrategiader",der);
        getEstrategia();
        
    }
    function getEstrategia(){
        var url="http://localhost:82/AppEmpresas/reg_foda/getEstrategia/"+ruc_global+"/"+ele_estrategia;
        httpRequest(url,function(){
             var array=JSON.parse(this.responseText);
             
             $("#tableElementoEstrategia tbody").empty();
             for(let item of array){
                
                var tablaRef = $("#tableElementoEstrategia tbody");
                var tr = '<tr>';
                tr = tr + '<td>' + item.EST_ID + '</td> ';
                tr = tr + '<td>' + item.EST_DESC + '</td> ';
                tr = tr +`<td><button type="button" data-id="${item.ELE_ID}" class="btn btn-outline-success" onclick="editarElemento(this,0)">Editar</button></td>`
                tr = tr +`<td><button type="button"  class="btn btn-outline-danger">Eliminar</button></td>`
                
                tr = tr + '</tr>';
                
                tablaRef.append(tr);
             }
             $(document).ready(function () {
                        $('#modalEditEstrategia').modal({
                            backdrop: 'static',
                            keyboard: false
                        })
                        $("#modalEditEstrategia").modal('show');
                        
            });
            
             
        });
    }  
    function editarElemento(button,num){
        if(num=="0"){
            document.getElementById('tituloOp').innerHTML="Editar Elemento";
            id_EditElemento= button.dataset.id;
            
            $("#modalEditElemento").modal('show');
            edicion=1;
        }
        else{
            document.getElementById('tituloOp').innerHTML="Insertar Elemento";
            $("#modalEditElemento").modal('show');
            edicion=0;
        }
        
        
    }
    function guardarEdit(num){
        if(edicion==1){
            $("#modalEditElemento").modal('hide');
            var desc=document.getElementById('desc_elemento').value;
            var url="http://localhost:82/AppEmpresas/reg_foda/editElemento/"+ruc_global+"/"+id_EditElemento+"/"+desc;
            httpRequest(url,function(){
             console.log(this.responseText);
             getElemento()
        });
        }else{
            var url="http://localhost:82/AppEmpresas/reg_foda/insertElemento";
            let fm= new FormData();
            var desc=document.getElementById('desc_elemento').value;
            var rowCount = $('#tableElemento tr').length;
            ele_id=ele_foda+rowCount;
            console.log(ele_id);
            fm.append("emp_ruc",ruc_global);
            fm.append("ele_desc",desc);
            fm.append("ele_id",ele_id);
            fm.append("ele_tipo",ele_foda);
            $("#modalEditElemento").modal('hide');
            httpRequest_POST(url,fm,function(){
                console.log(this.responseText);
                getElemento();
            })
        }
        
    }
    function guardarEstSi(){
        var result = [];
        var i = 0;
        var est_id="";
        var est_desc= document.getElementById('desc_est').value;
        $("input[type=checkbox]:checked").each(function(){
    
    // buscamos el td más cercano en el DOM hacia "arriba"
    // luego encontramos los td adyacentes a este
    $(this).closest('td').siblings().each(function(){

      // obtenemos el texto del td
      if(i==0 || i%2==0){
        est_id+=$(this).text();
      } 
      result[i] = $(this).text();
      ++i;
        
    });
  });
  var url="http://localhost:82/AppEmpresas/reg_foda/insertEstrategia";
            let fm= new FormData();
            var desc=document.getElementById('desc_elemento').value;
            var rowCount = $('#tableElemento tr').length;
            ele_id=ele_foda+rowCount;
            
            fm.append("emp_ruc",ruc_global);
            fm.append("est_desc",est_desc);
            fm.append("est_id",est_id);
            fm.append("est_tipo",ele_estrategia);
            $("#modalEditElemento").modal('hide');
            httpRequest_POST(url,fm,function(){
                console.log(this.responseText);
                
                getEstrategia();
            })
    }
    function guardarEstr(){
        $("#modalEditEstrategia2").modal('show');
         
    }
    function getElementobyEstrategia(tabla,ele){
        
        var str="#"+tabla+" tbody";
        var url="http://localhost:82/AppEmpresas/reg_foda/getElemento/"+ruc_global+"/"+ele;
        httpRequest(url,function(){
             var array=JSON.parse(this.responseText);
             console.log(array);
             $(str).empty();
             for(let item of array){
                
                var tablaRef = $(str);
                var tr = '<tr>';
                tr = tr + '<td>' + item.ELE_ID + '</td> ';
                tr = tr + '<td>' + item.ELE_DESC + '</td> ';
                tr = tr +`<td><input type="checkbox" class="form-check-input" id="exampleCheck1"></td>`
               
                tr = tr + '</tr>';
                
                tablaRef.append(tr);
             }
             

        });
    }
    function getElemento(){
        
        
        var url="http://localhost:82/AppEmpresas/reg_foda/getElemento/"+ruc_global+"/"+ele_foda;
        httpRequest(url,function(){
             var array=JSON.parse(this.responseText);
             $("#tableElemento tbody").empty();
             for(let item of array){
                
                var tablaRef = $("#tableElemento tbody");
                var tr = '<tr>';
                tr = tr + '<td>' + item.ELE_ID + '</td> ';
                tr = tr + '<td>' + item.ELE_DESC + '</td> ';
                tr = tr +`<td><button type="button" data-id="${item.ELE_ID}" class="btn btn-outline-success" onclick="editarElemento(this)">Editar</button></td>`
                tr = tr +`<td><button type="button" class="btn btn-outline-danger">Eliminar</button></td>`
                tr = tr + '</tr>';
                
                tablaRef.append(tr);
             }
             $("#modalElemento").modal('show');

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
    function httpRequest_POST(url,fr,callback){
    
    const http = new XMLHttpRequest();
    http.open("POST",url);
    http.send(fr);
    http.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            callback.apply(http);
        }
    }
    }
    getInformacionInst();
    function getInformacionInst(){
        var url="http://localhost:82/AppEmpresas/emp_list/getInformacionInst/"+ruc_global;
        httpRequest(url,function(){
             var array=JSON.parse(this.responseText);
             console.log(array);
            document.getElementById('emp_mision').value=array.emp_mision;
            document.getElementById('emp_vision').value=array.emp_vision;
            document.getElementById('emp_factor').value=array.emp_factor;
            document.getElementById('emp_propuesta').value=array.emp_propuesta;
            document.getElementById('emp_objetivo').value=array.emp_objetivo;

        });
    }
    </script>
</body>
</html>