@extends('admin.layout.index')
@section('content')   
  
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Danh Sách Người Dùng</h4>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-hover" id="table-content-datatable">
                        <thead>
                          <tr>
                            <th>Tên Người Dùng</th>
                            <th>Loại Tài Khoản</th>
                            <th>Ngày Tham Gia</th>
                            <th>Lượt Vi Phạm</th>
                            <th>Trạng Thái</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody> 
                        <?php     use App\Models\Story; 
                                  use App\Models\User; 
                        ?>
                        @foreach($user as $us)
                          <tr>
                            <td><a href="#">{{$us->name}}</a></td>
                            <td>
                                <?php
                                $name = User::find($us->id)->role()->orderBy('id','DESC')->first();
                                if($name){
                                    $na=$name->name;
                                    if($na=="USER") echo "Người Dùng";
                                    if($na=="AUTHOR") echo "Tác giả";
                                    if($na=="SMOD") echo "Kiểm duyệt";
                                    if($na=="ADMIN") echo "Quản trị viên tối cao";
                                }
                                ?>
                            </td>
                            <td>{{$us->createDate}}</td>
                            <td>0</td>
                            <td>
                                @if($us->status == 1)<p style="color: green;"> Hoạt Động </p> @endif
                                @if($us->status == 0)<a href="unblock/{{$us->id}}" style="color: red;"> Đã Khoá (Nhấn để Mở) </a> @endif
                            </td>
                            </td>
                            <td>
                            <?php
                            if($name){
                            $na=$name->name;
                            if($na=="USER") { ?>
                            <a href="delete-user/{{$us->id}}"> Xoá</a>
                            <?php
                            }
                            if($na=="AUTHOR") { ?>
                            <a href="delete-user/{{$us->id}}"> Khoá</a>
                            <?php
                            }
                            }
                            ?>
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