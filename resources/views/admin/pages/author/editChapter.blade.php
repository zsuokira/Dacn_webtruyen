@extends('admin.layout.index')
@section('content') 
@hasRole('author')  
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Chương 01: Xuyên Qua!</h4>
                    <p class="card-description"> Không Khoa Học Ngự Thú </p>
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputName1">Chương Số</label>
                        <input type="text" class="form-control" id="numChapter" value="01">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Tên Chương</label>
                        <input type="text" class="form-control" id="nameChapter" value="Chương 01: Xuyên Qua!">
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Nội Dung</label>
                        <textarea class="form-control" id="contentStory" rows="40"> Vào một buổi sáng đẹp trời ádbaiwgdiawgb</textarea>
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