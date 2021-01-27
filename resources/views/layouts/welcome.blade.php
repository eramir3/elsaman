<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name', 'El Saman')}}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/saman/shared/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/saman/components/lang-dropdown.css') }}">
    <link rel="stylesheet" href="{{ asset('css/saman/welcome.css') }}">
</head>
<body>
    <header class="welcome-header">
        <div id="web-dropdown" class="welcome-header__container">
            <div></div>
            <nav class="welcome-nav">
                <ul class="welcome-nav__items">
                    <li class="welcome-nav__item welcome-nav__item--pipe">
                        <a href="{{ route('saman.about', app()->getLocale()) }}" subject="{{ Str::upper(__('header.about')) }}">
                            {{ Str::upper(__('header.about')) }}
                        </a>
                    </li>
                    <li class="welcome-nav__item welcome-nav__item--pipe">
                        <a href="{{ route('saman.products', app()->getLocale()) }}" subject="{{ Str::upper(__('header.products')) }}">
                            {{ Str::upper(__('header.products')) }}
                        </a>
                    </li>
                    <li class="welcome-nav__item welcome-nav__item--pipe">
                        <a href="{{ route('saman.learn', app()->getLocale()) }}" subject="{{ Str::upper(__('header.learn')) }}">
                            {{ Str::upper(__('header.learn')) }}
                        </a>
                    </li>
                    <li class="welcome-nav__item">
                        <a href="{{ route('saman.contact', app()->getLocale()) }}" subject="{{ Str::upper(__('header.contact')) }}">
                            {{ Str::upper(__('header.contact')) }}
                        </a>
                    </li>
                </ul>
            </nav>
            <x-saman.lang-dropdown></x-saman.lang-dropdown>
        </div>
    </header>
    <main>
        <div class="main-container">
            <div class="welcome-logo">
                <img src="{{ asset('images/saman/shared/white-logo.png') }}" alt="">
            </div>
            <div id="mobile-dropdown"></div>
        </div>
    </main>

    <div class="footer-title">
        <div class="footer-container">
            <p>{{ __('footer.discover_colombian_flavors') }}</p>
        </div>
        <nav>
            <div class="footer__info">
                <ul class="footer__links">
                    <li class="footer__link">
                        <a href="#">
                            <img src="{{ asset('images/saman/shared/social/facebook-white.svg') }}" alt="" />
                        </a> &nbsp;&nbsp;
                    </li>
                    <li class="footer__link">
                        <a href="#">
                            <img src="{{ asset('images/saman/shared/social/instagram-white.svg') }}" alt="" /></i>
                        </a>&nbsp;&nbsp;
                    </li>
                    <li class="footer__link">
                        <a href="#">
                            <img src="{{ asset('images/saman/shared/social/whatsapp-white.svg') }}" alt="" /></i>
                        </a>&nbsp;&nbsp;
                    </li>
                    <li class="footer__link">
                        <a href="#">
                            <img src="{{ asset('images/saman/shared/social/linkedin-white.svg') }}" alt="" /></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <footer></footer>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/saman/components/lang-dropdown.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/saman/welcome.js') }}" type="text/javascript"></script>
</body>
</html>