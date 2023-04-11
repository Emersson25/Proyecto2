<?php

require_once '../models/Sede.php';

if (isset($_POST['operacion'])){

    $sede = new Sede();

    if ($_POST['operacion']=='listar'){
        $data = $sede->listarSedes();
        // enviar los datos a la vista
        // si contiene informacion, si no esa vacion.....
        if($data){
            foreach($data as $registro){
                echo "< value='{$registro['idsede']}'>{$registro['sede']}</option>"
            }
        }else{
            echo "<option value=''>No encontramos datos</option>";
            foreach($data as $registro){
                echo "<option value='{$registro['idsede']}'>{$registro['sede']}</option>";

            }
        }else{
            echo"<option value=''>No encontramos datos</option>"
        }

    }
}