//registrar para archivos desde raiz (index.php)
function regitrar_click_enlace(pagina){
    let funcion = 'registrar_pagina';
    $.post('./Controllers/HistorialController.php', {funcion,pagina}, (response)=>{    
        console.log(response);
    });
}

//registrar para archivos desde Views 
function regitrar_click_enlace2(pagina){
    let funcion = 'registrar_pagina';
    $.post('../Controllers/HistorialController.php', {funcion,pagina}, (response)=>{    
        console.log(response);
    });
}

//registrar el inicio de la transaccion
function registrar_inicio_transaccion(){
    let funcion = 'registrar_inicio_transaccion';
    $.post('./Controllers/HistorialController.php', {funcion}, (response)=>{    
        console.log(response);
    });
}