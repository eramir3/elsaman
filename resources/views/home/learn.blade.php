@extends('layouts.home-master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home/learn.css') }}">
@endsection


@section('content')
    <main id="slidable">
        <section id="learn" class="container">
            <h2>Categories</h2>
            @foreach($categories as $category)
                <div><a href="#">{{$category->name}}</a></div>
            @endforeach

            @foreach($posts as $post)
                <div>{{$post->title_en}}</div>
                <div>{{$post->text_en}}</div>
                <div><img src="{{asset($post->image)}}" alt=""></div>
            @endforeach
        </section>
    </main>

@endsection

