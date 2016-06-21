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

                <form class="" id="filtros">
                    <div class="row">
                        <div class="col-xs-2 input-group-lg">
                            <span class="fa fa-calendar fa-3X" aria-hidden="true"></span>
                            <label>Fecha Salida</label>
                            <input type="text" id="datepicker" class="form-control" placeholder="Seleccionar...">

                        </div>
                        <div class="col-xs-3 input-group-lg">
                            <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                            <label for="sel1">Edo Salida</label>
                            <select class="form-control" id="sel1">
                                <option>TE ODIO KEV</option>
                            </select>
                        </div>
                        <div class="col-xs-3 input-group-lg">
                            <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                            <label for="sel1">Edo Llegada</label>
                            <select class="form-control" id="sel1">
                                <option>TE ODIO KEV</option>
                            </select>
                        </div>
                        <div class="col-xs-2 input-group-lg">
                            <span class="glyphicon glyphicon-plane" aria-hidden="true"></span>
                            <label for="sel1">Aerolinea</label>
                            <select class="form-control" id="sel1">
                                <option>TE ODIO KEV</option>
                            </select>
                        </div>
                        <div class="col-xs-2 input-group-lg">
                            <label for=""></label>
                            <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#modal" ng-click="limpiar()">Nuevo Vuelo</button>
                        </div>
                    </div>

                    <script type="text/javascript">
                        $(function () {
                            $('#datetimepicker1').datetimepicker();
                        });
                    </script>


                    <!-- Div con imagen y texto-->


                </form>

                <br>
                <br>
                <div class="row">

                    <div class='col--12'>
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
            </div>



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