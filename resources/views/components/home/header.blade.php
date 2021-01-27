
<header class="web-header">
    <div class="web-header__container">
        <nav class="web-nav">
            <a href="{{ route('home.welcome', app()->getLocale()) }}" class="web-nav__brand">
                <img src="../images/home/shared/saman-logo-bg-white.png" alt="">
            </a>
            <ul class="web-nav__items">
                <li class="web-nav__item web-nav__items--pipe">
                    <a href="{{ route('home.about', app()->getLocale()) }}" class="{{ (request()->segment(2) == 'about') ? 'active' : '' }}">{{ Str::upper(__('header.about')) }}</a>
                </li>
                <li class="web-nav__item web-nav__items--pipe">
                    <a href="{{ route('home.products', app()->getLocale()) }}" class="{{ (request()->segment(2) == 'products') ? 'active' : '' }}">{{ Str::upper(__('header.products')) }}</a>
                </li>
                <li class="web-nav__item web-nav__items--pipe">
                    <a href="{{ route('home.learn', app()->getLocale()) }}" class="{{ (request()->segment(2) == 'learn') ? 'active' : '' }}">{{ Str::upper(__('header.learn')) }}</a>
                </li>
                <li class="web-nav__item">
                    <a href="{{ route('home.contact', app()->getLocale()) }}" class="{{ (request()->segment(2) == 'contact') ? 'active' : '' }}">{{ Str::upper(__('header.contact')) }}</a>
                </li>
            </ul>
        </nav>
        <x-home.lang-dropdown></x-home.lang-dropdown>
    </div>
</header>

<section id="nav-bottom">
    <div class="nav-bottom__line"></div>
</section>

<header class="mobile-header">
    <nav class="mobile-nav">
        <button type="button" class="toggle-button" onclick="openNav()">
            <span class="toggle-button__bar"></span>
            <span class="toggle-button__bar"></span>
            <span class="toggle-button__bar"></span>
        </button>
        <a href="{{ route('home.welcome', app()->getLocale()) }}" class="mobile-header__brand">
            <img src="../images/home/shared/saman-logo-bg-white.png" alt="">
        </a>
        <x-home.lang-dropdown></x-home.lang-dropdown>
    </nav>
    <section class="nav-bottom__line"></section>
    <div class="mobile-nav__items" id="mobile-nav__menu">
        <div id="mobile-nav__items--container">
            <a href="{{ route('home.about', app()->getLocale()) }}" class="mobile-nav__item">{{ Str::upper(__('header.about')) }}</a>
            <a href="{{ route('home.products', app()->getLocale()) }}" class="mobile-nav__item">{{ Str::upper(__('header.products')) }}</a>
            <a href="{{ route('home.learn', app()->getLocale()) }}" class="mobile-nav__item">{{ Str::upper(__('header.learn')) }}</a>
            <a href="{{ route('home.contact', app()->getLocale()) }}">{{ Str::upper(__('header.contact')) }}</a>
        </div>
    </div>
</header>