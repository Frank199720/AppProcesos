<?php
class Reg_foda extends Controller{
     function __construct(){
         parent::__construct();
         
         
     }
     function render(){
        $this->view->render('reg_foda/index');
     }
     function registrar($param=null){
        $this->view->emp_ruc=$param[0];
         $this->view->render('foda/index');
     }
     function getElemento($param=null){
         $ruc=$param[0];
         $elemento=$param[1];
         echo json_encode($this->model->getElemento($ruc,$elemento));
     }
     function insertElemento(){
        $emp_ruc = $_POST['emp_ruc'];
        $ele_desc = $_POST['ele_desc'];
        $ele_id = $_POST['ele_id'];
        $ele_tipo = $_POST['ele_tipo'];
        echo $this->model->inserElemento($emp_ruc,$ele_desc,$ele_id,$ele_tipo);
     }
     function editElemento($param=null){
        $ruc=$param[0];
        $id_elemento=$param[1];
        $edit = $param[2];
        echo $this->model->editElemento($ruc,$id_elemento,$edit);
     }
     function ediEstrategia(){
      $emp_ruc = $_POST['emp_ruc'];
      $est_desc = $_POST['est_desc'];
      $est_id = $_POST['est_id'];
      $est_tipo = $_POST['est_tipo'];
      $id_ant= $_POST['id_ant'];
      $rpta =$this->model->deleteDetalleEstrategia($emp_ruc,$id_ant);
      $rpa2 = $this->model->deleteEstrategia_only($emp_ruc,$id_ant);
      echo $this->model->insertEstrategia($emp_ruc,$est_desc,$est_id,$est_tipo);
     }
     function getEstrategia($param=null){
         $ruc=$param[0];
         $elemento=$param[1];
         echo json_encode($this->model->getEstrategia($ruc,$elemento));
     }
     function insertEstrategia(){
      $emp_ruc = $_POST['emp_ruc'];
      $est_desc = $_POST['est_desc'];
      $est_id = $_POST['est_id'];
      $est_tipo = $_POST['est_tipo'];
      echo $this->model->insertEstrategia($emp_ruc,$est_desc,$est_id,$est_tipo);
   }
      function deleteElemento($param=null){
         $ruc=$param[0];
         $elemento=$param[1];
         
         $this->model->deleteDetalleEstrategiabyElemento($ruc,$elemento);
         $this->model->deleteEstrategia($ruc,$elemento);
         $this->model->deleteElemento($ruc,$elemento);
      }
      function deleteEstrategia($param=null){
         $ruc=$param[0];
         $elemento=$param[1];
         $this->model->deleteDetalleEstrategia($ruc,$elemento);
         $this->model->deleteEstrategia_only($ruc,$elemento);
      }
 }

?>