<?php 
    session_start();
    if( isset( $_SESSION['lang'] ) ){
        $idioma = $_SESSION['lang'];
    }else{
        $idioma = 'es';
    }

#definir palabras en un idioma que vera en los documentos ini
$archivo = file_exists( "./idiomas/$idioma.ini" ) ? "./idiomas/$idioma.ini" : "./idiomas/es.ini";
//$palabras = parse_ini_file( $archivo ); //cuando no se tiene separado por secciones
$palabras = parse_ini_file( $archivo, true );
//var_dump($palabras);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../Util/Css/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../Util/Css/adminlte.min.css">
  <link rel="stylesheet" href="../Util/Css/toastr.min.css">
  <link rel="stylesheet" href="../Util/Css/sweetalert2.min.css">
  
</head>

