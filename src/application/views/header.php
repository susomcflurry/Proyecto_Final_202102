<?php
//Nombre de autor:Jesús Canga Galván
//Curso:2 DAW
//Escuela: Escuela Virgen de Guadalupe
//Proyecto fin de ciclo: Proyecto de Sistema de Gestión del Conocimiento
//Año:2021
echo '<script src="' . base_url() . 'js/main.js"></script>';
echo '<head>
			 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
			 <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@200&family=Manuale&family=Podkova&display=swap" rel="stylesheet">

</head>';
if (isset($_SESSION['loged'])) {
	echo '
		<div class="col-12" id="menu">
			<a  class="nav" href="' . base_url() . 'home"><span class="material-icons">home</span>Inicio</a>						
			<a class="nav" href="' . base_url() . 'estadisticas"><span class="material-icons">show_chart</span>Estadisticas</a>
			<a class="nav" href="' . base_url() . 'incidencias"><span class="material-icons">priority_high</span>Incidencias</a>
			<a class="nav" href="' . base_url() . 'historia"><span class="material-icons">search</span>Historia de la página</a>
			<a class="nav" href="' . base_url() . 'cerrarsesion" onclick="recargar(\'' . base_url() . 'home\')"><span class="material-icons">login</span>Cerrar sesión</a>
		</div>';
} else {
	echo '
		<div class="col-12" id="menu">
			<a  class="nav" href="' . base_url() . 'home"><span class="material-icons">home</span>Inicio</a>
			<a class="nav" href="' . base_url() . 'estadisticas"><span class="material-icons">show_chart</span>Estadisticas</a>
			<a class="nav" href="' . base_url() . 'incidencias"><span class="material-icons">priority_high</span>Incidencias</a>
			<a class="nav" href="' . base_url() . 'historia"><span class="material-icons">search</span>Historia de la página</a>
			<a class="nav" href="' . base_url() . 'registro"><span class="material-icons">emoji_people</span>Hazte miembro</a>
			<a class="nav" href="' . base_url() . 'logearse"><span class="material-icons">account_circle</span>Login</a>
		</div>
	';
}


?>
