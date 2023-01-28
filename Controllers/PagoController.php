<?php

include '../config/sesion_carrito.php';

require '../config/config.php';
require '../config/database.php';

include_once '../Models/Historial.php';    
$historial = new Historial();

try{

    $db = new Database();
    $con = $db->conectar();
    $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;
    $row_prod = array();

    if($productos != null){
        $total = 0;
        foreach($productos as $clave => $cantidad){
            $sql = $con->prepare("SELECT id, nombre, precio, descuento FROM productos WHERE id=? AND activo=1");
            $sql->execute([$clave]);
            $row_prod = $sql->fetch(PDO::FETCH_ASSOC);

            $precio = $row_prod['precio'];
            $descuento = $row_prod['descuento'];                
            $precio_desc = $precio - (($precio * $descuento)/100);        
            $subtotal = $cantidad * $precio_desc;
            $total += $subtotal;

            $tarjeta = $_POST["tarjeta"];
            $fechaCaducidad = $_POST["fechaCaducidad"];
            $csc = $_POST["csc"];    
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $calle = $_POST["calle"];
            $direccion = $_POST["direccion"];
            $postal = $_POST["postal"];
            $cedula = $_POST["cedula"];  
            //$total = $_POST["total"];
        
            
        }
        $sql = $con->prepare("INSERT INTO compra (tarjeta, fechaCaducidad, csc, status, nombre, apellido, calle, direccion, postal, cedula, id_cliente, total) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
        $sql->execute([$tarjeta, $fechaCaducidad, $csc, 'COMPLETED', $nombre, $apellido, $calle, $direccion, $postal, $cedula, '877', $total]);
        $id = $con->lastInsertId();


    

        if($id > 0){

            $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

            if($productos != null){
            
                foreach($productos as $clave => $cantidad){
                    $sql = $con->prepare("SELECT id, nombre, precio, descuento FROM productos WHERE id=? AND activo=1");
                    $sql->execute([$clave]);
                    $row_prod = $sql->fetch(PDO::FETCH_ASSOC);

                    $precio = $row_prod['precio'];
                    $descuento = $row_prod['descuento'];                
                    $precio_desc = $precio - (($precio * $descuento)/100);

                    $sql_insert = $con->prepare("INSERT INTO detalle_compra (id_compra, id_producto, nombre, precio, cantidad) VALUES (?,?,?,?,?)");
                    $sql_insert->execute([$id, $clave, $row_prod['nombre'], $precio_desc, $cantidad]);
            
                }
                
            }
            unset($_SESSION['carrito']);
            $historial->registrar_fin_transaccion();
        }
        echo 'success';
    }else{
        echo 'no';
    }
}catch(Exception $e){
    echo $e-> getMessage();
    return "CARGA FALLIDA";
}



?>