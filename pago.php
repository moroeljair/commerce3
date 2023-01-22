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
        <div class="container">

            <div class="row">
                <div class="col-6">
                    <h4><?php echo $palabras['carrito']['formapago']; ?></h4>
                    <div id="paypal-button-container"></div>

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
            </div>
        </div>
    </main>

    

    <script src="./Views/idiomas/idiomas.js"></script>
    <!-- jQuery -->
    <script src="Util/Js/jquery.min.js"></script>
    <script src="pago.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

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


 

    
</body>

</html>