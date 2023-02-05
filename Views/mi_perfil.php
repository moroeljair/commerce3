<?php
 include_once './Layouts/general/header.php';
?>


<!-- Modal -->
<div class="modal fade" id="modal_contra" role="dialog ">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          <?php echo $palabras['mis_datos']['cambiar_clave'];?>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-contra">
          
          <div class="form-group">
            <label for="pass_old"><?php echo $palabras['mis_datos']['clave_actual'];?></label>
            <input type="password" name="pass_old" class="form-control" id="pass_old" placeholder="<?php echo $palabras['mis_datos']['clave_actual'];?>">
          </div>

          <div class="form-group">
            <label for="pass_new"><?php echo $palabras['mis_datos']['clave_nueva'];?></label>
            <input type="password" name="pass_new" class="form-control" id="pass_new" placeholder="<?php echo $palabras['mis_datos']['clave_nueva'];?>">
          </div>

          <div class="form-group">
            <label for="pass_repeat"><?php echo $palabras['mis_datos']['clave_nueva2'];?></label>
            <input type="password" name="pass_repeat" class="form-control" id="pass_repeat" placeholder="<?php echo $palabras['mis_datos']['clave_nueva2'];?>">
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          <?php echo $palabras['mi_perfil']['cerrar'];?>
        </button>
        <button id="boton_registro_clave" type="submit" class="btn btn-primary">
          <?php echo $palabras['mi_perfil']['guardar'];?>
        </button>
        </form>
      </div>
    </div>
  </div>
</div>






<!-- Modal -->
<div class="modal fade" id="modal_datos" role="dialog ">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          <?php echo $palabras['modal_datos']['editar'];?>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-datos" enctype="multipart/form-data">
          
          <div class="form-group">
            <label for="nombres_mod"><?php echo $palabras['registro']['nombres'];?></label>
            <input type="text" name="nombres_mod" class="form-control" id="nombres_mod" placeholder="<?php echo $palabras['registro']['placeholder_nombres'];?>">
          </div>

          <div class="form-group">
            <label for="apellidos_mod"><?php echo $palabras['registro']['apellidos'];?></label>
            <input type="text" name="apellidos_mod" class="form-control" id="apellidos_mod" placeholder="<?php echo $palabras['registro']['placeholder_apellidos'];?>">
          </div>

          <div class="form-group">
            <label for="dni_mod"><?php echo $palabras['registro']['dni'];?></label>
            <input type="text" name="dni_mod" class="form-control" id="dni_mod" placeholder="<?php echo $palabras['registro']['placeholder_dni'];?>">
          </div>

          <div class="form-group">
            <label for="email_mod"><?php echo $palabras['registro']['email'];?></label>
            <input type="text" name="email_mod" class="form-control" id="email_mod" placeholder="<?php echo $palabras['registro']['placeholder_email'];?>">
          </div>

          <div class="form-group">
            <label for="telefono_mod"><?php echo $palabras['registro']['telefono'];?></label>
            <input type="text" name="telefono_mod" class="form-control" id="telefono_mod" placeholder="<?php echo $palabras['registro']['placeholder_telefono'];?>">
          </div>

          <div class="form-group">
                    <label for="exampleInputFile"><?php echo $palabras['modal_datos']['avatar'];?></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" accept="image/png, image/jpeg" class="custom-file-input" id="avatar_mod" name="avatar_mod">
                        <label class="custom-file-label" for="exampleInputFile"><?php echo $palabras['modal_datos']['seleccione_avatar'];?></label>
                      </div>
                    </div>
            </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          <?php echo $palabras['mi_perfil']['cerrar'];?>
        </button>
        <button id="boton_registro" type="submit" class="btn btn-primary">
          <?php echo $palabras['mi_perfil']['guardar'];?>
        </button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal_direcciones" role="dialog ">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          <?php echo $palabras['mi_perfil']['agregar_direccion'];?>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-direccion">
          <div class="form-group">
            <label for=""><?php echo $palabras['mi_perfil_form']['region'];?></label>
            <select id="departamento" class="form-control" style="width:100%" required></select>
          </div>
          <div class="form-group">
            <label for=""><?php echo $palabras['mi_perfil_form']['provincia'];?></label>
            <select id="provincia" class="form-control" style="width:100%" required></select>
          </div>
          <div class="form-group">
            <label for=""><?php echo $palabras['mi_perfil_form']['ciudad'];?></label>
            <select id="distrito" class="form-control" style="width:100%" required></select>
          </div>
          <div class="form-group">
            <label for=""><?php echo $palabras['mi_perfil_form']['direccion'];?></label>
            <input type="text" id="direccion" class="form-control" placeholder="<?php echo $palabras['mi_perfil_form']['direccion_p'];?>" required>
          </div>
          <div class="form-group">
            <label for=""><?php echo $palabras['mi_perfil_form']['referencia'];?></label>
            <input type="text" id="referencia" class="form-control" placeholder="<?php echo $palabras['mi_perfil_form']['referencia_p'];?>">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          <?php echo $palabras['mi_perfil']['cerrar'];?>
        </button>
        <button type="submit" class="btn btn-primary">
          <?php echo $palabras['mi_perfil']['guardar'];?>
        </button>
        </form>
      </div>
    </div>
  </div>
