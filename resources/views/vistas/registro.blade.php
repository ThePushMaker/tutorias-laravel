<!DOCTYPE html>
<html lang="en">

<head>

    <title>Iniciar Sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap v5.1.3 CDNs -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

  

</head>

<body>

    <div class="login">

        <h1 class="text-center">Bienvenido!</h1>
        
        <form class="needs-validation">
            <div class="form-group was-validated">
                <label class="form-label" for="nombre">Nombre</label>
                <input class="form-control" type="text" id="nombre" required>
                <div class="invalid-feedback">
                    Porfavor ingrese su nombre
                </div>
            </div>
            <div class="form-group was-validated">
                <label class="form-label" for="semestre">Semestre</label>
                <input class="form-control" type="text" id="semestre" required>
                <div class="invalid-feedback">
                    Porfavor ingrese su semestre
                </div>
            </div>
            <div class="form-group was-validated">
                <label class="form-label" for="control">No. Control</label>
                <input class="form-control" type="text" id="control" required>
                <div class="invalid-feedback">
                    Porfavor ingrese su no. control
                </div>
            </div>
            <div class="form-group was-validated">
                <label class="form-label" for="email">Correo electronico</label>
                <input class="form-control" type="email" id="email" required>
                <div class="invalid-feedback">
                    Porfavor ingrese su correo electronico
                </div>
            </div>
         
            <div class="form-group was-validated">
                <label class="form-label" for="password">Contraseña</label>
                <input class="form-control" type="password" id="password" required>
                <div class="invalid-feedback">
                    Porfavor ingrese su contraseña
                </div>
            </div>
            <div class="form-group was-validated">
                <label class="form-label" for="password">Confirmar</label>
                <input class="form-control" type="password" id="confirm" required>
                <div class="invalid-feedback">
                    Porfavor confirme su contraseña
                </div>
            </div>
            <!-- <div class="form-group form-check">
                <input class="form-check-input" type="checkbox" id="check">
                <label class="form-check-label" for="check">Remember me</label>
            </div> -->
            <input class="btn btn-success w-100" type="submit" value="SIGN IN">
        </form>

    </div>

</body>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #002064;
}

.login {
    width: 360px;
    height: min-content;
    padding: 20px;
    border-radius: 12px;
    background: #fff;
}

.login h1 {
    font-size: 36px;
    margin-bottom: 25px;
}

.login form {
    font-size: 20px;
}

.login form .form-group {
    margin-bottom: 12px;
}

.login form input[type="submit"] {
    font-size: 20px;
    margin-top: 15px;
}
</style>
</html>