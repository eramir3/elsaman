
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/saman/about.css') }}">
@endsection

<x-saman-template>

    @section('content')

        <main id="slidable">
            <div class="elements__container">
                <div class="container__parent">
                    <img class="child-image" style="width: 200px; transform: rotate(42deg); top: -200px; left: 750px;" src="{{ asset('images/saman/about/grapefruit.png') }}" />
                    <img class="child-image" style="width: 200px; transform: rotate(180deg); top: -80px; left: -20px;" src="{{ asset('images/saman/about/grapefruit.png') }}" />
                    <img class="child-image" style="width: 100px; transform: rotate(42deg); top: -180px; left: 1000px;" src="{{ asset('images/saman/about/kiwi.png') }}" />
                    <img class="child-image" style="width: 200px; top: 200px; left: 1200px;" src="{{ asset('images/saman/about/grapefruit.png') }}" />
                    <img class="child-image" style="width: 200px; top: -250px; left: -200px;" src="{{ asset('images/saman/about/lemon.png') }}" />
                    <img class="child-image" style="width: 200px; top: 200px; left: -250px;" src="{{ asset('images/saman/about/lemon.png') }}" />
                    <section class="element element-right ">
                        <div class="element__image ">
                            <img src="{{ asset('images/saman/shared/saman-logo.png') }}" alt="" >
                        </div>
                        <div class="element-right__info">
                            <h1 class="title">{{ __('about.about') }}</h1>
                            <div>
                                <h2 class="badge badge--pink element__title">{{ __('about.mission') }}</h2>
                            </div>
                            <p class="element__text">
                                {{ __('about.mission_description') }}
                            </p>
                            <div>
                                <h2 class="badge badge--pink element__title">{{ __('about.vision') }}</h2>
                            </div>
                            <p class="element__text">
                                {{ __('about.vision_description') }}
                            </p>
                        </div>
                    </section>
                    <section class="element element-left">
                        <div class="element-left__info">
                            <h2 class="badge badge--pink element__title">{{ __('about.our_history') }}</h2>
                            <p class="element__text">
                                {{ __('about.about_description_1') }}
                            </p>
                            <p class="element__text">
                                {{ __('about.about_description_2') }}
                            </p>
                        </div>
                        <div class="element__image">
                            <img src="{{ asset('images/saman/about/worker.png') }}" class="parent-image" alt="">
                        </div>
                    </section>
                </div>
            </div>
        </main>

    @endsection

</x-saman-template>