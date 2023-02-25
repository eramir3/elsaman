@extends('layouts.home-master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home/learn.css') }}">
@endsection


@section('content')
    <main id="slidable">
        <section id="learn" class="container">
            <article>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title label label-pink">{{ $product }}</div>
                        <div class="card-text">Presentacion {{ $presentation }}</div>
                    </div>
                </div>
            </article>
        </section>
    </main>
@endsection