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
    <link rel="stylesheet" href="{{ asset('css/components/modal-products.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
</head>
<body>

    <x-header></x-header>
    
    <main id="slidable">
        <section id="overview">
            <div class="container">
                <div class="title">{{ __('products.our_products_origin') }}</div>
                <div class="overview-badge badge badge--pink">{{ __('products.tequendama') }}</div>
                <p class="overview__description">
                    {{ __('products.tequendama_description') }}
                </p>
            </div>
        </section>
        <section class="overview-bottom">
            <div>{{ __('products.our_products') }}</div>
        </section>
        <section id="our-fruits" class="container">
            <div class="our-fruits-badge badge badge--pink__dark">{{ __('products.fruit_pulpe') }}</div>
            <p class="section__description">
                {{ __('products.fruit_pulpe_description') }}
            </p>
        </section>
        <section id="fruits" class="container">
            <div class="fruit">
                <img id="pineapple-img" src="../images/fruits/pineapple.png" alt="" onclick="fruitImageClick('pineapple')">
                <h3 class="fruit-badge badge--pink__dark">{{ Str::upper(__('products.pineapple')) }}</h3>
            </div>
            <div class="fruit">
                <img src="../images/fruits/passion_fruit.png" alt="" onclick="fruitImageClick('passion_fruit')">
                <h3 class="fruit-badge badge--pink__dark">{{ Str::upper(__('products.passion_fruit')) }}</h3>
            </div>
            <div class="fruit">
                <img src="../images/fruits/strawberry.png" alt="" onclick="fruitImageClick('strawberry')">
                <h3 class="fruit-badge badge--pink__dark">{{ Str::upper(__('products.strawberry')) }}</h3>
            </div>
            <div class="fruit">
                <img src="../images/fruits/mango.png" alt="" onclick="fruitImageClick('mango')">
                <h3 class="fruit-badge badge--pink__dark">{{ Str::upper(__('products.mango')) }}</h3>
            </div>

            <div class="fruit">
                <img src="../images/fruits/tamarillo.png" alt="" onclick="fruitImageClick('tamarillo')">
                <h3 class="fruit-badge badge--pink__dark">{{ Str::upper(__('products.tamarillo')) }}</h3>
            </div>
            <div class="fruit">
                <img src="../images/fruits/guava.png" alt="" onclick="fruitImageClick('guava')">
                <h3 class="fruit-badge badge--pink__dark">{{ Str::upper(__('products.guava')) }}</h3>
            </div>
            <div class="fruit">
                <img src="../images/fruits/lulo.png" alt="" onclick="fruitImageClick('lulo')">
                <h3 class="fruit-badge badge--pink__dark">{{ Str::upper(__('products.lulo')) }}</h3>
            </div>
            <div class="fruit">
                <img src="../images/fruits/tangerine.png" alt="" onclick="fruitImageClick('tangerine')">
                <h3 class="fruit-badge badge--pink__dark">{{ Str::upper(__('products.tangerine')) }}</h3>
            </div>

            <div class="fruit">
                <img src="../images/fruits/blackberry.png" alt="" onclick="fruitImageClick('blackberry')">
                <h3 class="fruit-badge badge--pink__dark">{{ Str::upper(__('products.blackberry')) }}</h3>
            </div>
            <div class="fruit">
                <img src="../images/fruits/soursop.png" alt="" onclick="fruitImageClick('soursop')">
                <h3 class="fruit-badge badge--pink__dark">{{ Str::upper(__('products.soursop')) }}</h3>
            </div>
            <div class="fruit">
                <img src="../images/fruits/curuba.png" alt="" onclick="fruitImageClick('curuba')">
                <h3 class="fruit-badge badge--pink__dark">{{ Str::upper(__('products.curuba')) }}</h3>
            </div>
            <div class="fruit">
                <img src="../images/fruits/feijoa.png" alt="" onclick="fruitImageClick('feijoa')">
                <h3 class="fruit-badge badge--pink__dark">{{ Str::upper(__('products.feijoa')) }}</h3>
            </div>
        </section>
    </main>
    <x-footer></x-footer>
    <x-modal-products></x-modal-products>
</body>

<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('js/components/header.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/components/lang-dropdown.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/components/modal.js') }}" type="text/javascript"></script>

</html>
