<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>

    <!-- Font Awesome -->
  <link rel="stylesheet" href="Util/Css/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Util/Css/adminlte.min.css"> 

<!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
-->


    <link href="css/estilos.css" rel="stylesheet">
</head>


<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item dropdown">
                <a href="index.php" class="navbar-brand">
                    <span class="brand-text font-weight-light"><?php echo $palabras['header']['titulo']; ?></span>
                </a>
      </li>

    
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="./checkout.php">
          <i class="fas fa-shopping-cart"></i>
          <span id="num_cart" class="badge badge-danger navbar-badge"><?php echo $num_cart; ?></span>
        </a>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item" id="nav_register">
        <a class="nav-link" href="./Views/register.php" role="button">
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
          <a class="dropdown-item" href="./Views/mi_perfil.php"><i class="fas fa-user-cog"></i> 
          <?php echo $palabras['header']['mi_perfil']; ?></a>
          <a class="dropdown-item" href="#"><i class="fas fa-shopping-basket"></i> 
          <?php echo $palabras['header']['mis_pedidos']; ?></a>
          <a class="dropdown-item" href="Controllers/logout.php"><i class="fas fa-user-times"></i>
          <?php echo $palabras['header']['cerrar_sesion']; ?></a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa-solid fa-language"></i>
          <span><?php echo $palabras['header']['idioma']; ?> </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item"  onclick="cambiarIdioma2('es')">
          <?php echo $palabras['idiomas']['es']; ?></a>
          <a class="dropdown-item"  onclick="cambiarIdioma2('ar')"> 
          <?php echo $palabras['idiomas']['ar']; ?></a>
          <a class="dropdown-item"  onclick="cambiarIdioma2('en')"> 
          <?php echo $palabras['idiomas']['en']; ?></a>
        </div>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

</div>

