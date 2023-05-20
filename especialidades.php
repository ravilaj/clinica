<?php
    include('plantillas/plantilla_paciente.php');
    cabecera("Especialidades");
?>


<article style="height: 550px; text-align: center;">

    <div class="prin" style="margin: 0 auto; width: 100%; text-align: center;">
        <a href="especialidad.php?esp=dermatologia" style="display: inline-block;">
        <div style="float: left; margin: 10px; padding: 10px;">
            <img src="img/dermatologia.webp" style="width: 400px; height: 175px; display: block;">
            <h4>Dermatología</h4>
        </div>
		</a>
        <a href="especialidad.php?esp=cardiologia" style="display: inline-block;">
        <div style="float: left; margin: 10px; padding: 10px;">
            <img src="img/cardiologia.webp" style="width: 400px; height: 175px; display: block;">
            <h4>Cardiología</h4>
        </div>
		</a>
		<a href="especialidad.php?esp=otorrinolaringologia" style="display: inline-block;">
        <div style="float: left; margin: 10px; padding: 10px;">
            <img src="img/otorrino.webp" style="width: 400px; height: 175px; display: block;">
            <h4>Otorrinolaringología</h4>
        </div>
		</a>
		<a href="especialidad.php?esp=alergologia" style="display: inline-block;">
        <div style="float: left; margin: 10px; padding: 10px;">
            <img src="img/alergias.webp" style="width: 400px; height: 175px; display: block;">
            <h4>Alergología</h4>
        </div>
		</a>
		<a href="especialidad.php?esp=nutricio" style="display: inline-block;">
        <div style="float: left; margin: 10px; padding: 10px;">
            <img src="img/nutricion.webp" style="width: 400px; height: 175px; display: block;">
            <h4>Nutrición</h4>
        </div>
		</a>
		<a href="especialidad.php?esp=pediatra" style="display: inline-block;">
        <div style="float: left; margin: 10px; padding: 10px;">
            <img src="img/pediatria.webp" style="width: 400px; height: 175px; display: block;">
            <h4>Pediatría</h4>
        </div>
		</a>
    </div>

</article>

<?php
pie();
?>