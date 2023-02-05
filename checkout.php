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
        $sql = $con->prepare("SELECT id, nombre, precio, descuento, $cantidad as cantidad FROM productos WHERE id=? AND activo=1");
        $sql->execute([$clave]);
        $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);

    }
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
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th><?php echo $palabras['carrito']['producto']; ?></th>
                            <th><?php echo $palabras['carrito']['precio']; ?></th>
                            <th><?php echo $palabras['carrito']['cantidad']; ?></th>
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
                            <td> <?php echo MONEDA . number_format($precio_desc,2,'.',',')  ?> </td>
                            <td>
                                <input type="number" min="1" max="10" step="1" value="<?php echo $cantidad ?>" size="5"
                                    id="cantidad_<?php echo $_id; ?>"
                                    onchange="actualizaCantidad(this.value, <?php echo $_id; ?>)">
                            </td>
                            <td>
                                <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]">
                                    <?php echo MONEDA . number_format($subtotal,2, '.',','); ?></div>
                            </td>
                            <td><a href="" id="eliminar" class="btn btn-warning btn-sm" data-bs-id="<?php echo $_id ?>"
                                    data-bs-toggle="modal" data-bs-target="#eliminaModal"><?php echo $palabras['carrito']['eliminar']; ?></a></td>
                        </tr>
                        <?php } ?>

                        <tr>
                            <td colspan="3"> </td>
                            <td colspan="2">
                                <p class="h3" id="total"><?php echo MONEDA . number_format($total,2 ,'.',','); ?></p>
                            </td>
                        </tr>

                    </tbody>
                    <?php } ?>
                </table>
            </div>

            <?php if($lista_carrito != null){ ?>
            <div class="row">
                <div class="col-md-5 offset-md-7 d-grid gap2">
                    <a href="pago.php" onclick="regitrar_click_enlace('pago.php'); registrar_inicio_transaccion()" class="btn btn-primary btn-lg"><?php echo $palabras['carrito']['realizarpago']; ?></a>
                </div>
            </div>
            <?php } ?>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminaModalLabel"><?php echo $palabras['carrito']['alerta']; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo $palabras['carrito']['desea']; ?>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo $palabras['carrito']['cerrar']; ?></button>
                    <button id="btn-elimina" type="button" class="btn btn-danger" onclick="eliminar()"><?php echo $palabras['carrito']['eliminar']; ?></button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

<?php
include_once './Views/Layouts/footer.php';
?>

    <script>

    let eliminaModal = document.getElementById('eliminaModal')
    eliminaModal.addEventListener('show.bs.modal', function(event){
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')
        let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina')
        buttonElimina.value = id
    })


        function actualizaCantidad(cantidad, id) {
            let url = 'clases/actualizar_carrito.php'
            let formData = new FormData()
            formData.append('action', 'agregar')
            formData.append('id', id)
            formData.append('cantidad', cantidad)

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                }).then(response => response.json())
                .then(data => {
                    if (data.ok) {

                        let divsubtotal = document.getElementById('subtotal_' + id)
                        divsubtotal.innerHTML = data.sub

                        let total = 0.00
                        let list = document.getElementsByName('subtotal[]')

                        for (let i = 0; i < list.length; i++) {
                            total += parseFloat(list[i].innerHTML.replace(/[$,]/g, ''))

                        }
                        total = new Intl.NumberFormat('en-US', {
                            minimumFractionDigits: 2
                        }).format(total)
                        document.getElementById('total').innerHTML = '<?php echo MONEDA; ?>' + total
                    }
                })
        }


        function eliminar() {
            let botonElimina = document.getElementById('btn-elimina');
            let id = botonElimina.value;

            let url = 'clases/actualizar_carrito.php';
            let formData = new FormData();
            formData.append('action', 'eliminar');
            formData.append('id', id);
            

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                }).then(response => response.json())
                .then(data => {
                    if (data.ok) {

                        location.reload();
                    }
                })
        }
    </script>


<script src="chatbot.js"></script>
