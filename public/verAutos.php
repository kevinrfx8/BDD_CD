<?php 
    session_start();
    
//if(!isset(SESSION['id'])){
    //mandar al carajo
//}

?>
    <!DOCTYPE html>
    <html lang="es" ng-app="app">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap 101 Template</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="../bower_components/components-font-awesome/less/font-awesome.css">
        <link rel="stylesheet" href="../bower_components/bootstrap/less/bootstrap.css">

        <link rel="stylesheet" href="../bower_components/components-font-awesome/less/font-awesome.css">
        <link rel="stylesheet" href="../bower_components/bootstrap/less/bootstrap.css">

        <link rel="stylesheet" href="../bower_components/jquery-ui/themes/dark-hive/jquery-ui.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

    <body ng-controller="controller">
        <?php require('templates/header.php');?>

            <div class="container">
                <div class="row">
                    <h2>Ver Vuelos</h2>
                </div>

                <form class="formConsulta">
                    <div class="row">
                        <div class="col-xs-2 input-group-lg">
                            <span class="fa fa-calendar fa-3X" aria-hidden="true"></span>
                            <label>Fecha</label>
                            <input type="text" id="fechaSalida" class="form-control" placeholder="Seleccionar...">

                        </div>

                        <div class="col-xs-2 input-group-lg">
                            <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                            <label for="">Dias</label>
                            <input type="text" class="form-control" placeholder="Seleccionar..." ng-model="consulta.dias">
                        </div>
                        <div class="col-xs-3 input-group-lg">
                            <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                            <label for="">Estado</label>
                            <select name="estados" class="form-control" id="selectOrigen" ng-options="item.id as item.estado for item in estados" ng-model="consulta.idEstado" ng-change="actualizarMunicipios()">
                            </select>
                        </div>
                        <div class="col-xs-3 input-group-lg">
                            <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                            <label for="">Municipio</label>
                            <select name="municipios" class="form-control" id="selectDestino" ng-options="item.id as item.municipio for item in municipios" ng-model="consulta.idMunicipio"></select>
                        </div>
                        <div class="col-xs-2 input-group-lg">
                            <label for=""></label>
                            <button type="button" class="btn btn-primary form-control" ng-click="cargarVuelos()">Buscar</button>
                        </div>

                    </div>
                </form>

                <br>
                <br>
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
                                    <button type="button" class="btn btn-primary " ng-if="vuelo.disponiblesPrimera>0" ng-click="reservarVuelo('disponiblesPrimera',vuelo.idVuelo,vuelo)">Reservar en Primera Clase</button>
                                </h5>
                                <h5>Clase Ejecutiva {{vuelo.cuotaEjecutiva|currency}}
                                    <button type="button" class="btn btn-primary " ng-if="vuelo.disponiblesEjecutiva>0" ng-click="reservarVuelo('disponiblesEjecutiva',vuelo.idVuelo,vuelo)">Reservar en Clase Ejecutiva</button>
                                </h5>
                                <h5>Clase Turista {{vuelo.cuotaTurista|currency}}
                                    <button type="button" class="btn btn-primary " ng-if="vuelo.disponiblesTurista>0" ng-click="reservarVuelo('disponiblesTurista',vuelo.idVuelo,vuelo)">Reservar en Clase Turista</button>
                                </h5>
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
    <script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script src="../bower_components/timerpicker/jquery.timepicker.min.js"></script>
    <script>
        $(function () {

            $("#fechaSalida").datepicker();
        });
    </script>
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
            this.getInfo = function () {
                return $resource(baseURL + 'reservarVuelos.php', null, {
                    'update': {
                        method: 'PUT'
                    }
                });
            };
            this.getVuelos = function () {
                return $resource(baseURL + 'buscarAutos.php', null, {
                    'consult': {
                        method: 'POST'
                        , isArray: true
                    }
                    , 'update': {
                        method: 'PUT'
                    }
                });
            };
            this.getEstados = function () {
                return $resource(baseURL + 'estados.php', null, {
                    'update': {
                        method: 'PUT'
                    }
                });
            };
            this.getMunicipios = function () {
                return $resource(baseURL + 'municipios.php', null, {
                    'update': {
                        method: 'PUT'
                    }
                });
            };
            this.getAerolineas = function () {
                return $resource(baseURL + 'aerolineas.php', null, {
                    'update': {
                        method: 'PUT'
                    }
                });
            };
        }]);

        app.controller('controller', ['$scope', 'factory', function ($scope, factory) {
            $scope.cargando = false;
            $scope.error = false;
            $scope.seleccionado = "";
            $scope.bandNuevo = false;
            $scope.vuelos = [];
            $scope.aerolineas = [{
                nombre: "Todas"
                , id: ""
                }];
            $scope.estados = [];
            $scope.consulta = {
                fechaSalida: ""
                , idEstadoOrigen: ""
                , idEstadoDestino: ""
                , idAerolinea: ""
            };
            var controller = this;
            $scope.titulo = true;
            $scope.lista = [];
            this.service = factory.getInfo(); //get autos
            this.serviceVuelos = factory.getVuelos();
            this.serviceEstados = factory.getEstados();
            this.serviceMunicipios = factory.getMunicipios();
            this.serviceAerolineas = factory.getAerolineas();
            /*----------------------------------Cargar Vuelos----------------------------------*/
            $scope.cargarVuelos = function () {
                console.log($scope.consulta);
                /*controller.serviceVuelos.save($scope.consulta).$promise.then(function (response) {
                    console.log(response);
                    $scope.vuelos = response;
                }, function (response) {
                    console.log(response);
                });*/
            };
            /*--------------------------------Cargar Registros de inicio-------------------------*/
            this.serviceEstados.query(function (response) {
                //$scope.estados = response;

                $scope.estados = $scope.estados.concat(response);
            });
            this.serviceAerolineas.query(function (response) {
                $scope.aerolineas = $scope.aerolineas.concat(response);
            });

            /*-----------------------------Eliminar---------------------------------------------*/
            $scope.eliminar = function (index) {
                controller.service.delete({
                        id: $scope.lista[index].idVuelo
                    }, function (response) {
                        $scope.lista.splice(index, 1);
                        $.toaster({
                            priority: 'success'
                            , title: 'Exito'
                            , message: 'Registro eliminado'
                        });


                    }
                    , function (response) {
                        $.toaster({
                            priority: 'danger'
                            , title: 'Error'
                            , message: 'No se pudo eliminar el registro'
                        });


                    });

            };
            /*------------------------------------Modificar------------------------------------*/
            $scope.modificar = function (index) {
                $scope.nuevo.horaSalida = $("#timepicker1").val();
                $scope.nuevo.horaLlegada = $("#timepicker2").val();

                $scope.nuevo.fechaSalida = $("#datepicker").val();
                $scope.nuevo.fechaLlegada = $("#datepicker2").val();
                $scope.nuevo.estadoOrigen = $('#selectOrigen option:selected').text();
                $scope.nuevo.estadoDestino = $('#selectDestino option:selected').text();
                console.log($scope.nuevo);
                $scope.nuevo.descripcion = $('#selectTipo option:selected').text();

                controller.service.update({
                        id: $scope.nuevo.idAuto
                    }, $scope.nuevo, function (response) {
                        console.log(response);
                        $scope.lista.splice($scope.seleccionado, 1);
                        $scope.lista.push(response);
                        $.toaster({
                            priority: 'success'
                            , title: 'Exito'
                            , message: 'Registro modificado'
                        });


                        //$scope.lista.splice(index, 1);

                    }
                    , function (response) {
                        $.toaster({
                            priority: 'danger'
                            , title: 'Error'
                            , message: 'No se pudo modificar el registro'
                        });
                    });

                console.log(index);
            };
            //-------------------------Insertar------------------------------------//
            $scope.insertar = function () {
                $scope.nuevo.horaSalida = $("#timepicker1").val();
                $scope.nuevo.horaLlegada = $("#timepicker2").val();
                $scope.nuevo.fechaSalida = $("#datepicker").val();
                $scope.nuevo.fechaLlegada = $("#datepicker2").val();
                $scope.nuevo.estadoOrigen = $('#selectOrigen option:selected').text();
                $scope.nuevo.estadoDestino = $('#selectDestino option:selected').text();

                $scope.nuevo.idAerolinea = $scope.aerolinea;
                $scope.nuevo.descripcion = $('#selectTipo option:selected').text();
                $scope.nuevo.imagenNombre = $('input[type=file]').val().split('\\').pop();
                console.log($scope.nuevo);
                controller.service.save($scope.nuevo).$promise.then(function (response) {
                    console.log(response);


                    $scope.lista.push(response);
                    $.toaster({
                        priority: 'success'
                        , title: 'Exito'
                        , message: 'Registro insertado'
                    });
                }, function (response) {
                    console.log(response);

                    $.toaster({
                        priority: 'danger'
                        , title: 'Error'
                        , message: 'No se pudo insertar el registro'
                    });
                });
            };
            /*-----------------------------Limpiar-----------------------------------*/
            $scope.limpiar = function () {

                console.log($scope.agencia);
                //$scope.municipios = [];
                angular.forEach($scope.form, function (input) {
                    if (input && input.hasOwnProperty('$viewValue')) {
                        input.$setUntouched();
                    }
                });
                $scope.bandNuevo = true;
                $scope.nuevo = {};
                /*$scope.nuevo = {
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
                };*/
                $("#subirArchivo").val("");
                $("#upload-file-info").text("");
            };
            /*--------------------------------Ver en modal---------------------------*/
            $scope.verItem = function (item, index) {
                //$scope.actualizarMunicipios();

                $scope.bandNuevo = false;
                $scope.nuevo = angular.copy(item);
                $scope.nuevo.imagen = "";
                $scope.seleccionado = index;

            };
            $scope.cargarVuelos = function () {
                $scope.consulta.fecha = $("#fechaSalida").val();
                $scope.consulta.fechaFinal = $("#fechaSalida").val();

                console.log($scope.consulta);
                controller.serviceVuelos.consult($scope.consulta).$promise.then(function (response) {
                    console.log(response);
                    $scope.vuelos = response;

                });
            };
            $scope.actualizarMunicipios = function () {

                controller.serviceMunicipios.query({
                        id: $scope.consulta.idEstado
                    }
                    , function (response) {
                        // console.log(response);
                        $scope.municipios = response;
                        //if ($scope.seleccionado != undefined)


                    }
                    , function (response) {});
            };
            $scope.reservarVuelo = function (tipo, idVuelo, vuelo) {

                var reserva = {
                    tipo: tipo
                    , idVuelo: idVuelo
                };
                console.log(reserva);
                controller.service.save(reserva).$promise.then(function (response) {
                    vuelo[tipo] -= 1;
                    console.log(response);
                    $.toaster({
                        priority: 'success'
                        , title: 'Exito'
                        , message: 'Reservación Hecha'
                    });

                });

            };
        }]);
    </script>

    </html>