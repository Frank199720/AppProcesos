
<?php

class Emp_own extends SessionController{

    private $user;
    private $ruc;
    function __construct(){
        parent::__construct();
        
        $this->user = $this->getUserSessionData();
        $this->ruc = $this->getRucbyUser();
        
    }
    function getRucbyUser(){
        $user = new UserModel();
        return $user->rucByUser($this->user->getUsu_id());
    }
    function getUserSessionData(){
        $id = $this->session->getCurrentUser();
        $this->user = new UserModel();
        $this->user->get($id);
        //error_log("sessionController::getUserSessionData(): " . $this->user->getUsername());
        return $this->user;
    }
    function render(){
        $var= $this->user;
        $this->view->user_info=$var;
        $this->view->render('emp_own/index');
        // $this->view->render('usu_register/index', [
        //     "user" => $this->user
        // ]);
    }
    function updateEmpresa(){
        $rol=$this->user->getRole();
        $emp_mision = $_POST['emp_mision'];
        $emp_vision = $_POST['emp_vision'];
        $emp_factor = $_POST['emp_factor'];
        $emp_propuesta = $_POST['emp_propuesta'];
        $emp_objetivo = $_POST['emp_objetivo'];
        require_once 'models/emp_registermodel.php';
        $usuarioModel = new Emp_registerModel();
        if($rol=='002'){
            echo $usuarioModel->UpdateEmpresa(['mision'=>$emp_mision,
        'vision'=>$emp_vision,
        'objetivo'=>$emp_objetivo,
        'factor'=>$emp_factor,
        'propuesta'=>$emp_propuesta,
        'ruc'=>$this->ruc]);
        }else{
            echo '02';
        }
        
       }
    function getEmpresabyRuc(){
        require_once 'models/emp_listmodel.php';
        $empresa = new Emp_listModel();
        $ruc = $this->ruc;
        echo json_encode($empresa->getEmpresaByRuc($this->ruc));
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