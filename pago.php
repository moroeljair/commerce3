<?php
include 'config/sesion_carrito.php';

require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;
$lista_carrito = array();

if($productos != null){
    foreach($productos as $clave => $cantidad){
        $sql = $con->prepare("SELECT id, nombre, precio, descuento, $cantidad as cantidad FROM productos WHERE id=? AND activo=1 LIMIT 1");
        $sql->execute([$clave]);
        $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);

    }
} else {
    header("Location: index.php");
    exit;
}

if( isset( $_SESSION['lang'] ) ){
    $idioma = $_SESSION['lang'];
}else{
    $idioma = 'es';
}

#definir palabras en un idioma que vera en los documentos ini
$archivo = file_exists( "./Views/idiomas/$idioma.ini" ) ? "./Views/idiomas/$idioma.ini" : "./Views/idiomas/es.ini";
//$palabras = parse_ini_file( $archivo ); //cuando no se tiene separado por secciones
$palabras = parse_ini_file( $archivo, true );
//var_dump($palabras);

include './Views/Layouts/header.php';


?>



<body>

    
    <main>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">                    <h4><?php echo $palabras['carrito']['formapago']; ?></h4>
                    <!--
                    <div id="paypal-button-container"></div>
                    -->


                    <form id="form-pago">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="tarjeta" name="tarjeta" placeholder="<?php echo $palabras['carrito']['n_tarjeta'];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="fechaCaducidad" name="fechaCaducidad" placeholder="<?php echo $palabras['carrito']['f_caducida'];?>">    
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="csc" name="csc" placeholder="<?php echo $palabras['carrito']['cvv'];?>">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                <label class="form-label"><?php echo $palabras['carrito']['dir'];?></label>   
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="<?php echo $palabras['carrito']['nombre'];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="<?php echo $palabras['carrito']['apellido'];?>">    
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="calle" name="calle" placeholder="<?php echo $palabras['carrito']['calle'];?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="<?php echo $palabras['carrito']['direccion'];?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="postal" name="postal" placeholder="<?php echo $palabras['carrito']['cod_pos'];?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="cedula" name="cedula" placeholder="<?php echo $palabras['carrito']['cedula'];?>">
                                </div>
                            </div>
                        </div>
            
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                        <button id="boton_registro" type="submit" class="btn btn-lg bg-gradient-primary"><?php echo $palabras['carrito']['pagar_ahora'];?></button>
                        </div>
              </form>





                </div>
            <div class="col-6">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th><?php echo $palabras['carrito']['producto']; ?></th>                        
                            <th><?php echo $palabras['carrito']['subtotal']; ?></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($lista_carrito == null){
                            echo '<tr><td colspan="5" class="text-center"><b>'.$palabras['carrito']['listavacia'].'</b></td></tr>';
                        } else {
                            $total = 0;
                            foreach($lista_carrito as $producto){
                                $_id = $producto['id'];
                                $nombre = $producto['nombre'];
                                $precio = $producto['precio'];
                                $descuento = $producto['descuento'];
                                $cantidad = $producto['cantidad'];
                                $precio_desc = $precio - (($precio * $descuento)/100);
                                $subtotal = $cantidad * $precio_desc;
                                $total += $subtotal;
                        ?>

                        <tr>
                            <td> <?php echo $nombre ?> </td>                           
                            
                            <td>
                                <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]">
                                    <?php echo MONEDA . number_format($subtotal,2, '.',','); ?></div>
                            </td>                            
                        </tr>
                        <?php } ?>

                        <tr>
                            
                            <td colspan="2">
                                <p class="h3 text-end" id="total"><?php echo MONEDA . number_format($total,2 ,'.',','); ?></p>
                            </td>
                        </tr>

                    </tbody>
                    <?php } ?>
                </table>
            </div>            
        </div>

    </section>
    </main>

    

    <script src="./Views/idiomas/idiomas.js"></script>
    <!-- jQuery -->
    <script src="./Util/Js/jquery.min.js"></script>
    <script src="./Util/Js/registrar_paginas.js"></script>
    

    <?php
include_once './Views/Layouts/footer.php';
?>

<script src="./Util/Js/toastr.min.js"></script>

<!-- jquery-validation -->
<script src="./Util/Js/jquery.validate.min.js"></script>
<script src="./Util/Js/jquery-validation/additional-methods.min.js"></script>

<script src="./Util/Js/sweetalert2.min.js"></script>

<script src="./Util/Js/registro_error_pago.js"></script>
<script src="./pago.js"></script>

<!--
    <script src="https://www.paypal.com/sdk/js?client-id=AbQh_HMf6yH_qMW9Roprb_rj8DRYeMZgP-dZy3THNmXdHJjPu4vmJ7f_8TqcI8Ysj0L0dx5wc2aeJtjq&currency=USD"></script>

    
    <script>
        paypal.Buttons({
            style:{
                color: 'blue',
                shape: 'pill',
                label: 'pay'
            },
            createOrder: function(data, actions){               
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: <?php echo $total;?>
                        }
                    }]
                });
            },
            onApprove: function(data, actions){                
                actions.order.capture().then(function (detalles){
                    console.log(detalles)
                    let URL = 'clases/captura.php'

                    return fetch(URL, {
                        method: 'post',
                        headers: {
                            'content-type': 'application/json'
                        },
                        body: JSON.stringify({
                            detalles: detalles
                        })
                    }).then(function(response){
                        window.location.href = "completado.php?key=" + detalles['id'];
                    })
                });
            },
            onCancel: function(data){
                alert("Pago cancelado");
                console.log(data);
            }
        }).render('#paypal-button-container');
    </script>

-->

 

    
</body>

</html>