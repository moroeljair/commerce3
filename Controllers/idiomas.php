<?php 
    session_start();
    if( isset( $_SESSION['lang'] ) ){
        $idioma = $_SESSION['lang'];
    }else{
        $idioma = 'es';
    }

    //enviar que lenguaje se esta usando en sesion
    if($_POST['funcion']=='lenguaje'){
        if( isset( $_SESSION['lang'] ) ){
            $idioma = $_SESSION['lang'];
            echo $idioma;
        }else{
            $idioma = 'es';
            echo $idioma;
        }
    }

#definir palabras en un idioma que vera en los documentos ini
$archivo = file_exists( "../Views/idiomas/$idioma.ini" ) ? "../Views/idiomas/$idioma.ini" : "../Views/idiomas/es.ini";
//$palabras = parse_ini_file( $archivo ); //cuando no se tiene separado por secciones
$palabras = parse_ini_file( $archivo, true );
?>