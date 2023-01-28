<?php 
include '../config/sesion_carrito.php';

require '../config/config.php';
require '../config/database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id, nombre, precio FROM productos WHERE activo=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

    //session_start();
    if( isset( $_SESSION['lang'] ) ){
        $idioma = $_SESSION['lang'];
    }else{
        $idioma = 'es';
    }

#definir palabras en un idioma que vera en los documentos ini
$archivo = file_exists( "./idiomas/$idioma.ini" ) ? "./idiomas/$idioma.ini" : "./idiomas/es.ini";
//$palabras = parse_ini_file( $archivo ); //cuando no se tiene separado por secciones
$palabras = parse_ini_file( $archivo, true );
//var_dump($palabras);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../Util/Css/select2.min.css">
  <link rel="stylesheet" href="../Util/Css/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../Util/Css/adminlte.min.css">
  <link rel="stylesheet" href="../Util/Css/sweetalert2.min.css">

  
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->

<div class="wrapper">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item dropdown">
                <a href="../index.php" onclick="regitrar_click_enlace2('index.php')" class="navbar-brand">
                    <span class="brand-text font-weight-light"><?php echo $palabras['header']['titulo']; ?></span>
                </a>
      </li>

    
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" onclick="regitrar_click_enlace2('checkout.php')" href="../checkout.php">
          <i class="fas fa-shopping-cart"></i>
          <span id="num_cart" class="badge badge-danger navbar-badge"><?php echo $num_cart; ?></span>
        </a>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item" id="nav_register">
        <a class="nav-link"  href="./Views/register.php" role="button">
          <i class="fas fa-user-plus"></i> <?php echo $palabras['header']['registrarse']; ?> 
        </a>
      </li>
      <li class="nav-item" id="nav_login">
        <a class="nav-link" href="./Views/login.php" role="button">
          <i class="far fa-user"></i> <?php echo $palabras['header']['iniciar_sesion']; ?> 
        </a>
      </li>
      <li class="nav-item dropdown" id="nav_usuario">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img id="avatar_nav" src="user_default.png" alt="" width="30" height="30" class="img-fluid img-circle">
          <span id="usuario_nav"><?php echo $palabras['header']['usuario_logueado']; ?> </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" onclick="regitrar_click_enlace2('miperfil.php')" href="./mi_perfil.php"><i class="fas fa-user-cog"></i> 
          <?php echo $palabras['header']['mi_perfil']; ?></a>
          <a class="dropdown-item" onclick="regitrar_click_enlace2('ayuda.php')" href="<?php echo $palabras['url']['ayuda_url2']; ?>" target="_blank"><i class="fa-solid fa-question"></i> 
          <?php echo $palabras['adicional']['ayuda']; ?></a>
          <a class="dropdown-item" onclick="regitrar_click_enlace2('logout.php')" href="../Controllers/logout.php"><i class="fas fa-user-times"></i>
          <?php echo $palabras['header']['cerrar_sesion']; ?></a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa-solid fa-language"></i>
          <span><?php echo $palabras['header']['idioma']; ?> </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item"  onclick="regitrar_click_enlace2('espanol.php'); cambiarIdioma('es')">
          <?php echo $palabras['idiomas']['es']; ?></a>
          <a class="dropdown-item"  onclick="regitrar_click_enlace2('arabe.php'); cambiarIdioma('ar')"> 
          <?php echo $palabras['idiomas']['ar']; ?></a>
          <a class="dropdown-item"  onclick="regitrar_click_enlace2('ingles.php'); cambiarIdioma('en')"> 
          <?php echo $palabras['idiomas']['en']; ?></a>
        </div>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

</div>

