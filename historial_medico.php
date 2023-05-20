<?php
    include('plantillas/plantilla_medico.php');
    include('conexion/conexion.php');
    cabecera("Historiales medicos");

    if($_SERVER['REQUEST_METHOD']=='POST'){ //Cuando se haga una peticion POST es decir cuando le demos a un botton
        $dni=$_POST['dni'];
    }else{
        $dni="";
    }
    
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    
        $sql_recetas = "DELETE FROM recetas WHERE id_historial = $id";
        $sql_historiales = "DELETE FROM historiales_medicos WHERE id = $id";
    
        $conn->query($sql_recetas);
        $conn->query($sql_historiales);
    
        echo "<div class='correcto'>Borrado</div>";
    }
    
    ?>
    
    <form name="miForm" method="post"> <!-- Pongo el nombre del formulario "miForm" le indico que cuando se envie el formulario te envie a la pagina "borrar.php" al ser la misma hace la funcion de recargar la pagina y le digo que cuando envie sea por el metedo POST -->
    
        
    <label for="cat">Buscar Paciente:</label>
    <input type="text" id="dni" name="dni" <?php if (isset($_GET['his'])){
        
        $pacien = $conn->query("SELECT pacientes.* FROM pacientes JOIN citas ON pacientes.dni = citas.dni_paciente WHERE citas.id = ".$_GET['his']."");
        $pa1 = $pacien->fetch(); // En res2 guardo el resultado de la consulta
        echo "value='".$pa1['dni']."'"; }?>><br>
    
    <input type="submit" name="actu" value="Actualizar" /> <!-- Este boton manda a la pagina que pone el formulario arriba pero al ser la misma en donde esta el formulario lo que hace es recargar la pagina-->
    </form>
    
    
    <table><!-- Creamos una tabla con 3 columnas -->
        <tr>
            <th>Nombre Paciente</th>
            <th>DNI Paciente</th>
            <th>Especialidades</th>
            <th>Fecha consulta</th>
            <th></th>
        </tr>
    
        <?php
            if($dni=="") { //Si la variable $dni esta VACIA el valor que recojera la variable $dni_sel sera VACIA
                $dni_sel = "";
            }else{ //Si la variable $dni NO esta VACIA y tiene un valor como promociones, costas o ofertas en la variable $dni_sel guardara el siguiente valor:
                $dni_sel ="WHERE dni_paciente = '".$dni."'"; //Guardo esta linea por lo siguiente:
            }
    
            foreach ($conn->query("SELECT historiales_medicos.id AS id, pacientes.nombre AS nombre, historiales_medicos.dni_paciente AS dni, especialidades.nombre AS espe, historiales_medicos.fecha AS fecha FROM pacientes JOIN historiales_medicos ON pacientes.dni = historiales_medicos.dni_paciente JOIN medicos ON historiales_medicos.dni_medico = medicos.dni JOIN especialidades ON medicos.cod_especi = especialidades.cod_espe $dni_sel") as $a){ 

        ?>
        <tr>
            <td><?php echo $a['nombre'] ?></td>
            <td><?php echo $a['dni'] ?></td>
            <td><?php echo $a['espe'] ?></td>
            <td><?php echo $a['fecha'] ?></td>
            <td><a href="ver_informe.php?info=<?php echo $a['id'];?>">Ver Informe</a></td>
            <td><a href="historial_medico.php?id=<?php echo $a['id']; ?>">Borrar</a></td>
        </tr>
    <?php		
        }
    ?>    
    </table>
    <?
    pie();
    ?> 
