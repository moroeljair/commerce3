<?php 


    include_once '../Models/UsuarioDistrito.php';
    include_once '../Util/Config/config.php';
    include_once '../Models/Historial.php';
    include_once 'idiomas.php';
    
    $historial = new Historial();
    $usuario_distrito = new UsuarioDistrito();
   
     if($_POST['funcion']=='crear_direccion'){
        try{
            $id_distrito = $_POST['id_distrito'];
            $direccion = $_POST['direccion'];
            $referencia = $_POST['referencia'];
            $id_usuario = $_SESSION['id'];
            $usuario_distrito->crear_direccion($id_usuario,$id_distrito,$direccion,$referencia);
            $descripcion="Ha creado una nueva dirección ".$direccion;
            $historial->crear_historial($descripcion,2,1,$id_usuario);
            echo json_encode(array('ok',$palabras['crear_direccion']['ok']));
        }catch(Exception $e){
            //echo $e-> getMessage();
            echo json_encode(array('fail',$palabras['crear_direccion']['fail']));
        }
     }



     if($_POST['funcion']=='llenar_direcciones'){
        try{
            $id_usuario = $_SESSION['id'];
            $usuario_distrito->llenar_direcciones($id_usuario);
            $json=array();
            foreach ($usuario_distrito->objetos as $objeto) {
                $json[]=array(
                    'id'=>openssl_encrypt($objeto->id,CODE,KEY),
                    'direccion'=>$objeto->direccion,
                    'referencia'=>$objeto->referencia,
                    'ciudad'=>$objeto->nciudad,
                );
            }
            $json_string = json_encode($json);
            echo $json_string;
        }catch(Exception $e){
            echo $e-> getMessage();
            //echo json_encode(array('fail',$palabras['crear_direccion']['fail']));
        }
     }


     if($_POST['funcion']=='eliminar_direccion'){
        try{
            $id_direccion = openssl_decrypt($_POST['id'],CODE,KEY);
            if(is_numeric($id_direccion)){
                $usuario_distrito->recuperar_direccion($id_direccion);
                $direccion_borrada = $usuario_distrito->objetos[0]->direccion;
                
                $usuario_distrito->eliminar_direccion($id_direccion);
                
                $descripcion="Ha eliminado la dirección: ".$direccion_borrada;
                $historial->crear_historial($descripcion,3,1,$_SESSION['id']);
                echo 'success';
            }else{
                echo 'error';
            }
            
        }catch(Exception $e){
            //echo $e-> getMessage();
            echo $e;
        }
     }