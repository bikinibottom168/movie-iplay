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
    <div class="col-lg-12">
            <h3>{{ $header_title }}</h3>
            <div class="row">
                @foreach($file_list as $key => $val)
                    <div class="col-lg-3 p-2">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">{{ strtoupper($key) }}</h5>
                            <p class="card-text">{{ $file_list_detail[$key] }}</p>
                                <a href="{{ route('code.editor' ,['file' => $key]) }}" class="btn btn-primary">แก้ไข</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-lg-2 col-md-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <a class="nav-link active" id="theme-1" data-toggle="pill" href="#v-theme-1" role="tab"
                            aria-controls="v-theme-1" aria-selected="true">Root Theme</a>
                        <a class="nav-link" id="theme-2" data-toggle="pill" href="#v-theme-2" role="tab"
                            aria-controls="v-theme-2" aria-selected="false">Home Page</a>
                        <a class="nav-link" id="theme-3" data-toggle="pill" href="#v-theme-3" role="tab"
                            aria-controls="v-theme-3" aria-selected="false">Movie Page</a>
                        <a class="nav-link" id="theme-4" data-toggle="pill" href="#v-theme-4" role="tab"
                            aria-controls="v-theme-4" aria-selected="false">Article Page</a>
                        <a class="nav-link" id="theme-5" data-toggle="pill" href="#v-theme-5" role="tab"
                            aria-controls="v-theme-5" aria-selected="false">Sidebar</a>
                        <a class="nav-link" id="theme-6" data-toggle="pill" href="#v-theme-6" role="tab"
                            aria-controls="v-theme-6" aria-selected="false">Footer</a>
                        <a class="nav-link" id="theme-7" data-toggle="pill" href="#v-theme-7" role="tab"
                            aria-controls="v-theme-7" aria-selected="false">Header</a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-theme-1" role="tabpanel"
                            aria-labelledby="theme-1">
                            @php
                                $get_file_root = fopen(resource_path('views/movie/home.blade.php'), "r") or die("Unable to open file!");
                                $read_file_root = htmlspecialchars_decode(fread($get_file_root,filesize(resource_path('views/movie/home.blade.php'))));
                                // fclose($read_file_root);
                            @endphp
                            <div id="custom-html" >{!!  $read_file_root  !!}</div>
                            
                        </div>
                        <div class="tab-pane fade" id="v-theme-2" role="tabpanel" aria-labelledby="theme-2">2</div>
                        <div class="tab-pane fade" id="v-theme-3" role="tabpanel" aria-labelledby="theme-3">2</div>
                        <div class="tab-pane fade" id="v-theme-4" role="tabpanel" aria-labelledby="theme-4">2</div>
                        <div class="tab-pane fade" id="v-theme-5" role="tabpanel" aria-labelledby="theme-5">2</div>
                        <div class="tab-pane fade" id="v-theme-6" role="tabpanel" aria-labelledby="theme-6">2</div>
                        <div class="tab-pane fade" id="v-theme-7" role="tabpanel" aria-labelledby="theme-7">2</div>
                    </div>
                </div> --}}
                {{-- END WEBMASTER --}}
            </div>
    </div>
</div>
<script>
    const flask = new CodeFlask('#custom-html', {
      language: 'js',
      lineNumbers: true,
      areaId: 'thing1',
      ariaLabelledby: 'header1',
      handleTabs: true
    });
    window['flask'] = flask;

</script>
@endsection