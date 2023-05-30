<?php
include('plantillas/plantilla_paciente.php');
include('conexion/conexion.php');
cabecera("Mis citas");

// Obtener la fecha actual
$fechaActual = date("Y-m-d");

if(isset($_GET['id'])){ //Si existe el parámetro "id" en la URL haz lo siguiente:
        $id=$_GET['id']; //guarda en $id el contenido del parametro id que esta en la URL
        $sql="DELETE FROM citas WHERE id=$id"; //Borramos de la tabla noticias la fila que tenga el id que esta guardado en $id
        $conn->query($sql); //Aqui le digo que se haga en la base de datos el DELETE
        echo "<div class='correcto'>Borrada</div>";
}

// Mostrar tabla de citas futuras
echo '<h2>Citas futuras</h2>';
echo '<table>';
echo '<tr>';
echo '<th>Especialidad</th>';
echo '<th>Fecha</th>';
echo '<th>Hora</th>';
echo '<th> </th>';
echo '</tr>';

$sql2 = "SELECT c.id AS id, c.fecha AS fecha, c.hora AS hora, e.nombre AS especialidad 
         FROM citas c JOIN medicos m ON c.dni_medico = m.dni JOIN especialidades e ON m.cod_especi = e.cod_espe 
         WHERE c.dni_paciente='".$_SESSION["dni"]."' AND c.fecha >= '$fechaActual'";
$resultado = $conn->query($sql2);


foreach ($resultado as $row) {
  echo "<tr>";
  echo "<td>".$row['especialidad']."</td>";
  echo "<td>".$row['fecha']."</td>";
  echo "<td>".$row['hora']."</td>";
  ?>
  <td><a href="ver_cita.php?id='<?php echo $row['id'];?>'">Borrar</a></td>
  <?php
  echo "</tr>";
}
echo '</table>';

// Mostrar tabla de citas anteriores
echo '<h2>Citas anteriores</h2>';
echo '<table>';
echo '<tr>';
echo '<th>Especialidad</th>';
echo '<th>Fecha</th>';
echo '<th>Hora</th>';
echo '</tr>';

$sql3 = "SELECT c.id AS id, c.fecha AS fecha, c.hora AS hora, e.nombre AS especialidad 
         FROM citas c JOIN medicos m ON c.dni_medico = m.dni JOIN especialidades e ON m.cod_especi = e.cod_espe 
         WHERE c.dni_paciente='".$_SESSION["dni"]."' AND c.fecha < '$fechaActual'";
$resultado2 = $conn->query($sql3);

foreach ($resultado2 as $row) {
  echo "<tr>";
  echo "<td>".$row['especialidad']."</td>";
  echo "<td>".$row['fecha']."</td>";
  echo "<td>".$row['hora']."</td>";
  echo "</tr>";
}
echo '</table>';

?>

<?php
    pie();
?>
