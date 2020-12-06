<header class="web-header">
    <div class="web-header__container">
        <nav class="web-nav">
            <a href="{{ route('welcome', app()->getLocale()) }}" class="web-nav__brand">
                <img src="../images/shared/saman-logo-bg-white.png" alt="">
            </a>
            <ul class="web-nav__items">
                <li class="web-nav__item web-nav__items--pipe">
                    <a href="{{ route('about', app()->getLocale()) }}" class="{{ (request()->segment(2) == 'about') ? 'active' : '' }}">{{ Str::upper(__('nav-menu.about')) }}</a>
                </li>
                <li class="web-nav__item web-nav__items--pipe">
                    <a href="{{ route('products', app()->getLocale()) }}" class="{{ (request()->segment(2) == 'products') ? 'active' : '' }}">{{ Str::upper(__('nav-menu.products')) }}</a>
                </li>
                <li class="web-nav__item">
                    <a href="{{ route('contact', app()->getLocale()) }}" class="{{ (request()->segment(2) == 'contact') ? 'active' : '' }}">{{ Str::upper(__('nav-menu.contact')) }}</a>
                </li>
            </ul>
        </nav>
        <x-lang-dropdown></x-lang-dropdown>
    </div>
</header>

<section id="nav-bottom">
    <div class="nav-bottom__line"></div>
</section>

<header class="mobile-header">
    <div></div>
    <nav class="mobile-nav">
        <button type="button" class="toggle-button" onclick="openNav()">
            <span class="toggle-button__bar"></span>
            <span class="toggle-button__bar"></span>
            <span class="toggle-button__bar"></span>
        </button>
        <a href="{{ route('welcome', app()->getLocale()) }}" class="mobile-header__brand">
            <img src="../images/shared/saman-logo-bg-white.png" alt="">
        </a>
        <x-lang-dropdown-mobile></x-lang-dropdown-mobile>
    </nav>
    <section class="nav-bottom__line"></section>
    <div class="mobile-nav__items" id="mobile-nav__menu">
        <div id="mobile-nav__items--container">
            <a href="{{ route('about', app()->getLocale()) }}" class="mobile-nav__item">{{ Str::upper(__('nav-menu.about')) }}</a>
            <a href="{{ route('products', app()->getLocale()) }}" class="mobile-nav__item">{{ Str::upper(__('nav-menu.products')) }}</a>
            <a href="{{ route('contact', app()->getLocale()) }}">{{ Str::upper(__('nav-menu.contact')) }}</a>
        </div>
    </div>
</header>