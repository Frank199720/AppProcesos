<?php
class Usu_lista extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->persona=[];
        
    }
    function render(){
        $persona=$this->model->getUsuarios();
        $this->view->persona=$persona;
        $this->view->render('usu_lista/index');
    }
    function getInformacionInst($param=null){
         $ruc=$param[0];
         
         echo json_encode($this->model->getInformacionInst($ruc));
    }
 }

?>