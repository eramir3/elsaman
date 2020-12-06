<dl class="lang-dropdown lang-dropdown-mobile">
    <dt>
        <a href="javascript:void(0)" class="lang-dropdown__selected">
            <span>
                <span class="lang-dropdown__value">{{ app()->getLocale() }}</span>
                @if ( app()->getLocale() === Config::get('constants.es') ) 
                    <img class="lang-dropdown__flag-mobile" src="{{ asset('images/flags/es.svg') }}" alt="" />
                @elseif ( app()->getLocale() === Config::get('constants.fr') )
                    <img class="lang-dropdown__flag-mobile" src="{{ asset('images/flags/fr.svg') }}" alt="" />
                @else
                    <img class="lang-dropdown__flag-mobile" src="{{ asset('images/flags/en.svg') }}" alt="" />
                @endif
            </span>
        </a>
    </dt>
    <dd>
        <ul class="lang-dropdown__items">
            <li class="lang-dropdown__item">
                <a href="{{ route(Route::currentRouteName(), 'en') }}">
                    <img class="lang-dropdown__flag-mobile" src="{{ asset('images/flags/en.svg') }}" alt="" /><span class="lang-dropdown__value">{{ Config::get('constants.en') }}</span>{{ Str::upper(Config::get('constants.en')) }}
                </a>
            </li>
            <li class="lang-dropdown__item">
                <a href="{{ route(Route::currentRouteName(), 'fr') }}">
                    <img class="lang-dropdown__flag-mobile" src="{{ asset('images/flags/fr.svg') }}" alt="" /><span class="lang-dropdown__value">{{ Config::get('constants.fr') }}</span>{{ Str::upper(Config::get('constants.fr')) }}
                </a>
            </li>
            <li class="lang-dropdown__item">
                <a href="{{ route(Route::currentRouteName(), 'es') }}">
                    <img class="lang-dropdown__flag-mobile" src="{{ asset('images/flags/es.svg') }}" alt="" /><span class="lang-dropdown__value">{{ Config::get('constants.es') }}</span>{{ Str::upper(Config::get('constants.es')) }}
                </a>
            </li>
        </ul>
    </dd>
</dl>