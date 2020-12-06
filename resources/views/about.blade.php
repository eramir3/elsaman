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
    <link rel="stylesheet" href="{{ asset('css/components/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
</head>
<body>

    <x-header></x-header>

    <main id="slidable">
        <div class="elements__container">
            <div class="container__parent">
                <img class="child-image" style="width: 200px; transform: rotate(42deg); top: -200px; left: 750px;" src="../images/about/grapefruit.png" />
                <img class="child-image" style="width: 200px; transform: rotate(180deg); top: -80px; left: -20px;" src="../images/about/grapefruit.png" />
                <img class="child-image" style="width: 100px; transform: rotate(42deg); top: -180px; left: 1000px;" src="../images/about/kiwi.png" />
                <img class="child-image" style="width: 200px; top: 200px; left: 1200px;" src="../images/about/grapefruit.png" />
                <img class="child-image" style="width: 200px; top: -250px; left: -200px;" src="../images/about/lemon.png" />
                <img class="child-image" style="width: 200px; top: 200px; left: -250px;" src="../images/about/lemon.png" />
                <section class="element element-right ">
                    <div class="element__image ">
                        <img src="../images/shared/saman-logo.png" alt="" >
                    </div>
                    <div class="element-right__info">
                        <div class="title">QUIENES SOMOS?</div>
                        <div class="badge badge--pink element__title">Nuestra Historia</div>
                        <p class="element__text">
                            En septiembre de 1999, la Asociación de Fruteros de Anapoima (AFA) fue creada por cuatro
                            campesinos que buscaban darle un valor agregado a las cosechas de los productores de la
                            región que se veían en dificultades para vender sus frutas en el mercado. Así, crearon
                            diferentes productos 100% naturales como la fruta de pulpa congelada, mermeladas y dulces
                            todos hechos a partir de frutas tropicales de la región.
                        </p>
                        <p class="element__text">
                            Veintiún años después, El Saman nació como una iniciativa para llevar estos productos del
                            corazón del Tequendama hasta Lyon y otras ciudades de Francia. Por un lado, trabajando
                            mano a mano con los campesinos de la región, buscamos pagarles un precio justo por su
                            cosecha, sin importar la temporada, además de reducir los costos de transporte. De esta forma,
                            los campesinos se preocupan únicamente por cosechar las frutas de la más alta calidad sin
                            tener la preocupación constante por venderlas.
                        </p>
                    </div>
                </section>
                <section class="element element-left">
                    <div class="element-left__info">
                        <div>
                            <p class="badge badge--pink element__title">Mision</p>
                        </div>
                        <p class="element__text">
                            Poner a disposición de nuestros clientes los mejores productos 100% naturales hechos a partir de frutas tropicales de la más alta calidad, al mismo tiempo que apoyamos la producción de los campesinos de la región del Tequendama en Colombia. 
                        </p>
                        <div>
                            <p class="badge badge--pink element__title">Vision</p>
                        </div>
                        <p class="element__text">
                            Compartir la riqueza de las frutas tropicales colombianas con el mundo, creando lazos de conexión entre los campesinos y nuestros clientes.
                        </p>
                    </div>
                    <div class="element__image">
                        <img src="../images/about/worker.png" class="parent-image" alt="">
                    </div>
                </section>
            </div>
        </div>
    </main>

    <x-footer></x-footer>
    
</body>

<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('js/components/header.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/components/lang-dropdown.js') }}" type="text/javascript"></script>
</html>
