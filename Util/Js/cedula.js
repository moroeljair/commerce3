var url_controller="../Controllers/HistorialController.php";
var funcion="crear_error_tabla";
var tabla="error_registro";

function comprobar_numero_cedula(cedula){
    bandera=false;
    if (typeof(cedula) == 'string' && cedula.length == 10 && /^\d+$/.test(cedula)) {
        var digitos = cedula.split('').map(Number);
        var codigo_provincia = digitos[0] * 10 + digitos[1];

        if ((codigo_provincia >= 1 && codigo_provincia <= 24) || codigo_provincia == 30) {
        
        	if (true || digitos[2] < 6) {
                var digito_verificador = digitos.pop();

                var digito_calculado = digitos.reduce(function (valorPrevio, valorActual, indice) {
                        return valorPrevio - (valorActual * (2 - indice % 2)) % 9 - (valorActual == 9) * 9;
                    }, 1000) % 10;
            
                if (digito_calculado === digito_verificador){
                    bandera= true;
                }
                else{
                    bandera= false;
                }
            }
        }
    }else{
        bandera= false;
    }
    return bandera;
}

function registrar_error(url_controller,funcion,campo,error,tabla){
    $.post(url_controller, {funcion,campo,error,tabla}, (response)=>{
        console.log(response);
    });
}

function verificar_letras(campo,valor){
    let error="Contiene numeros";
    let variable = valor.replace(/ /g, "");
    if(/^[A-Za-z]+$/.test(variable) == false & variable.trim()!=''){
        registrar_error(url_controller,funcion,campo,error,tabla);
    }
}

function verificar_numeros(campo,valor){
    let error="Contiene letras";
    let variable = valor.replace(/ /g, "");
    if(/^[A-Za-z]+$/.test(variable) == true & variable.trim()!=''){
        registrar_error(url_controller,funcion,campo,error,tabla);
    }
}

function verificar_campo_vacio(campo,valor){
    let error="Campo vacio";
    if(valor.trim()==''){
        registrar_error(url_controller,funcion,campo,error,tabla);
    }
}

function verificar_cedula(cedula){
    let b = comprobar_numero_cedula(cedula);
    if(b==false & cedula.trim()!=''){
        let campo="cedula";
        let error="numero incorrecto";
        registrar_error(url_controller,funcion,campo,error,tabla);
    }
}