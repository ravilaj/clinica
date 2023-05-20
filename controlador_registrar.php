<?php  

if  (!empty($_POST["botonregistro_pa"])){
    if (empty($_POST["nombre"]) AND empty($_POST["apellidos"]) AND empty($_POST["dni"]) AND empty($_POST["fecha_nacimiento"]) AND empty($_POST["direccion"]) AND empty($_POST["telefono"]) AND empty($_POST["email"]) AND empty($_POST["password"])) {
        echo "<div style='background-color: #FF8A8A; color: #A80000;'>Algunos de los campos estan vacios</div>";
    } else {

        $nombre=$_POST["nombre"];
        $apellidos=$_POST["apellidos"];
        $dni=$_POST["dni"];
        $fecha_na=$_POST["fecha_nacimiento"];
        $genero=$_POST["genero"];
        $direccion=$_POST["direccion"];
        $telefono=$_POST["telefono"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Preparar y ejecutar consulta SQL
        $insertar= $conn->prepare('INSERT INTO pacientes (nombre, apellidos, dni, fecha_nacimiento, genero, direccion, telefono, email, contraseña) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $insertar->bindParam(1,$nombre); // El 1 es para indicar que es la 1º interrogacion (?) del value del INSERT de arriba
        $insertar->bindParam(2,$apellidos); // El 2 es para indicar que es la 2º interrogacion (?) del value del INSERT de arriba
        $insertar->bindParam(3,$dni);
        $insertar->bindParam(4,$fecha_na);
        $insertar->bindParam(5,$genero);
        $insertar->bindParam(6,$direccion);
        $insertar->bindParam(7,$telefono);
        $insertar->bindParam(8,$email);
        $insertar->bindParam(9,$hash);
        $insertar->execute(); //Ejecutamos el INSERT

        // Redirigir al usuario a la página de informes
        header("Location: login.php");
    }

    
} else if  (!empty($_POST["botonregistro_me"])){
    if (empty($_POST["nombre"]) AND empty($_POST["apellidos"]) AND empty($_POST["dni"]) AND empty($_POST["especialidad"]) AND empty($_POST["telefono"]) AND empty($_POST["email"]) AND empty($_POST["password"])) {
        echo "<div style='background-color: #FF8A8A; color: #A80000;'>Algunos de los campos estan vacios</div>";
    } else {

        $nombre=$_POST["nombre"];
        $apellidos=$_POST["apellidos"];
        $dni=$_POST["dni"];
        $especialidad=$_POST["especialidad"];
        $telefono=$_POST["telefono"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Preparar y ejecutar consulta SQL
        $insertar= $conn->prepare('INSERT INTO medicos (nombre, apellido, dni, cod_especi, telefono, email, contraseña) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $insertar->bindParam(1,$nombre); // El 1 es para indicar que es la 1º interrogacion (?) del value del INSERT de arriba
        $insertar->bindParam(2,$apellidos); // El 2 es para indicar que es la 2º interrogacion (?) del value del INSERT de arriba
        $insertar->bindParam(3,$dni);
        $insertar->bindParam(4,$especialidad);
        $insertar->bindParam(5,$telefono);
        $insertar->bindParam(6,$email);
        $insertar->bindParam(7,$hash);
        $insertar->execute(); //Ejecutamos el INSERT

        // Redirigir al usuario a la página de informes
        header("Location:../login.php");
    }

    
}


?>
