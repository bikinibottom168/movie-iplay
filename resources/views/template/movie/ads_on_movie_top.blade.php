<div class="row">
    @foreach ($ads_movie_top as $k)
        <div class="col-lg-20 col-20">
            <a href="{{ get_url_ads($k) }}" target="_blank" class="ads-click" data-id="{{ $k->id }}">
                <img src="{{ asset($k->image_ads) }}" width="100%" alt="{{ $k->title_ads }}" style="border: none; height: auto;">
            </a>
        </div>
    @endforeach
</div>