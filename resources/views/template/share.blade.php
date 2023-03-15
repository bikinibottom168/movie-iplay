<div class="row justify-content-end">
    <div class="col-lg-12 text-left">
        <a href="#" id="moviecontact" class="btn btn-danger">แจ้งหนังเสีย</a>
    </div>
    <div class="col-lg-8 text-right" style="color: {{ option_get("text_color") }}">
        <p class="share-header">{{ $text_setting[12] != "" ? $text_setting[12] : "แชร์ให้เพื่อนดูด้วย" }}</p>
        {!! 
            Share::page(url()->current(), 'Share title')
            ->facebook()
            ->twitter()
            ->Telegram()
            ->whatsapp();
        !!}

    </div>
</div>

<script>
    $(document).ready(function(){
        $("#moviecontact").click(function(){
            var request = "{{ $movie->id }}";
            jQuery.ajax({
                url: '{{ url('/') }}/api/v1/moviecontact/'+request,
                type: 'GET',
                crossDomain: true,
                cache: false,
                success:function(data){
                
                // console.log(data);
                }
            });
            alert('เราจะดำเนินการให้เร็วที่สุด')
    });
    });
</script>