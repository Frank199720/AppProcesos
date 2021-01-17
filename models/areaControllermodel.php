<?php

class AreaControllerModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function saveArea($name, $descripcion)
    {

        try {

            require_once 'classes/session.php';
            $se = new Session();
            $ruc = $se->getCurrentRUC();
            $query = $this->db->connect()->prepare("INSERT INTO bd_proceso.area values (null,'$name','$descripcion','$ruc')");
            $query->execute();
            return "01";
        } catch (PDOException $e) {

            return "00";
        }
    }
    public function updateArea($name, $descripcion,$areacod)
    {

        try {

            require_once 'classes/session.php';
            $se = new Session();
            $ruc = $se->getCurrentRUC();
            $query = $this->db->connect()->prepare("UPDATE bd_proceso.area set ARE_DESC='$descripcion',ARE_NOMBRE='$name' where ARE_COD='$areacod' and EMP_RUC='$ruc'");
            $query->execute();
            return "01";
        } catch (PDOException $e) {

            return "00";
        }
    }
    public function deleteArea($cod){
        try {

            require_once 'classes/session.php';
            $se = new Session();
            $ruc = $se->getCurrentRUC();
            $query = $this->db->connect()->prepare("DELETE FROM bd_proceso.area  where ARE_COD='$cod' and EMP_RUC='$ruc'");
            $query->execute();
            return "01";
        } catch (PDOException $e) {

            return $e->getMessage();
        }
    }
    public function getAreas(){
        try{
            require_once 'classes/session.php';
            $se = new Session();
            $ruc = $se->getCurrentRUC();
            $query= $this->db->connect()->prepare("SELECT * from bd_proceso.area where EMP_RUC='$ruc'");
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
            return $query->fetchAll();
            
        }catch(Exception $e){
            die("Error: ".$e);
            return  "00";
        }
        
    }
    
}
