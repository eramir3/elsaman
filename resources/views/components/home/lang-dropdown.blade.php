<dl id="lang-dropdown-web" class="lang-dropdown lang-dropdown-web">
    <dt>
        <a href="javascript:void(0)" class="lang-dropdown__selected">
            <span>
                <span class="lang-dropdown__value">{{ app()->getLocale() }}</span>
                @if ( app()->getLocale() === Config::get('constants.es') ) 
                    <img class="lang-dropdown__flag" src="{{ asset('images/home/flags/es.svg') }}" alt="" /><span class="lang-dropdown__text">{{ Str::upper(Config::get('constants.spanish')) }}</span>
                @elseif ( app()->getLocale() === Config::get('constants.fr') )
                    <img class="lang-dropdown__flag" src="{{ asset('images/home/flags/fr.svg') }}" alt="" /><span class="lang-dropdown__text">{{ Str::upper(Config::get('constants.french')) }}</span>
                @else
                    <img class="lang-dropdown__flag" src="{{ asset('images/home/flags/en.svg') }}" alt="" /><span class="lang-dropdown__text">{{ Str::upper(Config::get('constants.english')) }}</span>
                @endif
            </span>
        </a>
    </dt>
    <dd>
        <ul class="lang-dropdown__items">
            <li class="lang-dropdown__item">
                <a href="{{ route(Route::currentRouteName(), [Config::get('constants.en'), Request::segment(3)]) }}">
                    <img class="lang-dropdown__flag" src="{{ asset('images/home/flags/en.svg') }}" alt="" /><span class="lang-dropdown__value">{{ Config::get('constants.en') }}</span>
                    <span class="lang-fullname">{{ Str::upper(Config::get('constants.english')) }}</span>
                    <span class="lang-abbreviation">{{ Str::upper(Config::get('constants.en')) }}</span>
                </a>
            </li>
            <li class="lang-dropdown__item">
                <a href="{{ route(Route::currentRouteName(), [Config::get('constants.fr'), Request::segment(3)]) }}">
                    <img class="lang-dropdown__flag" src="{{ asset('images/home/flags/fr.svg') }}" alt="" /><span class="lang-dropdown__value">{{ Config::get('constants.fr') }}</span>
                    <span class="lang-fullname">{{ Str::upper(Config::get('constants.french')) }}</span>
                    <span class="lang-abbreviation">{{ Str::upper(Config::get('constants.fr')) }}</span>
                </a>
            </li>
            <li class="lang-dropdown__item">
                <a href="{{ route(Route::currentRouteName(), [Config::get('constants.es'), Request::segment(3)]) }}">
                    <img class="lang-dropdown__flag" src="{{ asset('images/home/flags/es.svg') }}" alt="" /><span class="lang-dropdown__value">{{ Config::get('constants.es') }}</span>
                    <span class="lang-fullname">{{ Str::upper(Config::get('constants.spanish')) }}</span>
                    <span class="lang-abbreviation">{{ Str::upper(Config::get('constants.es')) }}</span>
                </a>
            </li>
        </ul>
    </dd>
</dl>