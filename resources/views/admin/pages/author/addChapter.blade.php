@extends('admin.layout.index')
@section('content') 
@hasRole('author') 
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Đăng Chương Mới</h4>
                    <p class="card-description"> {{$story -> name}}</p>
                    <form action="add-chapter/{{$story -> id}}" class="forms-sample" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                      <div class="form-group">
                        <label for="exampleInputName1">Chương Số</label>
                        <input type="text" class="form-control" name="numChapter" placeholder="Nhập Chương Số . . .">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Tên Chương</label>
                        <input type="text" class="form-control" name="nameChapter" placeholder="Nhập Tên Chương . . .">
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Nội Dung</label>
                        <textarea class="form-control" name="contentChapter" rows="40"></textarea>
                      </div>                   
                         
                      <button type="submit" class="btn btn-primary mr-2">Đăng Chương</button>
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