@extends('admin.layout.index')
@section('content')
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Đăng Chương Mới</h4>
                    <p class="card-description"> </p>
                    <form action="post-info" class="forms-sample" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                      <div class="form-group">
                        <label for="exampleInputName1">Tên</label>
                        <input type="text" class="form-control" name="name" >
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Nội Dung</label>
                        <textarea class="form-control" name="content" rows="40"></textarea>
                      </div>                   
                         
                      <button type="submit" class="btn btn-primary mr-2">Đăng Chương</button>
                      <button class="btn btn-dark">Thoát</button>
                    </form>
                  </div>
                </div>
              </div>
@hasRole('user')
<h4 class="card-title">BẠN KHÔNG CÓ QUYỀN TRUY CẬP</h4>
@endhasRole
@hasRole('author')
<h4 class="card-title">BẠN KHÔNG CÓ QUYỀN TRUY CẬP</h4>
@endhasRole
@endsection     