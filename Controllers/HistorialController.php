<?php 


    include_once '../Models/Historial.php';
    include_once 'idiomas.php';
    
    $historial = new Historial();

    if($_POST['funcion']=='llenar_historial'){
        $id_usuario = $_SESSION['id'];
        $historial->llenar_historial($id_usuario);
        //solamente obtener historial de los ultimos tres dias que ha habido cambios
        $bandera='';
        $cont=0;
        $fechas=array();
        foreach ($historial->objetos as $objeto){
            $fecha_hora = date_create($objeto->fecha);
            $hora = $fecha_hora->format('H:i:s'); //que nos de el formato Horas:minutos:segundos
            $fecha = date_format($fecha_hora,'d-m-Y');
            //para cambiar cada vez que cambia una fecha 
            if($fecha!=$bandera){
                $cont++;
                $bandera=$fecha;
            }
            if($cont==4){
                break;
            }else{
                $fechas[$cont-1][]=array(
                    'id'=>$objeto->id,
                    'descripcion'=>$objeto->descripcion,
                    'fecha'=>$fecha,
                    'hora'=>$hora,
                    'tipo_historial'=>$objeto->tipo_historial,
                    'th_icono'=>$objeto->th_icono,
                    'modulo'=>$objeto->modulo,
                    'm_icono'=>$objeto->m_icono
                );
            }
        }

        $json_string=json_encode($fechas);
        echo $json_string;

    }

    if($_POST['funcion']=='llenar_historial_compras'){
        $id_usuario = $_SESSION['id'];
        $historial->llenar_historial_compras($id_usuario);
        //solamente obtener historial de los ultimos tres dias que ha habido cambios
        $bandera='';
        $cont=0;
        $fechas=array();
        foreach ($historial->objetos as $objeto){
            $fecha_hora = date_create($objeto->fecha_compra);
            $hora = $fecha_hora->format('H:i:s'); //que nos de el formato Horas:minutos:segundos
            $fecha = date_format($fecha_hora,'d-m-Y');
            //para cambiar cada vez que cambia una fecha 
            if($fecha_hora!=$bandera){
                $cont++;
                $bandera=$fecha_hora;
            }
            if($cont==4){
                break;
            }else{
                $fechas[$cont-1][]=array(
                    'fecha'=>$fecha,
                    'hora'=>$hora,
                    'id'=>$objeto->id,
                    'total'=>$objeto->total,
                    'nombre'=>$objeto->nombre,
                    'cantidad'=>$objeto->cantidad,
                    'precio'=>$objeto->precio
                );
            }
        }

        $json_string=json_encode($fechas);
        echo $json_string;

    }

    if($_POST['funcion']=='crear_error_tabla'){
        try{
            $campo = $_POST['campo'];
            $error = $_POST['error'];
            $tabla=$_POST['tabla'];
    
            $historial->crear_error_tabla($campo,$error,$tabla);
            echo 'success';    
        }catch(Exception $e){
            return $e->getMessage();
        }
     }

     if($_POST['funcion']=='registro_error_sesion'){
        try{
            $tabla = $_POST['tabla'];
            $campo = $_POST['campo'];
            $error = $_POST['error'];
    
            $historial->registro_error_sesion($campo,$error,$tabla);
            echo 'success';    
        }catch(Exception $e){
            return $e->getMessage();
        }
     }

     if($_POST['funcion']=='registrar_pagina'){
        try{
            $pagina = $_POST['pagina'];
            $historial->registrar_pagina($pagina);
            echo 'success';    
        }catch(Exception $e){
            return $e->getMessage();
        }
     }

     if($_POST['funcion']=='registrar_inicio_transaccion'){
        try{
            $historial->registrar_inicio_transaccion();
            echo 'success';    
        }catch(Exception $e){
            return $e->getMessage();
        }
     }

     if($_POST['funcion']=='registrar_fin_transaccion'){
        try{
            $historial->registrar_fin_transaccion();
            echo 'success';    
        }catch(Exception $e){
            return $e->getMessage();
        }
     }





?>