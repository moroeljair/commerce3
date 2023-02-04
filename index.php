<?php
include 'config/sesion_carrito.php';

require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id, nombre, precio FROM productos WHERE activo=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

//session_destroy();

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
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach($resultado as $row) { ?>

               
                <div class="col">
                    <div class="card shadow-sm">
                        <?php 
                          $id = $row['id'];
                          $imagen = "images/productos/" . $id . "/memoriacorsair.png";  

                          if(!file_exists($imagen)){
                            $imagen = "images/no-photo.png";
                          }
                        ?>


                        <img class="d-block w-100" src="<?php echo $imagen; ?> ">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
                            <p class="card-text">$ <?php echo number_format($row['precio'], 2, '.', ','); ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a onclick="regitrar_click_enlace('detalles.php')" href="detalles.php?id=<?php echo $row['id'];?>&token=<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>" class="btn btn-primary"><?php echo $palabras['carrito']['detalles']; ?></a>
                                </div>
                                <button class="btn btn-outline-success" type="button"
                            onclick="addProducto(<?php echo $row['id']; ?>, '<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>')"><?php echo $palabras['carrito']['agregar']; ?></button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

        <button class="jaja">HOLI</button>

    </main>


    <!--
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
                        -->



<!--CHATBOT-->
<script type="text/javascript">

  (function(d, t) {
      var v = d.createElement(t), s = d.getElementsByTagName(t)[0];
      v.onload = function() {
        
        window.voiceflow.chat.load({
          verify: { projectID: '63d73e40c18c28000631c8f5' },
          url: 'https://general-runtime.voiceflow.com',
          versionID: 'production'
        });
      }

      
    

      v.src = "https://cdn.voiceflow.com/widget/bundle.mjs"; 
      v.type = "text/javascript"; 
      s.parentNode.insertBefore(v, s);
      
      

  })(document, 'script');
  
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








