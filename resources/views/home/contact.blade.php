@extends('layouts.home-master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home/contact.css') }}">
@endsection

@section('content')
    <main id="slidable">
        <section id="overview"></section>
        <section class="overview-bottom">
            <h1>{{ __('contact.find_out_more') }}</h1>
        </section>
        <section class="container__main form">
            <h3>{{ __('contact.contact_description') }}</h3>
            <div id="label-success" class="success" style="display: none">{{ __('contact.message_sent_successfully') }}</div>
            <div id="label-failed" class="failed" style="display: none">{{ __('contact.message_sent_failed') }}</div>
            <form method="post" action="{{ route('contact.mail', app()->getLocale()) }}">
                @csrf
                <input type="text" name="name" placeholder="{{ Str::upper(__('contact.name')) }}"><br>
                <input type="text" name="email" placeholder="{{ Str::upper(__('contact.email')) }}"><br>
                <input type="text" name="telephone" placeholder="{{ Str::upper(__('contact.telephone')) }}"><br>
                <textarea type="text" cols="30" rows="10" name="message" placeholder="{{ Str::upper(__('contact.message')) }}"></textarea><br>
                <input type="submit" name="submit" value="{{ Str::upper(__('contact.submit')) }}">
                <div class="loader"></div>
            </form> 
        </section>
        <section class="container__main">
            <div id="contact">
                <div class="card card__contact whatsapp">
                    <img src="{{ asset('images/home/contact/phone-call.svg') }}" class="" alt="">
                    <div>
                        <div class="whatsapp__top">
                            <img src="{{ asset('images/home/flags/fr.svg') }}" class="card-flag" alt=""> +33 7 88 22 55 86
                        </div>
                        <div class="whatsapp__bottom">
                            <img src="{{ asset('images/home/flags/col.svg') }}" class="card-flag" alt=""> +57 1 305 3095120
                        </div>
                    </div>
                </div>
                <div class="card card__contact envelope" >
                    <img src="{{ asset('images/home/contact/email.svg') }}" alt=""> radcofr@ciradco.com
                </div>
            </div>
        </section>
    </main>

    <div class="container">
        <div class="parent-image leave">
            <img class="child-image" src="{{ asset('images/home/contact/leave.png') }}" alt="">
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/home/contact.js') }}" type="text/javascript"></script>
@endsection