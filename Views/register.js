let palabras;
var idioma;
$(document).ready(function ()
{
  var funcion;
  verificar_sesion();

    function verificar_sesion(){
        funcion = 'verificar_sesion';
        $.post('../Controllers/UsuarioController.php', {funcion}, (response)=>{
            if(response != ''){
                location.href = '../index.php';
            }
           
        });
    }



    //console.log("hola");
    funcion='lenguaje';
    $.post('../Controllers/idiomas.php', {funcion}, (response)=>{
        idioma = response;
        $.getJSON( "./idiomas/"+idioma+".json", function( json )
        {     
            //cargar palabras del lenguaje   
            palabras=json;   
            
            //hacer trim a todos los campos 
            $("#nombres").change(function(){
              $('#nombres').val( ($("#nombres").val().trim()) );
            });
            $("#apellidos").change(function(){
              $('#apellidos').val( ($("#apellidos").val().trim()) );
            });
            $("#username").change(function(){
                $('#username').val( ($("#username").val().trim()) );
            });
            $("#pass").change(function(){
              $('#pass').val( ($("#pass").val().trim()) );
            });
            $("#pass_repeat").change(function(){
              $('#pass_repeat').val( ($("#pass_repeat").val().trim()) );
            });
            $("#email").change(function(){
              $('#email').val( ($("#email").val().trim()) );
            });
            $("#dni").change(function(){
              $('#dni').val( ($("#dni").val().trim()) );
            });
            $("#telefono").change(function(){
              $('#telefono').val( ($("#telefono").val().trim()) );
            });


            $(function () {

                $.validator.setDefaults({
                  submitHandler: function () {
                    /*FUNCION SI TODO ESTA BIEN*/
                    let username = $('#username').val();
                    let pass = $('#pass').val();
                    let nombres = $('#nombres').val();
                    let apellidos = $('#apellidos').val();
                    let dni = $('#dni').val();
                    let email = $('#email').val();
                    let telefono = $('#telefono').val();
                    funcion = "registrar_usuario";
                    $.post('../Controllers/UsuarioController.php',{username,pass,nombres,apellidos,dni,email,telefono,funcion},(response)=>{
                      response = response.trim();
                      if(response=="success"){
                        Swal.fire({
                          position: 'center',
                          icon: 'success',
                          title: palabras.validaciones_registro.mensaje_registro.exito,
                          showConfirmButton: false,
                          timer: 2500
                        }).then(function(){
                          $('#form-register').trigger('reset');
                          location.href='../Views/login.php';
                        });
                      }else{
                        Swal.fire({
                          icon: 'error',
                          title: 'X',
                          text: palabras.validaciones_registro.mensaje_registro.falla
                        })
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

                /*VER SI NOMBRE DE USUARIO EXISTE*/ 
                jQuery.validator.addMethod("usuario_existente",
                  function(value,element){
                    let funcion="verificar_usuario";
                    let bandera;
                    /*
                    METODO POST ES ASINCRONO NO SE PUEDE USAR
                    $.post('../Controllers/UsuarioController.php',{funcion,value},(response)=>{
                      if(response=='success'){
                        bandera=false;
                      }else{
                        bandera=true;
                      }
                    });
                    */
                    //necesitamos un metodo que no se asincrona
                    $.ajax({
                      type: "POST",
                      url: "../Controllers/UsuarioController.php",
                      data: 'funcion='+funcion+'&&'+'value='+value,
                      async: false,
                      success: function(response){
                        if(response=='success'){
                          bandera=false;
                        }else{
                          bandera=true;
                        }
                      }
                    })
                    return bandera;
                  }
                  ,"Usuario ya existe, por favor ingrese uno diferente");

                $('#form-register').validate({
                  rules: {
                    nombres:{
                      required:true,
                      minlength: 2,
                      letras: true
                    },
                    apellidos:{
                      required:true,
                      minlength: 2,
                      letras:true
                    },
                    username:{
                        required:true,
                        minlength: 6,
                        maxlength:20,
                        usuario_existente:true
                    },
                    pass:{
                        required:true,
                        minlength: 8,
                        maxlength:20
                    },
                    pass_repeat:{
                        required:true,
                        equalTo: "#pass"
                    },
                    dni:{
                      required:true,
                      digits:true,
                      cedula: true
                    },
                    email: {
                      required: true,
                      email: true,
                    },
                    telefono:{
                      required:true,
                      digits:true,
                      minlength:7
                    },
                    password: {
                      required: true,
                      minlength: 5
                    },
                    terms: {
                      required: true
                    },
                  },
                  messages: {
                    username:{
                        required: palabras.validaciones_registro.username.required,
                        minlength: palabras.validaciones_registro.username.minlength,
                        maxlength: palabras.validaciones_registro.username.maxlength,
                        usuario_existente: palabras.validaciones_registro.username.usuario_existente
                    },
                    pass:{
                        required: palabras.validaciones_registro.pass.required,
                        minlength: palabras.validaciones_registro.pass.minlength,
                        maxlength: palabras.validaciones_registro.pass.maxlength    
                    },
                    pass_repeat:{
                        required: palabras.validaciones_registro.pass_repeat.required,
                        equalTo: palabras.validaciones_registro.pass_repeat.equalTo
                    },
                    nombres:{
                      required: palabras.validaciones_registro.nombres.required,
                      minlength: palabras.validaciones_registro.nombres.minlength,
                      letras: palabras.validaciones_registro.nombres.letras                      
                    },
                    apellidos:{
                      required: palabras.validaciones_registro.nombres.required,
                      minlength: palabras.validaciones_registro.nombres.minlength,
                      letras: palabras.validaciones_registro.nombres.letras                            
                    },
                    dni:{
                      required: palabras.validaciones_registro.dni.required,
                      digits: palabras.validaciones_registro.dni.digits,
                      cedula: palabras.validaciones_registro.dni.no_valido
                    },
                    telefono:{
                      required: palabras.validaciones_registro.nombres.required,
                      digits: palabras.validaciones_registro.dni.digits,
                      minlength: palabras.validaciones_registro.telefono.min
                    },
                    email: {
                      required: palabras.validaciones_registro.email.required,
                      email:  palabras.validaciones_registro.email.email
                    },
                    password: {
                      required: "Please provide a password",
                      minlength: "Your password must be at least 5 characters long"
                    },
                    terms: palabras.validaciones_registro.terms
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
    })

});


function cargarLenguaje(){
    var funcion="lenguaje";
    console.log("hola");
    $.post('../Controllers/idiomas.php', {funcion}, (response)=>{
        idioma = response;
        $.getJSON( "./idiomas/"+idioma+".json", function( json )
        {        
            palabras=json;   

        });  
    });
}

