@php 
// if(env('SCRIPT_ADS_TOP_LEFT_RIGHT', '0') == "1")
// {
    $col = "col-lg-20 col-md-20 col-20";
// }
// else
// {
//     $col = "col-lg-20 col-md-20 col-20 mb-1";
// }

@endphp

@foreach($ads_footer as $k)
<div class="{{ $col }} text-center m-1">
    @if($k->show_ads != $show_ads && $k->show_ads != 0)
        @php
            break;
        @endphp
    @endif
        @if($k->type == 1)
        {!! $k->url_ads !!}
        @elseif($k->type == 0)
            <a href="{{ get_url_ads($k) }}" target="_blank" class="ads-click" data-id="{{ $k->id }}">
            @if(strrpos($k->image_ads , 'http') === false)
                <img src="{{ asset($k->image_ads) }}" alt="{{ $k->title_ads }}" class="img-fluid">
            @else
                <img src="{{ $k->image_ads }}" alt="{{ $k->title_ads }}" class="img-fluid">
            @endif
            </a>

        @endif
    </div>
@endforeach