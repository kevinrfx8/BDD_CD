<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Kelpo Tours</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php if(isset($_SESSION['id']) && $_SESSION['tipo']==0){ ?>
                    <li><a href="index.php">Administrar</a></li>
                    <?php  }else{?>
                        <li><a href="verVuelos.php">Vuelos</a></li>
                        <li><a href="verHabitaciones.php">Hoteles</a></li>
                        <li><a href="verAutos.php">Autos</a></li>
                        <?php } ?>
            </ul>
            <!-- Si esta logeado-->
            <?php if(isset($_SESSION['id'])){?>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Bienvenido <?=$_SESSION['nickname']?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php if($_SESSION['tipo']!=0){ //Si no es un administrador?>
                                <li><a href="home.php">Mis reservaciones</a></li>
                                <?php }?>
                                    <li><a href="api/salir.php">Salir</a></li>
                        </ul>
                    </li>
                </ul>
                <?php } else{ ?>
                    <!--Si no esta logeado -->
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="register.php">Registrarse</a></li>
                        <li><a href="login.php">Ingresar</a></li>
                    </ul>
                    <?php }?>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>