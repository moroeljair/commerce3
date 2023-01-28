$(document).ready(function(){
    var funcion;
    verificar_sesion();

    function verificar_sesion(){
        funcion = 'verificar_sesion';
        $.post('./Controllers/UsuarioController.php', {funcion}, (response)=>{
            console.log(response);
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
    
});

