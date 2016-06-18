<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="../bower_components/Materialize/dist/css/materialize.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <?php require('templates/header.php');?>


        <main>
            <?php 
    
                if(isset($_SESSION['id'])&& $_SESSION['tipo']==0)
                    //es un usuario
                    require('templates/indexAdmin.php');

                else
                    require('templates/indexUser.php');

            ?>
        </main>

        <?php require('templates/footer.php');?>
</body>
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../bower_components/Materialize/dist/js/materialize.js"></script>
<script src="assets/javascript/javascript.js"></script>

</html>