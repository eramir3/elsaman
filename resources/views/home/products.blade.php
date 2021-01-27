@extends('layouts.home-master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home/components/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/components/modal-products.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/products.css') }}">
@endsection


@section('content')
    <main id="slidable">
        <section id="overview">
            <div class="container">
                <h1 class="title">{{ __('products.our_products_origin') }}</h1>
                <h2 class="overview-badge badge badge--pink">{{ __('products.tequendama') }}</h2>
                <p class="overview__description">
                    {{ __('products.tequendama_description') }}
                </p>
            </div>
        </section>
        <section class="overview-bottom">
            <h1>{{ __('products.our_products') }}</h1>
        </section>
        <section id="our-fruits" class="container">
            <h2 class="our-fruits-badge badge badge--pink__dark">{{ __('products.fruit_pulpe') }}</h2>
            <p class="section__description">
                {{ __('products.fruit_pulpe_description') }}
            </p>
        </section>
        <section id="fruits" class="container">
            <div class="fruit">
                <img id="pineapple-img" src="{{ asset('images/home/fruits/pineapple.png') }}" alt="" onclick="fruitImageClick('pineapple')">
                <h3 class="fruit-badge badge--pink__dark">{{ Str::upper(__('products.pineapple')) }}</h3>
            </div>
            <div class="fruit">
                <img src="{{ asset('images/home/fruits/passion_fruit.png') }}" alt="" onclick="fruitImageClick('passion_fruit')">
                <h3 class="fruit-badge badge--pink__dark">{{ Str::upper(__('products.passion_fruit')) }}</h3>
            </div>
            <div class="fruit">
                <img src="{{ asset('images/home/fruits/strawberry.png') }}" alt="" onclick="fruitImageClick('strawberry')">
                <h3 class="fruit-badge badge--pink__dark">{{ Str::upper(__('products.strawberry')) }}</h3>
            </div>
            <div class="fruit">
                <img src="{{ asset('images/home/fruits/mango.png') }}" alt="" onclick="fruitImageClick('mango')">
                <h3 class="fruit-badge badge--pink__dark">{{ Str::upper(__('products.mango')) }}</h3>
            </div>

            <div class="fruit">
                <img src="{{ asset('images/home/fruits/tamarillo.png') }}" alt="" onclick="fruitImageClick('tamarillo')">
                <h3 class="fruit-badge badge--pink__dark">{{ Str::upper(__('products.tamarillo')) }}</h3>
            </div>
            <div class="fruit">
                <img src="{{ asset('images/home/fruits/guava.png') }}" alt="" onclick="fruitImageClick('guava')">
                <h3 class="fruit-badge badge--pink__dark">{{ Str::upper(__('products.guava')) }}</h3>
            </div>
            <div class="fruit">
                <img src="{{ asset('images/home/fruits/lulo.png') }}" alt="" onclick="fruitImageClick('lulo')">
                <h3 class="fruit-badge badge--pink__dark">{{ Str::upper(__('products.lulo')) }}</h3>
            </div>
            <div class="fruit">
                <img src="{{ asset('images/home/fruits/tangerine.png') }}" alt="" onclick="fruitImageClick('tangerine')">
                <h3 class="fruit-badge badge--pink__dark">{{ Str::upper(__('products.tangerine')) }}</h3>
            </div>

            <div class="fruit">
                <img src="{{ asset('images/home/fruits/blackberry.png') }}" alt="" onclick="fruitImageClick('blackberry')">
                <h3 class="fruit-badge badge--pink__dark">{{ Str::upper(__('products.blackberry')) }}</h3>
            </div>
            <div class="fruit">
                <img src="{{ asset('images/home/fruits/soursop.png') }}" alt="" onclick="fruitImageClick('soursop')">
                <h3 class="fruit-badge badge--pink__dark">{{ Str::upper(__('products.soursop')) }}</h3>
            </div>
            <div class="fruit">
                <img src="{{ asset('images/home/fruits/curuba.png') }}" alt="" onclick="fruitImageClick('curuba')">
                <h3 class="fruit-badge badge--pink__dark">{{ Str::upper(__('products.curuba')) }}</h3>
            </div>
            <div class="fruit">
                <img src="{{ asset('images/home/fruits/feijoa.png') }}" alt="" onclick="fruitImageClick('feijoa')">
                <h3 class="fruit-badge badge--pink__dark">{{ Str::upper(__('products.feijoa')) }}</h3>
            </div>
        </section>
    </main>

    <x-home.modal-products></x-home.modal-products>
@endsection

@section('scripts')
    <script src="{{ asset('js/home/components/modal.js') }}" type="text/javascript"></script>
@endsection