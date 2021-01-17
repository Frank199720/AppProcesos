<?php

class Reg_fodaModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function getElemento($ruc , $elemento){
        try{
            $query= $this->db->connect()->prepare("SELECT * from bd_empresa.elemento_foda where emp_ruc='$ruc' and ele_tipo='$elemento'");
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
            return $query->fetchAll();
            
        }catch(Exception $e){
            die("Error: ".$e);
            return  "nel";
        }
        
    }
    public function editElemento($ruc, $elemento ,$descripcion){
        try{
            $query= $this->db->connect()->prepare("UPDATE bd_empresa.elemento_foda set ele_desc='$descripcion' where emp_ruc='$ruc' and ele_id='$elemento'");
            $query->execute();
            return "that's ok";
            
        }catch(Exception $e){
            die("Error: ".$e);
            return  "nel";
        }    
    }
    public function inserElemento($emp_ruc,$ele_desc,$ele_id,$ele_tipo){
        try{
            $query= $this->db->connect()->prepare("INSERT INTO bd_empresa.elemento_foda values('$emp_ruc','$ele_id','$ele_desc','$ele_tipo')");
            $query->execute();
            
            return "that's ok";
            
        }catch(Exception $e){
            die("Error: ".$e);
            return  "nel";
        }    
    }
    public function insertDetalle($emp_ruc,$est_id){
        $k=0;
        $prueba="";
        for($i=0;$i<strlen($est_id)/2;$i++){
            
            $prueba=substr($est_id,$k,2);
            $k=$k+2;
            $query= $this->db->connect()->prepare("INSERT INTO bd_empresa.detalle_estrategia values('$emp_ruc','$est_id','$prueba')");
            $query->execute();
        }
        return "that's ok";
    }
    public function insertEstrategia($emp_ruc,$est_desc,$est_id,$est_tipo){
    
    
        try{
            $query= $this->db->connect()->prepare("INSERT INTO bd_empresa.estrategia_foda values('$emp_ruc','$est_id','$est_desc','$est_tipo')");
            $query->execute();
            
            return $this->insertDetalle($emp_ruc,$est_id);;
            
        }catch(Exception $e){
            
            return  "01";
        }    
    }
    public function getEstrategia($ruc , $elemento){
        try{
            $query= $this->db->connect()->prepare("SELECT * from bd_empresa.estrategia_foda where emp_ruc='$ruc' and est_tipo='$elemento'");
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
            return $query->fetchAll();
            
        }catch(Exception $e){
            die("Error: ".$e);
            return  "nel";
        }
    }
    public function deleteDetalleEstrategia($ruc,$est_id){
        try{
            $query= $this->db->connect()->prepare("DELETE from bd_empresa.detalle_estrategia where est_id='$est_id' and emp_ruc='$ruc'");
            
            $query->execute();
            return true;
            
        }catch(Exception $e){
            die("Error: ".$e);
            return  "nel";
        }
    }
    public function deleteDetalleEstrategiabyElemento($ruc,$ele_id){
        try{
            $query= $this->db->connect()->prepare("DELETE from bd_empresa.detalle_estrategia where emp_ruc='$ruc' and est_id like '%".$ele_id."%'");
            
            $query->execute();
            return true;
            
        }catch(Exception $e){
            die("Error: ".$e);
            return  "nel";
        }
    }
    public function deleteEstrategia_only($ruc,$ele_id){
        try{
            $query= $this->db->connect()->prepare("DELETE from bd_empresa.estrategia_foda where emp_ruc='$ruc' and est_id ='$ele_id'");
            
            $query->execute();
            return true;
            
        }catch(Exception $e){
            die("Error: ".$e);
            return  "nel";
        }
    }
    public function deleteEstrategia($ruc,$ele_id){
        try{
            $query= $this->db->connect()->prepare("DELETE from bd_empresa.estrategia_foda where emp_ruc='$ruc' and est_id like '%".$ele_id."%'");
            
            $query->execute();
            return true;
            
        }catch(Exception $e){
            die("Error: ".$e);
            return  "nel";
        }
    }
    public function deleteElemento($ruc,$ele_id){
        try{
            $query= $this->db->connect()->prepare("DELETE from bd_empresa.elemento_foda where emp_ruc='$ruc' and ele_id='$ele_id'");
            
            $query->execute();
            return $query->fetchAll();
            
        }catch(Exception $e){
            die("Error: ".$e);
            return  "nel";
        }
    }
}
?>