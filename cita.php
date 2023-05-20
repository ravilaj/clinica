<?php
include('plantillas/plantilla_paciente.php');
include('conexion/conexion.php');
cabecera("Solicitar una cita");

$paci = $conn->query("SELECT dni, nombre FROM pacientes WHERE nombre='{$_SESSION['nombre']}'");
$res = $paci->fetch();//En resul guardo el resulatdo de la select

$dni_pa= $res['dni'];

$sql_medicos = "SELECT dni, nombre FROM medicos";
$resultado_medicos = $conn->query($sql_medicos);



// Obtener la lista de especialidades
$sql_especialidades = "SELECT cod_espe, nombre FROM especialidades";
$resultado_especialidades = $conn->query($sql_especialidades);

/*
echo $dn;

print_r ($_SESSION);*/
?>


<form method="POST">
  <label for="especialidad">Especialidad:</label>
  <select id="especialidad" name="especialidad" required>
    <option value="">Selecciona una especialidad</option>
    <?php foreach ($resultado_especialidades as $especialidad) { ?>
      <option value="<?php echo $especialidad['nombre']; ?>"><?php echo $especialidad['nombre']; ?></option>
    <?php } ?>
  </select><br>

  <label for="fecha">Fecha:</label>
  <input type="date" id="fecha" name="fecha" required><br>

  <br>

  <label for="hora">Hora:</label>
<select id="hora" name="hora" required>
  <option value="">Selecciona una hora</option>
  <?php
  $horas = array('09:00', '10:00', '11:00', '12:00', '13:00', '16:00', '17:00', '18:00', '19:00', '20:00');
  foreach ($horas as $hora) {
    echo '<option value="' . $hora . '">' . $hora . '</option>';
  }
  ?>
</select>

<br>

<button type="submit">Enviar</button>

</form>

<?php
// Procesar el formulario cuando se envía
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// Verificar si todos los campos están completos
if (isset($_POST['fecha']) && isset($_POST['hora']) && isset($_POST['especialidad'])) {

  //Sacar el DNI del medico
  $medi = $conn->query("SELECT dni FROM medicos WHERE cod_especi=(SELECT cod_espe FROM especialidades WHERE nombre='" . $_POST['especialidad'] . "')");
  $re2 = $medi->fetch(); // En res2 guardo el resultado de la consulta

  if ($re2 !== false) {
    // Verificar si la cita ya existe para esa fecha y hora
    $stmt = $conn->prepare("SELECT * FROM citas WHERE fecha = ? AND hora = ? AND dni_medico = ?");
    $stmt->bindParam(1, $_POST['fecha']);
    $stmt->bindParam(2, $_POST['hora']);
    $stmt->bindParam(3, $re2['dni']);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) > 0) {
      // La cita ya existe para esa fecha y hora, mostrar un mensaje de error
      echo "<div class='incorrecto'>La cita ya existe para esa fecha y hora.</div>";
    } else {
      // La cita no existe para esa fecha y hora, insertar en la tabla de citas
      $fecha = $_POST['fecha'];
      $hora = $_POST['hora'];
      $dni_paciente = $_SESSION["dni"];
      $dni_medico = $re2['dni'];

      // Realizar la inserción en la tabla citas
      $sql = "INSERT INTO citas (fecha, hora, dni_paciente, dni_medico) VALUES (?,?,?,?)";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(1, $fecha);
      $stmt->bindParam(2, $hora);
      $stmt->bindParam(3, $dni_paciente);
      $stmt->bindParam(4, $dni_medico);
      $stmt->execute();

      echo "<div class='correcto'>Cita solicitada con éxito.</div>";
    }
  } else {
    echo "Lo sentimos, no hay médicos disponibles para la especialidad seleccionada.";
  }
} else {
  echo "<div class='incorrecto'>Por favor, complete todos los campos antes de enviar el formulario.</div>";
}
}
?>
