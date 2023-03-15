@if(env('VIDEO_PLAYER', 'jwplayer') == 'videojs')
<link href="//vjs.zencdn.net/5.4.6/video-js.min.css" rel="stylesheet">
<script src="//vjs.zencdn.net/5.4.6/video.min.js"></script>
@else
<script type="text/javascript" src="{{ asset(env('STREAMING_APP_JWPLAYER_LINK', '')) }}"></script>
<script type="text/javascript">
    jwplayer.key = "{{ env('STREAMING_APP_JWPLAYER_KEY', '') }}"; 
</script>
<script src="//content.jwplatform.com/libraries/eX4mp13.js"></script>
@endif

<div id="player_container"></div>
@if($ads_movie_video_count > 0) 
    @foreach($ads_movie_video as $key => $playlist)
        @if($playlist->status_ads)
            <div class="player_container" id="player_ads_{{ $key }}" style="margin-top: 10px;{{ $key != 0 ? 'display: none' : '' }}">
                @if(env('VIDEO_PLAYER', 'jwplayer') == 'videojs')
                <video id="ads_movie_{{ $key }}" width="100%" class="video-js vjs-default-skin vjs-16-9" controls playsinline>
                </video>
                @else
                <div id="ads_movie_{{ $key }}" style="margin: 15px" class="embed-responsive-16by9 ads_movie" ></div>
                @endif
                
                <div id="register_ads_{{ $key }}" class="register-ads" style="display:none">
                        สมัครสมาชิก
                </div>

                <div id="skip_ads_{{ $key }}" class="skip-ads" style="display:none" disabled="true">
                        ข้ามได้ใน <b id="time_skip_{{ $key }}">{{ $setting->time_skip }}</b>
                </div>
            </div>
            <script>
                @if(env('VIDEO_PLAYER', 'jwplayer') == 'videojs')
                    var player_{{ $key }} = videojs("ads_movie_{{ $key }}");
                    player_{{ $key }}.src({
                        @if(strrpos($playlist->image_ads , 'http') === false)
                            src: "{{ asset($playlist->image_ads) }}",
                        @else
                            src: "{{ $playlist->image_ads }}",
                        @endif
                    });

                    player_{{ $key }}.on('displayClick', function(e) {
                        if(start_ads_{{ $key }} >= 1)
                        {
                            const url = "{{ url('api/v1/ads-click/') }}/{{ $playlist->id }}";
                            let xhr = new XMLHttpRequest();                  
                            xhr.open('GET', url);
                            window.open("{{ get_url_ads($playlist) }}");
                        }
                    });

                    player_{{ $key }}.on('click', function(e) {
                        if(start_ads_{{ $key }} >= 1)
                        {
                            const url = "{{ url('api/v1/ads-click/') }}/{{ $playlist->id }}";
                            let xhr = new XMLHttpRequest();                  
                            xhr.open('GET', url);
                            window.open("{{ get_url_ads($playlist) }}");
                        }
                    });

                @else
                    var player_{{ $key }} = jwplayer("ads_movie_{{ $key }}");
                    player_{{ $key }}.key = "{{ env('STREAMING_APP_JWPLAYER_KEY', '') }}";
                    player_{{ $key }}.setup({
                        @if(strrpos($playlist->image_ads , 'http') === false)
                            file: '{{ asset($playlist->image_ads) }}',
                        @else
                            file: '{{ $playlist->image_ads }}',
                        @endif
                        autostart: true,
                        muted: false,
                        width:"100%",
                        aspectratio: "16:9",
                        
                    });

                    setTimeout(function(){
                        jwplayer().setMute(false)
                        jwplayer().play()
                    },2000)
        
                    player_{{ $key }}.on('displayClick', function(e) {
                        if(start_ads_{{ $key }} >= 1)
                        {
                            const url = "{{ url('api/v1/ads-click/') }}/{{ $playlist->id }}";
                            let xhr = new XMLHttpRequest();                  
                            xhr.open("GET", url,true);
                            window.open("{{ get_url_ads($playlist) }}");

                        }
                    });
                @endif
    
            </script>
        @endif
    @endforeach
@else

    <script>
        jQuery(document).ready(function(){
            jQuery("#player_movie").show();
        });
    </script>
@endif

