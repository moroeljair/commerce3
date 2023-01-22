<?php
  include_once './Layouts/header_views.php';
?>


<!-- Modal -->
<div class="modal fade" id="terminos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?php echo $palabras['terminos']['titulo'];?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><?php echo $palabras['terminos']['item1'];?></p>
        <p><?php echo $palabras['terminos']['item2'];?></p>
        <p><?php echo $palabras['terminos']['item3'];?></p>
        <p><?php echo $palabras['terminos']['item4'];?></p>
        <p><?php echo $palabras['terminos']['item5'];?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">
            <?php echo $palabras['terminos']['cerrar'];?>
        </button>
      </div>
    </div>
  </div>
</div>


<body class="hold-transition login-page">
<div class="mt-5">
  <div class="login-logo">
    <img src="../Util/Img/logo.png" alt="" class="profile-user-img img-fluid img-circle">
    <a href="../index.php"><b><?php echo $palabras['header']['titulo'];?></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><?php echo $palabras['header']['registrarse'];?></p>
        <!-- form start -->
            <form id="form-register">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="username"><?php echo $palabras['registro']['username'];?></label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="<?php echo $palabras['registro']['placeholder_username'];?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="pass"><?php echo $palabras['registro']['pass'];?></label>
                            <input type="password" name="pass" class="form-control" id="pass" placeholder="<?php echo $palabras['registro']['placeholder_pass'];?>">
                        </div>
                        <div class="form-group">
                            <label for="nombres"><?php echo $palabras['registro']['nombres'];?></label>
                            <input type="text" name="nombres" class="form-control" id="nombres" placeholder="<?php echo $palabras['registro']['placeholder_nombres'];?>">
                        </div>
                        <div class="form-group">
                            <label for="dni"><?php echo $palabras['registro']['dni'];?></label>
                            <input type="text" name="dni" class="form-control" id="dni" placeholder="<?php echo $palabras['registro']['placeholder_dni'];?>">
                        </div>
                        <div class="form-group">
                            <label for="telefono"><?php echo $palabras['registro']['telefono'];?></label>
                            <input type="text" name="telefono" class="form-control" id="telefono" placeholder="<?php echo $palabras['registro']['placeholder_telefono'];?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="pass_repeat"><?php echo $palabras['registro']['pass2'];?></label>
                            <input type="password" name="pass_repeat" class="form-control" id="pass_repeat" placeholder="<?php echo $palabras['registro']['placeholder_pass2'];?>">
                        </div>
                        <div class="form-group">
                            <label for="apellidos"><?php echo $palabras['registro']['apellidos'];?></label>
                            <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="<?php echo $palabras['registro']['placeholder_apellidos'];?>">
                        </div>
                        <div class="form-group">
                            <label for="email"><?php echo $palabras['registro']['email'];?></label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="<?php echo $palabras['registro']['placeholder_email'];?>">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="terms" class="custom-control-input" id="terms">
                                <label class="custom-control-label" for="terms"><?php echo $palabras['registro']['terminos1'];?> 
                                    <a href="#" data-toggle="modal" data-target="#terminos"><?php echo $palabras['registro']['terminos2'];?></a>.</label>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-lg bg-gradient-primary"><?php echo $palabras['registro']['registrarme'];?></button>
                </div>
              </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<?php
  include_once './Layouts/footer_views.php';
?>

<script src="register.js"></script>