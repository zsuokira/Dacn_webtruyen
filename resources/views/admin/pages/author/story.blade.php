@extends('admin.layout.index')
@section('content') 
@hasRole('author')           
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">{{$story -> name}}</h4>
                    <p class="card-description"> Danh Sách Chương </p>
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
                    <a href="add-chapter/{{$story -> id}}">
                        <span>
                        <i class="mdi mdi-plus-box"></i>
                        </span>
                        <span class="menu-title">Thêm Chương Mới</span>
                    </a>
                   
                    <div class="table-responsive">
                      <table class="table table-hover" id="table-content-datatable">
                        <thead>
                          <tr>
                            <th>Chương Số</th>
                            <th>Tên Chương</th>
                            <th>Sửa</th>
                            <th>Xoá</th>
                          </tr>
                        </thead>
                        <tbody>  
                        @foreach($chapter2 as $ct)                      
                          <tr>
                            <td>{{$ct-> chapterNum}}</td>
                            <td>{{$ct-> name}}</td>
                            <td> <a href="edit-chapter">Sửa</a> </td>
                            <td> <a href="del">Xoá</a> </td>                           
                          </tr>  
                          @endforeach                       
                        </tbody>
                      </table>
                    </div>
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