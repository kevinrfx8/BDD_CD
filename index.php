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
        <link type="text/css" rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css"  media="screen,projection"/>
        <link href="public/assets/css/full-slider.css" rel="stylesheet">
    <!--Scripts externos-->
        <script type="text/javascript" src="bower_components/angular/angular.js"></script>
        <script type="text/javascript" src="bower_components/jquery/dist/jquery.js"></script> 
        <script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.js"></script> 
    </head>
    
    <body>
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

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Iniciar Sesión</a></li>
                    </ul>

                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                    </form>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        
        
        
        <header id="myCarousel" class="carousel slide">
        
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for Slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <!-- Set the first background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('public/img/index1.jpg');"></div>
                    <div class="carousel-caption">
                        <h2>Cancún $1599</h2>
                        <h5>Precio por noche. Consulte hoteles participantes.</h5>
                    </div>
                </div>
                <div class="item">
                    <!-- Set the second background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('public/img/index2.jpg');"></div>
                    <div class="carousel-caption">
                        <h2>Vallarta $989</h2>
                        <h5>Precio por noche. Consulte hoteles participantes.</h5>
                    </div>
                </div>
                <div class="item">
                    <!-- Set the third background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('public/img/index3.jpg');"></div>
                    <div class="carousel-caption">
                        <h2>Aeroméxico 3x2</h2>
                        <h5>Consulte destinos participantes. Aplican restricciones.</h5>
                    </div>
                </div>
            </div>

        </header>
        
        <script>
            $('.carousel').carousel({
                interval: 3000 //changes the speed
            })
        </script>
    </body>
</html>