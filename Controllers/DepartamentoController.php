<?php 


    include_once '../Models/Departamento.php';
    include_once 'idiomas.php';
    
    $departamento = new Departamento();
   
     if($_POST['funcion']=='llenar_departamentos'){
        try{
            $departamento->llenar_departamentos();
            foreach ($departamento->objetos as $objeto) {
                $json[]=array(
                    'id'=>$objeto->id,
                    'nombre'=>$objeto->nombre
                );
            }
            $json_string = json_encode($json);
            echo $json_string;
        }catch(Exception $e){
            echo $e-> getMessage();
            return "CARGA FALLIDA";
        }
     }

     if($_POST['funcion']=='llenar_provincia'){
        try{
            $departamento->llenar_provincia();
            foreach ($departamento->provincias as $objeto) {
                $json[]=array(
                    'id'=>$objeto->id,
                    'nombre'=>$objeto->nombre
                );
            }
            $json_string = json_encode($json);
            echo $json_string;
        }catch(Exception $e){
            echo $e-> getMessage();
            return "CARGA FALLIDA";
        }
     }

     if($_POST['funcion']=='llenar_ciudad'){
        try{
            $departamento->llenar_ciudad();
            foreach ($departamento->ciudades as $objeto) {
                $json[]=array(
                    'id'=>$objeto->id,
                    'nombre'=>$objeto->nombre
                );
            }
            $json_string = json_encode($json);
            echo $json_string;
        }catch(Exception $e){
            echo $e-> getMessage();
            return "CARGA FALLIDA";
        }
     }

    
?>