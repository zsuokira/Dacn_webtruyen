@extends('admin.layout.index')
@section('content')     
            <div class="col-lg-10 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-thumb col-3">
                                <div class="thumb hidden-xs">
                                    <img class="img-fluid lazyload" src="{{Auth::user()->avatar}}">
                                    <div style="text-align: center;"> <a href="change-avt"> Thay ảnh đại diện </a> </div>
                                </div>
                            </div>
                            <div class="col-info col-6">
                                <h4> Tên Đăng Nhập: {{Auth::user()->usersname}}</h4>
                                        <br>
                                <h4> Mật Khẩu: ******** <a href="change-password"> Thay Đổi </a> </h4>
                                        <br>
                                <h4> Họ Và Tên: {{Auth::user()->name}} <a href="change-name"> Thay Đổi </a> </h4>
                                        <br>
                                <h4> Email: {{Auth::user()->email}} <a href="change-email"> Thay Đổi </a> </h4>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
@endsection             