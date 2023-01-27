<?php
  include_once './Layouts/header_views.php';
?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="../Util/Img/logo.png" alt="" class="profile-user-img img-fluid img-circle">
    <a href="../index.php"><b><?php echo $palabras['header']['titulo'];?></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><?php echo $palabras['login']['iniciar_sesion'];?></p>

      <form id="form-login">
        <div class="input-group mb-3">
          <input id="user" type="text" class="form-control" placeholder="<?php echo $palabras['login']['n_usuario']; ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="pass" type="password" class="form-control" placeholder="<?php echo $palabras['login']['clave']; ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        

        <div class="social-auth-links text-center mb-3">
          <button type="submit" href="#" class="btn btn-block btn-primary">
            <?php echo $palabras['login']['i_sesion']; ?>
          </button>  
        </div>

      </form>

     
      <!-- /.social-auth-links 

      <p class="mb-1">
        <a href="">
          <?php echo $palabras['login']['olvido_c']; ?>
        </a>
      </p>

      -->
      
      <p class="mb-0">
        <a href="./register.php" class="text-center">
          <?php echo $palabras['login']['registrarse']; ?>
        </a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<?php
  include_once './Layouts/footer_views.php';
?>

<script src="login.js"></script>