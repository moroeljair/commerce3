$(document).ready(function(){
    console.log('OK----');
    let palabras;
    var idioma;
    var funcion;
    verificar_sesion();

    function verificar_sesion(){
        funcion = 'verificar_sesion';
        $.post('./Controllers/UsuarioController.php', {funcion}, (response)=>{
            //console.log(response);
            if(response != ''){
                let sesion=JSON.parse(response);
                $('#nav_login').hide();
                $('#nav_register').hide();
                $('#usuario_nav').text(sesion.user);
                $('#avatar_nav').attr('src','./Util/Img/Users/'+sesion.avatar);
                $('#avatar_menu').attr('src','./Util/Img/Users/'+sesion.avatar);
                $('#usuario_menu').text(sesion.user);
                
            }else{
                location.href = './Views/login.php';
            }
        });
    }

    //registrar errores de los campos en la base de datos 
    //los metodos se encuentran en validador_pago.js
    /*
    $( "#boton_registro" ).click(function() {
        verificar_cedula($('#dni').val());
        verificar_letras('nombres',$('#nombres').val());
        verificar_letras('apellidos',$('#apellidos').val());
        verificar_numeros('telefono',$('#telefono').val());
        verificar_numeros('dni',$('#dni').val());
        verificar_telefono($('#telefono').val());
        verificar_email($('#email').val());
        verificar_passwords($('#pass').val(),$('#pass_repeat').val());
  
        //verificar campos vacios
        verificar_campo_vacio('nombres',$('#nombres').val());
        verificar_campo_vacio('apellidos',$('#apellidos').val());
        verificar_campo_vacio('username',$('#username').val());
        verificar_campo_vacio('pass',$('#pass').val());
        verificar_campo_vacio('pass_repeat',$('#pass_repeat').val());
        verificar_campo_vacio('email',$('#email').val());
        verificar_campo_vacio('dni',$('#dni').val());
        verificar_campo_vacio('telefono',$('#telefono').val());
      });
      */

    funcion='lenguaje';
    $.post('./Controllers/idiomas.php', {funcion}, (response)=>{
        idioma = response;
        $.getJSON( "./Views/idiomas/"+idioma+".json", function( json )
        {     
            //cargar palabras del lenguaje   
            palabras=json;   
            
            //hacer trim a todos los campos 
            $("#tarjeta").change(function(){
              $('#tarjeta').val( ($("#tarjeta").val().trim()) );
            });
            $("#fechaCaducidad").change(function(){
              $('#fechaCaducidad').val( ($("#fechaCaducidad").val().trim()) );
            });
            $("#csc").change(function(){
                $('#csc').val( ($("#csc").val().trim()) );
            });
            $("#nombre").change(function(){
              $('#nombre').val( ($("#nombre").val().trim()) );
            });
            $("#apellido").change(function(){
              $('#apellido').val( ($("#apellido").val().trim()) );
            });
            $("#calle").change(function(){
              $('#calle').val( ($("#calle").val().trim()) );
            });
            $("#direccion").change(function(){
              $('#direccion').val( ($("#direccion").val().trim()) );
            });
            $("#postal").change(function(){
              $('#postal').val( ($("#postal").val().trim()) );
            });
            $("#cedula").change(function(){
                $('#cedula').val( ($("#cedula").val().trim()) );
              });


       
                $.validator.setDefaults({
                  submitHandler: function () {
                    /*FUNCION SI TODO ESTA BIEN*/
                    let tarjeta = $('#tarjeta').val();
                    let fechaCaducidad = $('#fechaCaducidad').val();
                    let csc = $('#csc').val();
                    let nombre = $('#nombre').val();
                    let apellido = $('#apellido').val();
                    let calle = $('#calle').val();
                    let direccion = $('#direccion').val();
                    let postal = $('#postal').val();
                    let cedula = $('#cedula').val();
                    funcion = "registrar_pago";
                    $.post('./Controllers/PagoController.php',{tarjeta,fechaCaducidad,csc,nombre,apellido,calle,direccion,postal,cedula,funcion},(response)=>{
                      response = response.trim();
                      console.log(response);
                      if(response=="success"){
                        Swal.fire({
                          position: 'center',
                          icon: 'success',
                          title: palabras.validaciones_registro.mensaje_registro.exito,
                          showConfirmButton: false,
                          timer: 2500
                        }).then(function(){
                          $('#form-pago').trigger('reset');
                          location.href='./index.php';
                        });
                      }else{
                        Swal.fire({
                          icon: 'error',
                          title: 'X',
                          text: palabras.validaciones_registro.mensaje_registro.falla
                        }).then(function(){
                            console.log('error');
                        });
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

                
                $('#form-pago').validate({
                  rules: {
                    nombre:{
                      required:true,
                      minlength: 2,
                      letras: true
                    },
                    apellido:{
                      required:true,
                      minlength: 2,
                      letras:true
                    }
                  },
                  messages: {
                    nombre:{
                      required: palabras.validaciones_registro.nombres.required,
                      minlength: palabras.validaciones_registro.nombres.minlength,
                      letras: palabras.validaciones_registro.nombres.letras                      
                    },
                    apellido:{
                      required: palabras.validaciones_registro.nombres.required,
                      minlength: palabras.validaciones_registro.nombres.minlength,
                      letras: palabras.validaciones_registro.nombres.letras                            
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

});


