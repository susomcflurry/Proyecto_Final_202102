<?php
//Nombre de autor:Jesús Canga Galván
//Curso:2 DAW
//Escuela: Escuela Virgen de Guadalupe
//Proyecto fin de ciclo: Proyecto de Sistema de Gestión del Conocimiento
//Año:2021
    echo '
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @media (max-width: 700px) {
            body > header > div > div.col-md-4.col-sm-0.bye{
                display: none !important;
            }
            body > header > div > div.col-md-8.col-sm-12.topnav > ul > li > a{
                padding: 0 1% !important;
                font-size: 12px !important;
            }
        }
    </style>
    <header>
        <div class="row">
            <div class="col-md-4 col-sm-0 bye">
                 <img  alt="Imagen fundacxion loyola"  src="'. base_url() .'img/download.jpg">
            </div>
            <div class="col-md-8 col-sm-12 topnav">
                <ul>
                    <li><a href="' . base_url() . '"><span class="material-icons">search</span>Buscar recurso</a></li>
                    <li><a href="' . base_url() . 'new"><span class="material-icons">note_add</span>Nuevo Recurso</a></li>
                    <li><a href="' . base_url() . 'me"><span class="material-icons">attachment</span>Mis Recursos</a></li>
                    <li><a href="' . base_url() . 'logout"><span class="material-icons">logout</span>Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
	</header>';

?>
