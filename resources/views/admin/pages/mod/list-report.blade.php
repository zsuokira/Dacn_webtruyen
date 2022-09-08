@extends('admin.layout.index')
@section('content')   
  
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Danh Sách Báo Cáo Truyện</h4>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-hover" id="table-content-datatable" style="width:100%">
                        <thead>
                          <tr>
                            <th style="width:40%">Tên Truyện</th>
                            <th style="width:40%">Tên Chương</th>
                            <th style="width:20%">Ngày Đăng</th>
                          </tr>
                        </thead>
                        <tbody> 
                        @foreach ($report as $rep)              
                          <tr>
                            <td><a href="report/{{$rep->id}}">{{$rep->chapter->story->name}}</a></td>
                            <td>Chương {{$rep->chapter->chapterNum}}: {{$rep->chapter->name}}</td>
                            <td>{{$rep->create_at}}</td>
                          </tr> 
                        @endforeach                  
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

@endsection             