@if($movie->type == "movie" || $movie->type == "av")
    <div class="player_container" id="player_movie" style="display: {{ $ads_movie_video_count == 0 ? 'block' : 'none' }};">
        <div style="display: block;border-radius: 10px" class="movie_player">
            @php
                $file_main = "";
                $file_resolution = "";
                if($movie->sound == "TH" || $movie->sound == "Thai" || $movie->sound == "CT" || $movie->sound == "thai" || $movie->sound == "TS" || $movie->sound == "Thai(C)" || $movie->sound == "ZM" || $movie->sound == "Zoom" || $movie->sound == "zoom")
                {
                    $file_main = $movie->file_main;
                    $file_resolution = "main";
                    if($movie->file_main == "" && $movie->file_main_2 != "")
                    {
                        $file_main = $movie->file_main_2;
                    }
                    elseif($movie->file_main == "" && $movie->file_main_2 == "" && $movie->file_main_3 != "")
                    {
                        $file_main = $movie->file_main_3;
                    }
                    elseif($movie->file_main == "" && $movie->file_main_2 == "" && $movie->file_main_3 == "")
                    {
                        $file_main = $movie->file_openload;
                        $file_resolution = "openload";
                        if($movie->file_openload == "" && $movie->file_openload_2 != "" && $movie->file_openload_3 == "")
                        {
                            $file_main = $movie->file_openload_2;
                        }
                        elseif($movie->file_openload == "" && $movie->file_openload_2 == "" && $movie->file_openload_3 != "")
                        {
                            $file_main = $movie->file_openload_3;
                        }
                        elseif($movie->file_openload == "" && $movie->file_openload_2 == "" && $movie->file_openload_3 == "")
                        {
                            if($movie->file_streamango == "" && $movie->file_streamango_2 != "" && $movie->file_streamango_3 == "")
                            {
                                $file_main = $movie->file_streamango_2;
                            }
                            elseif($movie->file_streamango == "" && $movie->file_streamango_2 == "" && $movie->file_streamango_3 != "")
                            {
                                $file_main = $movie->file_streamango_3;
                            }
                            elseif($movie->file_streamango == "" && $movie->file_streamango_2 == "" && $movie->file_streamango_3 == "")
                            {
                                $file_main = $movie->file_streamango;
                            }
                        }
                    }
                }
                elseif($movie->sound == "Soundtrack(T)" || $movie->sound == "ST" || $movie->sound == "Soundtrack(E)")
                {
                    $file_main = $movie->file_main_sub;
                    $file_resolution = "main";
                    if($movie->file_main_sub == "" && $movie->file_main_sub_2 != "")
                    {
                        $file_main = $movie->file_main_sub_2;
                    }
                    elseif($movie->file_main_sub == "" && $movie->file_main_sub_2 == "" && $movie->file_main_sub_3 != "")
                    {
                        $file_main = $movie->file_main_sub_3;
                    }
                    elseif($movie->file_main_sub == "" && $movie->file_main_sub_2 == "" && $movie->file_main_sub_3 == "")
                    {
                        $file_main = $movie->file_openload_sub;
                        $file_resolution = "openload";
                        if($movie->file_openload_sub == "" && $movie->file_openload_sub_2 != "" && $movie->file_openload_sub_3 == "")
                        {
                            $file_main = $movie->file_openload_sub_2;
                        }
                        elseif($movie->file_openload_sub == "" && $movie->file_openload_sub_2 == "" && $movie->file_openload_sub_3 != "")
                        {
                            $file_main = $movie->file_openload_sub_3;
                        }
                        elseif($movie->file_openload_sub == "" && $movie->file_openload_sub_2 == "" && $movie->file_openload_sub_3 == "")
                        {
                            if($movie->file_streamango_sub == "" && $movie->file_streamango_sub_2 != "" && $movie->file_streamango_sub_3 == "")
                            {
                                $file_main = $movie->file_streamango_sub_2;
                            }
                            elseif($movie->file_streamango_sub == "" && $movie->file_streamango_sub_2 == "" && $movie->file_streamango_sub_3 != "")
                            {
                                $file_main = $movie->file_streamango_sub_3;
                            }
                            elseif($movie->file_streamango_sub == "" && $movie->file_streamango_sub_2 == "" && $movie->file_streamango_sub_3 == "")
                            {
                                $file_main = $movie->file_streamango_sub;
                            }
                        }
                    }
                    

                    if($file_main == "")
                    {
                        $file_main = $movie->file_main;
                    }
                    
                }
            @endphp
            @php

            if(strrpos($file_main, '.mp4') !== false || strrpos($file_main, '.m3u8') !== false || strrpos($file_main, '.MP4') !== false)
            {
                $file_main = route('streaming', base64_encode(Crypt::encryptString($file_main)));
                @endphp
                <iframe src="{{ $file_main }}" id="player_iframe" onload="resizeIframe(this)" onchange="resizeIframe(this)" style="width: 100%; border: none;"
                    allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen="" scrolling="no">
                </iframe>
                @php
            }
            elseif($file_main == "" && $movie->sound == "Soundtrack(T)" || $movie->sound == "ST")
            {
                $file_main = route('streaming', base64_encode(Crypt::encryptString($movie->file_main_sub)));
                @endphp
                <iframe src="{{ $file_main }}" id="player_iframe" onload="resizeIframe(this)" onchange="resizeIframe(this)" style="width: 100%;"
                    allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen="" scrolling="no">
                </iframe>
                @php
            }
            else 
            {
                @endphp
                <iframe src="{{ $file_main }}" id="player_iframe" style="width: 100%;"
                    allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen="" scrolling="no">
                </iframe>
                @php
            }
            
            @endphp
        </div>
    </div>
