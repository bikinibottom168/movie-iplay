<div class="row">
    <div class="col-lg-20 col-20 mb-4">
        <div class="widget" style="background-color: #f2f4f5;background: {!! option_get('primary_color') !!}">
            <div class="widget-title" style="color: {{ option_get("text_color") }}">
                <p><span >{{ $text_setting[5] != "" ? $text_setting[5] : "หนังอื่นๆ" }}</span></p>
            </div>
            <div class="row">
                <div class="col-lg-20">
                    <div class="owl-carousel">
                        @foreach($random_movie as $k)
                            <div class="div">
                                <a href="{{ route('movie', ['title' => $k->slug_title]) }}" class="item-movie">
                                    <div class="list-slide">
                                        <div class="slide-title"></div>
                                        <div class="slide-button-play">
                                            <i class="far fa-play-circle" style="color: #FFBB00"></i>
                                        </div>
                                        <img src="{{ asset($k->image) }}" alt="" class="img-fluid slide-poster">
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                </div>
            </div>
          </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            autoplay: true,
            autoplayTimeout: 2000,
            loop:true,
            margin:2,
            items: 3,
            responsive: {
                480: {
                    items: 2
                },
                768: {
                    items: 3
                },
                1280: {
                    items: 3
                }

            }
        });
    });
</script>