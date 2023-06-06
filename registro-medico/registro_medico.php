<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width-device-width, initial-scale-1.0">
    <title>Registro medicos</title>
    <link rel="shortcut icon" href="img/logo-R.png">
    <link rel="stylesheet" href="../css/style_lo.css">
    <script src="../co.js"></script>
    

</head>
<body>
    <div class="formulario">
        <h1>Registro Medicos</h1>
        <form id="registro-form_me" onsubmit="return validaForm()" method="post">
            <?php
                include("../conexion/conexion.php");
                include("../controlador_registrar.php");
            ?>
            <div class="recuadro">
                <input type="text" name="nombre" id="nombre" >
                <label>Nombre</label>
            </div>
            <!-- el span es lo que saca el error javascript-->
            <span id="nombre-error"></span>
            <div class="recuadro">
                <input type="text" name="apellidos" id="apellido" >
                <label>Apellido</label>
            </div>
            <span id="apellido-error"></span>
            <div class="recuadro">
                <input type="text" name="dni" id="dni" pattern="[0-9]{8}[A-Za-z]{1}" >
                <label>DNI</label>
            </div>
            <span id="dni-error"></span>
            
            <?php
            // Obtener la lista de especialidades
            $sql_especialidades = "SELECT cod_espe, nombre FROM especialidades";
            $resultado_especialidades = $conn->query($sql_especialidades);
            ?>

            <div class="recuadro_espe">
                <label for="especialidad">Especialidad:</label>
                <select id="especialidad" name="especialidad" >
                    <option value="">Selecciona una especialidad</option>
                    <?php foreach ($resultado_especialidades as $especialidad) { ?>
                    <option value="<?php echo $especialidad['cod_espe']; ?>"><?php echo $especialidad['nombre']. " ". $especialidad['cod_espe']; ?></option>
                    <?php } ?>
                </select>
            </div><br>
            <span id="especialidad-error"></span>

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
            <input type="submit" name="botonregistro_me" value="Enviar">
            <div class="registrarse"><a href="../login.php">VOLVER</a></div>
        </form>
    </div>
</body>
</html>
