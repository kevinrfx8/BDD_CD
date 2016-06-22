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
        <!--Scripts externos-->
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

    <body ng-app="app" ng-controller="controller">
        <div style="z-index: -1;" id="bgDiv">
            <img class="bg active" id="bg1" src="img/login1.jpg">
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
                <p class="text-center">Inicia sesión y comienza a viajar con nosotros ahora!
                    <br>Si no tienes cuenta aún, regístrate <a href="register.php">aquí</a>.</p>
            </font>
            <form action="checkLogin.php" onsubmit="return checkData()" method="post" id="loginForm" name="loginForm">
                <div class="row">
                    <div class="form-groupcol-sm-12 col-md-12 col-lg-5 center-block" style="float:none;">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
                            <input id="user" name="userID" type="text" class="form-control" placeholder="Nombre de usuario" ng-model="consulta.nickname">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-5 center-block" style="float:none;">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></div>
                            <input id="pass" name="userPassword" type="password" class="form-control" placeholder="Contraseña" ng-model="consulta.pass">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 center-block" style="float:none;">
                        <button id="button" name="submit2" type="button" class="btn btn-danger btn-block" value="Ingresar" ng-click="ingresar()">
                            Ingresar
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <footer class="footer">
            <div class="container">
                <a href="admLogin.php" class="text-muted text-centered">Haga clic aquí para iniciar sesión como administrador.</a>
            </div>
        </footer>
    </body>
    <script src="../bower_components/angular/angular.min.js "></script>
    <script src="../bower_components/angular-resource/angular-resource.min.js "></script>
    <script src="../bower_components/jquery/dist/jquery.min.js "></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../bower_components/Toaster/jquery.toaster.js"></script>
    <script>
        var app = angular.module('app', ['ngResource']);
        //app.constant('baseURL', 'http://localhost:3000/');
        app.constant('baseURL', 'http://localhost:8080/BDD_CD/public/api/');
        app.directive("fileread", [function () {
            return {
                scope: {
                    fileread: "="
                }
                , link: function (scope, element, attributes) {
                    element.bind("change", function (changeEvent) {
                        var reader = new FileReader();
                        reader.onload = function (loadEvent) {
                            scope.$apply(function () {
                                scope.fileread = loadEvent.target.result;
                            });
                        }
                        reader.readAsDataURL(changeEvent.target.files[0]);
                    });
                }
            };
        }]);
        app.service('factory', ['$resource', 'baseURL', function ($resource, baseURL) {
            this.getInfo = function () { return $resource(baseURL + 'checkUser.php', null, {
                    'update': {
                        method: 'PUT'
                    }
                });
            };
        }]);

        app.controller('controller', ['$scope', 'factory', function ($scope, factory) {
            $scope.consulta = {
                nickname: ""
                , pass: ""

            }
            var controller = this;
            this.service = factory.getInfo();
            $scope.ingresar = function () {
                console.log($scope.consulta);
                controller.service.save($scope.consulta).$promise.then(function (response) {

                    console.log(response);
                    if(response.estado){
                        
                    }

                });
            };
        }]);
    </script>

    </html>