<?php
	session_start();
?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html>

    <head>
        <title>Registro Usuarios</title>
        <!--Tipo de contenido y lenguaje-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-Language" content="es-mx" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Hojas de estilo-->
        <link type="text/css" rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.css" media="screen,projection" />
        <link href="assets/css/home.css" rel="stylesheet">
        <link href="../bower_components/components-font-awesome/css/font-awesome.css" rel="stylesheet">

        <link rel="stylesheet" href="assets/css/style.css">
        <!--Scripts externos-->
        <script type="text/javascript" src="../bower_components/jquery/dist/jquery.js"></script>
        <script type="text/javascript" src="../bower_components/bootstrap/dist/js/bootstrap.js"></script>
        <script src="../bower_components/angular/angular.js"></script>
    </head>

    <body ng-app="">
        <?php require("templates/header.php");?>
            <div class="container">


                <h1>Regístrate</h1>
                <h4>Introduce tus datos y comienza a disfrutar de los mejores viajes!</h4>
                <form name="form" id="form">
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
                                    <input id="name" name="name" type="text" class="form-control" pattern="[A-Za-z ]{5,20}" placeholder="Nombre" ng-model="nuevo.name" required>

                                </div>
                                <div class="alert alert-warning oculto" ng-class="{'visible':form.name.$touched && form.name.$invalid}">
                                    <strong>Atención!</strong> Letras solamente con 5 caracteres mínimo y máximo 20
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail3">Apellido Paterno</label>
                                    <input type="text" class="form-control" id="lastnameP" name="apellidoPat" pattern="[A-Za-z ]{5,20}" placeholder="Apellido Paterno" ng-model="nuevo.apellidoPat" required>
                                </div>
                                <div class="alert alert-warning oculto" ng-class="{'visible':form.apellidoPat.$touched && form.apellidoPat.$invalid}">
                                    <strong>Atención!</strong> Letras solamente con 5 caracteres mínimo y máximo 20
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail3">Apellido Materno</label>
                                    <input type="text" class="form-control" id="lastnameM" name="apellidoMat" pattern="[A-Za-z ]{5,20}" placeholder="Apellido Materno" ng-model="nuevo.apellidoMat" requiered>
                                </div>
                                <div class="alert alert-warning oculto" ng-class="{'visible':form.apellidoMat.$touched && form.apellidoMat.$invalid}">
                                    <strong>Atención!</strong> Letras solamente con 5 caracteres mínimo y máximo 20
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
                                    <input id="name" name="domicilio" type="text" class="form-control" pattern="[A-Za-z ]{10,30}" placeholder="Calle" ng-model="nuevo.domicilio" required>
                                </div>
                                <div class="alert alert-warning oculto" ng-class="{'visible':form.domicilio.$touched && form.domicilio.$invalid}">
                                    <strong>Atención!</strong> Letras solamente con 10 caracteres mínimo y máximo 30
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail3">Número</label>
                                    <input type="text" class="form-control" id="lastnameP" name="numero" pattern="[0-9]{2,5}" placeholder="Número" ng-model="nuevo.numero" required>
                                </div>
                                <div class="alert alert-warning oculto" ng-class="{'visible':form.numero.$touched && form.numero.$invalid}">
                                    <strong>Atención!</strong> Numérico solamente de 2 a 5 cifras
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail3">Colonia</label>
                                    <input type="text" class="form-control" id="lastnameM" name="colonia" pattern="[A-Za-z ]{10,30}" placeholder="Colonia" ng-model="nuevo.colonia" required>
                                </div>
                                <div class="alert alert-warning oculto" ng-class="{'visible':form.colonia.$touched && form.colonia.$invalid}">
                                    <strong>Atención!</strong> Letras solamente con 10 caracteres mínimo y máximo 30
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-1">
                                <select name="estado" class="form-control" id="sel1" disabled required>
                                    <option value="" selected disabled>Estado</option>
                                    <!--<option ng-repeat="{{estado in estados}}">1</option>-->
                                </select>
                            </div>
                            <div class="alert alert-warning oculto" ng-class="{'visible':form.estado.$touched && form.estado.$invalid}">
                                <strong>Atención!</strong> Seleccione alguna opción
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-1">
                                <select name="municipio" class="form-control" id="sel1" disabled required>
                                    <option value="" selected disabled>Municipio</option>
                                    <!--<option ng-repeat="{{municipio in estados(estado actual)}}">1</option>-->
                                </select>
                            </div>
                            <div class="alert alert-warning oculto" ng-class="{'visible':form.municipio.$touched && form.municipio.$invalid}">
                                <strong>Atención!</strong> Seleccione alguna opción
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-10 col-md-offset-1">
                                <h4>Cuenta y Seguridad</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 col-md-offset-1">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-user-plus" aria-hidden="true"></span></div>
                                    <input id="nickname" name="nickname" type="text" class="form-control" pattern="[A-Za-z0-9 ]{4,15}" placeholder="Nombre de Usuario" ng-model="nuevo.nickname" required>
                                </div>
                                <div class="alert alert-warning oculto" ng-class="{'visible':form.nickname.$touched && form.nickname.$invalid}">
                                    <strong>Atención!</strong> Alfanumérico con 4 caracteres mínimo y 15 máximo
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 col-md">
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="fa fa-envelope" aria-hidden="true"></span></div>
                                        <input id="mail" name="mail" type="email" class="form-control" pattern="[A-Za-z0-9.-@_ ]{10,35}" placeholder="E-Mail" ng-model="nuevo.mail" required>
                                    </div>
                                    <div class="alert alert-warning oculto" ng-class="{'visible':form.mail.$touched && form.mail.$invalid}">
                                        <strong>Atención!</strong> Alfanumérico (.-@_) con 10 caracteres mínimo y 35 máximo
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-1">
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="fa fa-lock" aria-hidden="true"></span></div>
                                        <input id="pass" name="pass" type="password" class="form-control" pattern="[A-Za-z0-9]{8,16}" placeholder="Contraseña" ng-model="nuevo.pass" required>
                                    </div>
                                    <div class="alert alert-warning oculto" ng-class="{'visible':form.pass.$touched && form.pass.$invalid}">
                                        <strong>Atención!</strong> Alfanumérico con 8 caracteres mínimo y 15 máximo sin espacios
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
                </form>
                </div>

    </body>

    </html>