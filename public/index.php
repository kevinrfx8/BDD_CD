<?php
	session_start();
?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html>

    <head>
        <!--Tipo de contenido y lenguaje-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-Language" content="es-mx" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Hojas de estilo-->
        <link type="text/css" rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.css" media="screen,projection" />
        <link href="assets/css/full-slider.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/style.css">
        <!--Scripts externos-->
        <script type="text/javascript" src="../bower_components/angular/angular.js"></script>
        <script type="text/javascript" src="../bower_components/jquery/dist/jquery.js"></script>
        <script type="text/javascript" src="../bower_components/bootstrap/dist/js/bootstrap.js"></script>
    </head>

    <body>
        <?php require('templates/header.php');
        if((isset($_SESSION['id']) && $_SESSION['tipo']==1)){//logeado y administrador
            require('templates/indexAdmin.php');
        }
        else{
            require('templates/indexUser.php');
        }
            require('templates/footer.php');
        ?>



    </body>

    </html>