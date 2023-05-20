<?php
    include('plantillas/plantilla_paciente.php');
    include('conexion/conexion.php');
    cabecera("Historiales medicos");

// Mostrar los resultados en una tabla
echo '<table>';
echo '<tr>';
echo '<th>Nombre</th>';
echo '<th>DNI</th>';
echo '<th>Especialidad</th>';
echo '<th>Fecha</th>';
echo '<th>Ver informe</th>';
echo '</tr>';

$sql2 = "SELECT historiales_medicos.id AS id, pacientes.nombre AS nombre, historiales_medicos.dni_paciente AS dni, especialidades.nombre AS espe, historiales_medicos.fecha AS fecha FROM pacientes JOIN historiales_medicos ON pacientes.dni = historiales_medicos.dni_paciente JOIN medicos ON historiales_medicos.dni_medico = medicos.dni JOIN especialidades ON medicos.cod_especi = especialidades.cod_espe WHERE dni_paciente = '".$_SESSION['dni']."'";
$resultado = $conn->query($sql2);

foreach ($resultado as $row) {
  echo "<tr>";
  echo "<td>".$row['nombre']."</td>";
  echo "<td>".$row['dni']."</td>";
  echo "<td>".$row['espe']."</td>";
  echo "<td>".$row['fecha']."</td>";
  ?>
  <td><a href="ver_informe.php?inf=<?php echo $row['id'];?>">Ver Informe</a></td>

  <?php
  echo "</tr>";
}
echo '</table>';

?>

<?php
    pie();
?>
