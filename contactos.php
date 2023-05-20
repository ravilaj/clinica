<?php
    include('plantillas/plantilla_paciente.php');
    cabecera("Nuestro Centro");
?>
    <div class="contactos">
        <div class="text">
            <div class="text-content">
                <div class="footer-section">
                    <h3>Contacto</h3>
                    <p>123 Calle Falsa</p>
                    <p>Ciudad, Estado 12345</p>
                    <p>correo@renax.com</p>
                    <p>555-555-5555</p>
                </div>
                <div class="footer-section">
                    <h3>Horario</h3>
                    <p>Lunes - Viernes: 9am - 6pm</p>
                    <p>Sábados: 10am - 4pm</p>
                    <p>Domingos: Cerrado</p>
                </div>
                <div class="footer-section">
                    <h3>Redes Sociales</h3>
                    <ul>
                        <li><a href="#"><img src='img/Facebook.png' alt="Facebook"></a></li>
                        <li><a href="#"><img src='img/twitter.png' alt="Twitter"></a></li>
                        <li><a href="#"><img src='img/insta.png' alt="Instagram"></a></li>
                        <li><a href="#"><img src='img/linkedin.png' alt="LinkedIn"></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3034.900615459284!2d-3.6540640249569734!3d40.477463651942145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd422eb792599fd3%3A0xc4360953fbd1af89!2sIES%20Rosa%20Chacel!5e0!3m2!1ses!2ses!4v1684334374530!5m2!1ses!2ses" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <?php
    pie();
?>