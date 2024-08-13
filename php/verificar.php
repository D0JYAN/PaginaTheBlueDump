<?php
include 'conexion.php';
$email = $_POST['email'];
$codigo = $_POST['codigo'];
$res = $conexion->query("SELECT * FROM usuarios WHERE email='$email' AND codigo='$codigo'") or die($conexion->error);
if (mysqli_num_rows($res) > 0) {
    $conexion->query("UPDATE usuarios SET confirmado = 'si' WHERE email = '$email'");
    echo '
        <body
            style="
                overflow-y: hidden;
                background: rgb(75,69,175);
                background: linear-gradient(0deg, rgba(75,69,175,1) 0%, rgba(149,218,232,1) 100%);
                font-family: system-ui, -apple-system, BlinkMacSystemFont, Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            "
        >';
    echo '
        <div 
            style="
                display: flex; 
                height: 100vh;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                margin: 0%;
            "
        >';
    echo '<h2>Todo Correcto Ya Puedes</h2>';
    echo '
        <h2>
            <a href="../login.php" 
                style="
                    margin-top: 10%; 
                    margin-bottom: 10%
                    display: inline;
                "
            >
                Iniciar Sesión
            </a>
        </h2>';
    echo '</div>';
    echo '</body>';
} else {
    echo '
        <body
            style="
                overflow-y: hidden;
                background: rgb(75,69,175);
                background: linear-gradient(0deg, rgba(75,69,175,1) 0%, rgba(149,218,232,1) 100%);
                font-family: system-ui, -apple-system, BlinkMacSystemFont, Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            "
        >';
    echo '
        <div 
            style="
                display: flex; 
                height: 100vh;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                margin: 0%;
            "
        >';
    echo "<h2>Código Invalido</h2>";
    echo '</div>';
    echo '</body>';
}