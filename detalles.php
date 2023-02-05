<?php
include 'config/sesion_carrito.php';

require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if($id == '' || $token == ''){
    echo 'Error al procesar la petición';
    exit();
}else{
    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

    if($token == $token_tmp){ 

        $sql = $con->prepare("SELECT count(id) FROM productos WHERE id=? AND activo=1 LIMIT 1");
        $sql->execute([$id]);
        if($sql->fetchColumn() > 0){
            $sql = $con->prepare("SELECT nombre, descripcion, precio, descuento FROM productos WHERE id=? AND activo=1");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $nombre = $row['nombre'];
            $descripcion = $row['descripcion'];
            $precio = $row['precio'];
            $descuento = $row['descuento'];
            $precio_desc = $precio - (($precio * $descuento)) / 100;
            $dir_images = 'images/productos/' . $id . "/";

            $rutaImg = $dir_images . 'memoriacorsair.png';

            if(!file_exists($rutaImg)){
                $rutaImg = 'images/no-photo.png';
            }
            $imagenes = array();
            if (file_exists($dir_images)){
                $dir = dir($dir_images);

                while(($archivo = $dir->read()) != false ){
                    if($archivo != 'memoriacorsair.png' && (strpos($archivo, 'png') || strpos($archivo, 'jpg') )){
                        $imagenes[] = $dir_images . $archivo;
                    }
                }
                $dir->close();
        }
    }

    }else{
        echo 'Error al procesar la petición';
        exit();
    }
}

$sql = $con->prepare("SELECT id, nombre, precio FROM productos WHERE activo=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);


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
                <div class="col-md-6 order-md-1">

                    <div id="carouselImages" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo $rutaImg; ?>" class="d-block w-100">
                            </div>
                            <?php foreach($imagenes as $img){ ?>
                            <div class="carousel-item ">
                                <img src="<?php echo $img; ?>" class="d-block w-100">

                            </div>
                            <?php } ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselImages"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>



                </div>
                <div class="col-md-6 order-md-2">
                    <h2><?php echo $nombre ?></h2>

                    <?php if($descuento > 0){ ?>
                    <p><del><?php echo MONEDA . number_format($precio, 2, '.', ','); ?></del></p>
                    <h2>
                        <?php echo MONEDA . number_format($precio_desc, 2, '.', ','); ?>
                        <small class="text-success"><?php echo $descuento; ?>% descuento </small>

                    </h2>
                    <?php } else { ?>
                    <h2><?php echo MONEDA . number_format($precio, 2, '.', ','); ?></h2>
                    <?php } ?>


                    <p class="lead">
                        <?php echo $descripcion; ?>
                    </p>
                    <div class="g-grid gap-3 col-10 mx-auto">
                        
                        <button class="btn btn-outline-primary" type="button"
                            onclick="addProducto(<?php echo $id; ?>, '<?php echo $token_tmp; ?>')">
                            <?php echo $palabras['carrito']['agregarcarrito']; ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

<?php
include_once './Views/Layouts/footer.php';
?>

<script>
    function addProducto(id, token){
        let url = 'clases/carrito.php';
        let formData = new FormData()
        formData.append('id', id)
        formData.append('token', token)

        fetch(url, {
            method: 'POST',
            body: formData,
            mode: 'cors'
        }).then(response => response.json())
        .then(data =>{
            if(data.ok){
                let elemento = document.getElementById("num_cart")
                elemento.innerHTML = data.numero
            }
        })
    }
</script>

<script src="chatbot.js"></script>


