<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name', 'El Saman')}}</title>
    <!-- <link rel="icon" type="image/png" href="images/favicon.png"> -->
    <link rel="stylesheet" href="{{ asset('css/shared.css') }}">
    <link rel="stylesheet" href="{{ asset('css/our-fruits.css') }}">
</head>
<body>

    <x-header></x-header>
    
    <main id="slidable">
        <section id="overview" class="container">
            <div class="title">De donde vienen nuestras frutas?</div>
            <div class="overview-badge badge badge--pink">Tequendama</div>
            <p class="section__description">
                En Colombia, la region del tequendama dadas sus condiciones climáticas, pluviosidad 
                y diversidad de pisos térmicos, presenta un entorno propicio para
                la producción de frutas tropicales. el mango ostenta una posición
                favorable entre los productos exportables del departamento, dadas las condiciones
                de demanda mundial, la regularidad del cultivo y los altos niveles de producción
                con respecto a otros productos agrícolas.
            </p>
        </section>
        <section id="our-fruits" class="container">
            <div class="our-fruits-badge badge badge--pink__dark">nuestras frutas</div>
            <p class="section__description">
                Nuestras frutas son elegidas con los estandares mas altos de calidad para asegurar
                un producto 100% fresco, natural y saludable.
            </p>
        </section>
        <section id="fruits" class="container">
            <div class="fruit">
                <img id="pineapple-img" src="../images/fruits/pineapple.png" alt="" onclick="fruitImageClick()">
                <h3 class="fruit-badge">PINEAPPLE</h3>
            </div>
            <div class="fruit">
                <img src="../images/fruits/passionfruit.png" alt="">
                <h3 class="fruit-badge">PASSION FRUIT</h3>
            </div>
            <div class="fruit">
                <img src="../images/fruits/strawberry.png" alt="">
                <h3 class="fruit-badge">STRAWBERYY</h3>
            </div>
            <div class="fruit">
                <img src="../images/fruits/mango.png" alt="">
                <h3 class="fruit-badge">MANGO</h3>
            </div>

            <div class="fruit">
                <img src="../images/fruits/tamarillo.png" alt="">
                <h3 class="fruit-badge">TAMARILLO</h3>
            </div>
            <div class="fruit">
                <img src="../images/fruits/guava.png" alt="">
                <h3 class="fruit-badge">GUAVA</h3>
            </div>
            <div class="fruit">
                <img src="../images/fruits/lulo.png" alt="">
                <h3 class="fruit-badge">LULO</h3>
            </div>
            <div class="fruit">
                <img src="../images/fruits/tangerine.png" alt="">
                <h3 class="fruit-badge">TANGERINE</h3>
            </div>

            <div class="fruit">
                <img src="../images/fruits/blackberry.png" alt="">
                <h3 class="fruit-badge">BLACKBERRY</h3>
            </div>
            <div class="fruit">
                <img src="../images/fruits/soursop.png" alt="">
                <h3 class="fruit-badge">SOURSOP</h3>
            </div>
            <div class="fruit">
                <img src="../images/fruits/curuba.png" alt="">
                <h3 class="fruit-badge">CURUBA</h3>
            </div>
            <div class="fruit">
                <img src="../images/fruits/feijoa.png" alt="">
                <h3 class="fruit-badge">FEIJOA</h3>
            </div>
        </section>
    </main>

    <x-footer></x-footer>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="modal-content__close">&times;</span>
            <h1 class="badge badge--pink modal-title">pineapple</h1>
            <section class="fruit-description" style="display: flex; justify-content: center;">
                <div class="fruit-modal-image">
                    <img id="pineapple-img" src="../images/fruits/pineapple.png" alt="">
                    <p class="card-shadow__center">
                        Es originaria de america del sur
                        <br>
                        (Ananas comusus)
                    </p>
                </div>
                <div class="fruit-facts">
                <h4 class="badge badge--pink">datos de la fruta</h4>
                    Es originaria de América del Sur. Fuente de vitamina A, C y B6, potasio, fibra, magnesio , manganeso  y ácido fólico. también es rica en antioxidantes.
                </div>
                <!-- <div class="nutritional-facts">
                    <h4 class="badge badge--pink">aportes nutricionales</h4>
                    <div class="modal-card" style="border: 1px solid lightgray; border-radius: 20px;">
                        <h5 style="
                        border-bottom: 1px solid lightgray;
                        margin: 0 auto;
                        padding: 1rem 0;
                        text-align: center;">VITAMINS AND MINERALS</h5>
                        <ul style="column-count: 2;">
                            <li>VITAMINE A</li>
                            <li>VITAMINE B</li>
                            <li>VITAMINE C</li>
                            <li>VITAMINE D</li>
                            <li>VITAMINE E</li>
                            <li>VITAMINE F</li>
                            <li>VITAMINE G</li>
                        </ul>
                    </div>
                </div> -->
            </section>
        </div>
    </div>

</body>

<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('js/shared.js') }}" type="text/javascript"></script>

<script>

function fruitImageClick() {

    var modal = document.getElementById("myModal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("modal-content__close")[0];

    modal.style.display = "block";

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}
</script>

</html>
