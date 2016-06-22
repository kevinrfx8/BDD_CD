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
        <title>Administración Autos</title>

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
                    <h2>Autos</h2>
                    <div class="row">
                        <form class="col s12" id="filtros">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="input-group-lg">
                                        <span class="fa fa-car fa-2x "></span>
                                        <label for="">Agecias:</label>
                                        <select name="agencias" class="form-control" id="selectAgencia" ng-options="item.id as item.nombre for item in agencias" ng-model="agencia" ng-change="getAutos()" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6">

                                    <div class="input-group-lg">
                                        <span class="fa fa-search fa-2x "></span>
                                        <input id="icon_prefix" type="text" class="form-control" ng-model="filtro" placeholder="Buscar">
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <div class="input-group-lg">
                                        <label for=""> </label>
                                        <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#modal" ng-click="limpiar()">Nuevo Auto</button>
                                    </div>
                                </div>
                            </div>
                            <div class=" row ">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th data-field="id ">Tipo</th>
                                            <th data-field="name ">Precio</th>
                                            <th data-field="name ">Modelo</th>

                                            <th data-field="price ">Estado</th>
                                            <th data-field="price ">Municipio</th>
                                            <th data-field="price ">Imagen</th>

                                            <th data-field="price ">Eliminar</th>
                                            <th data-field="price ">Modificar</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr ng-repeat="item in lista|filter:filtro ">
                                            <td class="vert-align">{{item.descripcion}}</td>
                                            <td class="vert-align">{{item.precio}}</td>
                                            <td class="vert-align">{{item.modelo}}</td>
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
                <div class="modal-dialog modal-lg">
                    <!-- modal content -->
                    <div class="modal-content ">
                        <!-- modal header-->
                        <div class="modal-header">
                            <h2>{{bandNuevo ? 'Auto Nuevo ':'Modificar Auto '}}</h2>
                        </div>
                        <!-- modal body -->
                        <div class="modal-body">
                            <div class="container-fluid">

                                <form class="" id="form" name="form">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <label for="">Precio:</label>
                                            <div class="input-group margin-bottom-sm ">
                                                <span class="input-group-addon"><i class="fa fa-usd fa-fw"></i></span>
                                                <input id="modalPrecio" name="precio" type="number" class="form-control" step="0.01"  ng-model="nuevo.precio" placeholder="Precio" required>
                                            </div>
                                            <div class="alert alert-warning oculto" ng-class="{'visible':form.precio.$touched && form.precio.$invalid}">
                                                <strong>Atención!</strong> Enteros y Decimales solamente
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <label for="">Modelo:</label>
                                            <div class="input-group margin-bottom-sm ">
                                                <span class="input-group-addon"><i class="fa fa-cog fa-fw"></i></span>
                                                <input name="modelo" id="modalModelo" type="text" class="form-control" pattern="[A-Za-z0-9 ]{2,35}" ng-model="nuevo.modelo" placeholder="Modelo" required>
                                            </div>
                                            <div class="alert alert-warning oculto" ng-class="{'visible':form.modelo.$touched && form.modelo.$invalid}">
                                                <strong>Atención!</strong> Campo Alfanumérico con 2 caracteres mínimo y 36 máximo
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <label for="">Puertas:</label>
                                            <div class="input-group margin-bottom-sm ">
                                                <span class="input-group-addon"><i class="fa fa-hdd-o fa-fw"></i></span>
                                                <input name="puertas" id="modalPuertas" type="number" class="form-control" min="2" max="8" ng-model="nuevo.puertas" placeholder="Puertas" required>
                                            </div>
                                            <div class="alert alert-warning oculto" ng-class="{'visible':form.puertas.$touched && form.puertas.$invalid}">
                                                <strong>Atención!</strong> Numéricos solamente de 1 cifra entre 2 y 8
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <label for="">Tipo Auto:</label>
                                            <div class="input-group margin-bottom-sm ">
                                                <span class="input-group-addon"><i class="fa fa-car fa-fw"></i></span>
                                                <select name="tipo" class="form-control" id="selectTipo" ng-options="item.idTipoAuto as item.descripcion for item in tipos" ng-model="nuevo.idTipoAuto" required>
                                                </select>
                                            </div>
                                            <div class="alert alert-warning oculto" ng-class="{'visible':form.tipo.$touched && form.tipo.$invalid}">
                                                <strong>Atención!</strong> Seleccione alguna opción
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <label for="">Asientos:</label>
                                            <div class="input-group margin-bottom-sm ">
                                                <span class="input-group-addon"><i class="fa fa-square fa-fw"></i></span>
                                                <input name="asiento" id="modalAsiento" type="number" class="form-control" min="2" max="8" ng-model="nuevo.asientos" placeholder="Asientos" required>
                                            </div>
                                            <div class="alert alert-warning oculto" ng-class="{'visible':form.asiento.$touched && form.asiento.$invalid}">
                                                <strong>Atención!</strong> Numéricos solamente de 1 cifra entre 2 y 8
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <label for="">Cajuela:</label>
                                            <div class="input-group margin-bottom-sm ">
                                                <span class="input-group-addon"><i class="fa fa-car fa-fw"></i></span>
                                                <select name="cajuela" class="form-control" ng-model="nuevo.cajuela" required>
                                                    <option value="Grande">Grande</option>
                                                    <option value="Mediana">Mediana</option>
                                                    <option value="Chica">Chica</option>
                                                </select>
                                            </div>
                                            <div class="alert alert-warning oculto" ng-class="{'visible':form.cajuela.$touched && form.cajuela.$invalid}">
                                                <strong>Atención!</strong> Seleccione una opción
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <label for="">Transmisión:</label>
                                            <div class="input-group margin-bottom-sm ">
                                                <span class="input-group-addon"><i class="fa fa-map-pin fa-fw"></i></span>
                                                <select name="transmision" class="form-control" ng-model="nuevo.transmision" required>
                                                    <option value="Estandar">Estandar</option>
                                                    <option value="Automatica">Automatica</option>
                                                </select>
                                                </div>
                                            <div class="alert alert-warning oculto" ng-class="{'visible':form.transmision.$touched && form.transmision.$invalid}">
                                                <strong>Atención!</strong> Seleccione una opción
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <label for="">Aire:</label>
                                            <div class="input-group margin-bottom-sm ">
                                                <span class="input-group-addon"><i class="fa fa-spinner fa-fw"></i></span>
                                                <select  name="aire" class="form-control" ng-model="nuevo.aire" required>
                                                    <option value="Si" selected>Si</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                            <div class="alert alert-warning oculto" ng-class="{'visible':form.aire.$touched && form.aire.$invalid}">
                                                <strong>Atención!</strong> Seleccione una opción
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
                return $resource(baseURL + 'autos.php', null, {
                    'update': {
                        method: 'PUT'
                    }
                });
            };
            this.getAgencias = function () {
                return $resource(baseURL + 'agencias.php', null, {
                    'update': {
                        method: 'PUT'
                    }
                });
            };
            this.getTipo = function () {
                return $resource(baseURL + 'tipoAutos.php', null, {
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
            $scope.agencias = [];
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
            var controller = this;
            $scope.titulo = true;
            $scope.lista = [];
            this.service = factory.getInfo(); //get autos
            this.serviceAgencias = factory.getAgencias();
            this.serviceTipo = factory.getTipo();

            /*--------------------------------Cargar Registros de inicio-------------------------*/
            this.serviceAgencias.query(
                function (response) {
                    $scope.agencias = response;

                }
                , function (response) {});
            this.serviceTipo.query(function (response) {
                $scope.tipos = response;
            });

            /*-----------------------------Eliminar---------------------------------------------*/
            $scope.eliminar = function (index) {
                controller.service.delete({
                        id: $scope.lista[index].idAuto
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
                var obj = $.grep($scope.agencias, function (e) {
                    return e.id == $scope.agencia;
                });
                console.log(obj[0]);
                $scope.nuevo.estado = obj[0].estado;
                $scope.nuevo.municipio = obj[0].municipio;
                $scope.nuevo.idAgencia = $scope.agencia;
                $scope.nuevo.descripcion = $('#selectTipo option:selected').text();
                $scope.nuevo.imagenNombre = $('input[type=file]').val().split('\\').pop();
                console.log($scope.nuevo);
                controller.service.save($scope.nuevo).$promise.then(function (response) {
                    //console.log(response);
                    $scope.lista.push(response);
                    $.toaster({
                        priority: 'success'
                        , title: 'Exito'
                        , message: 'Registro insertado'
                    });
                }, function (response) {
                    console.log(response + "");
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
            $scope.getAutos = function () {
                controller.service.query({
                        id: $scope.agencia
                    }
                    , function (response) {
                        $scope.lista = response;

                    }
                    , function (response) {});
            };
        }]);
    </script>

    </html>