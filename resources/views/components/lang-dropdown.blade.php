<dl id="lang-dropdown-web" class="lang-dropdown lang-dropdown-web">
    <dt>
        <a href="javascript:void(0)" class="lang-dropdown__selected">
            <span>
                <span class="lang-dropdown__value">{{ app()->getLocale() }}</span>
                @if ( app()->getLocale() === Config::get('constants.es') ) 
                    <img class="lang-dropdown__flag" src="{{ asset('images/flags/es.svg') }}" alt="" /><span class="lang-dropdown__text">{{ Str::upper(Config::get('constants.spanish')) }}</span>
                @elseif ( app()->getLocale() === Config::get('constants.fr') )
                    <img class="lang-dropdown__flag" src="{{ asset('images/flags/fr.svg') }}" alt="" /><span class="lang-dropdown__text">{{ Str::upper(Config::get('constants.french')) }}</span>
                @else
                    <img class="lang-dropdown__flag" src="{{ asset('images/flags/en.svg') }}" alt="" /><span class="lang-dropdown__text">{{ Str::upper(Config::get('constants.english')) }}</span>
                @endif
            </span>
        </a>
    </dt>
    <dd>
        <ul class="lang-dropdown__items">
            <li class="lang-dropdown__item">
                <a href="{{ route(Route::currentRouteName(), Config::get('constants.en')) }}">
                    <img class="lang-dropdown__flag" src="{{ asset('images/flags/en.svg') }}" alt="" /><span class="lang-dropdown__value">{{ Config::get('constants.en') }}</span>{{ Str::upper(Config::get('constants.english')) }}
                </a>
            </li>
            <li class="lang-dropdown__item">
                <a href="{{ route(Route::currentRouteName(), Config::get('constants.fr')) }}">
                    <img class="lang-dropdown__flag" src="{{ asset('images/flags/fr.svg') }}" alt="" /><span class="lang-dropdown__value">{{ Config::get('constants.fr') }}</span>{{ Str::upper(Config::get('constants.french')) }}
                </a>
            </li>
            <li class="lang-dropdown__item">
                <a href="{{ route(Route::currentRouteName(), Config::get('constants.es')) }}">
                    <img class="lang-dropdown__flag" src="{{ asset('images/flags/es.svg') }}" alt="" /><span class="lang-dropdown__value">{{ Config::get('constants.es') }}</span>{{ Str::upper(Config::get('constants.spanish')) }}
                </a>
            </li>
        </ul>
    </dd>
</dl>