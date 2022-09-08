@extends('admin.layout.index')
@section('content')   
  
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Danh Sách Báo Cáo Truyện</h4>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-hover" id="table-content-datatable">
                        <thead>
                          <tr>
                            <th>Tên Truyện</th>
                            <th>Lượt Truy Cập</th>
                            <th>Tác Giả</th>
                            <th>Ngày Đăng</th>
                            <th>Đề cử</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody> 
                        @foreach($story as $st)       
                          <tr>
                            <td><a href="#">{{$st->name}}</a></td>
                            <td>{{$st->countView}}</td>
                            <td>{{$st->user->name}}</td>
                            <td>{{$st->createDate}}</td>
                            <td> <a href="decu/{{$st->id}}">
                              @if($st->noibat==0) Chưa Nổi Bật @endif
                              @if($st->noibat==1) Nổi Bật @endif
                              @if($st->noibat==2) Nổi Bật Nhất @endif
                            </a>
                            </td>
                            <td><a href="top1/{{$st->id}}">Top 1</a></td>
                          </tr> 
                        @endforeach                 
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

@endsection             