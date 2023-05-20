<?php  
session_start();

if (!empty($_POST["botoniniciar"])) {
    if (empty($_POST["email"]) && empty($_POST["password"])) {
        echo "<div style='background-color: #FF8A8A; color: #A80000;'>Algunos de los campos están vacíos</div>";
    } else {
        $correo = $_POST["email"];
        $pass = $_POST["password"];

        // Preparar y ejecutar consulta SQL para recuperar el hash de la contraseña del paciente
        $sq_paciente = $conn->prepare("SELECT contraseña FROM pacientes WHERE email = :correo");
        $sq_paciente->bindParam(':correo', $correo);
        $sq_paciente->execute();
        $hash_paciente = $sq_paciente->fetchColumn();

        // Preparar y ejecutar consulta SQL para recuperar el hash de la contraseña del médico
        $sq_medico = $conn->prepare("SELECT contraseña FROM medicos WHERE email = :correo");
        $sq_medico->bindParam(':correo', $correo);
        $sq_medico->execute();
        $hash_medico = $sq_medico->fetchColumn();

        // Verificar si la contraseña ingresada coincide con el hash recuperado
        if (password_verify($pass, $hash_paciente)) {
            // Inicio de sesión exitoso para el paciente
            $sql = $conn->query("SELECT * FROM pacientes WHERE email='$correo' AND contraseña='$hash_paciente'");
            $resul = $sql->fetch();
        
            if (isset($resul)) {
                $_SESSION["nombre"] = $resul['nombre'];
                $_SESSION["apellidos"] = $resul['apellidos'];
                $_SESSION["dni"] = $resul['dni']; 
                header("location: inicio.php");
            }
        } elseif (password_verify($pass, $hash_medico)) {
            // Inicio de sesión exitoso para el médico
            $sql2 = $conn->query("SELECT * FROM medicos WHERE email='$correo' AND contraseña='$hash_medico'");
            $resul2 = $sql2->fetch();
        
            if (isset($resul2)) {
                $_SESSION["nombre"] = $resul2['nombre'];
                $_SESSION["apellidos"] = $resul2['apellido']; 
                $_SESSION["dni"] = $resul2['dni'];
                header("location: inicio_medico.php");
            }
        } else {
            // Contraseña incorrecta
            echo "<div style='background-color: #FF8A8A; color: #A80000; padding: 20px; text-align: center; margin: 10px;'>El correo electrónico o contraseña no es correcto</div>";
        }
    }
}

?>
