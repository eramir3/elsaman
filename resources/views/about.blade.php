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
                        <div class="title">{{ __('about.about') }}</div>
                        <div class="badge badge--pink element__title">{{ __('about.our_history') }}</div>
                        <p class="element__text">
                            {{ __('about.about_description_1') }}
                        </p>
                        <p class="element__text">
                            {{ __('about.about_description_2') }}
                        </p>
                    </div>
                </section>
                <section class="element element-left">
                    <div class="element-left__info">
                        <div>
                            <p class="badge badge--pink element__title">{{ __('about.mission') }}</p>
                        </div>
                        <p class="element__text">
                            {{ __('about.mission_description') }}
                        </p>
                        <div>
                            <p class="badge badge--pink element__title">{{ __('about.vision') }}</p>
                        </div>
                        <p class="element__text">
                            {{ __('about.vision_description') }}
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
