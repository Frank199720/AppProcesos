<?php
 class Emp_Register extends SessionController{
    function __construct(){
        parent::__construct();
        
        
    }
    function render(){
        $this->view->render('emp_register/index');
    }
    function registrarEmpresa(){
        $emp_ruc = $_POST['emp_ruc'];
        $emp_razon_social = $_POST['emp_razon_social'];
        $emp_estado = $_POST['emp_estado'];
        $emp_condicion = $_POST['emp_condicion'];
        $emp_direccion = $_POST['emp_direccion'];
        $emp_mision = $_POST['emp_mision'];
        $emp_vision = $_POST['emp_vision'];
        $emp_factor = $_POST['emp_factor'];
        $emp_propuesta = $_POST['emp_propuesta'];
        $emp_objetivo = $_POST['emp_objetivo'];

        echo $this->model->insert(['emp_ruc'=>$emp_ruc,'emp_razon_social'=>$emp_razon_social,
        'emp_direccion'=>$emp_direccion,'emp_mision'=>$emp_mision,'emp_vision'=>$emp_vision,'emp_objetivo'=>$emp_objetivo,
        'emp_factor'=>$emp_factor,'emp_propuesta'=>$emp_propuesta,'emp_estado'=>$emp_estado,'emp_condicion'=>$emp_condicion]);
        

    }
 }


?>