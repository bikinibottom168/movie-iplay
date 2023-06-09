@foreach($ads_mt as $k)
<div class="col-lg-20 col-md-20 col-20 mb-1 text-center m-1">
    @if($k->show_ads != $show_ads && $k->show_ads != 0)
        @php
            break;
        @endphp
    @endif
        <a href="{{ get_url_ads($k) }}" target="_blank" class="ads-click" data-id="{{ $k->id }}">
        @if(strrpos($k->image_ads , 'http') === false)
            <img src="{{ asset($k->image_ads) }}" alt="{{ $k->title_ads }}" class="img-fluid">
        @else
            <img src="{{ $k->image_ads }}" alt="{{ $k->title_ads }}" class="img-fluid">
        @endif
        </a>
    </div>
@endforeach