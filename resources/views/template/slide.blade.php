<div class="col-lg-20 col-20">
    <div class="owl-carousel">
        @foreach ($movie_hot as $k)
            <div class="list-slide">
                <a href="{{ option_get('movie_type') == "title" || option_get('movie_type') == false ? route('movie', ['title' => $k->slug_title]) : route('movie', ['title' => $k->id]) }}">
                    <div class="slide-title">{{ $k->title }}</div>
                    <div class="slide-button-play">
                        <i class="far fa-play-circle" style="color: #FFBB00"></i>
                    </div>
                    <img src="{{ asset($k->image) }}" alt="" class="slide-poster" style="min-height: 190px; max-height: 190px">
                </a>
            </div>
        @endforeach
        <script>
            $(document).ready(function(){
                $(".owl-carousel").owlCarousel({
                    loop:true,
                    autoplay: true,
                    autoplayTimeout: 2000,
                    margin:15,
                    responsive: {
                        360: {
                            items: 3
                        },
                        480: {
                            items: 3
                        },
                        768: {
                            items: 6
                        },
                        1280: {
                            items: 8
                        }
    
                    }
                });
            });
        </script>
    </div>
</div>