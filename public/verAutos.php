<?php
    session_start();
    
?>
    <!DOCTYPE html>
    <html lang="es" ng-app="app">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>VerAutos</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="../bower_components/components-font-awesome/less/font-awesome.css">

        <link rel="stylesheet" href="../bower_components/bootstrap/less/bootstrap.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="../bower_components/jquery-ui/themes/cupertino/jquery-ui.css">
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
                    <div class="row">
                        <div class='col-sm-3'>
                            <span class="fa fa-calendar fa-3X" aria-hidden="true"></span>
                            <label>Fecha Salida</label>
                            <input type="text" id="datepicker">

                        </div>
                        <div class='col-sm-3'>
                            <span class="fa fa-calendar fa-3X" aria-hidden="true"></span>
                            <label>Selección Días</label>
                            <input type="text" id="dias">

                        </div>
                        <div class='col-sm-3'>

                            <div class="form-group">
                                <span class="glyphicon glyphicon-globe"></span>
                                <label>País</label>

                                <select class="form-control" id="sel1">
                                    <option>1</option>
                                </select>
                            </div>

                        </div>

                        <div class='col-sm-3'>

                            <div class="form-group">
                                <span class="glyphicon glyphicon-globe"></span>
                                <label>Estado</label>
                                <select class="form-control" id="sel1">
                                    <option>1</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="media">
                    <a class="media-left media-middle" href="#">
                        <img class="media-object" src="http://www.rawgoodage.com/wp-content/uploads/2011/04/Deadmau5-140x140.jpeg" alt="Generic placeholder image" class="img-circle">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Media heading</h4> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>


            </main>
            <?php require('templates/footer.php');?>
    </body>
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
    <script src="../bower_components/Toaster/jquery.toaster.js"></script>
    <script>
        $.toaster({
            priority: 'success'
            , title: 'Title'
            , message: 'Your message here'
        });
    </script>

    </html>