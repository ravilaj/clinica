<?php
include('plantillas/plantilla_paciente.php');
include('conexion/conexion.php');
cabecera("Perfil");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $dni = $_POST["dni"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $genero = $_POST["genero"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
  
    $query = "UPDATE pacientes SET nombre='$nombre', apellidos='$apellidos', fecha_nacimiento='$fecha_nacimiento', genero='$genero', direccion='$direccion', telefono='$telefono', email='$email' WHERE dni='".$_SESSION["dni"]."'";
  
    if ($conn->query($query) == TRUE) {
      echo "<div class='correcto'>Datos actualizados correctamente</div>";
    } else {
        $error = $conn->errorInfo();
        echo "<div class='incorrecto'>Error al actualizar los datos: " . $error[2]. "</div";
    }
  }

?>

    <div class="formulario">
        <form id="registration-form" onsubmit="return validateForm()" method="post">

        <?php
            $pacien = $conn->query("SELECT * FROM pacientes where dni='".$_SESSION["dni"]."'");
            $pa1 = $pacien->fetch(); // En res2 guardo el resultado de la consulta
        ?>
            <label>Nombre</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $pa1['nombre']; ?>" >

            <!-- el span es lo que saca el error javascript-->
            <span id="nombre-error"></span>
            
            <label>Apellido</label>
            <input type="text" name="apellidos" id="apellido" value="<?php echo $pa1['apellidos']; ?>">

            <span id="apellido-error"></span>
            
            <label>DNI</label>
            <input type="text" name="dni" id="dni" pattern="[0-9]{8}[A-Za-z]{1}" value="<?php echo $pa1['dni']; ?>">

            <span id="dni-error"></span>

            <label>Fecha Nacimiento: </label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $pa1['fecha_nacimiento']; ?>"><br>

            <span id="fecha-error"></span>

            <label for="genero">Sexo: </label>
            <select id="genero" name="genero">
                <?php
                    $genero = $pa1['genero']; // valor guardado en la BD
                    $opciones = array('Hombre', 'Mujer', 'Otro'); // opciones del desplegable
                    foreach ($opciones as $opcion) {
                        if ($opcion != $genero) { // si la opción no es igual al valor guardado
                           echo '<option value="' . $opcion . '">' . $opcion . '</option>';
                        }   
                    }
                ?>
                <option value="<?php echo $genero; ?>" selected><?php echo $genero; ?></option>
            </select>

            <span id="genero-error"></span>
            
            <label>Direccion</label>
            <input type="text" name="direccion" id="direccion" value="<?php echo $pa1['direccion']; ?>">

            <span id="direccion-error"></span>
            
            <label>Telefono</label>
            <input type="text" name="telefono" id="telefono" pattern="[0-9]{9}" value="<?php echo $pa1['telefono']; ?>">

            <span id="telefono-error"></span>
            
            <label>email</label>
            <input type="text" name="email" id="email" value="<?php echo $pa1['email']; ?>"> <br>

            <span id="correo-error"></span>

            <input type="submit" id="bo-envi" name="botonregistro" value="Enviar">

        </form>
    </div>
