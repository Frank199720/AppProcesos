<?php
    include_once 'models/empresa.php';
    class Emp_listModel extends Model{
        
        public function __construct(){
            parent::__construct();

        }
        public function getEmpresa(){
            $items= [];
            try{
                $query = $this->db->connect()->query("SELECT emp_ruc,emp_razon_social, emp_direccion, emp_estado, emp_condicion FROM empresa");
                while($row=$query->fetch()){
                    $item = new Empresa();
                    $item->emp_ruc=$row['emp_ruc'];
                    $item->emp_razon_social=$row['emp_razon_social'];
                    $item->emp_direccion=$row['emp_direccion'];
                    $item->emp_estado=$row['emp_estado'];
                    $item->emp_condicion=$row['emp_condicion'];
                    array_push($items,$item);
                }
                return $items;
            }catch(PDOException $e){
                return[];
            }
        }
        function getEmpresaByRuc($ruc){
            try{
                $query= $this->db->connect()->prepare("SELECT * FROM empresa where emp_ruc=".$ruc);
                $query->setFetchMode(PDO::FETCH_ASSOC);
                $query->execute();
                
                return $query->fetch(PDO::FETCH_ASSOC);
                
            }catch(Exception $e){
                die("Error: ".$e);
                return  "nel";
            }
        }
        function getInformacionInst($ruc){
            try{
                $query= $this->db->connect()->prepare("SELECT emp_mision,emp_vision,emp_objetivo,emp_propuesta,emp_factor FROM empresa where emp_ruc=".$ruc);
                $query->setFetchMode(PDO::FETCH_ASSOC);
                $query->execute();
                
                return $query->fetch(PDO::FETCH_ASSOC);
                
            }catch(Exception $e){
                die("Error: ".$e);
                return  "nel";
            }
        }
}

?>