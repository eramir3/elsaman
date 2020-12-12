<div class="footer-top"></div>
<footer class="main-footer">
    <div class="footer__container">            
        <nav>
            <div class="main-footer__image-container">
                <a href="{{ route('welcome', app()->getLocale()) }}">
                    <img src="../images/shared/gray-logo.png" alt="">
                </a>
            </div>
            <div class="main-footer__info">
                <ul class="main-footer__links">
                    <li class="main-footer__link">
                        <a href="#">
                            <img src="{{ asset('images/shared/social/facebook-green.svg') }}" alt="" />
                        </a>
                    </li>
                    <li class="main-footer__link">
                        <a href="#">
                            <img src="{{ asset('images/shared/social/instagram-green.svg') }}" alt="" /></i>
                        </a>
                    </li>
                    <li class="main-footer__link">
                        <a href="https://wa.me/33788225586">
                            <img src="{{ asset('images/shared/social/whatsapp-green.svg') }}" alt="" /></i>
                        </a>
                    </li>
                    <li class="main-footer__link">
                        <a href="#">
                            <img src="{{ asset('images/shared/social/linkedin-green.svg') }}" alt="" /></i>
                        </a>
                    </li>
                </ul>
                <p>{{ __('footer.discover_colombian_flavors') }}</p>
            </div>
        </nav>
        <div class="main-footer__legal">
            <p><strong>{{ Str::upper(__('footer.ci_radco')) }}</strong></p>
            <p>{{ Str::upper(__('footer.reserved_rights')) }}</p>
            <p>{{ now()->year }}</p>
        </div>
        <br>
        <br>
    </div>
</footer>