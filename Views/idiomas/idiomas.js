function cambiarIdioma($idioma){
    localStorage.setItem('lenguaje',$idioma);
    $direccion='./Layouts/lang.php?l='+$idioma;
    location.href=$direccion;
}

function cambiarIdioma2($idioma){
    console.log($idioma);
    localStorage.setItem('lenguaje',$idioma);
    $direccion='./Views/Layouts/lang.php?l='+$idioma;
    location.href=$direccion;
}

function identificarIdioma(){
    let idioma = localStorage.getItem('lenguaje');
        if(idioma===null){
            idioma='es'
        }
    return idioma;
}


    
