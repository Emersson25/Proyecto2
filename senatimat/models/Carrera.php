<?php

require_once 'Conexion.php';

// CARERRAS

class Carrera extends Conexion{
    private $accesoBD;
    public function __CONSTRUCT(){
        $this->accesoBD = parent::getConexion();

    }
    public function listarCarrreras($idescuela = 0){
        try{
            $consulta = $this->accesoBD->prepare("CALL spu_carreras_listar(?)");
            $consulta->execute(array($idescuela));
            return $consulta->fetchAll(PDO::FECH_ASSOC);


            
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}