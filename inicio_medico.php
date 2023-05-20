<?php
    include('plantillas/plantilla_medico.php');
    include('conexion/conexion.php');
    cabecera("Citas de hoy");

if(isset($_GET['id'])){ //Si existe el parámetro "id" en la URL haz lo siguiente:
	$id=$_GET['id']; //guarda en $id el contenido del parametro id que esta en la URL
	$sql="DELETE FROM citas WHERE id=$id"; //Borramos de la tabla noticias la fila que tenga el id que esta guardado en $id
	$conn->query($sql); //Aqui le digo que se haga en la base de datos el DELETE
	echo "<div class='correcto'>Borrada</div>";
}

// Mostrar los resultados en una tabla
echo '<table>';
echo '<tr>';
echo '<th>Nombre paciente</th>';
echo '<th>DNI paciente</th>';
echo '<th>Especialidad</th>';
echo '<th>Fecha</th>';
echo '<th>Hora</th>';
echo '<th> </th>';
echo '<th> </th>';
echo '<th> </th>';
echo '</tr>';

$sql2 = "SELECT citas.id AS id, pacientes.nombre AS nombre, citas.dni_paciente AS dni, especialidades.nombre AS espe, citas.fecha AS fecha, citas.hora AS hora FROM pacientes JOIN citas ON pacientes.dni = citas.dni_paciente JOIN medicos ON citas.dni_medico = medicos.dni JOIN especialidades ON medicos.cod_especi = especialidades.cod_espe WHERE medicos.cod_especi = (SELECT cod_especi from medicos where dni='".$_SESSION["dni"]."') AND citas.fecha = CURDATE()";
/*no se puede hacer con natural join porque la tabla medico y especialidades tienen campos que se llaman igual "nombre"*/ /*El AND citas.fecha = CURDATE() es para que vean solo los de la fecha de hoy */
$resultado = $conn->query($sql2);

foreach ($resultado as $row) {
  echo "<tr>";
  echo "<td>".$row['nombre']."</td>";
  echo "<td>".$row['dni']."</td>";
  echo "<td>".$row['espe']."</td>";
  echo "<td>".$row['fecha']."</td>";
  echo "<td>".$row['hora']."</td>";
  ?>
  <td><a href="informe.php?id=<?php echo $row['id'];?>">Crear Informe</a></td>
  <td><a href="historial_medico.php?his='<?php echo $row['id'];?>'">Ver Historial</a></td>
  <td><a href="inicio_medico.php?id=<?php echo $row['id']; ?>">Borrar</a></td>

  <?php
  echo "</tr>";
}
echo '</table>';
?>

<?php
    pie();
?>


