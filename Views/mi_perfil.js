$(document).ready(function(){

    var funcion;
    bsCustomFileInput.init();
    var palabras;
    cargarPalabras();
    verificar_sesion();
    obtener_datos();

    /*
    llenar_departamentos();
    llenar_provincia();
    llenar_ciudad();
    llenar_direcciones();
    */

    function cargarPalabras(){
        funcion='lenguaje';
        $.ajax({
            type: "POST",
            url: '../Controllers/idiomas.php',
            data: 'funcion='+funcion,
            async: false,
            success: function(response){
                let idioma = response;
                $.getJSON( "./idiomas/"+idioma+".json", function( json )
                {     
                    //cargar palabras del lenguaje   
                    palabras=json;

                    $('#departamento').select2({
                        placeholder: palabras.mi_perfil.departamento_p,
                        language: {
                            noResults: function(){
                                return palabras.mi_perfil.noResults;
                            },
                            searching: function(){
                                return palabras.mi_perfil.searching;
                            }
                        }
                    });
                    
                    $('#provincia').select2({
                        placeholder: palabras.mi_perfil.provincia,
                        language: {
                            noResults: function(){
                                return palabras.mi_perfil.noResults;
                            },
                            searching: function(){
                                return palabras.mi_perfil.searching;
                            }
                        }
                    });

                    $('#distrito').select2({
                        placeholder: palabras.mi_perfil.ciudad,
                        language: {
                            noResults: function(){
                                return palabras.mi_perfil.noResults;
                            },
                            searching: function(){
                                return palabras.mi_perfil.searching;
                            }
                        }
                    });

                });
            }
          })
    }

    
    function llenar_direcciones(){
        funcion="llenar_direcciones";
        $.post("../Controllers/UsuarioDistritoController.php",{funcion},(response)=>{
            //console.log(response);
            let direcciones = JSON.parse(response);
            let template='';
            let n=1;
            direcciones.forEach(direccion => {
                template+=`
                <div class="callout callout-info">
                    <div class="card-header">            
                      <div class="card-tools">
                          ${direccion.direccion}
                        <button dir_id="${direccion.id}" type="button" class="eliminar_direccion btn btn-tool right">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body"
                        
                        <p class="text-muted text-sm">${direccion.referencia}</p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                ${direccion.ciudad}
                            </li>
                        </ul>
                    </div>   
                </div>
                `;
                n=n+1;
            });
            $('#direcciones').html(template);
        })
    }

    //parte para eliminar una direccion
     $(document).on('click','.eliminar_direccion',(e)=>{
        let elemento = $(this)[0].activeElement;
        let id = $(elemento).attr('dir_id');
        let idioma = identificarIdioma();
        $.getJSON( "./idiomas/"+idioma+".json", function( json )
        {     
            //cargar palabras del lenguaje   
            palabras=json;
            //console.log(palabras);

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                  confirmButton: 'btn btn-success m-3',
                  cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
              })
              
              swalWithBootstrapButtons.fire({
                title: palabras.borrar_direccion.title,
                text: palabras.borrar_direccion.text,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: palabras.borrar_direccion.confirmButtonText,
                cancelButtonText: palabras.borrar_direccion.cancelButtonText,
                reverseButtons: true
              }).then((result) => {
                if (result.isConfirmed) {
                    funcion="eliminar_direccion";
                    $.post("../Controllers/UsuarioDistritoController.php",{funcion,id},(response)=>{
                      console.log(response);
                        response=response.trim();
                        if(response=='success'){
                            swalWithBootstrapButtons.fire(
                                palabras.borrar_direccion.deleted,
                                '',
                                'success'
                              );
                              //location.href='./mi_perfil.php';
                              llenar_direcciones();
                        }else{
                            swalWithBootstrapButtons.fire(
                                palabras.borrar_direccion.error,
                                '',
                                'error'
                              )
                        }
                    });
                
                  
                } else if (
                  /* Read more about handling dismissals below */
                  result.dismiss === Swal.DismissReason.cancel
                ) {
                  swalWithBootstrapButtons.fire(
                    palabras.borrar_direccion.no,
                    '',
                    'error'
                  );
                  
                }
              })

        });

        
     })

    function llenar_departamentos(){
        funcion="llenar_departamentos";
        $.post("../Controllers/DepartamentoController.php",{funcion},(response)=>{
            let departamentos = JSON.parse(response);
            let template='';
            departamentos.forEach(departamento => {
                template+=`
                <option value="${departamento.id}">${departamento.nombre}</option>
                `;
            });
            $('#departamento').html(template);
            $('#departamento').val('').trigger('change');
        })
    }

    function llenar_provincia(){
        funcion="llenar_provincia";
        $.post("../Controllers/DepartamentoController.php",{funcion},(response)=>{
            let departamentos = JSON.parse(response);
            let template='';
            departamentos.forEach(departamento => {
                template+=`
                <option value="${departamento.id}">${departamento.nombre}</option>
                `;
            });
            $('#provincia').html(template);
            $('#provincia').val('').trigger('change');
        })
    }

    function llenar_ciudad(){
        funcion="llenar_ciudad";
        $.post("../Controllers/DepartamentoController.php",{funcion},(response)=>{
            let departamentos = JSON.parse(response);
            let template='';
            departamentos.forEach(departamento => {
                template+=`
                <option value="${departamento.id}">${departamento.nombre}</option>
                `;
            });
            $('#distrito').html(template);
            $('#distrito').val('').trigger('change');
        })
    }

    
    /*
    $('#departamento').change(function (){
        let id_departamento = $('#departamento').val();
        funcion="llenar_provincia";
        $.post("../Controllers/DepartamentoController.php",{funcion, id_departamento},(response)=>{
            let provincias = JSON.parse(response);
            let template='';
            provincias.forEach(provincia => {
                template+=`
                <option value="${provincia.id}">${provincia.nombre}</option>
                `;
            });
            $('#provincia').html(template);
        })
    })
    */


    
            

    

    function verificar_sesion(){
        funcion = 'verificar_sesion';
        $.post('../Controllers/UsuarioController.php', {funcion}, (response)=>{
            //console.log(response);
            if(response != ''){
                let sesion=JSON.parse(response);
                $('#nav_login').hide();
                $('#nav_register').hide();
                $('#usuario_nav').text(sesion.user);
                $('#avatar_nav').attr('src','../Util/Img/Users/'+sesion.avatar);
                $('#avatar_menu').attr('src','../Util/Img/Users/'+sesion.avatar);
                $('#usuario_menu').text(sesion.user);
                
            }else{
                
                location.href = './login.php';
            }
        });
    }

    function obtener_datos(){
        funcion = 'obtener_datos';
        $.post('../Controllers/UsuarioController.php', {funcion}, (response)=>{
            let usuario = JSON.parse(response);
            $('#username').text(usuario.username);
//            $('#tipo_usuario').text(usuario.tipo_usuario);
            $('#nombres').text(usuario.nombres+' '+usuario.apellidos);
            $('#avatar_perfil').attr('src','../Util/Img/Users/'+usuario.avatar);
            $('#dni').text(usuario.dni);
            $('#email').text(usuario.email);
            $('#telefono').text(usuario.telefono);

            
        });
    }



    $("#direccion").change(function(){
        $('#direccion').val( ($("#direccion").val().trim()) );
    });
    
    $('#form-direccion').submit(e=>{
        funcion='crear_direccion';
        let id_distrito = $('#distrito').val();
        let direccion = $('#direccion').val();
        let referencia = $('#referencia').val();
        $.post('../Controllers/UsuarioDistritoController.php', {funcion,id_distrito,direccion,referencia}, (response)=>{
            var respuesta = JSON.parse(response);
            //console.log(respuesta);
            response = respuesta[0].trim();
                      if(response=="ok"){
                        Swal.fire({
                          position: 'center',
                          icon: 'success',
                          title: respuesta[1],
                          showConfirmButton: false,
                          timer: 2500
                        }).then(function(){
                          $('#form-direccion').trigger('reset');
                          location.href='./mi_perfil.php';
                        });
                      }else{
                        Swal.fire({
                          icon: 'error',
                          title: 'X',
                          text: respuesta[1]
                        })
                      }
            
        })

        //console.log(user+' '+pass);
        //para que al dar click en el boton submit no se reinicie la pagina
        e.preventDefault();
    })

    $(document).on('click','.editar_datos',(e)=>{
        funcion="obtener_datos";
        $.post('../Controllers/UsuarioController.php',{funcion},(response)=>{
            //console.log(response);
            let usuario = JSON.parse(response);
            $('#nombres_mod').val(usuario.nombres);
            $('#apellidos_mod').val(usuario.apellidos);
            $('#dni_mod').val(usuario.dni);
            $('#email_mod').val(usuario.email);
            $('#telefono_mod').val(usuario.telefono);

        })
    })


    /*PARTE QUE VALIDA EL CAMBIO DE DATOS*/


    //registrar errores de los campos en la base de datos 
    //los metodos se encuentran en registro_error_miperfil.js

    $( "#boton_registro_clave" ).click(function() {
      verificar_passwords($('#pass_new').val(),$('#pass_repeat').val());
      verificar_pass($('#pass_old').val());

      //verificar campos vacios
      verificar_campo_vacio('password_old',$('#pass_old').val());
      verificar_campo_vacio('password_nuevo',$('#pass_new').val());
      verificar_campo_vacio('password_repeat',$('#pass_repeat').val());
      
    });

    $( "#boton_registro" ).click(function() {
      verificar_cedula($('#dni_mod').val());
      verificar_letras('nombres_mod',$('#nombres_mod').val());
      verificar_letras('apellidos_mod',$('#apellidos_mod').val());
      verificar_numeros('telefono_mod',$('#telefono_mod').val());
      verificar_numeros('dni_mod',$('#dni_mod').val());
      verificar_telefono($('#telefono_mod').val());
      verificar_email($('#email_mod').val());
      

      //verificar campos vacios
      verificar_campo_vacio('nombres_mod',$('#nombres_mod').val());
      verificar_campo_vacio('apellidos_mod',$('#apellidos_mod').val());
      verificar_campo_vacio('email_mod',$('#email_mod').val());
      verificar_campo_vacio('dni_mod',$('#dni_mod').val());
      verificar_campo_vacio('telefono_mod',$('#telefono_mod').val());
    });

    let idioma = identificarIdioma();
    $.getJSON( "./idiomas/"+idioma+".json", function( json )
        {     
            //cargar palabras del lenguaje   
            palabras=json;   
            
            //hacer trim a todos los campos 
            $("#nombres_mod").change(function(){
              $('#nombres_mod').val( ($("#nombres_mod").val().trim()) );
            });
            $("#apellidos_mod").change(function(){
              $('#apellidos_mod').val( ($("#apellidos_mod").val().trim()) );
            });
            $("#email_mod").change(function(){
              $('#email_mod').val( ($("#email_mod").val().trim()) );
            });
            $("#dni_mod").change(function(){
              $('#dni_mod').val( ($("#dni_mod").val().trim()) );
            });
            $("#telefono_mod").change(function(){
              $('#telefono_mod').val( ($("#telefono_mod").val().trim()) );
            });


            

                $.validator.setDefaults({
                  submitHandler: function () {
                    /*FUNCION SI TODO ESTA BIEN*/
                    funcion="editar_datos";
                    
                    /*FUNCION POST SOLO PARA SUBIR DATOS*/
                    /*
                    let nombres = $('#nombres_mod').val();
                    let apellidos = $('#apellidos_mod').val();
                    let dni = $('#dni_mod').val();
                    let email = $('#email_mod').val();
                    let telefono = $('#telefono_mod').val();
                    $.post('../Controllers/UsuarioController.php', {funcion,nombres,apellidos,dni,email,telefono}, (response)=>{
                        //console.log(response);
                        obtener_datos();
                    });
                    */

                    /*FUNCION PARA SUBIR IMAGEN, se necesita AJAX*/
                    //capturo todos los datos de este formulario
                    let datos = new FormData($('#form-datos')[0]);
                    datos.append('funcion',funcion);
                    $.ajax({
                        type: "POST",
                        url: "../Controllers/UsuarioController.php",
                        data:datos,
                        cache:false,
                        processData:false,
                        contentType:false,
                        success: function(response){
                            //console.log(response);
                            var respuesta = JSON.parse(response);
                            response = respuesta[0].trim();
                            if(response=="ok"){
                                Swal.fire({
                                  position: 'center',
                                  icon: 'success',
                                  title: respuesta[1],
                                  showConfirmButton: false,
                                  timer: 2500
                                }).then(function(){
                                  verificar_sesion();
                                  obtener_datos();
                                });
                              }else{
                                Swal.fire({
                                  icon: 'error',
                                  title: 'X',
                                  text: respuesta[1]
                                })
                              }
                            
                        }
                    });
                  }
                });

                //crear reglas personalisadas
                //permite tres parametros(nombre,funcion,mensaje que se desea mostrar) 
                jQuery.validator.addMethod("letras",
                  function(value,element){
                    //value lo que contiene el campo
                    //la funcion devuelve o true o false
                    //ve el patron si contiene solo letras 
                    //console.log(value);
                    let variable = value.replace(/ /g, "");
                    return /^[A-Za-z]+$/.test(variable);
                  }
                  ,"Este campo solo permite letras");

                jQuery.validator.addMethod("cedula",
                  function(value,element){
                    
                    return comprobar_numero_cedula(value);
                  }
                  ,"Cédula incorrecta");

                
                $('#form-datos').validate({
                  rules: {
                    nombres_mod:{
                      required:true,
                      minlength: 2,
                      letras: true
                    },
                    apellidos_mod:{
                      required:true,
                      minlength: 2,
                      letras:true
                    },
                    dni_mod:{
                      required:true,
                      digits:true,
                      cedula: true
                    },
                    email_mod: {
                      required: true,
                      email: true,
                    },
                    telefono_mod:{
                      required:true,
                      digits:true,
                      minlength:7
                    }
                  },
                  messages: {
                    nombres_mod:{
                      required: palabras.validaciones_registro.nombres.required,
                      minlength: palabras.validaciones_registro.nombres.minlength,
                      letras: palabras.validaciones_registro.nombres.letras                      
                    },
                    apellidos_mod:{
                      required: palabras.validaciones_registro.nombres.required,
                      minlength: palabras.validaciones_registro.nombres.minlength,
                      letras: palabras.validaciones_registro.nombres.letras                            
                    },
                    dni_mod:{
                      required: palabras.validaciones_registro.dni.required,
                      digits: palabras.validaciones_registro.dni.digits,
                      cedula: palabras.validaciones_registro.dni.no_valido
                    },
                    telefono_mod:{
                      required: palabras.validaciones_registro.nombres.required,
                      digits: palabras.validaciones_registro.dni.digits,
                      minlength: palabras.validaciones_registro.telefono.min
                    },
                    email_mod: {
                      required: palabras.validaciones_registro.email.required,
                      email:  palabras.validaciones_registro.email.email
                    }
                  },
                  errorElement: 'span',
                  errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                  },
                  highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                    $(element).removeClass('is-valid');
                  },
                  unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                    $(element).addClass('is-valid');
                  }
                });
          
        });      




    /*PARTE QUE VALIDA EL CAMBIO DE PASSWORDS*/
    $.getJSON( "./idiomas/"+idioma+".json", function( json )
        {     
            //cargar palabras del lenguaje   
            palabras=json;   
            
            //hacer trim a todos los campos 
            $("#pass_old").change(function(){
              $('#pass_old').val( ($("#pass_old").val().trim()) );
            });
            $("#pass_new").change(function(){
              $('#pass_new').val( ($("#pass_new").val().trim()) );
            });
            $("#pass_repeat").change(function(){
              $('#pass_repeat').val( ($("#pass_repeat").val().trim()) );
            });
            
                $.validator.setDefaults({
                  submitHandler: function () {
                    funcion="cambiar_contra";
                    let pass_old=$("#pass_old").val();
                    let pass_new=$("#pass_new").val(); 
                    $.post('../Controllers/UsuarioController.php',{funcion,pass_old,pass_new},(response)=>{
                      var respuesta = JSON.parse(response);
                      respuesta[0] = respuesta[0].trim();
                      if(respuesta[0]=='ok'){
                        Swal.fire({
                          position: 'center',
                          icon: 'success',
                          title: respuesta[1],
                          showConfirmButton: false,
                          timer: 2000
                        }).then(function(){
                          $('#form-contra').trigger('reset');
                          location.href='./mi_perfil.php';
                        });
                      }else if(respuesta[0]=='error'){
                        Swal.fire({
                          icon: 'warning',
                          title: respuesta[1],
                          text: respuesta[2]
                        })
                      }else{
                        Swal.fire({
                          icon: 'error',
                          title: 'X',
                          text: respuesta[1]
                        })
                      }
                    })
                  }
                });

                //crear reglas personalisadas
                //permite tres parametros(nombre,funcion,mensaje que se desea mostrar) 
                jQuery.validator.addMethod("letras",
                  function(value,element){
                    //value lo que contiene el campo
                    //la funcion devuelve o true o false
                    //ve el patron si contiene solo letras 
                    //console.log(value);
                    let variable = value.replace(/ /g, "");
                    return /^[A-Za-z]+$/.test(variable);
                  }
                  ,"Este campo solo permite letras");

                
                  $('#form-contra').validate({
                    rules: {
                      pass_old:{
                          required:true,
                          minlength: 8,
                          maxlength:20
                      },
                      pass_new:{
                          required:true,
                          minlength: 8,
                          maxlength:20
                      },
                      pass_repeat:{
                          required:true,
                          equalTo: "#pass_new"
                      }
                    },
                    messages: {
                      
                      pass_old:{
                          required: palabras.validaciones_registro.pass.required,
                          minlength: palabras.validaciones_registro.pass.minlength,
                          maxlength: palabras.validaciones_registro.pass.maxlength    
                      },
                      pass_new:{
                          required: palabras.validaciones_registro.pass.required,
                          minlength: palabras.validaciones_registro.pass.minlength,
                          maxlength: palabras.validaciones_registro.pass.maxlength    
                      },
                      pass_repeat:{
                          required: palabras.validaciones_registro.pass_repeat.required,
                          equalTo: palabras.validaciones_registro.pass_repeat.equalTo
                      }
                  },
                  errorElement: 'span',
                  errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                  },
                  highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                    $(element).removeClass('is-valid');
                  },
                  unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                    $(element).addClass('is-valid');
                  }
                });
            
        });      




});

