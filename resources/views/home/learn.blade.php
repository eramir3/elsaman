@extends('layouts.home-master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home/learn.css') }}">
@endsection


@section('content')
    <main id="slidable">
        <section id="learn" class="container">
            @foreach($posts as $post)
                <article>
                    <div class="card-img">
                                <img height="231px" src="{{asset($post->image)}}" alt="">
                            </div>
                    <div class="card">
                        <div class="card-body">
                            @if(app()->getLocale() === Config::get('constants.fr'))
                                <div class="card-title label label-pink">{!! $post->title_fr !!}</div>
                                <div class="card-text">{!! Str::limit($post->text_fr, 500, '....')  !!}</div>
                            @elseif(app()->getLocale() === Config::get('constants.es'))
                                <div class="card-title label label-pink">{!! $post->title_es !!}</div>
                                <div class="card-text">{!! Str::limit($post->text_es, 500, '....')  !!}</div>
                            @else
                                <div class="card-title label label-pink">{!! $post->title_en !!}</div>
                                <div class="card-text">{!! Str::limit($post->text_en, 500, '....')  !!}</div>
                            @endif
                        </div>
                        <div class="card-footer">
                            <a href="{{route('home.learn.show', ['locale'=>app()->getLocale(), 'id'=>$post->hashId])}}" class="btn btn-green">Read More</a>
                        </div>
                    </div>
                </article>
            @endforeach
        </section>
    </main>
@endsection