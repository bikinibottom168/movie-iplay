<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Streaming</title>
    {{-- <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
    {{-- <script type="text/javascript" src="{{ asset('js/debug.js') }}"></script> --}}

    @if(env('VIDEO_PLAYER', 'jwplayer') == "videojs")
    {{-- <script src="{{ asset('js/video.js') }}"></script> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/video-js.min.css') }}"> --}}
    {{-- <link href="//vjs.zencdn.net/6.0.0/video-js.min.css" rel="stylesheet">
    <script src="//vjs.zencdn.net/6.0.0/video.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.15.0/videojs-contrib-hls.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/videojs-http-source-selector@latest/dist/videojs-http-source-selector.js" type="aeaa8bb5b587c0da10429086-text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/videojs-contrib-quality-levels@latest/dist/videojs-contrib-quality-levels.min.js" type="aeaa8bb5b587c0da10429086-text/javascript"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/p2p-media-loader-core@0.6.2/build/p2p-media-loader-core.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/p2p-media-loader-hlsjs@0.6.2/build/p2p-media-loader-hlsjs.min.js"></script>
    <link href="https://vjs.zencdn.net/7.6.0/video-js.css" rel="stylesheet" />
    <script src="https://vjs.zencdn.net/7.6.0/video.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/videojs-contrib-hls.js@latest"></script>
    @else
    <!-- JW Player Builds -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/p2p-media-loader-core@latest/build/p2p-media-loader-core.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/p2p-media-loader-hlsjs@latest/build/p2p-media-loader-hlsjs.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/@hola.org/jwplayer-hlsjs@latest/dist/jwplayer.hlsjs.min.js"></script> --}}
    {{-- <script src="https://p2p.allplayer.tk/player/player/v/8.8.2/provider.hlsjs.js"></script> --}}
    {{-- <script src="https://ssl.p.jwpcdn.com/player/v/8.26.7/jwpsrv.js"></script> --}}
    {{-- <script src="https://content.jwplatform.com/libraries/aG3IMhIy.js"></script> --}}
    {{-- <script type="text/javascript" src="{{ asset(env('STREAMING_APP_JWPLAYER_LINK', 'jw/jwplayer8.js')) }}"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script> --}}


    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/hls.js@0.14.17"></script>
    <script src="https://cdn.jsdelivr.net/npm/p2p-media-loader-core@latest/build/p2p-media-loader-core.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/p2p-media-loader-hlsjs@latest/build/p2p-media-loader-hlsjs.min.js"></script>
    {{-- <script type="text/javascript" src="https://content.jwplatform.com/libraries/aG3IMhIy.js"></script> --}}
    <script type="text/javascript" src="{{ asset(env('STREAMING_APP_JWPLAYER_LINK', 'jw/jwplayer8.js')) }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@hola.org/jwplayer-hlsjs@latest/dist/jwplayer.hlsjs.min.js"></script>
    @endif
</head>
<body>
<style>
    body {
        background-color: #000;
        margin: 0px;
        padding: 0px;
    }
    .ads-vast-active::after {
        position: absolute;
        content: "โฆษณา";
        top: 20px;
        bottom: 20px;
        font-size: 1.4rem;
        padding: 20px;
        height: 20px;
        background-color: rgba(255,255,255,0.5);
    }

</style>
@if(env('VIDEO_PLAYER', 'jwplayer') == 'videojs')
<video id="hlsjslive" width="100%" class="video-js vjs-default-skin vjs-16-9" controls playsinline>
    
</video>

<script>
    {!! $sources !!}
    if (p2pml.hlsjs.Engine.isSupported()) {

        const config = {
            loader: {
                trackerAnnounce: [
                "wss://tracker.iamtheme.com:8000",
                "wss://tracker2.iamtheme.com:8000",
                ],
                rtcConfig: {
                iceServers: [
                    { urls: "stun:stun.l.google.com:19302" },
                    { urls: "stun:global.stun.twilio.com:3478?transport=udp" }
                ]
                }
            }
        };

        var engine = new p2pml.hlsjs.Engine(config);

        var player = videojs("hlsjslive", {
            html5: {
                hlsjsConfig: {
                    liveSyncDurationCount: 20, // To have at least 7 segments in queue
                    loader: engine.createLoaderClass(),
                },
            },
        });

        p2pml.hlsjs.initVideoJsContribHlsJsPlayer(player);

        player.src({
            src: url,
            type: "application/x-mpegURL",
        });

        player.ready(function () {
            player.volume(0.01); // 1%
        });
    } else {
        document.write("Not supported :(");
    }
</script>
@else
<div id="hlsjslive" class="embed-responsive-16by9"></div>

<script>
    {!! $sources !!}
    if (Hls.isSupported() && p2pml.hlsjs.Engine.isSupported()) {
        var config = {
            loader: {
                trackerAnnounce: [
                    "wss://tracker.iamtheme.com:8000",
                    "wss://tracker2.iamtheme.com:8000",
                ],
                rtcConfig: {
                iceServers: [
                    { urls: "stun:stun.l.google.com:19302" },
                    { urls: "stun:global.stun.twilio.com:3478?transport=udp" }
                ]
                }
            }
        };

        
        var engine = new p2pml.hlsjs.Engine(config);

        // var player = jwplayer("player");

        // player.setup({
        //     file: url,
        // });

        {!! $jw !!}

        jwplayer_hls_provider.attach();

        // p2pml.hlsjs.initJwPlayer(player, {
        //     liveSyncDurationCount: 7, // To have at least 7 segments in queue
        //     loader: engine.createLoaderClass(),
        // });

        // if (this.isP2PSupported) {
            p2pml.hlsjs.initJwPlayer(player, {
                liveSyncDurationCount: 7,
                loader: engine.createLoaderClass()
            });
        // }
    } else {
        document.write("Not supported :(");
        alert("Not supported :(");
    }
</script>
@endif

<script>
    {!! $sources !!}
    {!! $jw !!}
    // const logger = new Logger('logger');

    playerInstance.once('play', function() {
    let cookieData = Cookies.get('resumevideodata{{ Request::cookie("movie_id") }}');
    if (!cookieData) {
      // return logger.log('No video resume cookie detected. Refresh page.');
    }

    const [ resumeAt, duration ] = cookieData.split(':');

    if (resumeAt < duration) {
      playerInstance.seek(resumeAt);
      // logger.log('Resuming at ' + resumeAt);
      return;
    }

  //   logger.log('Video ended last time! Will skip resume behavior');
  });

  playerInstance.on('time', function(e) {
    Cookies.set('resumevideodata{{ Request::cookie("movie_id") }}', `${Math.floor(e.position)}:${playerInstance.getDuration()}`);
  });

</script>

    
</body>
</html>