<?php

require_once 'Conexion.php';

// ESCUELAS

class Escuela extends Conexion{
    private $accesoBD;
    public function __CONSTRUCT(){
        $this->accesoBD = parent::getConexion();

    }
    public function listarEscuelas(){
        try{
            $consulta = $this->accesoBD->prepare("CALL spu_escuelas_listar()");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FECH_ASSOC);

            
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}