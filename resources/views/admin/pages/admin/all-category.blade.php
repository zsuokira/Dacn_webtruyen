@extends('admin.layout.index')
@section('content')            
            <div class="col-lg-12 grid-margin stretch-card">
           
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Danh Sách Thể Loại</h4>
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
                    </p>
                    <div class="table-responsive">
                      <table class="table table-hover" id="table-content-datatable">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Tên Thể Loại</th>
                            <th>Trạng Thái</th>
                            <th>Sửa</th>
                            <th>Xoá</th>
                          </tr>
                        </thead>
                        <tbody>   
                            @foreach($category as $cate)                     
                          <tr>
                            <td>{{$cate -> id}}</td>
                            <td>{{$cate -> name}}</td>
                            <td>
                                @if($cate -> status == 1) Hiện Thị                             
                                @endif
                                @if($cate -> status == 0) Ẩn                           
                                @endif
                            </td>
                            <td> <a href="edit-category/{{$cate->id}}/{{$cate->metaTitle}}">Sửa</a> </td>
                            <td> <a href="del-category/{{$cate->id}}">Xoá</a> </td>
                          </tr> 
                          @endforeach                        
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
@endsection             