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
    </head>

    <body ng-app="app" ng-controller="controller">
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
                                    <input id="name" name="name" type="text" class="form-control" pattern="[A-Za-z ]{5,20}" placeholder="Nombre" ng-model="nuevo.nombre" required>

                                </div>
                                <div class="alert alert-warning oculto" ng-class="{'visible':form.name.$touched && form.name.$invalid}">
                                    <strong>Atención!</strong> Letras solamente con 5 caracteres mínimo y máximo 20
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail3">Apellido Paterno</label>
                                    <input type="text" class="form-control" id="lastnameP" name="apellidoPat" pattern="[A-Za-z ]{5,20}" placeholder="Apellido Paterno" ng-model="nuevo.apellidoP" required>
                                </div>
                                <div class="alert alert-warning oculto" ng-class="{'visible':form.apellidoPat.$touched && form.apellidoPat.$invalid}">
                                    <strong>Atención!</strong> Letras solamente con 5 caracteres mínimo y máximo 20
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail3">Apellido Materno</label>
                                    <input type="text" class="form-control" id="lastnameM" name="apellidoMat" pattern="[A-Za-z ]{5,20}" placeholder="Apellido Materno" ng-model="nuevo.apellidoM" requiered>
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
                                <div class="form-group">
                                    <label class="" for="exampleInputEmail3">Calle</label>
                                    <input id="name" name="domicilio" type="text" class="form-control" pattern="[A-Za-z ]{10,30}" placeholder="Calle" ng-model="nuevo.calle" required>
                                </div>
                                <div class="alert alert-warning oculto" ng-class="{'visible':form.domicilio.$touched && form.domicilio.$invalid}">
                                    <strong>Atención!</strong> Letras solamente con 10 caracteres mínimo y máximo 30
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="" for="exampleInputEmail3">Número</label>
                                    <input type="text" class="form-control" id="lastnameP" name="numero" pattern="[0-9]{2,5}" placeholder="Número" ng-model="nuevo.numero" required>
                                </div>
                                <div class="alert alert-warning oculto" ng-class="{'visible':form.numero.$touched && form.numero.$invalid}">
                                    <strong>Atención!</strong> Numérico solamente de 2 a 5 cifras
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="" for="exampleInputEmail3">Código Postal</label>
                                    <input type="text" class="form-control" id="lastnameM" name="colonia" pattern="[0-9]{2,5}" placeholder="Colonia" ng-model="nuevo.codigopostal" required>
                                </div>
                                <div class="alert alert-warning oculto" ng-class="{'visible':form.colonia.$touched && form.colonia.$invalid}">
                                    <strong>Atención!</strong> Numérico solamente de 2 a 5 cifras
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-1">
                                <div class="input-group input-group-lg">
                                    <label for="">Estado:</label>
                                    <select name="estado" class="form-control" id="selectEstado" ng-options="item.id as item.estado for item in estados" ng-model="nuevo.idEstado" ng-change="actualizarMunicipios()" required>

                                    </select>
                                </div>
                            </div>
                            <div class="alert alert-warning oculto" ng-class="{'visible':form.estado.$touched && form.estado.$invalid}">
                                <strong>Atención!</strong> Seleccione alguna opción
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-1">
                                <label for="">Municipio:</label>
                                <div class="input-group input-group-lg ">
                                    <select name="municipio" class="form-control col-xs-6" id="selectMunicipio" ng-options="item.id as item.municipio for item in municipios" ng-model="nuevo.idMunicipio" required>

                                    </select>
                                </div>
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
                                    <button class="btn btn-block btn-success" type="button" ng-click="insertar()" ng-disabled="!form.$valid">
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
            this.getInfo = function () {
                return $resource(baseURL + 'registrar.php', null, {
                    'update': {
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
        }]);

        app.controller('controller', ['$scope', 'factory', function ($scope, factory) {
            $scope.cargando = true;
            $scope.error = false;
            $scope.seleccionado = "";
            $scope.bandNuevo = false;
            $scope.estados = [];
            $scope.municipios = [];
            var controller = this;
            $scope.titulo = true;
            $scope.lista = [];
            $scope.nuevo = {};
            this.service = factory.getInfo();
            this.serviceEstados = factory.getEstados();
            this.serviceMunicipios = factory.getMunicipios();
            /*--------------------------------Cargar Registros de inicio-------------------------*/
            this.serviceEstados.query(
                function (response) {
                    $scope.estados = response;

                }
                , function (response) {});

            /*
            this.service.query(
                function (response) {
                    $scope.lista = response;
                    $scope.cargando = false;
                    //console.log("res" + response);

                }
                , function (response) {
                    $scope.error = true;
                    $scope.cargando = false;
                    console.log("err" + response);
                });*/

            //-------------------------Insertar------------------------------------//
            $scope.insertar = function () {

                console.log($scope.nuevo);
                controller.service.save($scope.nuevo).$promise.then(function (response) {
                    console.log(response);
                    //$scope.lista.push(response);
                    $.toaster({
                        priority: 'success'
                        , title: 'Exito'
                        , message: 'Registrado correctamente'
                    });
                }, function (response) {
                    console.log(response + "");
                    $.toaster({
                        priority: 'danger'
                        , title: 'Error'
                        , message: 'Error al registrar'
                    });
                });
            };

            $scope.actualizarMunicipios = function () {
                $("#subirArchivo").val("");
                $("#upload-file-info").text("");
                controller.serviceMunicipios.query({
                        id: $scope.nuevo.idEstado
                    }
                    , function (response) {
                        // console.log(response);
                        $scope.municipios = response;
                        //if ($scope.seleccionado != undefined)
                        console.log($scope.seleccionado);
                        if ($scope.seleccionado != "")
                            $scope.nuevo.idMunicipio = $scope.lista[$scope.seleccionado].idMunicipio;


                    }
                    , function (response) {});
            };
        }]);
    </script>

    </html>