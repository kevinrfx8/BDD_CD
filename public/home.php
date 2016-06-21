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
        <script type="text/javascript" src="../bower_components/jquery/dist/jquery.js"></script>
        <script type="text/javascript" src="../bower_components/bootstrap/dist/js/bootstrap.js"></script>
        <script src="../bower_components/angular/angular.js"></script>
    </head>

    <body ng-app="">
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
                            <div class="row">
                                <div class="col-md-1">
                                    <span class="fa-stack fa-3x">
                                        <i class="fa fa-square-o fa-stack-2x"></i>
                                        <i class="fa fa-plane fa-stack-1x"></i>
                                    </span>
                                </div>
                                <div class="col-md-10">
                                    <h4>Vuelo {{vuelo.numero}}: {{vuelo.origen}}-{{vuelo.destino}}</h4>
                                    <p>Aerolínea: {{vuelo.aerolinea}}&emsp;&emsp;Fecha: {{vuelo.fecha}}&emsp;&emsp;Hora de salida: {{vuelo.horaSalida}}&emsp;&emsp;Hora de llegada: {{vuelo.horaLlegada}}</p>
                                </div>
                            </div>
                        </div>
                        <div id="hoteles" ng-show="{{!hoteles}}" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-1">
                                    <span class="fa-stack fa-3x">
                                        <i class="fa fa-square-o fa-stack-2x"></i>
                                        <i class="fa fa-bed fa-stack-1x"></i>
                                    </span>
                                </div>
                                <div class="col-md-10">
                                    <h4>{{hotel.nombre}}: {{hotel.habitacion.tipo}}</h4>
                                    <p>Fecha: {{hotel.habitacion.fecha}}&emsp;&emsp;Noches: {{hotel.habitacion.noches}}&emsp;&emsp;Check-in: {{hotel.checkIn}}</p>
                                </div>
                            </div>
                        </div>
                        <div id="autos" ng-show="{{!autos}}" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-1">
                                    <span class="fa-stack fa-3x">
                                        <i class="fa fa-square-o fa-stack-2x"></i>
                                        <i class="fa fa-car fa-stack-1x"></i>
                                    </span>
                                </div>
                                <div class="col-md-10">
                                    <h4>{{auto.modelo}}: {{auto.placa}}</h4>
                                    <p>Agencia: {{carro.agencia}}&emsp;&emsp;Fecha de Renta: {{carro.fechaInicio}}&emsp;&emsp;Fecha de Entrega: {{carro.fechaEntrega}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php require('templates/footer.php');?>
    </body>

    </html>