$(document).ready(function(){
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

    $('#form-login').submit(e=>{
        funcion='login';
        let user = $('#user').val();
        let pass = $('#pass').val();
        $.post('../Controllers/UsuarioController.php', {funcion,user,pass}, (response)=>{
            var respuesta = JSON.parse(response);
            //console.log(respuesta);
            if(respuesta[0]=="logueado"){
                toastr.success(respuesta[1]);
                location.href = '../index.php';
            }else{
                toastr.error(respuesta[1]);
            }
            
        })

        //console.log(user+' '+pass);
        //para que al dar click en el boton submit no se reinicie la pagina
        e.preventDefault();
    })
});