@elseif($movie->type == "series" || $movie->type == "anime")
        @php
            if(env('SCRIPT_PLAY_TYPE', 'new') == "new")
            {
                $movie_file = (array) json_decode($movie->file_series);
                $movie_array_for_index = array_values($movie_file);
                @endphp
                <div class="player_container" id="player_movie" style="display: {{ $ads_movie_video_count == 0 ? 'block' : 'none' }};">
                    <div style="display: block;" class="movie_player">
                            @php
                            if(strrpos($movie_array_for_index[0], '.mp4') !== false || strrpos($filemovie[0], '.MP4') !== false)
                            {
                                $movie_array_for_index[0] = route('streaming', base64_encode(Crypt::encryptString($movie_array_for_index[0])));
                            }
                            
                            @endphp
                            <iframe src="{{ $movie_array_for_index[0] != "" ? $movie_array_for_index[0] : '' }}" id="player_iframe" onload="resizeIframe(this)" onchange="resizeIframe(this)" style="width: 100%; border: none;"
                                scrolling="no"></iframe>
                    </div>
                </div>
                @php
            }
            elseif(env('SCRIPT_PLAY_TYPE', 'new') == "old")
            {
                if ($movie->file_series != "" && strpos($movie->file_series, "!!end!!"))
                {
                    preg_match_all("/}}(.*?)!!end!!/", $movie->file_series, $filemovie);
                    preg_match_all("/\{\{(.*?)\}\}/", $movie->file_series, $filename);
                    $count_filename = count($filename[1]);
                } 
                @endphp
                <div class="player_container" id="player_movie" style="display: {{ $ads_movie_video_count == 0 ? 'block' : 'none' }};">
                    <div style="display: block;" class="movie_player">
                        @php
                        if(strrpos($filemovie[1][0], '.mp4') !== false || strrpos($filemovie[1][0], '.MP4') !== false)
                        {
                            $filemovie[1][0] = route('streaming', base64_encode(Crypt::encryptString($filemovie[1][0])));
                        }
                        @endphp
                        <iframe src="{{ $filemovie[1][0] != "" ? $filemovie[1][0] : '' }}" id="player_iframe" onload="resizeIframe(this)" style="width: 100%; border: none;"
                            allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen="" scrolling="no"></iframe>
                    </div>
                </div>
                @php
                    $file_main = "";
                    $file_resolution = "";
                    if($movie->sound == "TH" || $movie->sound == "Thai" || $movie->sound == "CT" || $movie->sound == "thai" || $movie->sound == "TS" || $movie->sound == "Thai(C)" || $movie->sound == "ZM" || $movie->sound == "Zoom" || $movie->sound == "zoom")
                    {
                        $file_main = $movie->file_main;
                        $file_resolution = "main";
                        if($movie->file_main == "" && $movie->file_main_2 != "")
                        {
                            $file_main = $movie->file_main_2;
                        }
                        elseif($movie->file_main == "" && $movie->file_main_2 == "" && $movie->file_main_3 != "")
                        {
                            $file_main = $movie->file_main_3;
                        }
                        elseif($movie->file_main == "" && $movie->file_main_2 == "" && $movie->file_main_3 == "")
                        {
                            $file_main = $movie->file_openload;
                            $file_resolution = "openload";
                            if($movie->file_openload == "" && $movie->file_openload_2 != "" && $movie->file_openload_3 == "")
                            {
                                $file_main = $movie->file_openload_2;
                            }
                            elseif($movie->file_openload == "" && $movie->file_openload_2 == "" && $movie->file_openload_3 != "")
                            {
                                $file_main = $movie->file_openload_3;
                            }
                            elseif($movie->file_openload == "" && $movie->file_openload_2 == "" && $movie->file_openload_3 == "")
                            {
                                if($movie->file_streamango == "" && $movie->file_streamango_2 != "" && $movie->file_streamango_3 == "")
                                {
                                    $file_main = $movie->file_streamango_2;
                                }
                                elseif($movie->file_streamango == "" && $movie->file_streamango_2 == "" && $movie->file_streamango_3 != "")
                                {
                                    $file_main = $movie->file_streamango_3;
                                }
                                elseif($movie->file_streamango == "" && $movie->file_streamango_2 == "" && $movie->file_streamango_3 == "")
                                {
                                    $file_main = $movie->file_streamango;
                                }
                            }
                        }
                    }
                    elseif($movie->sound == "Soundtrack(T)" || $movie->sound == "ST" || $movie->sound == "Soundtrack(E)")
                    {
                        $file_main = $movie->file_main_sub;
                        $file_resolution = "main";
                        if($movie->file_main_sub == "" && $movie->file_main_sub_2 != "")
                        {
                            $file_main = $movie->file_main_sub_2;
                        }
                        elseif($movie->file_main_sub == "" && $movie->file_main_sub_2 == "" && $movie->file_main_sub_3 != "")
                        {
                            $file_main = $movie->file_main_sub_3;
                        }
                        elseif($movie->file_main_sub == "" && $movie->file_main_sub_2 == "" && $movie->file_main_sub_3 == "")
                        {
                            $file_main = $movie->file_openload_sub;
                            $file_resolution = "openload";
                            if($movie->file_openload_sub == "" && $movie->file_openload_sub_2 != "" && $movie->file_openload_sub_3 == "")
                            {
                                $file_main = $movie->file_openload_sub_2;
                            }
                            elseif($movie->file_openload_sub == "" && $movie->file_openload_sub_2 == "" && $movie->file_openload_sub_3 != "")
                            {
                                $file_main = $movie->file_openload_sub_3;
                            }
                            elseif($movie->file_openload_sub == "" && $movie->file_openload_sub_2 == "" && $movie->file_openload_sub_3 == "")
                            {
                                if($movie->file_streamango_sub == "" && $movie->file_streamango_sub_2 != "" && $movie->file_streamango_sub_3 == "")
                                {
                                    $file_main = $movie->file_streamango_sub_2;
                                }
                                elseif($movie->file_streamango_sub == "" && $movie->file_streamango_sub_2 == "" && $movie->file_streamango_sub_3 != "")
                                {
                                    $file_main = $movie->file_streamango_sub_3;
                                }
                                elseif($movie->file_streamango_sub == "" && $movie->file_streamango_sub_2 == "" && $movie->file_streamango_sub_3 == "")
                                {
                                    $file_main = $movie->file_streamango_sub;
                                }
                            }
                        }
                        

                        if($file_main == "")
                        {
                            $file_main = $movie->file_main;
                        }
                        
                    }
                @endphp
                @php
            }
        @endphp
