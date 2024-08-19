<?php
session_start();

// Incluir el código para verificar la sesión
//include './php/check_session.php';

// Resto de tu código actual
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/paginaStyle.css">
    <script type="text/javascript" src="./js/check_session.js"></script>
    <title>Home</title>
</head>

<body>
    <div class="container">

        <?php
        include 'estructura/navbar.php'
        ?>

        Inicio

        <script>
            // Realiza una solicitud AJAX cada 5 minutos (300,000 milisegundos)
            setInterval(function() {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("GET", "./php/check_session.php", true);
                xmlhttp.send();
            }, 300000);
        </script>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>