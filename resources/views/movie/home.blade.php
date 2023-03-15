@extends('master')

@section('content-top')
        {{-- @if(env('SCRIPT_TYPE', 'movie') != "movie")
        @include('template.category-word')
        @endif --}}
        @if(option_get("word_status") == "1")
                @include('template.category-word')
        @endif
        @include('template.slide')
@endsection

@section('content')
        @if(!Request::get('page'))
                <div class="row">
                        <div class="col-lg-20" style="color: {{ option_get(" text_color") }}">
                                {!! option_get('onpage_header') !!}
                                
                        </div>
                </div>
        @endif
        

        @include('template.content-main', ['title' => isset($text_setting) !== false ? $text_setting[0] : ""])
        
        @if(option_get('article_home') == "1")
                @include('template.article_all', ['news' => $news, 'show_all' => true])
        @endif

        <div class="row">
                <div class="col-lg-20" style="color: {{ option_get(" text_color") }}">
                        {!! option_get('onpage_footer') !!}
                </div>
        </div>
@endsection

@section('content-right')
        @include('template.content-right')
        @include('template.ads.ads-right')
@endsection