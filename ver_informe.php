<?php

if (isset($_GET['inf'])) {
    include('plantillas/plantilla_paciente.php');
    include('conexion/conexion.php');
    cabecera("Informe");

    $idHistorial = $_GET['inf'];

    // Obtener los detalles del historial médico y la receta
    $query = "SELECT pacientes.nombre AS nombre_paciente, pacientes.apellidos AS apellidos_paciente, pacientes.dni AS dni_paciente, especialidades.nombre AS especialidad, historiales_medicos.fecha, historiales_medicos.diagnostico, historiales_medicos.tratamiento, recetas.medicamento, recetas.dosis, recetas.instrucciones
              FROM historiales_medicos
              JOIN pacientes ON historiales_medicos.dni_paciente = pacientes.dni
              JOIN recetas ON historiales_medicos.id = recetas.id_historial
              JOIN medicos ON historiales_medicos.dni_medico = medicos.dni
              JOIN especialidades ON medicos.cod_especi = especialidades.cod_espe
              WHERE historiales_medicos.id = :idHistorial";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(':idHistorial', $idHistorial);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Obtener los datos
        $nombrePaciente = $row['nombre_paciente'];
        $apellidosPaciente = $row['apellidos_paciente'];
        $dniPaciente = $row['dni_paciente'];
        $especialidad = $row['especialidad'];
        $fecha = $row['fecha'];
        $diagnostico = $row['diagnostico'];
        $tratamiento = $row['tratamiento'];
        $medicamento = $row['medicamento'];
        $dosis = $row['dosis'];
        $instrucciones = $row['instrucciones'];
    } else {
        echo "<div class='incorrecto'>No se encontró ningún historial médico con el ID especificado.</div>";
        exit;
    }

    ?>
    <form method="post">
    <label for="nombre">Nombre del paciente:</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo $nombrePaciente; ?>" readonly><br>

    <label for="apellidos">Apellidos del paciente:</label>
    <input type="text" id="apellidos" name="apellidos" value="<?php echo $apellidosPaciente; ?>" readonly><br>

    <label for="dni">DNI del paciente:</label>
    <input type="text" id="dni" name="dni" value="<?php echo $dniPaciente; ?>" readonly><br>

    <label for="especialidad">Especialidad:</label>
    <input type="text" id="especialidad" name="especialidad" value="<?php echo $especialidad; ?>" readonly><br>

    <label for="fecha">Fecha:</label>
    <input type="text" id="fecha" name="fecha" value="<?php echo $fecha; ?>" readonly><br>

    <label for="diagnostico">Diagnóstico:</label>
    <textarea id="diagnostico" name="diagnostico" readonly><?php echo $diagnostico; ?></textarea><br>

    <label for="tratamiento">Tratamiento:</label>
    <textarea id="tratamiento" name="tratamiento" readonly><?php echo $tratamiento; ?></textarea><br>

    <label for="medicamento">Medicamento:</label>
    <textarea id="medicamento" name="medicamento" readonly><?php echo $medicamento; ?></textarea><br>

    <label for="dosis">Dosis:</label>
    <textarea id="dosis" name="dosis" readonly><?php echo $dosis; ?></textarea><br>

    <label for="instrucciones">Instrucciones:</label>
    <textarea id="instrucciones" name="instrucciones" readonly><?php echo $instrucciones; ?></textarea><br>

</form>

<button onclick="location.href='historial.php';" class="bo_espe" >Volver</button>
    <?php
} else if (isset($_GET['info'])) {

    include('plantillas/plantilla_medico.php');
    include('conexion/conexion.php');
    cabecera("Informe");

    $idHistorial = $_GET['info'];

    // Obtener los detalles del historial médico y la receta
    $query = "SELECT pacientes.nombre AS nombre_paciente, pacientes.apellidos AS apellidos_paciente, pacientes.dni AS dni_paciente, especialidades.nombre AS especialidad, historiales_medicos.fecha, historiales_medicos.diagnostico, historiales_medicos.tratamiento, recetas.medicamento, recetas.dosis, recetas.instrucciones
              FROM historiales_medicos
              JOIN pacientes ON historiales_medicos.dni_paciente = pacientes.dni
              JOIN recetas ON historiales_medicos.id = recetas.id_historial
              JOIN medicos ON historiales_medicos.dni_medico = medicos.dni
              JOIN especialidades ON medicos.cod_especi = especialidades.cod_espe
              WHERE historiales_medicos.id = :idHistorial";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(':idHistorial', $idHistorial);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Obtener los datos
        $nombrePaciente = $row['nombre_paciente'];
        $apellidosPaciente = $row['apellidos_paciente'];
        $dniPaciente = $row['dni_paciente'];
        $especialidad = $row['especialidad'];
        $fecha = $row['fecha'];
        $diagnostico = $row['diagnostico'];
        $tratamiento = $row['tratamiento'];
        $medicamento = $row['medicamento'];
        $dosis = $row['dosis'];
        $instrucciones = $row['instrucciones'];
    } else {
        echo "<div class='incorrecto'>No se encontró ningún historial médico con el ID especificado.</div>";
        exit;
    }

    ?>
    <form method="post">
    <label for="nombre">Nombre del paciente:</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo $nombrePaciente; ?>" readonly><br>

    <label for="apellidos">Apellidos del paciente:</label>
    <input type="text" id="apellidos" name="apellidos" value="<?php echo $apellidosPaciente; ?>" readonly><br>

    <label for="dni">DNI del paciente:</label>
    <input type="text" id="dni" name="dni" value="<?php echo $dniPaciente; ?>" readonly><br>

    <label for="especialidad">Especialidad:</label>
    <input type="text" id="especialidad" name="especialidad" value="<?php echo $especialidad; ?>" readonly><br>

    <label for="fecha">Fecha:</label>
    <input type="text" id="fecha" name="fecha" value="<?php echo $fecha; ?>" readonly><br>

    <label for="diagnostico">Diagnóstico:</label>
    <textarea id="diagnostico" name="diagnostico" readonly><?php echo $diagnostico; ?></textarea><br>

    <label for="tratamiento">Tratamiento:</label>
    <textarea id="tratamiento" name="tratamiento" readonly><?php echo $tratamiento; ?></textarea><br>

    <label for="medicamento">Medicamento:</label>
    <textarea id="medicamento" name="medicamento" readonly><?php echo $medicamento; ?></textarea><br>

    <label for="dosis">Dosis:</label>
    <textarea id="dosis" name="dosis" readonly><?php echo $dosis; ?></textarea><br>

    <label for="instrucciones">Instrucciones:</label>
    <textarea id="instrucciones" name="instrucciones" readonly><?php echo $instrucciones; ?></textarea><br>

    </form>

    <button onclick="location.href='historial_medico.php';" class="bo_espe" >VOLVER</button>
    <?php
} else {
    echo "<div class='incorrecto'>No se ha especificado ningún ID de historial médico.</div>";
    exit;
}
?>
