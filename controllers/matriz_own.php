
<?php

class Matriz_own extends SessionController{

    private $user;

    function __construct(){
        parent::__construct();
        
        $this->user = $this->getUserSessionData();
        $this->ruc = $this->getRucbyUser();
        //$this->emp=$this->empByUser();
    }
    function getRucbyUser(){
        $user = new UserModel();
        return $user->rucByUser($this->user->getUsu_id());
    }
    function empByUser(){
        $user = new UserModel();
        return $user->empByUser($this->ruc);
    }
    function getUserSessionData(){
        $id = $this->session->getCurrentUser();
        
        $this->user = new UserModel();
        $this->user->get($id);
        //error_log("sessionController::getUserSessionData(): " . $this->user->getUsername());
        return $this->user;
    }
    function render(){
        $this->view->nameEmpresa=$this->empByUser();
        $this->view->emp_ruc=$this->ruc;
        $this->view->render('matriz_own/index');
        // $this->view->render('usu_register/index', [
        //     "user" => $this->user
        // ]);
    }
    function getPersonaById(){
        $user = new UserModel();
        echo json_encode($user->getPersonById($this->user->getUsu_id()));
    }
    function getRol(){
        $user = new UserModel();
        echo json_encode($user->getRol());
    }
    

    // function updatePhoto(){
    //     if(!isset($_FILES['photo'])){
           
    //         return;
    //     }
    //     $photo = $_FILES['photo'];

    //     $target_dir = "public/img/photos/";
    //     $extarr = explode('.',$photo["name"]);
    //     $filename = $extarr[sizeof($extarr)-2];
    //     $ext = $extarr[sizeof($extarr)-1];
    //     $hash = md5(Date('Ymdgi') . $filename) . '.' . $ext;
    //     $target_file = $target_dir . $hash;
    //     $uploadOk = 1;
    //     $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
    //     $check = getimagesize($photo["tmp_name"]);
    //     if($check !== false) {
    //         //echo "File is an image - " . $check["mime"] . ".";
    //         $uploadOk = 1;
    //     } else {
    //         //echo "File is not an image.";
    //         $uploadOk = 0;
    //     }

    //     if ($uploadOk == 0) {
    //         //echo "Sorry, your file was not uploaded.";
            
    //     // if everything is ok, try to upload file
    //     } else {
    //         if (move_uploaded_file($photo["tmp_name"], $target_file)) {
    //             $this->model->updatePhoto($hash, $this->user->getUsu_id());
                
    //         } else {
                
    //         }
    //     }
        
    // }
}

?>