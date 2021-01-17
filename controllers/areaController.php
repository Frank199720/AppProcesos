<?php
class AreaController extends SessionController{
     function __construct(){
         parent::__construct();
         
         
     }
     function render(){
        $this->view->render('area/index');
     }
     function saveArea(){
         
         $area_descripcion=$this->getPost('namearea');
         $area_nombre=$this->getPost('descarea');
         echo $this->model->saveArea($area_descripcion,$area_nombre);

     }
     function updateArea(){
        $area_descripcion=$this->getPost('namearea');
        $area_nombre=$this->getPost('descarea');
        $area_cod=$this->getPost('codArea');
        echo $this->model->updateArea($area_descripcion,$area_nombre,$area_cod);
     }
     function deleteArea(){
        $area_cod=$this->getPost('codArea');
        echo $this->model->deleteArea($area_cod);
     }
     function getArea(){
        
        echo json_encode($this->model->getAreas());
     }
 }

?>