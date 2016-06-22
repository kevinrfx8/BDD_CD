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
        <link type="text/css" rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.css"  media="screen,projection"/>
        <link href="assets/css/home.css" rel="stylesheet">
        <link href="../bower_components/components-font-awesome/css/font-awesome.css" rel="stylesheet">
    <!--Scripts externos-->
        <script type="text/javascript" src="../bower_components/jquery/dist/jquery.js"></script> 
        <script type="text/javascript" src="../bower_components/bootstrap/dist/js/bootstrap.js"></script> 
        <script src="../bower_components/angular/angular.js"></script>
    </head>
    
    <body ng-app="">
        <div class="container">
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
                            <li><a href="login.php">Iniciar sesión</a></li>
                        </ul>

                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Buscar">
                            </div>
                            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                        </form>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav> 
            
            <h1>Regístrate</h1>
            <h4>Introduce tus datos y comienza a disfrutar de los mejores viajes!</h4>
            
            <div class="container">
                <br>
                <div class="row">
                    <div class=" col-md-10 col-md-offset-1">
                        <h3>Información de Facturación</h3>
                    </div>
                </div>
                <div class="row">
                    <div class=" col-md-10 col-md-offset-1">
                        <h4>Nombre</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-1">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fa fa-user" aria-hidden="true"></span></div>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail3">Apellido Paterno</label>
                            <input type="text" class="form-control" id="lastnameP" placeholder="Apellido Paterno">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail3">Apellido Materno</label>
                            <input type="text" class="form-control" id="lastnameM" placeholder="Apellido Materno">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class=" col-md-10 col-md-offset-1">
                        <h4>Domicilio</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-1">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fa fa-home" aria-hidden="true"></span></div>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Calle">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail3">Número</label>
                            <input type="text" class="form-control" id="lastnameP" placeholder="Número">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail3">Colonia</label>
                            <input type="text" class="form-control" id="lastnameM" placeholder="Colonia">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-1">
                        <select class="form-control" id="sel1" disabled>
                            <option value="" selected disabled>Estado</option>
                            <!--<option ng-repeat="{{estado in estados}}">1</option>-->
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4 col-md-offset-1">
                        <select class="form-control" id="sel1" disabled>
                            <option value="" selected disabled>Municipio</option>
                            <!--<option ng-repeat="{{municipio in estados(estado actual)}}">1</option>-->
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class=" col-md-10 col-md-offset-1">
                        <h4>Cuenta y Seguridad</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fa fa-user-plus" aria-hidden="true"></span></div>
                            <input id="nickname" name="nickname" type="text" class="form-control" placeholder="Nombre de Usuario">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fa fa-envelope" aria-hidden="true"></span></div>
                            <input id="mail" name="mail" type="email" class="form-control" placeholder="E-Mail">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fa fa-envelope-o" aria-hidden="true"></span></div>
                            <input id="mail" name="mail" type="email" class="form-control" placeholder="Confirmar E-Mail">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4 col-md-offset-1">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fa fa-lock" aria-hidden="true"></span></div>
                            <input id="pass" name="pass" type="password" class="form-control" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fa fa-lock" aria-hidden="true"></span></div>
                            <input id="confpass" name="confpass" type="password" class="form-control" placeholder="Confirmar contraseña">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-block btn-warning">
                            <i class="fa fa-eye"></i> Ver contraseñas
                        </button>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-8 col-md-offset-4">
                        Al hacer clic en "Registrarme" aceptas nuestros términos y condiciones.
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3 col-md-offset-5">
                        <button class="btn btn-block btn-success">
                            <i class="fa fa-check"></i> Registrarme
                        </button>
                    </div>
                </div>
                <br>
                <br>
                <br>
            </div>
        </div>
    </body>
</html>