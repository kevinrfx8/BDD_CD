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
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="../bower_components/components-font-awesome/less/font-awesome.css">
        <link rel="stylesheet" href="../bower_components/bootstrap/less/bootstrap.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="../bower_components/jquery-ui/themes/dark-hive/jquery-ui.min.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

    <body ng-controller="controller">
        <?php require('templates/header.php');?>
            <main>
                <div class="container">
                    <h2>Ver Vuelos</h2>
                    <div class="row">
                        <form class="col s12" id="filtros">
                            <div class="row">
                                <!-- fecha salida -->
                                <div class='col-sm-2'>
                                    <p>

                                        <span class="fa fa-calendar fa-3X" aria-hidden="true"></span>
                                        <label>Fecha Salida</label>
                                        <input type="text" id="datepicker" placeholder="Seleccionar...">

                                    </p>
                                </div>
                                <!-- Edo Salida -->
                                <div class='col-sm-2'>
                                    <div class="form-group">
                                        <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                                        <label for="sel1">Edo Salida</label>
                                        <select class="form-control" id="sel1">
                                            <option>TE ODIO KEV</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Edo Llegada -->
                                <div class='col-sm-2'>
                                    <div class="form-group">
                                        <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                                        <label for="sel1">Edo Llegada</label>
                                        <select class="form-control" id="sel1">
                                            <option>TE ODIO KEV</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Aerolinea -->
                                <div class='col-sm-2'>
                                    <div class="form-group">
                                        <span class="glyphicon glyphicon-plane" aria-hidden="true"></span>
                                        <label for="sel1">Aerolinea</label>
                                        <select class="form-control" id="sel1">
                                            <option>TE ODIO KEV</option>
                                        </select>
                                    </div>
                                </div>

                                <!--Boton Buscar -->
                                <div class='col-sm-2'>
                                    <div class="btn-group" role="group" aria-label="...">
                                        <button type="button" class="btn btn-default">Buscar</button>
                                    </div>
                                    <script type="text/javascript">
                                        $(function () {
                                            $('#datetimepicker1').datetimepicker();
                                        });
                                    </script>
                                </div>

                                <!-- Div con imagen y texto-->
                                <div class='col-sm-12'>
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="img-rounded" src="https://inn.org/wp-content/uploads/2015/03/NerdAlertBannerSquare-140x140-140x140.png" alt="Generic placeholder image">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading"><b>Aquí debería de ir algo :)</b></h4> NO TIENES IDEA DE CUANTO TE ODIO PINSHI PATO GAY :V
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
            <?php require('templates/footer.php');?>
    </body>
    <script src="../bower_components/angular/angular.min.js "></script>
    <script src="../bower_components/angular-resource/angular-resource.min.js "></script>
    <script src="../bower_components/jquery/dist/jquery.min.js "></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        var app = angular.module('app', ['ngResource']);
        //app.constant('baseURL', 'http://localhost:3000/');
        app.constant('baseURL', 'http://localhost:8080/AgenciaVacacional4/public/api/');
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
                return $resource(baseURL + 'aerolineas.php', null, {
                    'update': {
                        method: 'PUT'
                    }
                });
            };
        }]);

        app.controller('controller', ['$scope', 'factory', function ($scope, factory) {
            $scope.seleccionado = "";
            $scope.bandNuevo = false;
            $scope.nuevo = {
                id: ""
                , nombre: ""
                , telefono: ""
                , sitioWeb: ""
                , imagen: ""
                , imgUrl: ""
            }
            var controller = this;
            $scope.titulo = true;
            $scope.aerolineas = [];
            this.service = factory.getInfo();
            //traer todos los registros
            this.service.query(
                function (response) {
                    $scope.aerolineas = response;
                    //console.log("res" + response);

                }
                , function (response) {
                    //console.log("err" + response);
                });
            //eliminar
            $scope.eliminar = function (index) {
                controller.service.delete({
                        id: $scope.aerolineas[index].id
                    }, function (response) {
                        $scope.aerolineas.splice(index, 1);

                    }
                    , function (response) {

                    });

            };
            //modificar
            $scope.modificar = function (index) {
                console.log($scope.nuevo);
                controller.service.update({
                        id: $scope.nuevo.id
                    }, $scope.nuevo, function (response) {
                        console.log(response);
                        $scope.aerolineas.splice($scope.seleccionado, 1);
                        $scope.aerolineas.push(response);



                        //$scope.aerolineas.splice(index, 1);

                    }
                    , function (response) {

                    });

                console.log(index);
            };
            //nuevo
            $scope.insertar = function () {
                $scope.nuevo.imagenNombre = $('input[type=file]').val().split('\\').pop();
                console.log($scope.nuevo);
                controller.service.save($scope.nuevo, function (response) {
                    console.log(response);
                    $scope.aerolineas.push(response);
                });
            };
            $scope.limpiar = function () {
                $scope.bandNuevo = true;
                $scope.nuevo = {
                    id: ""
                    , nombre: ""
                    , telefono: ""
                    , sitioWeb: ""
                    , imagen: ""
                    , imgUrl: ""
                }
            };
            $scope.verAerolinea = function (aerolinea, index) {
                $scope.bandNuevo = false;
                $scope.nuevo = angular.copy(aerolinea);
                $scope.nuevo.imagen = "";
                $scope.seleccionado = index;
            };
                    }]);
    </script>
    <script src="../bower_components/angular/angular.min.js "></script>
    <script src="../bower_components/angular-resource/angular-resource.min.js "></script>
    <script src="../bower_components/jquery/dist/jquery.min.js "></script>
    <script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        $(function () {
            $("#datepicker").datepicker();
        });
    </script>

    </html>