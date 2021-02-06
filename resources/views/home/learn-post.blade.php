@extends('layouts.home-master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home/learn-post.css') }}">
@endsection


@section('content')
    <main id="slidable">
        <section id="learn-post" class="container">
            <div class="post">
                <div class="post-image">
                    <img src="{{asset($post->image)}}" alt="">
                </div>
                @if(app()->getLocale() === Config::get('constants.fr'))
                    <div class="post-title label label-pink">{{ $post->title_fr }}</div>
                    <div class="post-body">
                        {!! $post->text_fr !!}
                    </div>
                @elseif(app()->getLocale() === Config::get('constants.es'))
                    <div class="post-title label label-pink">{{ $post->title_es }}</div>
                    <div class="post-body">
                        {!! $post->text_es !!}
                    </div>
                @else
                    <div class="post-title label label-pink">{{ $post->title_en }}</div>
                    <div class="post-body">
                        {!! $post->text_en !!}
                    </div>  
                @endif
            </div>
        </section>
    </main>
@endsection