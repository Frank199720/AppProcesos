<?php
 class Emp_List extends SessionController{
    function __construct(){
        parent::__construct();
        $this->view->empresas=[];
        
    }
    function render(){
        $empresas=$this->model->getEmpresa();
        $this->view->empresas=$empresas;
        $this->view->render('emp_lista/index');
    }
    function getInformacionInst($param=null){
         $ruc=$param[0];
         
         echo json_encode($this->model->getInformacionInst($ruc));
    }
 }


?>