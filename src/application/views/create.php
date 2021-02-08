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
        <title>Profile</title>
        <link rel="stylesheet" type="text/css" href="'. base_url() .'css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>';
include ('menu.php');
echo'
    <body>
    <img class="wave2" src="'. base_url() .'img/wave2.png">
    <div class="containerLogin">
        <div class="login-content">';
echo form_open_multipart('Controler/createrecur/'.$id);
echo'
           <form action="" method="" >
                <h3>Creando nuevo registro</h3>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Título</h5>
                        <input type="text" class="input" name="usu" required>
                    </div>
                </div>
                <textarea type="textarea" class="textbox" name="descripcion" rows="10" cols="37" required>Describa el recurso</textarea> 
                <div class="file">
                    <h5>Documento</h5>
                    <input type="file" name="file" accept="application/pdf" required/>
                </div>
                <input type="submit" class="loginbtn" value="Subir registro">
            </form>
        </div>
        
       
    </div>
    <script type="text/javascript" src="'. base_url() .'js/main.js"></script>
    <script type="text/javascript" src="'. base_url() .'js/validate.js"></script>
    </body>
    </html>'
?>
