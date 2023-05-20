<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width-device-width, initial-scale-1.0">
    <title>Inicio Sesion</title>
    <link rel="shortcut icon" href="img/logo-R.png">
    <link rel="stylesheet" href="css/style_lo.css">

</head>
<body>
    <div class="formulario">
        <h1>Inicio de sesion</h1>
        <form method="post">
            <?php
                include("conexion/conexion.php");
                include("controlador.php");
            ?>
            <div class="recuadro">
                <input type="text" name="email" required>
                <label>Correo electronico</label>
            </div>
            <div class="recuadro">
                <input type="password" name="password" required>
                <label>Contraseña</label>
            </div>
            <input type="submit" name="botoniniciar" value="INICIAR SESION">
            <div class="registrarse">Quiero hacer el <a href="registro.php">registro</a></div>
        </form>
    </div>
</body>
</html>