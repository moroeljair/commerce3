$(document).ready(function(){
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
                $('#nav_usuario').hide();
            }
        });
    }

    
});

const checkForElement = setInterval(function() {
    const myAsyncDiv = document.getElementsByClassName('c-bQoszf')[0];
    if (myAsyncDiv) {
      clearInterval(checkForElement);
      console.log('El elemento ha sido cargado');
      myAsyncDiv.addEventListener('click', function() {
        alert('Botón clicado');
      });
    }
  }, 100);