</div>




<title><?php echo $palabras['title']['mi_perfil'];?></title>


<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">

            <!-- Profile Image -->
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 id="username" class="widget-user-username"></h3>
                <h5 id="tipo_usuario" class="widget-user-desc"></h5>
              </div>
              <div class="widget-user-image">
                <img id="avatar_perfil" class="img-circle elevation-2" style="width:120px;" src="../Util/Img/user_default.png" alt="User Avatar">
              </div>
              <div class="card-footer">
                
              <!--
                <div class="row">
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">3,200</h5>
                        <span class="description-text">SALES</span>
                      </div>
                      
                    </div>
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">13,000</h5>
                        <span class="description-text">FOLLOWERS</span>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header">35</h5>
                        <span class="description-text">PRODUCTS</span>
                      </div>
                    </div>
                 </div>
-->

              </div>
              
            </div>
            <!-- /.widget-user -->
          

            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-light d-flex flex-fill">
                <div class="card-header border-bottom-0">
                    <strong> <?php echo $palabras['mi_perfil']['mis_datos'];?> </strong>
                    <div class="card-tools">
                        <button type="button" class="editar_datos btn btn-tool" data-toggle="modal" data-target="#modal_datos">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body pt-0 mt-3">
                  <div class="row">
                    <div class="col-8">
                      <h2 id="nombres" class="lead"><b></b></h2>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-address-card"></i></span>
                        <?php echo $palabras['mis_datos']['dni'];?>: <span id="dni"></span></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-at"></i></span>
                        <?php echo $palabras['mis_datos']['email'];?>: <span id="email"></span></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> <span id="telefono"></span></li>
                      </ul>
                    </div>
                    <div class="col-4 text-center">
                        <img src="../Util/Img/datos.png" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button class="btn btn-warning btn-block" data-toggle="modal" data-target="#modal_contra"> <?php echo $palabras['mis_datos']['cambiar_clave'];?> </button>
                </div>
              </div>

              <!-- About Me Box 
            <div class="card card-light d-flex flex-fill">
                <div class="card-header border-bottom-0">
                    <strong> <?php echo $palabras['mi_perfil']['mis_direcciones'];?> </strong>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal_direcciones">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div id="direcciones" class="card-body pt-0 mt-3">
                  
                </div>
              </div>
              -->
            
            <!-- About Me Box -->
            


            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">
                    <?php echo $palabras['adicional']['compras'];?>
                  </a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
               
                  

                  
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline 
                    <div id="historiales" class="timeline timeline-inverse">
                    </div>
                    -->

                    <table class="table">
                          <thead>
                              <tr>
                              <th scope="col">#</th>
                              <th scope="col"><?php echo $palabras['carrito']['producto'];?></th>
                              <th scope="col"><?php echo $palabras['carrito']['cantidad'];?></th>
                              <th scope="col"><?php echo $palabras['carrito']['precio'];?></th>
                              </tr>
                          </thead>
                      </table>
                      
                    <div id="historiales_compras" class="timeline timeline-inverse">
                      
                    </div>
                    
                  </div>
                  
                  
                  
                  
                  
                  <!-- /.tab-pane -->

                  
            
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


<?php
 include_once './Layouts/general/footer.php';
?>

<script src="../Util/Js/registro_error_miperfil.js"></script>
<script src="mi_perfil.js"></script>
<script src="mi_perfil_activity.js"></script>
<script src="chatbot.js"></script>

