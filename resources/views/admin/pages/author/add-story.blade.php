@extends('admin.layout.index')
@section('content') 
@hasRole('author') 
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Đăng Truyện Mới</h4>
                    @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach                           
                            </div>
                        @endif

                        @if(session('message'))
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                        @endif
                    <p class="card-description"> Nhập Thông Tin Truyện </p>
                    <form action="add-story" class="forms-sample" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                      <div class="form-group">
                        <label for="exampleInputName1">Tên Truyện</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập Tên Truyện . . .">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Thể Loại</label>
                        <select class="form-control" name="category">
                          <option>Chọn Thể Loại . . .</option>
                          @foreach($category as $cate)
                          <option value="{{$cate -> id}}" >{{$cate -> name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Mô Tả Truyện</label>
                        <textarea class="form-control" name="storydesc" rows="10"></textarea>
                      </div>                   
                      <div class="form-group">
                        <label>Bìa Truyện</label>
                        <input type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Thêm Bìa Truyện ....">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>             
                      <button type="submit" class="btn btn-primary mr-2">Thêm Truyện</button>
                      <button class="btn btn-dark">Thoát</button>
                    </form>
                  </div>
                </div>
              </div>
@endhasRole
@hasRole('user')
<h4 class="card-title">BẠN KHÔNG CÓ QUYỀN TRUY CẬP</h4>
@endhasRole
@hasRole('smod')
<h4 class="card-title">BẠN KHÔNG CÓ QUYỀN TRUY CẬP</h4>
@endhasRole
@hasRole('admin')
<h4 class="card-title">BẠN KHÔNG CÓ QUYỀN TRUY CẬP</h4>
@endhasRole
@endsection     