@endif

{{-- END IFRAME PLAYER --}}
@if($movie->type == "movie")
   
@elseif($movie->type == "series" || $movie->type == "anime")

        <div class="row">
            <div class="col-lg-20 col-20">
                <div class="card" style="background: {{ option_get('primary_color') }}">
                    <div class="card-header">
                            Episode ของ {{ $movie->title }}
                    </div>
                    <div class="card-body row">
        @if(env('SCRIPT_PLAY_TYPE', "new") == "new")
            @php $first = true @endphp
                            @foreach($movie_file as $key => $value)
                                @php
                                    if(strrpos($value,'.mp4') !== false || strrpos($value,'.MP4') !== false)
                                    {
                                        $source = route('streaming', base64_encode(Crypt::encryptString($value)));
                                    }
                                @endphp
                                    @if($first == true)
                                        <div class="col-lg-10 col-md-10 col-10 mb-2">
                                            <div class="episode_path btn btn-light btn-block"  data-ep-name="{{ $movie->title }}" data-href="{{ $source }}">
                                                <i class="fas fa-play"></i> {{ $key }}
                                            </div>
                                        </div>
                                        @php $first = false @endphp
                                    @else
                                        <div class="col-lg-10 col-md-10 col-10 mb-2">
                                            <div class="episode_path btn btn-dark btn-block"  data-ep-name="{{ $movie->title }}" data-href="{{ $source }}" >
                                                <i class="fas fa-play"></i> {{ $key }}
                                            </div>
                                        </div>
                                    @endif
                            @endforeach
        @elseif(env("SCRIPT_PLAY_TYPE", "new") == "old")
            @php
            if ($movie->file_series != "" && strpos($movie->file_series, "!!end!!")){
                preg_match_all("/}}(.*?)!!end!!/", $movie->file_series, $filemovie);
                preg_match_all("/\{\{(.*?)\}\}/", $movie->file_series, $filename);
                $count_filename = count($filename[1]);
            } 
            @endphp
            @for ($i=0; $i < $count_filename; $i++)
                @php
                    $source = $filemovie[1][$i];
                    if(strrpos($filemovie[1][$i],'.mp4') !== false || strrpos($filemovie[1][$i],'.MP4') !== false)
                    {
                        $source = route('streaming', base64_encode(Crypt::encryptString($filemovie[1][$i])));
                    }

                @endphp
                @if($i == 0)
                    <div class="col-lg-10 col-md-10 col-20 mb-2">
                        <div class="episode_path btn btn-light btn-block"  data-ep-name="{{ $movie->title }} - {{ $filename[1][$i] }}" data-href="{{ $source }}">
                            <i class="fas fa-play"></i> {{{ $filename[1][$i] }}}
                        </div>
                    </div>
                @else
                    <div class="col-lg-10 col-md-10 col-20 mb-2">
                        <div class="episode_path btn btn-dark btn-block" data-ep-name="{{ $movie->title }} - {{ $filename[1][$i] }}" data-href="{{ $source }}" >
                            <i class="fas fa-play"></i> {{ $filename[1][$i] }}
                        </div>
                    </div>
                @endif
            @endfor
        @endif
                    </div>
                </div>
            </div>
        </div>
