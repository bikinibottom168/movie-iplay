@extends('admin.master')


@section('body')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal form-material" enctype="multipart/form-data" action="{{ route('admin.member.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12">
                            <label>ชื่อผู้ใช้</label>
                            <input type="text" name="email" placeholder="" class="form-control form-control-line">
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <label>รหัสผ่าน</label>
                            <input type="text" name="password" placeholder="" class="form-control form-control-line">
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <label>ประเภท</label>
                            <select name="admin_type" class="form-control">
                                <option value="2">Staff</option>
                                <option value="1">Full Access</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <button class="btn btn-success btn-lg" type="submit">เพิ่มสมาชิก</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
