@extends('admin.layout.index')
@section('content')   
@hasRole('author')   
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Danh Sách Truyện Đã Đăng</h4>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-hover" id="table-content-datatable">
                        <thead>
                          <tr>
                            <th>Tên Truyện</th>
                            <th>Thể Loại</th>
                            <th>Đăng Ngày</th>
                            <th>Trạng Thái</th>
                            <th>Sửa</th>
                            <th>Xoá</th>
                          </tr>
                        </thead>
                        <tbody> 
                          @foreach($story as $st)                       
                          <tr>
                            <td><a href="story/{{$st->id}}">{{$st -> name}}</a></td>
                            <td>{{$st -> category -> name}}</td>
                            <td>{{$st -> createDate}}</td>
                            <td> @if($st -> status == 1) Hoàn Thành                            
                                @endif
                                @if($st -> status == 0) Chưa Hoàn Thành                           
                                @endif</td>
                            <td> <a href="edit-story/{{$st -> id}}">Sửa</a> </td>
                            <td> <a href="del-story/{{$st -> id}}">Xoá</a> </td>
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