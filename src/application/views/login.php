<?php
//Nombre de autor:Jesús Canga Galván
//Curso:2 DAW
//Escuela: Escuela Virgen de Guadalupe
//Proyecto fin de ciclo: Proyecto de Sistema de Gestión del Conocimiento
//Año:2021
defined('BASEPATH') OR exit('No direct script access allowed');
echo '
<!DOCTYPE html>
    <html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="'. base_url() .'css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <header class="logohead">
        <img  src="'. base_url() .'img/download.jpg">
    </header>
    <img class="wave" src="'. base_url() .'img/wave.png">
    <div class="containerLogin">
        <div class="img">
            <img src="'. base_url() .'img/bg.svg">
        </div>
        <div class="login-content">
            <form action="' . base_url() . 'log" method="post">
                <img src="'. base_url() .'img/avatar.svg">
                <h2 class="title">Bienvenido</h2>
                <a href="'. $google_login_url .'" class="waves-effect waves-light btn red"><span
                class="fa fa-google left fa-2x"></span>LOGIN
        GOOGLE</a><!--Redirige al autenticador de google-->
            </form>
        </div>
    </div>
    <script type="text/javascript" src="'. base_url() .'js/main.js"></script>
    </body>
    </html>'
?>
