<?php
    include_once 'models/persona.php';
    class Usu_listaModel extends Model{
        
        public function __construct(){
            parent::__construct();

        }
        public function getUsuarios(){
            $items= [];
            try{
                $query = $this->db->connect()->query("select p.PER_ID,p.PER_NOMBRE,p.PER_APELLIDO,p.PER_APELLIDO_M,p.EMP_DIRECCION,u.USU_LOGIN,e.EMP_RAZON_SOCIAL from persona p inner join usuario u on p.PER_ID=u.USU_ID inner join empresa e on p.EMP_RUC=e.EMP_RUC");
               
                while($row=$query->fetch()){
                    $item = new Persona();
                    $item->dni=$row['PER_ID'];
                    $item->nombre=$row['PER_NOMBRE'];
                    $item->apellido_paterno=$row['PER_APELLIDO'];
                    $item->apellido_materno=$row['PER_APELLIDO_M'];
                    $item->login=$row['USU_LOGIN'];
                    $item->direccion=$row['EMP_DIRECCION'];
                    $item->empresa=$row['EMP_RAZON_SOCIAL'];
                    array_push($items,$item);
                }
                
                return $items;
            }catch(PDOException $e){
                return[];
            }
        }
        
}

?>