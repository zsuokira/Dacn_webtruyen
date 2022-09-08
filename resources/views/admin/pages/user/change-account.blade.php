@extends('admin.layout.index')
@section('content') 
<div class="col-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Đổi {{$change}}</h4>
                    @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach                           
                            </div>
                        @endif
                        @if(session('message'))
                            <div >
                                {{session('message')}}
                            </div>
                @endif
                    @if($meta=="anh-dai-dien")
                    <form action="change-{{$meta}}" class="forms-sample" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                      <div class="form-group">
                        <label for="exampleInputName1">{{$change}}</label>
                        <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" >
                      </div>     
                      <button type="submit" class="btn btn-primary mr-2">Sửa Đổi</button>
                      <a href="account" class="btn btn-dark">Thoát</a>
                    </form>
                    @endif
                    @if($meta=="ten-hien-thi")
                    <form action="change-{{$meta}}" class="forms-sample" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                      <div class="form-group">
                        <label for="exampleInputName1">{{$change}}</label>
                        <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" >
                      </div>     
                      <button type="submit" class="btn btn-primary mr-2">Sửa Đổi</button>
                      <a href="account" class="btn btn-dark">Thoát</a>
                    </form>
                    @endif
                    @if($meta=="mat-khau")
                    <form action="change-{{$meta}}" class="forms-sample" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                      <div class="form-group">
                        <label for="exampleInputName1">Nhập Mật Khẩu Mới</label>
                        <input type="password" class="form-control" name="newPassword" >
                        <label for="exampleInputName1">Nhập Lại Mật Khẩu</label>
                        <input type="password" class="form-control" name="reNewPassword">
                      </div>     
                      <button type="submit" class="btn btn-primary mr-2">Sửa Đổi</button>
                      <a href="account" class="btn btn-dark">Thoát</a>
                    </form>
                    @endif
                    @if($meta=="email")
                    <form action="change-{{$meta}}" class="forms-sample" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                      <div class="form-group">
                        <label for="exampleInputName1">{{$change}}</label>
                        <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}" >
                      </div>     
                      <button type="submit" class="btn btn-primary mr-2">Sửa Đổi</button>
                      <a href="account" class="btn btn-dark">Thoát</a>
                    </form>
                    @endif
                  </div>
                </div>
              </div>
@endsection     