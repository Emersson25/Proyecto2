<?php

require_once '../models/Carrera.php';

if(isset($_POST['operacion'])){
    $carrera = new Carrera();
    if ($_POST['operacion']== 'listar'){
        $data = $carrera->listarCarrreras($_POST['idescuela']);
        if($data){
            echo "<option value= '' selected>Selecione</option>";
            foreach($data as $registro){
                echo "<option value='{$registro['idcarrera']}'>{$registro['carrera']}</option>";

            }
        }else{
            echo "<option value= ''>No encontramos registros</option>";
        }
    }
}