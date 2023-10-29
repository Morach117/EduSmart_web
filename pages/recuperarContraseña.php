<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/dist/css/tabler.min.css?1684106062" rel="stylesheet" />
    <link href="../assets/dist/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
    <link href="../assets/dist/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
    <link href="../assets/dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
    <link href="../assets/dist/css/demo.min.css?1684106062" rel="stylesheet" />
    <title>Recuperar contraseña</title>

</head>

<body>
    <div class="d-flex flex-column">
        <div class="page page-center">
            <div class="container container-tight py-4">
                <div class="text-center m-4">
                    <a href="/" class="navbar-brand navbar-brand-autodark h1">EduSmart</a>
                </div>
                <form class="card card-md" action="" method="post" autoComplete="off" noValidate>
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Recuperar contraseña</h2>
                        <p class="text-muted mb-4">Ingresa tu correo y tu contraseña será enviada a tu correo, si no
                            cuentas
                            con conexión a internet comunícate con un administrador</p>
                        <div class="mb-3">
                            <label class="form-label">Dirección de correo</label>
                            <input type="email" class="form-control" placeholder="Ingresa tu correo" name="correo"
                                required />
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">
                                <IconMail />
                                Enviar contraseña
                            </button>
                        </div>
                    </div>
                </form>
                <div class="text-center text-muted mt-3">
                    La recupere <a href="../index.php">regresaré</a> a la pantalla de inicio de sesión.
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/dist/js/tabler.min.js?1684106062" defer></script>
    <script src="../assets/dist/js/demo.min.js?1684106062" defer></script>
</body>

</html>