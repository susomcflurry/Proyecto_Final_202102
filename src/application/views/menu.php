<?php
//Nombre de autor:Jesús Canga Galván
//Curso:2 DAW
//Escuela: Escuela Virgen de Guadalupe
//Proyecto fin de ciclo: Proyecto de Sistema de Gestión del Conocimiento
//Año:2021
    echo '
    <header>
        <div class="row">
            <div class="col-6">
                 <img  src="'. base_url() .'img/download.jpg">
            </div>
            <div class="col-6 topnav">
                <ul>
                    <li><a href="' . base_url() . 'new"><span class="material-icons">note_add</span>Nuevo Recurso</a></li>
                    <li><a href="' . base_url() . 'home"><span class="material-icons">attachment</span>Mis Recursos</a></li>
                    <li><a href="' . base_url() . 'me"><span class="material-icons">account_box</span>Mi perfil</a></li>
                    <li><a href="' . base_url() . 'logout"><span class="material-icons">logout</span>Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
	</header>';

?>
