
@extends('layouts.home-master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home/about.css') }}">
@endsection


@section('content')

    <main id="slidable">
        <div class="elements__container">
            <br/>
            <br/>
            <h1 style="text-align: center">{{ __('footer.legal_notice') }}</h1>
            <p>{{ __('footer.legal_notice_p1') }}</p>
            <h3>1. {{ __('footer.site_presentation')}}</h3>
            <p>{{ __('footer.site_presentation_1') }}</p>
            <h3>{{ __('footer.contact') }}</h3>
            <p style="margin: 0">{{ __('footer.telephone') }}</p>
            <p style="margin: 0">{{ __('footer.email') }}</p>
            <p style="margin: 0">{{ __('footer.director_of_publication') }}</p>
            <p style="margin: 0">{{ __('footer.vat') }}</p>
            <h3>{{ __('footer.site_hosting') }}</h3>
            <p>{{ __('footer.site_hosting_1') }}</p>
            <h3>2. {{ __('footer.policy')}}</h3>
            <p>{{ __('footer.personal_data') }}</p>
            <p>{{ __('footer.personal_data_1') }}</p>
            <p>{{ __('footer.cookies') }}</p>
            <p>{{ __('footer.cookies_1') }}</p>
            <h3>3. {{ __('footer.intellectual_property') }}</h3>
            <p>{{ __('footer.intellectual_property_1') }}</p>
        </div>
    </main>

@endsection