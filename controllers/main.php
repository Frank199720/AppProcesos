<?php
class Main extends SessionController{
     function __construct(){
         parent::__construct();
         
         
     }
     function render(){
        $this->view->render('main/index');
     }
 }

?>