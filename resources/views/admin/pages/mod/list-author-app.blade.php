@extends('admin.layout.index')
@section('content')   
  
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Danh Sách Người Yêu Cầu Làm Tác Giả</h4>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-hover" id="table-content-datatable" style="width:100%">
                        <thead>
                          <tr>
                            <th style="width:50%">Tên</th>
                            <th style="width:30%">Ngày Tham Gia</th>
                            <th style="width:10%"></th>
                            <th style="width:10%"></th>
                          </tr>
                        </thead>
                        <tbody> 
                        @foreach($invite as $inv)                    
                          <tr>
                            <td>{{$inv -> user -> name}}</td>
                            <td>{{$inv -> user -> create_at}}</td>
                            <td> <a href="acp-invite/{{$inv->id}}">Chấp Nhận</a></td>
                            <td> <a href="refuse-invite/{{$inv->id}}">Từ Chối</a> </td>
                          </tr> 
                        @endforeach                       
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

@endsection             