@endif
    

<script>
    function resizeIframe(obj) {
        obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
        if(obj.style.height == "0px")
        {
            var iframeSet = setInterval(function()
            { 
                obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px'; 
                if(obj.style.height == "0px")
                {
                    obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px'; 
                }
                else 
                {
                    clearInterval(iframeSet);
                }
            }, 500);
        }
    }

    jQuery(document).ready(function(){
        jQuery(".play-ep").click(function(){
            var ep = jQuery(this).attr('data-href');
            var resolution = jQuery(this).attr('data-resolution');
            jQuery("#player_iframe").attr('src', ep); 
            jQuery(".play-ep").removeClass('btn-primary').addClass('btn-default');
            jQuery(".play-ep").css({ 'color': '#555', 'border-bottom': '4px solid #c3c3c3' });
            jQuery(this).removeClass('btn-default').addClass('btn-primary');
            jQuery(this).css({ 'border-bottom': '4px solid #127ba3', 'color': '#fff' });
            jQuery(".resolution_path").hide();
            jQuery("#"+resolution).show();

        });

        jQuery(".episode_path").click(function(){
            var ep = jQuery(this).attr('data-href');
            var name = jQuery(this).attr('data-ep-name');
            jQuery("#player_iframe").attr('src', ep);
            jQuery(".episode_path").removeClass('btn-light');
            jQuery(".episode_path").removeClass('{{ env('SCRIPT_BUTTON_COLOR') }}');
            jQuery(".episode_path").addClass('btn-dark');
            jQuery(this).removeClass('btn-dark');
            jQuery(this).addClass('btn-light');

            document.getElementById("player_container").scrollIntoView();
        });

        jQuery(".resolutionep").click(function(){
            var ep = jQuery(this).attr('data-href');
            jQuery("#player_iframe").attr('src', ep);

            jQuery(".resolutionep").removeClass('bg-dark');
            jQuery(this).addClass('bg-light');
        });

        jQuery(".sound_path").click(function(){
            
            jQuery(".sound_path").removeClass('btn-danger').addClass('btn-dark');
            jQuery(this).removeClass('btn-dark').addClass('btn-danger');

            jQuery(".sound_container").hide();
            $(".sound-movie").hide();
            var path = jQuery(this).attr('data-sound');

            var ep = jQuery(this).attr('data-href');
            jQuery("#player_iframe").attr('src', ep);
            jQuery("#"+path).show();
        });

        jQuery("#movie_refresh").click(function(){
            var movie_url = jQuery('#player_iframe').attr('src');
            jQuery("#player_iframe").attr('src', movie_url);
        });

        jQuery('#movie_fix').click(function() {
            var request = "{{ $movie->id }}";
            jQuery.ajax({
                url: '{{ url('/') }}/api/v1/moviecontact/'+request,
                type: 'GET',
                crossDomain: true,
                cache: false,
                success:function(data){
                }
            });
            alert('เราจะดำเนินการให้เร็วที่สุด')
         });

    });
