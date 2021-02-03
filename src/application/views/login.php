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
        <title>Animated Login Form</title>
        <link rel="stylesheet" type="text/css" href="'. base_url() .'css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <img class="wave" src="'. base_url() .'img/wave.png">
    <div class="container">
        <div class="img">
            <img src="'. base_url() .'img/bg.svg">
        </div>
        <div class="login-content">
            <form action="login.php">
                <img src="'. base_url() .'img/avatar.svg">
                <h2 class="title">Welcome</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Usuario</h5>
                        <input type="text" class="input">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Contraseña</h5>
                        <input type="password" class="input">
                    </div>
                </div>
                <a href="#">Olvidó contraseña?</a>
                <input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="'. base_url() .'js/main.js"></script>
    </body>
    </html>'
?>
