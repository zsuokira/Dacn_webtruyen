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
                            <th>Tên Tác Giả</th>
                            <th>Số Truyện Đã Đăng</th>
                            <th>Tổng Lượt Truy Cập Truyện</th>
                            <th>Ngày Tham Gia</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody> 
                        <?php  use App\Models\Story; ?>
                       @foreach ($author as $au)    
                          <tr>
                            <td><a href="#">{{$au ->name}}</a></td>
                            <td>
                                <?php 
                                       $authorId = $au ->id;
                                       $countStory = Story::where('authorId',$authorId)->count();
                                       echo $countStory;
                                ?>
                            </td>
                            <td>
                                <?php 
                                      $countView = Story::where('authorId',$authorId)->sum('countView');
                                      echo $countView;
                                ?>
                            </td>
                            <td>{{$au ->create_at}}</td>
                            </td>
                            <td><a href="noibat/{{$au ->id}}">
                                @if($au->decu==0) Đề Cử @endif
                                @if($au->decu==1) Huỷ Đề Cử @endif
                            </a></td>
                          </tr> 
                        @endforeach           
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

@endsection             