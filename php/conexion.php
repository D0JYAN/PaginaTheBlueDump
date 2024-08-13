<?php 

    $conexion = new mysqli('localhost','root','','pagina_tdb');
    if($conexion-> connect_error){
        die('No se pudo conectar al servidor');
    }

?>