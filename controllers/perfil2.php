<?php
class Perfil extends Controller{
     function __construct(){
         parent::__construct();
         
         
     }
     function render(){
        $this->view->render('perfil/index');
     }
 }

?>