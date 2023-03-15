@extends('admin.master')


@section('body')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.css" />
    <script src="{{ asset('js/jquery.sortable.min.js') }}"></script>
    <script src="{{ asset('js/selectize.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@jaames/iro@5"></script>
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset("admin/spectrum/spectrum.css") }}">
    <script type="text/javascript" src="{{ asset("admin/spectrum/jquery-1.9.1.js") }}"></script>
    <script type="text/javascript" src="{{ asset("admin/spectrum/spectrum.js") }}"></script>

    <script type='text/javascript' src='{{ asset("admin/spectrum/toc.js") }}'></script>
    <script type='text/javascript' src='{{ asset("admin/spectrum/docs.js") }}'></script>
    <script type='text/javascript' src='{{ asset("admin/spectrum/highlight/highlight.pack.js") }}'></script> --}}


    <div class="col-lg-12">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
                        <div class="card">
                            <div class="card-body">
                                {{-- <form class="form-horizontal form-material" enctype="multipart/form-data" action="{{ route('admin.seo.update', ['id'=> $request->id]) }}" method="POST">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }} --}}
                                    <div class="form-group">
                                        <h3>{{ $header_title }}</h3>
                                        <div class="row">

                                            @if(Request::get('type') == "text_setting")
                                                @php
                                                    if(option_get("text_setting") == "")
                                                    {
                                                        $text_setting = array("","","","","","","","","","","","","","");
                                                    }
                                                    else {
                                                        $text_setting = unserialize(option_get('text_setting'));
                                                    }
                                                @endphp
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group row">
                                                    <div class="col-md-1 my-auto text-center">
                                                        <p>ดูหนังออนไลน์</p>
                                                    </div>
                                                    <div class="col-md-2 my-auto">
                                                        <input type="text" class="form-control" id="" name="text[]" placeholder="Default ดูหนังออนไลน์" value="{{ ($text_setting[0] != null) ? $text_setting[0] : "-" }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1 my-auto text-center">
                                                        <p>ค้นหา</p>
                                                    </div>
                                                    <div class="col-md-2 my-auto">
                                                        <input type="text" class="form-control" id="" name="text[]" placeholder="Default ค้นหา" value="{{ ($text_setting[1] != null) ? $text_setting[1] : "-" }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1 my-auto text-center">
                                                        <p>หมวดหมู่</p>
                                                    </div>
                                                    <div class="col-md-2 my-auto">
                                                        <input type="text" class="form-control" id="" name="text[]" placeholder="Default หมวดหมู่" value="{{ ($text_setting[2] != null) ? $text_setting[2] : "-" }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1 my-auto text-center">
                                                        <p>ปีหนัง</p>
                                                    </div>
                                                    <div class="col-md-2 my-auto">
                                                        <input type="text" class="form-control" id="" name="text[]" placeholder="Default ปีหนัง" value="{{ ($text_setting[3] != null) ? $text_setting[3] : "-" }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1 my-auto text-center">
                                                        <p>ตัวอย่าง</p>
                                                    </div>
                                                    <div class="col-md-2 my-auto">
                                                        <input type="text" class="form-control" id="" name="text[]" placeholder="Default ตัวอย่าง" value="{{ ($text_setting[4] != null) ? $text_setting[4] : "-" }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1 my-auto text-center">
                                                        <p>หนังอื่นๆ</p>
                                                    </div>
                                                    <div class="col-md-2 my-auto">
                                                        <input type="text" class="form-control" id="" name="text[]" placeholder="Default หนังอื่นๆ" value="{{ ($text_setting[5] != null) ? $text_setting[5] : "-" }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1 my-auto text-center">
                                                        <p>Director</p>
                                                    </div>
                                                    <div class="col-md-2 my-auto">
                                                        <input type="text" class="form-control" id="" name="text[]" placeholder="Default Director" value="{{ ($text_setting[6] != null) ? $text_setting[6] : "-" }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1 my-auto text-center">
                                                        <p>Actors</p>
                                                    </div>
                                                    <div class="col-md-2 my-auto">
                                                        <input type="text" class="form-control" id="" name="text[]" placeholder="Default Actors" value="{{ ($text_setting[7] != null) ? $text_setting[7] : "-" }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1 my-auto text-center">
                                                        <p>Genres</p>
                                                    </div>
                                                    <div class="col-md-2 my-auto">
                                                        <input type="text" class="form-control" id="" name="text[]" placeholder="Default Genres" value="{{ ($text_setting[8] != null) ? $text_setting[8] : "-" }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1 my-auto text-center">
                                                        <p>เรื่องย่อ</p>
                                                    </div>
                                                    <div class="col-md-2 my-auto">
                                                        <input type="text" class="form-control" id="" name="text[]" placeholder="Default เรื่องย่อ" value="{{ ($text_setting[9] != null) ? $text_setting[9] : "-" }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1 my-auto text-center">
                                                        <p>แสดงเพิ่ม</p>
                                                    </div>
                                                    <div class="col-md-2 my-auto">
                                                        <input type="text" class="form-control" id="" name="text[]" placeholder="Default แสดงเพิ่ม" value="{{ ($text_setting[10] != null) ? $text_setting[10] : "-" }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1 my-auto text-center">
                                                        <p>หนังเรื่องอื่นๆ</p>
                                                    </div>
                                                    <div class="col-md-2 my-auto">
                                                        <input type="text" class="form-control" id="" name="text[]" placeholder="Default หนังเรื่องอื่นๆ" value="{{ ($text_setting[11] != null) ? $text_setting[11] : "-" }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1 my-auto text-center">
                                                        <p>แชร์ให้เพื่อนดูด้วย</p>
                                                    </div>
                                                    <div class="col-md-2 my-auto">
                                                        <input type="text" class="form-control" id="" name="text[]" placeholder="Default แชร์ให้เพื่อนดูด้วย" value="{{ ($text_setting[12] != null) ? $text_setting[12] : "-" }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1 my-auto text-center">
                                                        <p>หนังไตรภาค</p>
                                                    </div>
                                                    <div class="col-md-2 my-auto">
                                                        <input type="text" class="form-control" id="" name="text[]" placeholder="Default หนังไตรภาค" value="{{ ($text_setting[13] != null) ? $text_setting[13] : "-" }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 mt-4">
                                                        <button class="btn btn-success btn-lg" id="save-data">อัพเดท</button>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <script>
                                                $(document).ready(function() {
                                                    $("#save-data").click(function(event){

                                                    event.preventDefault();
                                                    var text_setting = $("input[name='text[]']").map(function(){return $(this).val();}).get();
                                                    let _token   = $('meta[name="csrf-token"]').attr('content');
                                                    let user_token   = $('meta[name="remember-token"]').attr('content');
                                              
                                                    $.ajax({
                                                      url: "{{ url('/') }}/api/v1/ajax",
                                                      type:"POST",
                                                      data:{
                                                        type: "{{ Request::get('type') }}",
                                                        text_setting: text_setting,
                                                        _token: _token,
                                                        user_token: user_token
                                                      },
                                                      success:function(response){
                                                            Swal.fire(
                                                                'บันทึกสำเร็จ',
                                                                '',
                                                                'success'
                                                            )
                                                          },
                                                          error: function(error) {
                                                            Swal.fire(
                                                                'Error',
                                                                '',
                                                                'error'
                                                            )
                                                          }
                                                     });
                                                });
                        
                                                    
                                                });
                                            </script>
                                            @endif


                                            @if(Request::get('type') == "word_status")
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group row">
                                                    <div class="col-md-1 my-auto">
                                                        <p>แสดงผล Word Letter A-Z ด้านบน</p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select name="word_status" id="word_status" class="form-control" >
                                                            <option value="0" {{ option_get('word_status') == "0" ? "selected" : "" }}>ปิด</option>
                                                            <option value="1" {{ option_get('word_status') == "1" ? "selected" : "" }}>เปิด</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 mt-4">
                                                        <button class="btn btn-success btn-lg" id="save-data">อัพเดท</button>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <script>
                                                $(document).ready(function() {
                                                    $("#save-data").click(function(event){
                                                    event.preventDefault();
                                              
                                                    let word_status = $("#word_status").val();
                                                    let _token   = $('meta[name="csrf-token"]').attr('content');
                                                    let user_token   = $('meta[name="remember-token"]').attr('content');
                                              
                                                    $.ajax({
                                                      url: "{{ url('/') }}/api/v1/ajax",
                                                      type:"POST",
                                                      data:{
                                                        type: "{{ Request::get('type') }}",
                                                        word_status: ""+word_status+"",
                                                        _token: _token,
                                                        user_token: user_token
                                                      },
                                                      success:function(response){
                                                            Swal.fire(
                                                                'บันทึกสำเร็จ',
                                                                '',
                                                                'success'
                                                            )
                                                          },
                                                          error: function(error) {
                                                            Swal.fire(
                                                                'Error',
                                                                '',
                                                                'error'
                                                            )
                                                          }
                                                     });
                                                });
                        
                                                    
                                                });
                                            </script>
                                            @endif

                                            @if(Request::get('type') == "css_custom")
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group row">
                                                    <label for="staticEmail" class="col-sm-12 col-form-label">Custom CSS</label>
                                                    <div class="col-sm-12">
                                                        <textarea type="text" id="css_custom" rows="20" class="form-control form-control-line">{{ option_get('css_custom') }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 mt-4">
                                                        <button class="btn btn-success btn-lg" id="save-data">อัพเดท</button>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <script>
                                                $(document).ready(function() {
                                                    $("#save-data").click(function(event){
                                                    event.preventDefault();
                                              
                                                    let css_custom = $("#css_custom").val();
                                                    let _token   = $('meta[name="csrf-token"]').attr('content');
                                                    let user_token   = $('meta[name="remember-token"]').attr('content');
                                              
                                                    $.ajax({
                                                      url: "{{ url('/') }}/api/v1/ajax",
                                                      type:"POST",
                                                      data:{
                                                        type: "{{ Request::get('type') }}",
                                                        css_custom: ""+css_custom+"",
                                                        _token: _token,
                                                        user_token: user_token
                                                      },
                                                      success:function(response){
                                                            Swal.fire(
                                                                'บันทึกสำเร็จ',
                                                                '',
                                                                'success'
                                                            )
                                                          },
                                                          error: function(error) {
                                                            Swal.fire(
                                                                'Error',
                                                                '',
                                                                'error'
                                                            )
                                                          }
                                                     });
                                                });
                        
                                                    
                                                });
                                            </script>
                                            @endif
                                            

                                            @if(Request::get('type') == "general_color")
                                            <div class="col-md-12 col-sm-12">
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <label>Primary Color </label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        {{-- <input id="secondary" class="color-picker form-control" name="color_secondary" value='{{ option_get('primary_color') }}' /> --}}
                                                        <div id="primary_color"></div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <label>Navbar Color </label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div id="navbar_color"></div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <label>Footer Color </label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div id="footer_color"></div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <label>Background Color</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        {{-- <input id="primary" class="color-picker form-control" name="color_primary" value='{{ option_get('bg_color') }}' /> --}}
                                                        <div id="bg_color"></div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <label>Content Background Color</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        {{-- <input id="primary" class="color-picker form-control" name="color_primary" value='{{ option_get('bg_color') }}' /> --}}
                                                        <div id="content_bg_color"></div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <label>Movie Label Color </label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div id="badge_color"></div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row mb-5">
                                                    <div class="col-md-1">
                                                        <label>Text Color </label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div id="text_color"></div>
                                                        <div id="set_text_color"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 mt-4">
                                                        <button class="btn btn-success btn-lg" id="save-data">อัพเดท</button>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            {{-- <script src="https://cdn.jsdelivr.net/npm/@jaames/iro@5"></script>
                                            <script src="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.js"></script>
                                            <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.css"> --}}
                                            <script type="text/javascript">
                                            var set_text_color = "";
                                            var colorPicker = new iro.ColorPicker('#text_color',{
                                                width: 150,
                                                color: "{{ option_get('text_color') }}",
                                                borderWidth: 1,
                                                borderColor: "#fff",
                                                layout: [
                                                    {
                                                    component: iro.ui.Box,
                                                    },
                                                    {
                                                    component: iro.ui.Slider,
                                                    options: {
                                                        id: 'hue-slider',
                                                        sliderType: 'hue'
                                                    }
                                                    }
                                                ]
                                            });
                                            var set_text = document.getElementById("set_text_color");
                                            colorPicker.on(["color:init", "color:change"], function(color){
                                                set_text_color = color.hexString;
                                                set_text.innerHTML = color.hexString;
                                            });
                                            // var colorPicker = new iro.ColorPicker('#picker', {
                                            //     width: 100,
                                            //     display: "block",
                                            //     layoutDirection: "horizontal"
                                            // });
                                                let primary_color = new Grapick({el: '#primary_color'});
                                                let navbar_color = new Grapick({el: '#navbar_color'});
                                                let bg_color = new Grapick({el: '#bg_color'});
                                                let badge_color = new Grapick({el: '#badge_color'});
                                                let footer_color = new Grapick({el: '#footer_color'});
                                                let content_bg_color = new Grapick({el: '#content_bg_color'});
                                                // let text_color = new Grapick({el: '#text_color'});


                                                primary_color.setValue("{{ option_get('primary_color') }}");
                                                navbar_color.setValue("{{ option_get('navbar_color') }}");
                                                bg_color.setValue("{{ option_get('bg_color') }}");
                                                badge_color.setValue("{{ option_get('badge_color') }}");
                                                footer_color.setValue("{{ option_get('footer_color') }}");
                                                content_bg_color.setValue("{{ option_get('content_bg_color') }}");
                                                // text_color.setValue("{{ option_get('text_color') }}");

                                                primary_color.setDirection("bottom");
                                                navbar_color.setDirection("left");
                                                footer_color.setDirection("left");
                                                bg_color.setDirection("bottom");
                                                content_bg_color.setDirection("bottom");
                                                badge_color.setDirection("bottom");
                                                // text_color.setDirection("bottom");


                                            </script>

                                            <script>
                                                $(document).ready(function() {
                                                    $("#save-data").click(function(event){
                                                    event.preventDefault();

                                                    let _token   = $('meta[name="csrf-token"]').attr('content');
                                                    let user_token   = $('meta[name="remember-token"]').attr('content');
                                              
                                                    $.ajax({
                                                      url: "{{ url('/') }}/api/v1/ajax",
                                                      type:"POST",
                                                      data:{
                                                        type: "{{ Request::get('type') }}",
                                                        primary_color:primary_color.getValue(),
                                                        navbar_color:navbar_color.getValue(),
                                                        bg_color:bg_color.getValue(),
                                                        badge_color:badge_color.getValue(),
                                                        footer_color:footer_color.getValue(),
                                                        content_bg_color:content_bg_color.getValue(),
                                                        text_color:set_text_color,
                                                        _token: _token,
                                                        user_token: user_token
                                                      },
                                                      success:function(response){
                                                            Swal.fire(
                                                                'บันทึกสำเร็จ',
                                                                '',
                                                                'success'
                                                            )
                                                          },
                                                          error: function(error) {
                                                            Swal.fire(
                                                                'Error',
                                                                '',
                                                                'error'
                                                            )
                                                          }
                                                     });
                                                });
                        
                                                    
                                                });
                                            </script>
                                            @endif
                                            {{-- END WEBMASTER --}}



                                        </div>
                                    </div>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
@endsection

