<?php 
    session_start();
    /*
if(!isset(SESSION['tipo'])&&SESSION['tipo']!=0){
    //mandar al carajo
        header('Location: index.php');
        }
*/

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
                    <h2>Hoteles</h2>
                    <div class="row">
                        <form class="col s12" id="filtros">
                            <div class="row">
                                <div class="col-md-10">
                                    <span class="fa fa-home fa-2x "></span>
                                    <input id="icon_prefix" type="text" class="gcol-md-10" ng-model="filtro" placeholder="Buscar">
                                </div>
                                <div class="input-field col-md-2">

                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal" ng-click="limpiar()">Nuevo Hotel</button>
                                </div>
                            </div>
                            <div class=" row ">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th data-field="id ">Nombre</th>
                                            <th data-field="name ">Telefono</th>

                                            <th data-field="price ">Estado</th>
                                            <th data-field="price ">Municipio</th>
                                            <th data-field="price ">Imagen</th>

                                            <th data-field="price ">Eliminar</th>
                                            <th data-field="price ">Modificar</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr ng-repeat="item in lista|filter:filtro ">
                                            <td class="vert-align">{{item.nombre}}</td>
                                            <td class="vert-align">{{item.telefono}}</td>
                                            <td class="vert-align">{{item.estado}}</td>
                                            <td class="vert-align">{{item.municipio}}</td>
                                            <td class="vert-align">
                                                <img src="" alt="" ng-src="{{item.imgUrl}}" width="100" height="75">
                                            </td>
                                            <td class="vert-align">
                                                <a href="" ng-click="eliminar(lista.indexOf(item))">
                                                    <span class="fa fa-close fa-3x"></span>
                                                </a>
                                            </td>
                                            <td class="vert-align">
                                                <a href="" type="button" class="" data-toggle="modal" data-target="#modal" ng-click="verItem(item,lista.indexOf(item))"><span class="fa fa-edit fa-3x"></span></a>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Mensajes de carga -->
                            <div class="row">
                                <div class="col-sx-12">
                                    <div class="loader center-block" ng-show="cargando"></div>
                                    <div class="alert alert-info" ng-show="lista.length==0 && !error && !cargando">
                                        <strong>Info!</strong> No se encontraron registros.
                                    </div>
                                    <div class="alert alert-warning" ng-show="error">
                                        <strong>Advertencia!</strong> No se pudo cargar los registos. Intente más tarde.
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
            <!-- Modal Alta -->
            <div id="modal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- modal content -->
                    <div class="modal-content ">
                        <!-- modal header-->
                        <div class="modal-header">
                            <h2>{{bandNuevo ? 'Hotel Nuevo ':'Modificar Hotel '}}</h2>
                        </div>
                        <!-- modal body -->
                        <div class="modal-body">
                            <div class="container-fluid">

                                <form class="" id="form" name="form">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="input-group margin-bottom-sm ">
                                                <span class="input-group-addon"><i class="fa fa-home fa-fw"></i></span>
                                                <input id="modalNombre" name="nombre" type="text" class="form-control" ng-model="nuevo.nombre" placeholder="Nombre" required>
                                            </div>
                                            <div class="alert alert-warning oculto" ng-class="{'visible':form.nombre.$touched && form.nombre.$invalid}">
                                                <strong>Atención!</strong> Es requerido
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="input-group margin-bottom-sm ">
                                                <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
                                                <input name="telefono" id="modalTelefono" type="text" class="form-control" ng-model="nuevo.telefono" placeholder="Teléfono" required>
                                            </div>
                                            <div class="alert alert-warning oculto" ng-class="{'visible':form.telefono.$touched && form.telefono.$invalid}">
                                                <strong>Atención!</strong> Es requerido
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="input-group margin-bottom-sm ">

                                                <select name="estado" class="form-control" id="sel1" ng-options="item.id as item.estado for item in estados" ng-model="nuevo.idEstado" ng-change="actualizarMunicipios()" required>

                                                </select>
                                            </div>
                                            <div class="alert alert-warning oculto" ng-class="{'visible':form.estado.$touched && form.estado.$invalid}">
                                                <strong>Atención!</strong> Es requerido
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="input-group margin-bottom-sm ">
                                                <select name="municipio" class="form-control" id="sel1" ng-options="item.id as item.municipio for item in municipios" ng-model="nuevo.idMunicipio" required>

                                                </select>
                                            </div>
                                            <div class="alert alert-warning oculto" ng-class="{'visible':form.municipio.$touched && form.municipio.$invalid}">
                                                <strong>Atención!</strong> Es requerido
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="input-group margin-bottom-sm ">
                                                <span class="input-group-addon"><i class="fa fa-plane fa-fw"></i></span>
                                                <input id="modalNombre" name="calle" type="text" class="form-control" ng-model="nuevo.calle" placeholder="Calle" required>
                                            </div>
                                            <div class="alert alert-warning oculto" ng-class="{'visible':form.calle.$touched && form.calle.$invalid}">
                                                <strong>Atención!</strong> Es requerido
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="input-group margin-bottom-sm ">
                                                <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
                                                <input name="numero" id="modalTelefono" type="text" class="form-control" ng-model="nuevo.numero" placeholder="Número" required>
                                            </div>
                                            <div class="alert alert-warning oculto" ng-class="{'visible':form.numero.$touched && form.numero.$invalid}">
                                                <strong>Atención!</strong> Es requerido
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="input-group margin-bottom-sm ">
                                                <span class="input-group-addon"><i class="fa fa-plane fa-fw"></i></span>
                                                <input id="modalNombre" name="codigopostal" type="text" class="form-control" ng-model="nuevo.codigopostal" placeholder="Código Postal" required>
                                            </div>
                                            <div class="alert alert-warning oculto" ng-class="{'visible':form.codigopostal.$touched && form.codigopostal.$invalid}">
                                                <strong>Atención!</strong> Es requerido
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="btn btn-primary btn-file">
                                            <input id="subirArchivo" type="file" fileread="nuevo.imagen" ng-model="nuevo.imagenNombre" name="nuevoNombreImagen" style="display: none;" onchange="$('#upload-file-info').html($(this).val());">
                                            <p>Suba una imagen</p>
                                        </label>
                                        <span id="upload-file-info"></span>
                                    </div>


                                </form>

                            </div>
                        </div>
                        <!-- modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="limpiar()">Cancelar</button>
                            <button type="button" class="btn btn-primary" ng-click="insertar()" ng-show="bandNuevo" ng-disabled="!form.$valid" data-dismiss="modal">Guardar</button>
                            <button type="button" class="btn btn-primary" ng-click="modificar()" ng-hide="bandNuevo" data-dismiss="modal" ng-disabled="!form.$valid">Modificar</button>

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
            this.getInfo = function () {
                return $resource(baseURL + 'hoteles.php', null, {
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
            this.service = factory.getInfo();
            this.serviceEstados = factory.getEstados();
            this.serviceMunicipios = factory.getMunicipios();
            /*--------------------------------Cargar Registros de inicio-------------------------*/
            this.serviceEstados.query(
                function (response) {
                    $scope.estados = response;

                }
                , function (response) {});


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
                });
            /*-----------------------------Eliminar---------------------------------------------*/
            $scope.eliminar = function (index) {
                controller.service.delete({
                        id: $scope.lista[index].id
                    }, function (response) {
                        $scope.lista.splice(index, 1);
                        $.toaster({
                            priority: 'success'
                            , title: 'Exito'
                            , message: 'Hotel Eliminado'
                        });


                    }
                    , function (response) {
                        $.toaster({
                            priority: 'danger'
                            , title: 'Error'
                            , message: 'No se pudo eliminar el hotel!'
                        });


                    });

            };
            /*------------------------------------Modificar------------------------------------*/
            $scope.modificar = function (index) {
                console.log($scope.nuevo);
                controller.service.update({
                        id: $scope.nuevo.id
                    }, $scope.nuevo, function (response) {
                        console.log(response);
                        $scope.lista.splice($scope.seleccionado, 1);
                        $scope.lista.push(response);
                        $.toaster({
                            priority: 'success'
                            , title: 'Exito'
                            , message: 'Hotel Modificado'
                        });


                        //$scope.lista.splice(index, 1);

                    }
                    , function (response) {
                        $.toaster({
                            priority: 'danger'
                            , title: 'Error'
                            , message: 'No se pudo modificar el hotel'
                        });
                    });

                console.log(index);
            };
            //-------------------------Insertar------------------------------------//
            $scope.insertar = function () {

                $scope.nuevo.imagenNombre = $('input[type=file]').val().split('\\').pop();
                console.log($scope.nuevo);
                controller.service.save($scope.nuevo).$promise.then(function (response) {
                    console.log(response);
                    $scope.lista.push(response);
                    $.toaster({
                        priority: 'success'
                        , title: 'Exito'
                        , message: 'Hotel agregado'
                    });
                }, function (response) {
                    $.toaster({
                        priority: 'danger'
                        , title: 'Error'
                        , message: 'No se pudo agregar el hotel'
                    });
                });
            };
            /*-----------------------------Limpiar-----------------------------------*/
            $scope.limpiar = function () {
                $scope.municipios = [];
                angular.forEach($scope.form, function (input) {
                    if (input && input.hasOwnProperty('$viewValue')) {
                        input.$setUntouched();
                    }
                });
                $scope.bandNuevo = true;
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
                $("#subirArchivo").val("");
            };
            /*--------------------------------Ver en modal---------------------------*/
            $scope.verItem = function (item, index) {
                //$scope.actualizarMunicipios();
                $scope.bandNuevo = false;
                $scope.nuevo = angular.copy(item);
                $scope.nuevo.imagen = "";
                $scope.seleccionado = index;
                $scope.actualizarMunicipios();
            };
            $scope.actualizarMunicipios = function () {
                controller.serviceMunicipios.query({
                        id: $scope.nuevo.idEstado
                    }
                    , function (response) {
                        console.log(response);
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