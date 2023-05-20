<?php
    include('plantillas/plantilla_medico.php');
    include('conexion/conexion.php');
    cabecera("Crear Informe");

if (isset($_GET['id'])){

    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        $pacien = $conn->query("SELECT pacientes.dni AS dni FROM pacientes JOIN citas ON pacientes.dni = citas.dni_paciente WHERE citas.id ='".$_GET["id"]."'");
        $pa2 = $pacien->fetch(); // En res2 guardo el resultado de la consulta

        // Obtener los datos enviados por el formulario
        $diagnostico = $_POST['diagnostico'];
        $tratamiento = $_POST['tratamiento'];
        $medicamento = $_POST['medicamento'];
        $dosis = $_POST['dosis'];
        $instrucciones = $_POST['instrucciones'];
    
        // Insertar los datos en la tabla "historiales_Medicos"
        $sqlHistorial = $conn->prepare("INSERT INTO historiales_medicos (dni_paciente, dni_medico, fecha, diagnostico, tratamiento) VALUES (:dni_paciente, :dni_medico, NOW(), :diagnostico, :tratamiento)");
        $sqlHistorial->bindParam(':dni_paciente', $pa2['dni']);
        $sqlHistorial->bindParam(':dni_medico', $_SESSION['dni']);
        $sqlHistorial->bindParam(':diagnostico', $diagnostico);
        $sqlHistorial->bindParam(':tratamiento', $tratamiento);
        $sqlHistorial->execute();
    
        // Obtener el ID del historial insertado
        $idHistorial = $conn->lastInsertId();
    
        // Insertar los datos en la tabla "recetas"
        $sqlReceta = $conn->prepare("INSERT INTO recetas (id_historial, medicamento, dosis, instrucciones) VALUES (:id_historial, :medicamento, :dosis, :instrucciones)");
        $sqlReceta->bindParam(':id_historial', $idHistorial);
        $sqlReceta->bindParam(':medicamento', $medicamento);
        $sqlReceta->bindParam(':dosis', $dosis);
        $sqlReceta->bindParam(':instrucciones', $instrucciones);
        $sqlReceta->execute();

        echo "<div class='correcto'>Cita solicitada con éxito.</div>";
    

    }

    ?>
    <form method="post">

        <?php
            $pacien = $conn->query("SELECT pacientes.* FROM pacientes JOIN citas ON pacientes.dni = citas.dni_paciente WHERE citas.id ='".$_GET["id"]."'");
            $pa1 = $pacien->fetch(); // En res2 guardo el resultado de la consulta
        ?>
        
        <label for="nombre">DNI Paciente:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $pa1['dni']; ?>" required><br>
    
        <label for="fecha_consulta">Fecha de consulta:</label>
        <input type="datetime-local" id="fecha_consulta" name="fecha_consulta" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly><br>

        <!-- Campos del historial médico -->
        <label for="diagnostico">Diagnóstico:</label>
        <textarea name="diagnostico" id="diagnostico"></textarea>

        <label for="tratamiento">Tratamiento:</label>
        <textarea name="tratamiento" id="tratamiento"></textarea>

        <!-- Campos de la receta -->
        <label for="medicamento">Medicamento:</label>
        <textarea name="medicamento" id="medicamento"></textarea>

        <label for="dosis">Dosis:</label>
        <textarea name="dosis" id="dosis"></textarea>

        <label for="instrucciones">Instrucciones:</label>
        <textarea name="instrucciones" id="instrucciones"></textarea>
        <br>
    
        <input type="submit" value="Guardar">
    </form>
    <?php

} else{ //Por si vienen de Urgencias y no han pedido cita
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        // Obtener el DNI del paciente ingresado
        $dni_paciente = $_POST['dni'];

        // Verificar si el DNI existe en la tabla "pacientes"
        $verificarDNI = $conn->prepare("SELECT dni FROM pacientes WHERE dni = :dni");
        $verificarDNI->bindParam(':dni', $dni_paciente);
        $verificarDNI->execute();

        if ($verificarDNI->rowCount() > 0) {

            // Obtener los datos enviados por el formulario
            $dni_paciente = $_POST['dni'];
            $diagnostico = $_POST['diagnostico'];
            $tratamiento = $_POST['tratamiento'];
            $medicamento = $_POST['medicamento'];
            $dosis = $_POST['dosis'];
            $instrucciones = $_POST['instrucciones'];
    
            // Insertar los datos en la tabla "historiales_Medicos"
            $sqlHistorial = $conn->prepare("INSERT INTO historiales_medicos (dni_paciente, dni_medico, fecha, diagnostico, tratamiento) VALUES (:dni_paciente, :dni_medico, NOW(), :diagnostico, :tratamiento)");
            $sqlHistorial->bindParam(':dni_paciente', $dni_paciente);
            $sqlHistorial->bindParam(':dni_medico', $_SESSION['dni']);
            $sqlHistorial->bindParam(':diagnostico', $diagnostico);
            $sqlHistorial->bindParam(':tratamiento', $tratamiento);
            $sqlHistorial->execute();
    
            // Obtener el ID del historial insertado
            $idHistorial = $conn->lastInsertId();
    
            // Insertar los datos en la tabla "recetas"
            $sqlReceta = $conn->prepare("INSERT INTO recetas (id_historial, medicamento, dosis, instrucciones) VALUES (:id_historial, :medicamento, :dosis, :instrucciones)");
            $sqlReceta->bindParam(':id_historial', $idHistorial);
            $sqlReceta->bindParam(':medicamento', $medicamento);
            $sqlReceta->bindParam(':dosis', $dosis);
            $sqlReceta->bindParam(':instrucciones', $instrucciones);
            $sqlReceta->execute();

            echo "<div class='correcto'>Cita solicitada con éxito.</div>";
        } else {
            // El DNI no existe, muestra mensaje de error
            echo "<div class='incorrecto'>El DNI ingresado no existe en la base de datos.</div>";
        }
    

    }
    ?>
     <form method="post">


        <label for="nombre">DNI Paciente:</label>
        <input type="text" id="dni" name="dni" required><br>

        <label for="fecha_consulta">Fecha de consulta:</label>
        <input type="datetime-local" id="fecha_consulta" name="fecha_consulta" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly><br>

        <!-- Campos del historial médico -->
        <label for="diagnostico">Diagnóstico:</label>
        <textarea name="diagnostico" id="diagnostico"></textarea>

        <label for="tratamiento">Tratamiento:</label>
        <textarea name="tratamiento" id="tratamiento"></textarea>

        <!-- Campos de la receta -->
        <label for="medicamento">Medicamento:</label>
        <textarea name="medicamento" id="medicamento"></textarea>

        <label for="dosis">Dosis:</label>
        <textarea name="dosis" id="dosis"></textarea>

        <label for="instrucciones">Instrucciones:</label>
        <textarea name="instrucciones" id="instrucciones"></textarea>
        <br>

        <input type="submit" value="Guardar">
    </form>
    <?php
}
?>
