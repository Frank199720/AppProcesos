<?php

class Emp_registerModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function insert($datos){
        try{
            $query= $this->db->connect()->prepare('INSERT INTO bd_empresa.empresa values (:emp_ruc,:emp_razon_social,:emp_direccion,:emp_mision,:emp_vision,:emp_objetivo,:emp_factor,:emp_propuesta,:emp_estado,:emp_condicion)');
            $query->execute(['emp_ruc'=>$datos['emp_ruc'],'emp_razon_social'=>$datos['emp_razon_social'],'emp_direccion'=>$datos['emp_direccion'],'emp_mision'=>$datos['emp_mision'],'emp_vision'=>$datos['emp_vision'],'emp_objetivo'=>$datos['emp_objetivo'],
            'emp_factor'=>$datos['emp_factor'],'emp_propuesta'=>$datos['emp_propuesta'],'emp_estado'=>$datos['emp_estado'],'emp_condicion'=>$datos['emp_condicion']]);
            return "that's ok";
        }catch(PDOException $e){
            
            return "01";
        }
        
    }
    public function UpdateEmpresa($datos){
        try{
          $query= $this->db->connect()->prepare('UPDATE empresa set emp_mision = :mision, emp_vision =:vision,emp_objetivo = :objetivo, emp_factor = :factor, emp_propuesta = :propuesta where emp_ruc = :ruc');
          $query->execute(['mision'=>$datos['mision'],
          'vision'=>$datos['vision'],
          'objetivo'=>$datos['objetivo'],
          'factor'=>$datos['factor'],
          'propuesta'=>$datos['propuesta'],
          'ruc'=>$datos['ruc']]);
          
              return true;
            }catch(PDOException $e){
              return "01";
            }
        }
             
}

?>
