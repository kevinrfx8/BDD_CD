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
        <!--Scripts externos-->
        <script type="text/javascript" src="../bower_components/angular/angular.js"></script>
        <script type="text/javascript" src="../bower_components/jquery/dist/jquery.js"></script>
        <script type="text/javascript" src="../bower_components/bootstrap/dist/js/bootstrap.js"></script>
        <!--Scripts propios de la página -->
        <script>
            function checkData() {
                var d = document;
                var username = d.getElementById("user").value;
                var password = d.getElementById("pass").value

                if (username == "" || password == "") {
                    alert("Hay campos vacíos.Por favor, introduzca su información completa.");
                    return false;
                } else {
                    return true;
                }
            }
        </script>

        <!--Título de la Página (barra de títulos del navegador)-->
        <title>Login</title>
    </head>

    <body>
        <div style="z-index: -1;" id="bgDiv">
            <img class="bg active" id="bg1" src="public/img/login1.jpg">
        </div>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Kelpo Tours</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="#">Vuelos</a></li>
                        <li><a href="#">Hoteles</a></li>
                        <li><a href="#">Autos</a></li>
                    </ul>

                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                    </form>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <div class="xycenter container" id="login">
            <font color="white">
                <h1 id="titulo" class="text-center">Iniciar Sesión</h1>
                <p class="text-center">Inicia sesión y comienza a viajar con nosotros ahora!</p>
            </font>
            <form action="checkLogin.php" onsubmit="return checkData()" method="post" id="loginForm" name="loginForm">
                <div class="row">
                    <div class="form-groupcol-sm-12 col-md-12 col-lg-5 center-block" style="float:none;">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
                            <input id="user" name="userID" type="text" class="form-control" placeholder="Nombre de usuario">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-5 center-block" style="float:none;">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></div>
                            <input id="pass" name="userPassword" type="password" class="form-control" placeholder="Contraseña">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 center-block" style="float:none;">
                        <input id="button" name="submit2" type="submit" class="btn btn-danger btn-block" value="Ingresar" />
                    </div>
                </div>
            </form>
        </div>
        <a href="#" class="empresas"><small>Administradores</small></a>
    </body>

    </html>