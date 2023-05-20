<?php
session_start(); //Para indicar que funcione la session con la que se a registrado el usuario
?>

<?php
function cabecera ($titulo){
    echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Renax</title>
            <link rel="shortcut icon" href="img/logo-R.png">
            <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="css/estilos.css">
        </head>
        <body>
            <header>
                <div class="header__superior">
                    <div class="logo">
                        <img src="img/logo-R.png" alt="">
                    </div>
                    <div class="persona">
                        <ul>
                            <li><a href="#">';
    echo $_SESSION["nombre"]. " " .$_SESSION["apellidos"]/*. " " .$_SESSION["dni"]*/."▼";
    echo '
                                </a>
                                <ul>
                                    <li><a href="perfil.php">Perfil</a></li>
                                    <li><a href="controlador_cerrar.php" id="cerrar">Cerrar Sesion</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="container__menu">
                    <div class="menu">
                        <input type="checkbox" id="check__menu">
                        <label for="check__menu" id="label__check">
                            <i class="fas fa-bars icon__menu"></i>
                        </label>
                        <nav>
                            <ul>
                                <li><a href="inicio.php">Nuestro Centro</a></li>
                                <li><a href="especialidades.php">Especialidades</a></li>
                                <li><a href="#">Citas +</a>
                                    <ul>
                                        <li><a href="cita.php">Perdir Cita</a></li>
                                        <li><a href="ver_cita.php">Ver Citas</a></li>
                                    </ul>
                                </li>
                                <li><a href="historial.php">Historal Medico</a></li>
                                <li><a href="contactos.php">Contactos</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </header>
            <main>
                <div id="contenido">
                    <h1>'.$titulo.'</h1>
                    <br>
    ';
};
		
			
function pie(){
	echo '			
 
    </div>

</main>

</body>
</html>';
}

?>