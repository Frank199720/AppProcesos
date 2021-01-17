
<?php

class Foda_own extends SessionController{

    private $user;

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
        
        $this->view->emp_ruc=$this->ruc;
        $this->view->rol=$this->user->getRole();
        $this->view->render('foda_own/index');
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
    function newPersona(){
        $id = $this->getPost('per_dni');
        $nombre = $this->getPost('per_nombre');
        $apellido_paterno = $this->getPost('per_paterno');
        $apellido_materno = $this->getPost('per_materno');
        $email = $this->getPost('per_email');
        $direccion = $this->getPost('per_direccion');
        $username = $this->getPost('usu_login');
        
        $password = $this->getPost('usu_password');
        $rol=$this->getPost('eleRol');
        $ruc=$this->getPost('emp_ruc');
        $user = new UserModel();
        
        if($user->exists($id)){
            echo json_encode('exists');
        }else{
            $user->newPersona($id,$nombre,$apellido_paterno,$apellido_materno,$email,$ruc,$direccion);
            echo json_encode($this->newUser($username,$password,$id,$rol));
        }
        
        
    }
    //aqui ingreso user y persona
    function newUser($username,$password,$id,$rol){
        
              
            
            //validate data
            $user = new UserModel();
            $user->setLogin($username);
            $user->setPassword($password);
            $user->setRole($rol);
            $user->setId($id);
            $user->save();
            
            return $user->save();
                //$this->errorAtSignup('Error al registrar el usuario. Elige un nombre de usuario diferente');
               
                //return;
            
                //$this->view->render('login/index');
                
            
        
    }
    

    function updatePassword(){
        

        $current = $this->getPost('current_password');
        $new     = $this->getPost('new_password');
        $user=new UserModel();

        if($current === $new){
            
            echo "pe";
        }

        //validar que el current es el mismo que el guardado
        $newHash = $user->comparePasswords($current, $this->user->getUsu_id());
        if($newHash){
            //si lo es actualizar con el nuevo
            
            $this->user->setPassword($new, true);
            if($this->user->update()){
                echo "ok";
            }else{
                //error
                echo 'error';
            }
        }else{
           
            echo "pi";
        }
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