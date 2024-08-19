<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/loginStyle.css">
    <link rel="stylesheet" href="./css/adicionalStyle.css">
    <title>Resgistro</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-md-center" style="margin-top:10%">
            <h2>Registro</h2>
            <form class="col-3" method="POST" action="./php/registrar.php">

                <div class="mb-3">

                    <label for="Nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="Nombre" name="nombre" required>

                </div>

                <div class="mb-3">

                    <label for="exampleInputEmail1" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" required>

                </div>

                <div class="mb-3">

                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="pass" required>

                </div>

                <div class="mb-3">

                    <label for="exampleInputPassword2" class="form-label">Confirmar Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword2" name="pass2" required>

                </div>

                <div class="mb-3">

                    <button type="submit" class="btn btn-primary">Registrar</button>
                    <a href="./login.php" class="btn-1">Ya Tengo Cuenta</a>

                </div>

            </form>
        </div>
    </div>
</body>

</html>