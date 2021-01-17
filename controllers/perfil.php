<?php
class Perfil extends SessionController{
     function __construct(){
         parent::__construct();
         
         
     }
     function render(){
        $this->view->render('perfil/index');
     }
 }

?>