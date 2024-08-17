<?php
if (isset($_GET['email'])) {
    $email = $_GET['email'];
} else {
    header('Location: ./login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/loginStyle.css">
    <link rel="stylesheet" href="./css/adicionalStyle.css">
    <title>Verifiar Cuenta</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-md-center" style="margin-top:15%">
            <h2>Verificar Cuenta</h2>
            <form class="col-3" action="./php/verificar.php" method="POST">

                <div class="mb-3">

                    <label for="c" class="form-label">Código de Verificación</label>
                    <input type="hidden" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                    <input type="number" class="form-control" id="c" name="codigo">

                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Verificar</button>
                </div>

            </form>
        </div>
    </div>
</body>

</html>