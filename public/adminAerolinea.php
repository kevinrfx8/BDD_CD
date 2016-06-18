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
                    <h2>Aerolineas</h2>
                    <div class="row">
                        <form class="col s12" id="filtros">
                            <div class="row">
                                <div class="col-md-10">
                                    <span class="fa fa-plane fa-2x "></span>
                                    <input id="icon_prefix" type="text" class="gcol-md-10" ng-model="filtro" placeholder="Buscar">
                                </div>
                                <div class="input-field col-md-2">

                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregar" ng-click="limpiar()">Nueva Aerolinea</button>
                                </div>
                            </div>
                            <div class=" row ">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th data-field="id ">Nombre</th>
                                            <th data-field="name ">Telefono</th>
                                            <th data-field="price ">SitioWeb</th>
                                            <th data-field="price ">Imagen</th>
                                            <th data-field="price ">Eliminar</th>
                                            <th data-field="price ">Modificar</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr ng-repeat="aerolinea in aerolineas|filter:filtro ">
                                            <td>{{aerolinea.nombre}}</td>
                                            <td>{{aerolinea.telefono}}</td>
                                            <td>{{aerolinea.sitioWeb}}</td>
                                            <td>
                                                <img src="" alt="" ng-src="{{aerolinea.imgUrl}}" width="100" height="75">
                                            </td>
                                            <td>
                                                <a href="" ng-click="eliminar(aerolineas.indexOf(aerolinea))">
                                                    <span class="fa fa-close fa-3x"></span>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="" type="button" class="" data-toggle="modal" data-target="#agregar" ng-click="verAerolinea(aerolinea,aerolineas.indexOf(aerolinea))"><span class="fa fa-edit fa-3x"></span></a>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


                            </div>
                        </form>
                    </div>
                </div>
            </main>
            <!-- Modal Alta -->
            <div id="agregar" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- modal content -->
                    <div class="modal-content ">
                        <!-- modal header-->
                        <div class="modal-header">
                            <h3>{{bandNuevo ? 'Aereolinea Nueva ':'Modificar Aerolinea '}}</h3>
                        </div>
                        <!-- modal body -->
                        <div class="modal-body">
                            <div class="container-fluid">

                                <form class="" id="formAerolinea" name="formAerolinea">
                                    <div class="row">
                                        <div class="input-group margin-bottom-sm" id="nuevoNombre">
                                            <span class="input-group-addon"><i class="fa fa-plane fa-fw"></i></span>
                                            <input id="modalNombre" type="text" class="form-control" ng-model="nuevo.nombre" placeholder="Nombre" required>
                                        </div>
                                        <div class="input-group margin-bottom-sm " id="nuevoNombre">
                                            <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
                                            <input id="modalTelefono" type="text" class="form-control" ng-model="nuevo.telefono" placeholder="Teléfono">
                                        </div>
                                        <div class="input-group margin-bottom-sm " id="nuevoNombre">
                                            <span class="input-group-addon"><i class="fa fa-globe fa-fw"></i></span>
                                            <input id="modalSitio" type="text" class="form-control" ng-model="nuevo.sitioWeb" placeholder="Sitio Web">
                                        </div>
                                        <div class="form-group">
                                            <input type="file" fileread="nuevo.imagen" ng-model="nuevo.imagenNombre" name="nuevoNombreImagen">
                                            <p class="help-block">Suba una imagen</p>
                                        </div>

                                    </div>

                                </form>

                            </div>
                        </div>
                        <!-- modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="limpiar()">Cancelar</button>
                            <button type="button" class="btn btn-primary" ng-click="insertar()" ng-show="bandNuevo" ng-disabled="!formAerolinea.$valid" data-dismiss="modal">Guardar</button>
                            <button type="button" class="btn btn-primary" ng-click="modificar()" ng-hide="bandNuevo" data-dismiss="modal">Modificar</button>

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

    </html>