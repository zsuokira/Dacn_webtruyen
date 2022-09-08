@extends('admin.layout.index')
@section('content')
@hasRole('admin') 
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Sửa Đổi Thể Loại</h4>
                    <form action="edit-category/{{$category->id}}" class="forms-sample" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                      <div class="form-group">
                        <label for="exampleInputName1">Tên Thể Loại</label>
                        <input type="text" class="form-control" name="name" value="{{$category->name}}">
                      </div>
                      <label for="exampleSelectGender">Trạng Thái</label>
                      <div class="col-md-6">     
                          <div class="form-group">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="optionsRadios1" value="0"
                                @if($category -> status == 0)
                                checked
                                @endif
                                > Ẩn </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="optionsRadios2" value="1" 
                                @if($category -> status == 1)
                                checked
                                @endif
                                > Hiện </label>
                            </div>
                          </div>
                        </div>             
                         
                      <button type="submit" class="btn btn-primary mr-2">Sửa Đổi</button>
                      <button class="btn btn-dark">Thoát</button>
                    </form>
                  </div>
                </div>
              </div>
@endhasRole
@endsection     