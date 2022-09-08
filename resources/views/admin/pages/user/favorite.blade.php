@extends('admin.layout.index')
@section('content')     
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Danh Sách Truyện Đã Theo Dõi</h4>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-hover" id="table-content-datatable">
                        <thead>
                          <tr>
                            <th>Tên Truyện</th>
                            <th>Thể Loại</th>
                            <th>Tác Giả</th>
                            <th>Trạng Thái</th>
                          </tr>
                        </thead>
                        <tbody> 
                        @foreach ($favorite as $fav)                    
                          <tr>
                            <td><a href="trangtruyen/{{$fav->storyId}}">{{$fav->story->name}}</a></td>
                            <td>{{$fav->story->category->name}}</td>
                            <td>{{$fav->story->user->name}}</td>
                            <td> @if($fav->story -> status == 1) Hoàn Thành                            
                                 @endif
                                 @if($fav->story-> status == 0) Đang ra                          
                                 @endif
                                 @if($fav->story-> status == 3) Tạm Dừng                         
                                 @endif  
                            </td>
                        </tr>         
                        @endforeach              
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
@endsection             