</script>
<style>
    .resolution_path {
        margin-right: 20px;
    }

    .ads_movie {
        position: absolute;
        z-index: 98;
    }
    .movie_player {
    }
    .player_container {
        position: relative;
        width: 100%;
    }

    #player_iframe {
        height: 450px;
    }

    @media screen and (max-width: 480px) {
        #player_iframe {
            height: 200px;
        }
    }
    .player_ep {
        margin: 5px 0 10px 0;
    }
    .register-ads {
        position: absolute;
        z-index: 99;
        top: 20%;
        right: 0px;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        color: #fff;
        background-color: rgb(148, 13, 13);
        border-color: rgb(148, 13, 13);
        padding: 20px 21px 18px;
        line-height: 20px;
        font-size: 20px;
        opacity: .9;
        cursor: pointer;
    }

    .skip-ads {
        position: absolute;
        z-index: 99;
        top: 40%;
        right: 0px;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        color: #fff;
        background-color: #222;
        border-color: #151515;
        padding: 20px 21px 18px;
        line-height: 20px;
        font-size: 20px;
        opacity: .9;
    }

    .jw-controlbar {
        display: none;
    }

    
</style>
<script>
    @if(env('VIDEOJS_PLAYER_ADS_VAST', '0') == '1')
        @if(count($ads_movie_vast) > 0)
        var vast_ads = "{{ asset($ads_movie_vast->image_ads) }}";
        var iframe_player = document.getElementById("player_iframe").contentWindow;
        var status_vast_show = false;
        var status_vast_first = false;
        if(status_vast_first == false)
        {
            setInterval(function(){
                var player_duration = iframe_player.player.duration() / 2;
                var player_time = iframe_player.player.currentTime();
                if(iframe_player.player.paused() != true && status_vast_show == false)
                {

                    if(player_time > player_duration)
                    {
                        status_vast_show = true;
                        document.cookie = "player_resource="+iframe_player.player.currentSrc();
                        document.cookie = "player_time="+iframe_player.player.currentTime();

                        iframe_player.player.pause();
                        iframe_player.player.reset();
                        iframe_player.player.src({
                            src: vast_ads,
                            type: "video/mp4"
                        });
                        iframe_player.player.play();
                        var video_play = iframe_player.document.getElementById("hlsjslive");
                        video_play.classList.add("ads-vast-active");
                        
                    }

                }
                else if(status_vast_show == true){

                    iframe_player.player.on('displayClick', function(e) {
                        if(status_vast_first == false)
                        {
                            const url = "{{ route('adsclick') }}?id={{ $playlist->id }}";
                            let xhr = new XMLHttpRequest();                  
                            xhr.open('GET', url);
                            window.open("{{ $ads_movie_vast->url_ads }}");
                        }
                    });

                    iframe_player.player.on('click', function(e) {
                        if(status_vast_first == false)
                        {
                            const url = "{{ route('adsclick') }}?id={{ $playlist->id }}";
                            let xhr = new XMLHttpRequest();                  
                            xhr.open('GET', url);
                            window.open("{{ $ads_movie_vast->url_ads }}");
                        }
                    });

                    const regex = /player_resource=(.*);/gm;
                    const str = document.cookie;
                    var get_resource = "";
                    while ((m = regex.exec(str)) !== null) {
                        if (m.index === regex.lastIndex) {
                            regex.lastIndex++;
                        }
                        get_resource = m[1];
                    }
                    const regex_2 = /player_time=(.*)/gm;
                    const str_2 = document.cookie;
                    var get_time = "";
                    while ((t = regex_2.exec(str_2)) !== null) {
                        if (t.index === regex.lastIndex) {
                            regex.lastIndex++;
                        }
                        get_time = t[1];
                    }
                    iframe_player.player.on('ended', function(e) {

                        iframe_player.player.reset();
                        iframe_player.player.src({
                            src: get_resource,
                            type: "application/x-mpegURL"


                        });

                        iframe_player.player.play();

                        iframe_player.player.currentTime(get_time);
                        status_vast_first = true;

                        video_play = iframe_player.document.getElementById("hlsjslive");
                        video_play.classList.remove("ads-vast-active");
                    });
                }
            },1000)
        }
        @endif 
    @endif
    @if($ads_movie_video) 
        @foreach($ads_movie_video as $key => $playlist)
            var ads_movie_{{ $key }} = document.getElementById("ads_movie_{{ $key }}");
            var ads_skip_{{ $key }} = document.getElementById("skip_ads_{{ $key }}");
            @if(env('PLAYER_REGISTER_BUTTON', '0') == 1)
            var register_skip_{{ $key }} = document.getElementById("register_ads_{{ $key }}");
            @endif
            var ads_controller = document.getElementById("jw-controlbar");
            var player_ads_{{ $key }} = document.getElementById("player_ads_{{ $key }}");
            var player_movie_{{ $key }} = document.getElementById("player_movie_{{ $key }}");
            var set_time_skip_{{ $key }} = document.getElementById("time_skip_{{ $key }}");
            var start_ads_{{ $key }} = 0;


            
            @if(env('VIDEO_PLAYER', 'jwplayer') == 'videojs')


                player_{{ $key }}.on('play', function(e) {
                    start_ads_{{ $key }}++;
                    ads_skip_{{ $key }}.style.display = "block";
                    @if(env('PLAYER_REGISTER_BUTTON', '0') == 1)
                        register_skip_{{ $key }}.style.display = "block";
                    @endif
                    var time_skip = parseInt({{ $setting->time_skip }});
                    set_time_skip_{{ $key }}.innerHTML = time_skip;

                    var count_down = setInterval(function()
                    { 
                        time_skip--;
                        set_time_skip_{{ $key }}.innerHTML = time_skip;
                    }, 1000);

                    setTimeout(function(){
                        clearInterval(count_down);
                        ads_skip_{{ $key }}.setAttribute("disabled", false);
                        ads_skip_{{ $key }}.innerHTML = "ข้ามโฆษณา";
                    }, {{ $setting->time_skip*1000 }})

                });

                player_{{ $key }}.on('stop', function(e) {
                    start_ads_{{ $key }}++;
                    ads_skip_{{ $key }}.style.display = "block";
                    @if(env('PLAYER_REGISTER_BUTTON', '0') == 1)
                        register_skip_{{ $key }}.style.display = "block";
                    @endif
                    var time_skip = parseInt({{ $setting->time_skip }});
                    set_time_skip_{{ $key }}.innerHTML = time_skip;

                    var count_down = setInterval(function()
                    { 
                        time_skip--;
                        set_time_skip_{{ $key }}.innerHTML = time_skip;
                    }, 1000);

                    setTimeout(function(){
                        clearInterval(count_down);
                        ads_skip_{{ $key }}.setAttribute("disabled", false);
                        ads_skip_{{ $key }}.innerHTML = "ข้ามโฆษณา";
                    }, {{ $setting->time_skip*1000 }})

                });

                player_{{ $key }}.on('pause', function(e) {
                    
                });

                player_{{ $key }}.on('ended', function(e) {
                    player_ads_{{ $key }}.style.display = "none";
                    @if($key == count($ads_movie_video)-1)
                        player_movie.style.display = "block";
                    @else($key != count($ads_movie_video) -1)
                        player_ads_{{ $key+1 }}.style.display = "block";
                        player_{{ $key+1 }}.play();
                    @endif
                });
                ads_skip_{{ $key }}.addEventListener("click", function(){
                    if(ads_skip_{{ $key }}.getAttribute("disabled") == "false")
                    {
                        player_{{ $key }}.pause();
                        player_ads_{{ $key }}.style.display = "none";
                        @if($key == count($ads_movie_video)-1)
                            player_movie.style.display = "block";
                        @else($key != count($ads_movie_video) -1)
                            player_ads_{{ $key+1 }}.style.display = "block";
                            player_{{ $key+1 }}.play();
                        @endif
                    }
                });
                @if(env('PLAYER_REGISTER_BUTTON', '0') == 1)
                register_skip_{{ $key }}.addEventListener("click", function() {
                    player_{{ $key }}.pause();
                    if(start_ads_{{ $key }} >= 1)
                    {
                        const url = "{{ route('adsclick') }}?id={{ $playlist->id }}";
                        let xhr = new XMLHttpRequest();                  
                        xhr.open('GET', url);
                        window.open("{{ get_url_ads($playlist) }}");
                    }
                });
                @endif
            @else

                player_{{ $key }}.on('play', function(e) {
                    start_ads_{{ $key }}++;
                    ads_skip_{{ $key }}.style.display = "block";
                    @if(env('PLAYER_REGISTER_BUTTON', '0') == 1)
                        register_skip_{{ $key }}.style.display = "block";
                    @endif
                    var time_skip = parseInt({{ $setting->time_skip }});
                    set_time_skip_{{ $key }}.innerHTML = time_skip;
                    var count_down = setInterval(function()
                    { 
                        time_skip--;
                        set_time_skip_{{ $key }}.innerHTML = time_skip;
                    }, 1000);

                    setTimeout(function(){
                        clearInterval(count_down);
                        ads_skip_{{ $key }}.setAttribute("disabled", false);
                        ads_skip_{{ $key }}.innerHTML = "ข้ามโฆษณา";
                    }, {{ $setting->time_skip*1000 }})

                });

                player_{{ $key }}.on('pause', function(e) {
                    player_{{ $key }}.play();
                });

                player_{{ $key }}.on('beforeComplete', function(e) {
                    player_ads_{{ $key }}.style.display = "none";
                    @if($key == count($ads_movie_video)-1)
                        player_movie.style.display = "block";
                        document.getElementById("player_iframe").contentWindow.jwplayer().play();
                        
                    @else($key != count($ads_movie_video) -1)
                        player_ads_{{ $key+1 }}.style.display = "block";
                        player_{{ $key+1 }}.play();
                    @endif
                });

                ads_skip_{{ $key }}.addEventListener("click", function(){
                    if(ads_skip_{{ $key }}.getAttribute("disabled") == "false")
                    {
                        player_{{ $key }}.stop();
                        player_ads_{{ $key }}.style.display = "none";
                        @if($key == count($ads_movie_video)-1)
                            
                            player_movie.style.display = "block";
                            document.getElementById("player_iframe").contentWindow.jwplayer().play();

                        @else($key != count($ads_movie_video) -1)
                            player_ads_{{ $key+1 }}.style.display = "block";
                            player_{{ $key+1 }}.play();
                        @endif
                    }
                });

                @if(env('PLAYER_REGISTER_BUTTON', '0') == 1)
                register_skip_{{ $key }}.addEventListener("click", function() {
                    player_{{ $key }}.pause();
                    if(start_ads_{{ $key }} >= 1)
                    {
                        const url = "{{ url('api/v1/ads-click/') }}/{{ $playlist->id }}";
                        let xhr = new XMLHttpRequest();                  
                        xhr.open('GET', url);
                        window.open("{{ get_url_ads($playlist) }}");
                    }
                });
                @endif

            @endif
        @endforeach
    @endif


</script>

<style>
    .btn-primary {
        color: #fff;
        background-color: #158cba;
        border-radius: 2px;
    }

    .play-ep {

    }

    .btn {
        display: inline-block;
        margin-bottom: 0;
        text-align: center;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        background-image: none;
        border: 1px solid transparent;
        white-space: nowrap;
        padding: 7px 12px;
        font-size: 14px;
        border-radius: 4px;
    }

</style>