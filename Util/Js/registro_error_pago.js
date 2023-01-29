var url_controller="./Controllers/HistorialController.php";
var funcion="registro_error_sesion";
var tabla="compra";

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

//registrar la fecha de caducidad de una tarjeta
//ejemplo: mes/anio
//12/23
//tiene que comprobar que sea mayor a 12/23 
function comprobar_fecha_caducidad_tarjeta(valor){
    let bandera=false;
    let fecha=valor.trim();
    if(comprobar_formato_fecha_caducidad(fecha)){
        let mes = fecha.substring(0,2);
        let anio = fecha.substring(3,5);
        if(mes>=1 & mes<=12){
            if(anio>=23){
                bandera=true;
                if(anio==23 & mes<11){
                    bandera=false;
                }
            }
        }else{
            bandera=false;
        }    
    } 
    return bandera;
}

//comprueba si es mes/anio, es decir dosnumeros/dosnumeros
function comprobar_formato_fecha_caducidad(valor){
    let fecha=valor.trim();
    if(fecha.length==5){
        let mes = fecha.substring(0,2);
        let anio = fecha.substring(3,5);    
        if(isNaN(mes) == false & isNaN(anio) == false){
            return true;
        }
    } 
    return false;
}

//se registra en la base el error que tenga la fecha de caducidad
function registrar_error_fecha_caducidad(campo,valor){
    let error="";
    let fecha=valor.trim();
    if(comprobar_formato_fecha_caducidad(fecha)){
        let mes = fecha.substring(0,2);
        let anio = fecha.substring(3,5);
        if(mes>=1 & mes<=12){
            if(anio>=23){
                if(anio==23 & mes<11){
                    error="Año bien, mes fuera de rango";
                    registrar_error(url_controller,funcion,campo,error,tabla);
                }
            }else{
                error="Año fuera de rango";
                registrar_error(url_controller,funcion,campo,error,tabla);
            }
        }else{
            error="Mes fuera de rango";
            registrar_error(url_controller,funcion,campo,error,tabla);
        }    
    }else{
        error="No contiene el formato adecuado";
        registrar_error(url_controller,funcion,campo,error,tabla);
    } 
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

function verificar_minimo_caracteres(numero,campo,valor){
    let error="Contiene menos de "+numero+" caracteres";
    let cadena=valor.trim();
    if(cadena!='' & cadena.length<numero){
        registrar_error(url_controller,funcion,campo,error,tabla);
    }
}

function verificar_numero_caracteres(numero,campo,valor){
    let error="No contiene "+numero+" caracteres";
    let cadena=valor.trim();
    if(cadena!='' & cadena.length!=numero){
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


function verificar_telefono(valor){
    let error="sobre pasa numero de caracteres 14";
    valor=valor.trim();
    let variable = valor.replace(/ /g, "");
    if(/^[A-Za-z]+$/.test(variable) == false & variable.trim()!=''){
        if(variable.length>14){
            //console.log(variable);
            registrar_error(url_controller,funcion,"telefono",error,tabla);
        }
    }
}

function verificar_email(valor){
    let error="no contiene el formato";
    console.log(valor);
    valor=valor.trim();
    let variable = valor.replace(/ /g, "");
    if(validarEmail(variable)==false & variable.trim()!=''){
        registrar_error(url_controller,funcion,"email",error,tabla);
    }
}


function validarEmail(emailField){
                
	// Define our regular expression.
	var validEmail =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

	// Using test we can check if the text match the pattern
	if( validEmail.test(emailField) ){
		//alert('Email is valid, continue with form submission');
		return true;
	}else{
		//alert('Email is invalid, skip form submission');
		return false;
	}
} 

function verificar_passwords(ps1,ps2){
    let error="no coinciden";
    if(ps1.trim()!='' & ps2.trim()!=''){
        if(ps1 != ps2){
            registrar_error(url_controller,funcion,"passwords",error,tabla);
        }    
    }
    if(ps1.trim().length>=1 & ps1.trim().length<8){
        error="menor a 8 caracteres";
        registrar_error(url_controller,funcion,"pass",error,tabla);
    }
    if(ps2.trim().length>=1 & ps2.trim().length<8){
        error="menor a 8 caracteres";
        registrar_error(url_controller,funcion,"pass_repeat",error,tabla);
    }
}

function verificar_pass(ps1){
    if(ps1.trim().length>=1 & ps1.trim().length<8){
        error="menor a 8 caracteres";
        registrar_error(url_controller,funcion,"pass_old",error,tabla);
    }
}
