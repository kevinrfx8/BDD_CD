<header id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for Slides -->
    <div class="carousel-inner">
        <div class="item active">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill" style="background-image:url('img/index1.jpg');"></div>
            <div class="carousel-caption">
                <h2>Cancún $1599</h2>
                <h5>Precio por noche. Consulte hoteles participantes.</h5>
            </div>
        </div>
        <div class="item">
            <!-- Set the second background image using inline CSS below. -->
            <div class="fill" style="background-image:url('img/index2.jpg');"></div>
            <div class="carousel-caption">
                <h2>Vallarta $989</h2>
                <h5>Precio por noche. Consulte hoteles participantes.</h5>
            </div>
        </div>
        <div class="item">
            <!-- Set the third background image using inline CSS below. -->
            <div class="fill" style="background-image:url('img/index3.jpg');"></div>
            <div class="carousel-caption">
                <h2>Aeroméxico 3x2</h2>
                <h5>Consulte destinos participantes. Aplican restricciones.</h5>
            </div>
        </div>
    </div>

</header>

<script>
    $('.carousel').carousel({
        interval: 3000 //changes the speed
    })
</script>