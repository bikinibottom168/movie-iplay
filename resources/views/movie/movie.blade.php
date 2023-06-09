@extends('master')

@section('content-top')
    
@endsection

@section('bg-image')
<div class="bg-image"></div>
@php
    $url_bg = str_replace(" ","%20",$movie->image);
@endphp
<style>
    body {
        background-image: url("{{ url($url_bg) }}");
        background-repeat: no-repeat;
        background-size: cover;
        /* filter: blur(8px); */
        /* -webkit-filter: blur(8px); */
        /* Full height */
        /* height: 100vh; */
        /* backdrop-filter: blur(8px); */
    }
</style>
@endsection

@section('content')

    @include('template.movie', ['movie_respon' => $movie, 'random_movie' => $random_movie])
@endsection

@section('content-right')
    @include('template.movie.random', ['movie_respon' => $movie, 'random_movie' => $random_movie])
    @include('template.content-right')
    @include('template.ads.ads-right')
@endsection