<?php
    session_start();
    //obtener del get 'l', si no lo obtiene es espagnol
    $_SESSION['lang'] = $_GET['l'] ?? 'es';
    #redireccionar al index que se encuentra en el mismo archivero
    header("Location: ../../index.php");
?>