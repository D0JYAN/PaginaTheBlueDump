<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/loginStyle.css">
    <link rel="stylesheet" href="./css/adicionalStyle.css">
    <!--reCaptcha-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-md-center" style="margin-top:15%">
            <h2>Iniciar Sesión</h2>

            <form class="col-3" method="POST" action="./php/login.php">

                <div class="mb-3">

                    <label for="exampleInputEmail1" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>

                </div>
                <div class="mb-3">

                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="pass" required>

                </div>

                <div class="mb-3">
                    <div class="g-recaptcha" data-sitekey="6LeXpW0pAAAAAPZOSJP6Q4dxBdtMwMkvNGKUhKsy">

                    </div>
                </div>

                <div class="mb-3">

                    <button name="submit" type="submit" class="btn btn-primary">Iniciar Sesión</button>
                    <a href="./register.php" class="btn-1">Aún No Tengo Cuenta</a>
                    <a href="#" class="btn-2">Olvidé Mi Contraseña</a>

                </div>

            </form>
        </div>
    </div>
</body>

</html>