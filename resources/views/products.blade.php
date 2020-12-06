<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name', 'El Saman')}}</title>
    <!-- <link rel="icon" type="image/png" href="images/favicon.png"> -->
    <link rel="stylesheet" href="{{ asset('css/shared.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/lang-dropdown.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
</head>
<body>

    <x-header></x-header>
    
    <main id="slidable">
        <section id="overview">
            <div class="container">
                <div class="title">De donde vienen nuestras frutas?</div>
                <div class="overview-badge badge badge--pink">tequendama</div>
                <p class="overview__description">
                    En Colombia, la region del tequendama dadas sus condiciones climáticas, pluviosidad 
                    y diversidad de pisos térmicos, presenta un entorno propicio para
                    la producción de frutas tropicales. el mango ostenta una posición
                    favorable entre los productos exportables del departamento, dadas las condiciones
                    de demanda mundial, la regularidad del cultivo y los altos niveles de producción
                    con respecto a otros productos agrícolas.
                </p>
            </div>
        </section>
        <section class="overview-bottom">
            <div>Our products</div>
        </section>
        <section id="our-fruits" class="container">
            <div class="our-fruits-badge badge badge--pink__dark">fruit pulpes</div>
            <p class="section__description">
                Nuestras frutas son elegidas con los estandares mas altos de calidad para asegurar
                un producto 100% fresco, natural y saludable. Haz click en la imagenes para saber mas acerca 
                de nuestro producto.
            </p>
        </section>
        <section id="fruits" class="container">
            <div class="fruit">
                <img id="pineapple-img" src="../images/fruits/pineapple.png" alt="" onclick="fruitImageClick()">
                <h3 class="fruit-badge badge--pink__dark">PINEAPPLE</h3>
            </div>
            <div class="fruit">
                <img src="../images/fruits/passionfruit.png" alt="">
                <h3 class="fruit-badge badge--pink__dark">PASSION FRUIT</h3>
            </div>
            <div class="fruit">
                <img src="../images/fruits/strawberry.png" alt="">
                <h3 class="fruit-badge badge--pink__dark">STRAWBERYY</h3>
            </div>
            <div class="fruit">
                <img src="../images/fruits/mango.png" alt="">
                <h3 class="fruit-badge badge--pink__dark">MANGO</h3>
            </div>

            <div class="fruit">
                <img src="../images/fruits/tamarillo.png" alt="">
                <h3 class="fruit-badge badge--pink__dark">TAMARILLO</h3>
            </div>
            <div class="fruit">
                <img src="../images/fruits/guava.png" alt="">
                <h3 class="fruit-badge badge--pink__dark">GUAVA</h3>
            </div>
            <div class="fruit">
                <img src="../images/fruits/lulo.png" alt="">
                <h3 class="fruit-badge badge--pink__dark">LULO</h3>
            </div>
            <div class="fruit">
                <img src="../images/fruits/tangerine.png" alt="">
                <h3 class="fruit-badge badge--pink__dark">TANGERINE</h3>
            </div>

            <div class="fruit">
                <img src="../images/fruits/blackberry.png" alt="">
                <h3 class="fruit-badge badge--pink__dark">BLACKBERRY</h3>
            </div>
            <div class="fruit">
                <img src="../images/fruits/soursop.png" alt="">
                <h3 class="fruit-badge badge--pink__dark">SOURSOP</h3>
            </div>
            <div class="fruit">
                <img src="../images/fruits/curuba.png" alt="">
                <h3 class="fruit-badge badge--pink__dark">CURUBA</h3>
            </div>
            <div class="fruit">
                <img src="../images/fruits/feijoa.png" alt="">
                <h3 class="fruit-badge badge--pink__dark">FEIJOA</h3>
            </div>
        </section>
    </main>
    <x-footer></x-footer>
    <x-modal></x-modal>
</body>

<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('js/components/header.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/components/lang-dropdown.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/components/modal.js') }}" type="text/javascript"></script>

</html>
