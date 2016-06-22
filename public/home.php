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
        <link href="assets/css/home.css" rel="stylesheet">
        <link href="../bower_components/components-font-awesome/css/font-awesome.css" rel="stylesheet">
        <!--Scripts externos-->
    </head>

    <body ng-app="app" ng-controller="controller">
        <?php require('templates/header.php'); ?>
            <div class="container">


                <h1>Bienvenido, {{username}}.</h1>

                <div class="container">
                    <h3>Tus Reservaciones</h3>
                    <ul class="nav nav-tabs">
                        <li ng-show="{{!vuelos}}" ng-class="{active: vuelos}">
                            <a data-toggle="tab" href="#vuelos">
                            Vuelos&nbsp;
                            <span class="fa fa-plane"></span></a>
                        </li>
                        <li ng-show="{{!hoteles}}" ng-class="{active: !vuelos&&hoteles}">
                            <a data-toggle="tab" href="#hoteles">
                            Hoteles&nbsp;
                            <span class="fa fa-bed"></span></a>
                        </li>
                        <li ng-show="{{!autos}}" ng-class="{active: !vuelos&&!hoteles&&autos}">
                            <a data-toggle="tab" href="#autos">
                            Autos&nbsp;
                            <span class="fa fa-car"></span></a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="vuelos" ng-show="{{!vuelos}}" class="tab-pane fade in active">
                            <div class="row" ng-repeat="vuelo in vuelos" style="margin-top=30px;">

                                <div class='col-xs-12'>
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="img-rounded" src="" width="300" height="300" ng-src="{{vuelo.imgUrl}}" alt="Generic placeholder image">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading"><h2>{{vuelo.estadoOrigen}}-{{vuelo.estadoDestino}}</h2>
                                <h3>{{vuelo.fechaSalida}}  {{vuelo.fechaLlegada}}</h3>
                                <h5>{{vuelo.horaSalida}}  {{vuelo.horaLlegada}}</h5>
                                <h4>Costos:</h4>
                                            <h5>Primera Clase {{vuelo.cuotaPrimera|currency}}
                                </h5>
                                            <h5>Clase Ejecutiva {{vuelo.cuotaEjecutiva|currency}}
                                </h5>
                                            <h5>Clase Turista {{vuelo.cuotaTurista|currency}}
                                </h5>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div id="hoteles" ng-show="{{!hoteles}}" class="tab-pane fade">
                            <div class="row" ng-repeat="vuelo in habitaciones" style="margin-top=30px;">

                                <div class='col-xs-12'>
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="img-rounded" src="" width="300" height="300" ng-src="{{vuelo.imgUrl}}" alt="Generic placeholder image">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading"><h2>Precio por dia:{{vuelo.precio|currency}} Total:{{vuelo.dias*vuelo.precio|currency}}</h2>
                                </h4>
                                            <h4>Tipo habitación:{{vuelo.tipoHabitacion}}</h4>
                                            <h4>Descripción:</h4>
                                            <p>{{vuelo.descripcion}}</p>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="autos" ng-show="{{!autos}}" class="tab-pane fade">
                            <div class="row" ng-repeat="vuelo in autos" style="margin-top=30px;">

                                <div class='col-xs-12'>
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="img-rounded" src="" width="300" height="300" ng-src="{{vuelo.imgUrl}}" alt="Generic placeholder image">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading"><h2>Precio por dia:{{vuelo.precio|currency}} Total:{{vuelo.dias*vuelo.precio|currency}}</h2>
                                </h4>
                                            <h4>Modelo:{{vuelo.modelo}}</h4>
                                            <h4>Puertas:{{vuelo.puertas}}</h4>
                                            <h4>Asientos:{{vuelo.asientos}}</h4>
                                            <h4>Cajuela:{{vuelo.cajuela}}</h4>
                                            <h4>Transmisión:{{vuelo.transmision}}</h4>
                                            <h4>Aire:{{vuelo.aire}}</h4>
                                            <label for=""></label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php require('templates/footer.php');?>
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
            this.getAutos = function () {
                return $resource(baseURL + 'getReservacionesAutos.php', null, {
                    'update': {
                        method: 'PUT'
                    }
                });
            };
            this.getVuelos = function () {
                return $resource(baseURL + 'getReservacionesVuelos.php', null, {
                    'update': {
                        method: 'PUT'
                    }
                });
            };
            this.getHabitaciones = function () {
                return $resource(baseURL + 'getReservacionesHabitaciones.php', null, {
                    'update': {
                        method: 'PUT'
                    }
                });
            };
        }]);

        app.controller('controller', ['$scope', 'factory', function ($scope, factory) {
            $scope.cargando = true;
            $scope.error = false;
            $scope.seleccionado = "";
            $scope.bandNuevo = false;
            $scope.estados = [];
            $scope.municipios = [];
            $scope.nuevo = {
                id: ""
                , nombre: ""
                , telefono: ""
                , imagen: ""
                , imgUrl: ""
                , estdo: ""
                , municipio: ""
                , calle: ""
                , numero: ""
                , codigopostal: ""
                , idEstado: ""
                , idMunicipio: ""
            };
            var controller = this;
            $scope.titulo = true;
            $scope.lista = [];
            this.serviceVuelos = factory.getVuelos();
            this.serviceAutos = factory.getAutos();
            this.serviceHabitaciones = factory.getHabitaciones();
            /*--------------------------------Cargar Registros de inicio-------------------------*/
            this.serviceAutos.query(
                function (response) {
                    console.log(response);
                    $scope.autos = response;

                }
                , function (response) {});
            this.serviceHabitaciones.query(
                function (response) {
                    console.log(response);
                    $scope.habitaciones = response;

                }
                , function (response) {});

            this.serviceVuelos.query(
                function (response) {
                    console.log(response);
                    $scope.vuelos = response;

                }
                , function (response) {});







        }]);
    </script>

    </html>