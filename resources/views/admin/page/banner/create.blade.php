@extends('admin.master')


@section('body')
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <div class="col-lg-12">
        <form class="form-horizontal form-material" enctype="multipart/form-data" action="{{ route('admin.banner.store') }}" method="POST">
        <div class="card">
            <div class="card-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-5 col-sm-12">
                                <label>Title</label>
                                <input type="text" name="title" placeholder="Title" class="form-control form-control-line">
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <label>สถานะใช้งาน</label>
                                <select class="form-control form-control-line" name="status">
                                    <option value="1">เปิดใช้งาน</option>
                                    <option value="0">ปิด</option>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <label>แสดงผล</label>
                                <select class="form-control form-control-line" name="show_ads">
                                    <option value="0">แสดงทุกหน้า</option>
                                    <option value="1">เฉพาะหน้าแรก</option>
                                    <option value="2">เฉพาะหน้าดูหนัง</option>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <label>หมดอายุ</label>
                                <input type="text" name="expired" class="form-control form-control-line" id="end">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 col-sm-12">
                                <label >ประเภท</label>
                                <select class="form-control form-control-line" name="type">
                                    <option value="0">image</option>
                                    <option value="1">code</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <label>ลิ้งเว็บ / script</label>
                                <input type="text" name="url" placeholder="url" class="form-control form-control-line">
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <label>ตำแหน่ง</label>
                                <select class="form-control form-control-line" name="layout">
                                    <option value="a" >A ทุกหน้า - ตรงกลางด้านบน (แนะนำ 920x200)</option>
                                    {{-- <option value="f1" >F1 ทุกหน้า - ซ้ายบนแนวตั้ง (แนะนำ 200x660)</option>
                                    <option value="r1" >R1 ทุกหน้า - ขวาบนแนวตั้ง (แนะนำ 200x660)</option> --}}
                                    <option value="r2" >R2 ทุกหน้า - ป้าขวาแสดงตรงเมนู (แนะนำ 250x250)</option>
                                    <option value="aaa" >AAA ทุกหน้า - ป้ายลอยซ้าย (แนะนำ 180x160)</option>
                                    <option value="bbb" >BBB ทุกหน้า - ป้ายลอยตรงกลางล่าง (แนะนำ 728x90)</option>
                                    <option value="ccc" >CCC ทุกหน้า - ป้ายลอยขวา (แนะนำ 180x160)</option>
                                    <option value="footer" >FOOTER_MENU ด้านบนปุ่มเปลี่ยนหน้า (แนะนำ 728x90)</option>
                                    <option value="mt" >MT ด้านบนสุด แสดงเฉพาะหน้าดูหนัง (แนะนำ 728x90)</option>
                                    <option value="m1" >M1 เฉพาะหน้าดูหนัง - ด้านบนตัวเล่นหนัง (แนะนำ 728x90)</option>
                                    <option value="m2" >M2 เฉพาะหน้าดูหนัง - ด้านล่างตัวเล่นหนัง (แนะนำ 728x90)</option>
                                    <option value="video">VIDEO - ตัวเล่นหนัง </option>
                                    <option value="overlay">Overlay ป้ายแสดงใน Player</option>
                                    <option value="code" >Code</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <label>ลำดับโฆษณา (A คือล่างสุด)</label>
                                <select class="form-control form-control-line" name="position">
                                    @foreach (range('A','Z') as $val)
                                    <option value="{{$val}}">{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="uploadImage">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="exampleFormControlFile1">รูปภาพ</label>
                                <input type="file" class="form-control-file" name="file" id="exampleFormControlFile1">
                            </div>
                        </div>
                    </div>
            </div>
        </div>

    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-12">
                        <button class="btn btn-success btn-lg" type="submit">เพิ่มโฆษณา</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    </div>
        <script  type="text/javascript">
          $( "#end" ).datepicker({ dateFormat: 'yy-mm-dd' });
            $(document).ready(function() {
                $('select[name="type"]').change(function() {
                    if(this.value == "1") {
                     $('#uploadImage').hide();
                    }
                    else {
                        $('#uploadImage').show();
                    }
                });
            });
      </script>
@endsection
