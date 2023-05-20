<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width-device-width, initial-scale-1.0">
    <title>Registro</title>
    <link rel="shortcut icon" href="img/logo-R.png">
    <link rel="stylesheet" href="css/style_lo.css">
    <script src="javascript/co.js"></script>
    

</head>
<body>
    <div class="formulario">
        <h1>Registro</h1>
        <form id="registration-form" onsubmit="return validateForm()" method="post">
            <?php
                include("conexion/conexion.php");
                include("controlador_registrar.php");
            ?>
            <div class="recuadro">
                <input type="text" name="nombre" id="nombre" >
                <label>Nombre</label>
            </div>
            <!-- el span es lo que saca el error javascript-->
            <span id="nombre-error"></span>
            <div class="recuadro">
                <input type="text" name="apellidos" id="apellidos" >
                <label>Apellido</label>
            </div>
            <span id="apellido-error"></span>
            <div class="recuadro">
                <input type="text" name="dni" id="dni" pattern="[0-9]{8}[A-Za-z]{1}" >
                <label>DNI</label>
            </div>
            <span id="dni-error"></span>
            <div class="recuadro_fecha">
                <label>Fecha Nacimiento: </label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" ><br>
            </div>
            <span id="fecha-error"></span>
            <div class="recuadro_sexo">
                <label for="genero">Sexo: </label>
                <select id="genero" name="genero">
                    <option value=""> - </option>
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
            <span id="genero-error"></span>
            <div class="recuadro">
                <input type="text" name="direccion" id="direccion" >
                <label>Direccion</label>
            </div>
            <span id="direccion-error"></span>
            <div class="recuadro">
                <input type="text" name="telefono" id="telefono" pattern="[0-9]{9}" >
                <label>Telefono</label>
            </div>
            <span id="telefono-error"></span>
            <div class="recuadro">
                <input type="text" name="email" id="email" >
                <label>Correo electronico</label>
            </div>
            <span id="correo-error"></span>
            <div class="recuadro">
                <input type="password" name="password" id="password">
                <label>Contraseña</label>
            </div>
            <span id="correo-error"></span>
            <input type="submit" name="botonregistro_pa" value="Enviar">
            <div class="registrarse"><a href="login.php">VOLVER</a></div>
        </form>
    </div>
</body>
</html>