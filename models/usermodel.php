<?php
//no puse el IModel

class UserModel extends Model 
{

    private $USU_COD;
    private $usu_login;
    private $USU_PASSWORD;
    private $USU_ROL;
    private $USU_RUC;
    // private $budget;
    // private $photo;
    // private $name;

    public function __construct()
    {
        parent::__construct();

        $this->USU_COD = '';
        $this->usu_login = '';
        $this->USU_PASSWORD = '';
        $this->USU_ROL = '';
        // $this->photo = '';
        // $this->name = '';
    }
    function updatePassword($new, $iduser)
    {
        try {
            $hash = password_hash($new, PASSWORD_DEFAULT, ['cost' => 10]);
            $query = $this->db->connect()->prepare('UPDATE usuario SET USU_PASSWORD = :val WHERE USU_COD = :id');
            $query->execute(['val' => $hash, 'id' => $iduser]);

            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function comparePasswords($current, $userid) //uhmmm , ya entendí
    {
        try {
            $query = $this->db->connect()->prepare('SELECT USU_COD, USU_PASSWORD FROM usuario WHERE USU_COD = :id');
            $query->execute(['id' => $userid]);

            if ($row = $query->fetch(PDO::FETCH_ASSOC)) return password_verify($current, $row['USU_PASSWORD']);

            
        } catch (PDOException $e) {
            return false;
        }
    }
    public function rucByUser($user){
        try {
            $query = $this->db->connect()->prepare('SELECT emp_ruc FROM persona WHERE per_id = :id');
            $query->execute(['id' => $user]);

            if ($row = $query->fetch(PDO::FETCH_ASSOC)) return $row['emp_ruc'];

            
        } catch (PDOException $e) {
            return false;
        }
    }
    public function empByUser($user){
        try {
            $query = $this->db->connect()->prepare('SELECT emp_razon_social FROM empresa WHERE emp_ruc = :id');
            $query->execute(['id' => $user]);

            if ($row = $query->fetch(PDO::FETCH_ASSOC)) return $row['emp_razon_social'];

            
        } catch (PDOException $e) {
            return false;
        }
    }
    public function updatePersona($correo,$direccion,$iduser){
        try {
            
            $query = $this->db->connect()->prepare('UPDATE usuario SET emp_direccion = :val,per_email =:val2 WHERE USU_COD = :id');
            $query->execute(['val' => $direccion,
            'val2' => $correo,  
            'id' => $iduser]);

            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function newPersona($id,$nombre,$apellido_paterno,$apellido_materno,$email,$ruc,$direccion){
        try {
            $query = $this->prepare('INSERT INTO persona VALUES(:per_id, :per_nombre,:per_apellido,:per_apellido_m,:emp_ruc,:emp_direccion,:email)');
            $query->execute([
                'per_id'  => $id,
                'per_nombre'  => $nombre,
                'per_apellido'      => $apellido_paterno,
                'per_apellido_m'    => $apellido_materno,
                'emp_ruc' => $ruc,
                'emp_direccion'=>$direccion,
                'email'=>$email
            ]);
            return true;
        } catch (PDOException $e) {
            
            return $e->getMessage();
        }
    }
    
    public function getPersonById($dni){
        try{
            $query= $this->db->connect()->prepare("SELECT * FROM persona where per_id=".$dni);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
            
            return $query->fetch(PDO::FETCH_ASSOC);
            
        }catch(Exception $e){
            die("Error: ".$e);
            return  "nel";
        }
    }
    public function getRol(){
        try {
            $query = $this->prepare('SELECT * FROM rol');
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
            return $query->fetchAll();
            return true;
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }
    public function save()
    {
        try {
            $query = $this->prepare('INSERT INTO usuario (USU_COD, usu_login, USU_PASSWORD, USU_ROL) VALUES(:USU_COD, :usu_login, :USU_PASSWORD, :USU_ROL)');
            $query->execute([
                'USU_COD'  => $this->USU_COD,
                'usu_login'  => $this->usu_login,
                'USU_PASSWORD'      => $this->USU_PASSWORD,
                'USU_ROL'    => $this->USU_ROL
                
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e;
            return $e->getMessage();
        }
    }

    

    /**
     *  Gets an item
     */
    public function get($id)
    {
        try {
            $query = $this->prepare('SELECT * FROM USUARIO WHERE USU_COD= :id');
            $query->execute(['id' => $id]);
            $user = $query->fetch(PDO::FETCH_ASSOC);

            $this->USU_COD = $user['USU_COD'];
            //$this->usu_login = $user['USU_LOGIN'];
            $this->USU_PASSWORD = $user['USU_PASSWORD'];
            $this->USU_ROL = $user['USU_ROL'];
            $this->USU_RUC = $user['EMP_RUC'];
            return $this;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $query = $this->prepare('DELETE FROM usuario WHERE id = :id');
            $query->execute(['id' => $id]);
            return true;
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }

    public function update() // no va
    {
        try {
            $query = $this->prepare('UPDATE usuario SET usu_login = :usu_login, USU_PASSWORD = :USU_PASSWORD, USU_ROL = :USU_ROL WHERE USU_COD = :USU_COD');
            $query->execute([
                'USU_COD'        => $this->USU_COD,
                'usu_login' => $this->usu_login,
                'USU_PASSWORD' => $this->USU_PASSWORD,
                'USU_ROL' => $this->USU_ROL
                
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }

    public function exists($userlogin)
    {
        try {
            $query = $this->prepare('SELECT USU_COD FROM usuario WHERE USU_COD = :username');
            $query->execute(['username' => $userlogin]);

            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }   
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }

    public function from($array)
    {
        $this->USU_COD = $array['USU_COD'];
        $this->USU_RUC=$array['EMP_RUC'];
        $this->usu_login = $array['USU_LOGIN'];
        $this->USU_PASSWORD = $array['USU_PASSWORD'];
        $this->USU_ROL = $array['USU_ROL'];
        
    }

    private function getHashedPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
    }
    
    public function setLogin($login)
    {
        $this->usu_login = $login;
    }
    //FIXME: validar si se requiere el parametro de hash
    public function setPassword($password, $hash=true)
    {
        if ($hash) {
            $this->USU_PASSWORD = $this->getHashedPassword($password);
        } else {
            $this->USU_PASSWORD = $password;
        }
    }
    public function setId($id)
    {
        $this->USU_COD = $id;
    }
    public function setRole($role)
    {
        $this->USU_ROL = $role;
    }
   
    
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getusu_cod()
    {
        return $this->USU_COD;
    }
    public function getLogin()
    {
        return $this->usu_login;
    }
    public function getPassword()
    {
        return $this->USU_PASSWORD;
    }
    public function getRole()
    {
        return $this->USU_ROL;
    }
    public function getRuc(){
        return $this->USU_RUC;
    }
  
}
