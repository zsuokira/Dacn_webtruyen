@extends('admin.layout.index')
@section('content') 
@hasRole('author') 
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Sửa Truyện</h4>
                    <p class="card-description"> Không Khoa Học Ngự Thú </p>
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputName1">Tên Truyện</label>
                        <input type="text" class="form-control" id="name" value="Không Khoa Học Ngự Thú">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Thể Loại</label>
                        <select class="form-control" id="category">
                          <option>Chọn Thể Loại . . .</option>
                          <option selected>Huyền Huyễn</option>
                          <option>Đô Thị</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Mô Tả Truyện</label>
                        <textarea class="form-control" id="storydesc" rows="10" >Thiên Linh đại lục, nhân loại thuộc về yếu thế quần thể. Ma thú hoành hành, yêu tộc hưng thịnh.

Thế giới này thuộc về võ giả, nhưng hắn lại không cách nào trở thành võ giả, nhưng lại có thể học được võ kỹ.

Thế giới võ giả, hắn lại trở thành một tên pháp sư?!

Tay trái Bạch Cốt Tiêu, tay phải Vạn Pháp Chi Thư. Được Thượng Cổ Tôn Giả chân truyền, hắn đúc lên con đường truyền kỳ bất hủ.

Cảnh giới:
Thiên Linh Đại Lục: Luyện Linh, Khai Linh, Huyền Linh
Tất cả nhân vật, sự kiện trong truyện hoàn toàn hư cấu, không phản ánh sự thật lịch sử, nếu có tương đồng, đơn thuần là trùng hợp</textarea>
                      </div>                   
                      <div class="form-group">
                        <label>Bìa Truyện</label>
                        <input type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Thêm Trang Bìa . . .">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Thêm</button>
                          </span>
                        </div>
                      </div> 
                      <div class="form-group">
                        <label for="exampleSelectGender">Trạng Thái</label>
                        <select class="form-control" id="category">
                          <option selected>Chưa Hoàn Thành</option>
                          <option>Hoàn Thành</option>
                        </select>
                      </div>                   
                      <button type="submit" class="btn btn-primary mr-2">Sửa Truyện</button>
                      <button class="btn btn-dark">Thoát</button>
                    </form>
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