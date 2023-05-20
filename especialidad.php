<?php
include('plantillas/plantilla_paciente.php');

if ($_GET['esp']=='dermatologia'){
    cabecera("Dermatología");
    ?>
        <article>

            <h3>Los mejores especialistas en Dermatología</h3>
            <p>La piel es otro órgano a tener en cuenta que, normalmente, todo el mundo suele tener en el olvido y no cuenta como si fuera un órgano más.</p>
            <p>En clínica Renax, tenemos muy en cuenta el estado de tu piel por eso puedes contar con un plan de cuidado que te proporcionaremos en nuestra consulta especializada en dermatología para todo tipo de problemas y/o cuidados de todo para tu piel.</p>
            <br>
            <button onclick="location.href='cita.php';" class="bo_espe" >Pedir cita</button>

            
        </article>
    <?php
}else if ($_GET['esp']=='cardiologia') {
    cabecera("Cardiología");
    ?>
    <article>

        <h3>Diagnóstico Cardiovascular</h3>
        <p>El equipo técnico de Renax de cardiología es el responsable de realizar diagnósticos y tratamientos aplicables a las enfermedades cardiovasculares.</p>
        <p>Las enfermedades cardiovasculares, a pesar de los avances médicos producidos en los últimos años, siguen representando la principal causa de mortalidad en España y el resto de países occidentales, por encima incluso de crisis pandémica de la Covid-19. Es por esta razón que se vuelve vital un diagnóstico temprano y exacto para la realización de un tratamiento adecuado que evite este tipo de enfermedades.</p>
        <p>En Renax encontrarás un equipo multidisciplinar que tratará con la mayor profesionalidad y rigor cada patología, ofreciendo un trato personalizado a cada paciente.</p>
        <br>
        <button onclick="location.href='cita.php';" class="bo_espe" >Pedir cita</button>

        
    </article>
    <?php
}else if ($_GET['esp']=='otorrinolaringologia') {
    cabecera("Otorrinolaringología");
    ?>
    <article>

        <h3>Expertos en Otorrinolaringología</h3>
        <p>El servicio de otorrinolaringología de Renax se especializa en el estudio y el tratamiento de las enfermedades que afectan al aparato auditivo, como pueden ser las enfermedades auditivas, problemas del equilibrio, problemas de las vías respiratorias inferiores y superiores como puede ser la nariz o los senos paranasales.</p>
        <br>
        <button onclick="location.href='cita.php';" class="bo_espe" >Pedir cita</button>
        
    </article>
    <?php
}else if ($_GET['esp']=='alergologia') {
    cabecera("Alergología");
    ?>
    <article>
        <p>En área de alergología de la Clínica Renax, contarás con un equipo médico especialista a la hora de detectar todo tipo de alergias. Los expertos de Clínica Renax serán capaces de detectar cualquier tipo de alergia, y así,  ayudarte a anticiparte ante cualquier complicación, así que, si necesitas consultarnos no lo dudes más, visítanos.</p>
        <p>Ahora tu alergia puede ser tratada en Madrid, Clínica Renax ofrece un servicio avalado por expertos médicos que serán capaces de tratar cualquier tipo de síntoma de alergias. Además, la clínica se compromete a que los resultados médicos sean entregados a los pacientes en el plazo más rápido posible sea cual sea tu caso.</p>
        <p>Cuando hablamos de alergia nos referimos a la respuesta exagerada del sistema inmunitario, siguiendo un patrón de respuesta de hipersensibilidad, ante sustancias nocivas para casos concretos. Normalmente, cuando hablamos de sustancias nocivas, normalmente nos referimos a pólenes de algunas plantas, ácaros del polvo doméstico, pelos de animales, entre otros, elementos que para la mayoría de las personas resultan tolerables.</p>
        <p>Esta respuesta, normalmente se manifiesta con síntomas similares a los de un resfriado común, y/o inflamaciones de la piel, que pueden ser tratados en la mayoría de los casos con facilidad.</p>
        <br>
        <button onclick="location.href='cita.php';" class="bo_espe" >Pedir cita</button>
        
    </article>
    <?php
}else if ($_GET['esp']=='nutricio') {
    cabecera("Nutrición");
    ?>
    <article>

        <h3>Los mejores especialistas en Dermatología</h3>
        <p>Cuando hablamos de salud no nos gusta dejar las cosas al azar. En Renax comprendemos que cada cuerpo es un mundo y por tanto no vamos a reutilizar planes nutricionales de pacientes anteriores. Estamos comprometidos a ofrecer planes personalizados a cada uno de nuestros pacientes, que les aporte exactamente lo que necesitan en el momento presente.</p>
        <p>En Renax dispones de un servicio óptimo de nutrición, a través de una consulta inicial que incluye:</p>
        <p>- Una entrevista completa para evaluar el motivo de la consulta, los antecedentes médicos y el estilo de vida del paciente.</p>
        <p>- Una valoración de la composición corporal (bioimpedancia, medición de perímetros y pliegues, etc.).</p>
        <br>
        <p>Es fundamental que los pacientes tengan al alcance de la mano las soluciones que les proponemos. Por ello, siempre enviamos un correo electrónico con el plan de nutrición elaborado y los objetivos establecidos con el paciente.</p>
        <br>
        <h3>Todas las especialidades a tu alcance</h3>
        <p>En Renax disponemos de nutricionistas con las siguientes especialidades:</p>
        <br>
        <p>- Pérdida de peso: reducción de masa grasa de manera saludable y muy enfocado a las necesidades del paciente.</p>
        <p>- Nutrición deportiva: mejora de la composición corporal y mejora del rendimiento. Además, contamos con una densitometría, que proporcionará un estudio muy detallado de la composición corporal del paciente.</p>
        <p>- Alimentación vegetariana/vegana: ideal si quieres empezar una alimentación vegetariana o vegana.</p>
        <p>- Atención durante el embarazo: acompañamiento durante el embarazo, a través del programa BabbyHope.</p>
        <br>
        
        <button onclick="location.href='cita.php';" class="bo_espe" >Pedir cita</button>

        
    </article>
    <?php
}else if ($_GET['esp']=='pediatra') {
    cabecera("Pediatría");
    ?>
    <article>

    <h3>Expertos en Pediatría</h3>
    <p>El servicio de Renax en la especialidad de pediatría que trata la medicina enfocada a los más pequeños (desde bebés hasta la adolescencia), es uno de los campos donde más énfasis le ponemos. </p>
    <p>Al especializarnos en la medicina enfocada en la mujer y el embarazo, no podemos olvidar la salud de los más pequeños tras haber pasado el proceso de parto. </p>
    <p>La pediatría se extiende desde que nace el bebé hasta incluso los 18 años aunque no sea lo más común. Las fases más importantes de la pediatría están desde el nacimiento hasta la prepubertad.</p>
    <br>
    <button onclick="location.href='cita.php';" class="bo_espe" >Pedir cita</button>

    </article>
    <?php
}

?>

<?php
    pie();
?>