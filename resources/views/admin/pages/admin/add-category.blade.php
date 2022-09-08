@extends('admin.layout.index')
@section('content') 
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
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
                    <h4 class="card-title">Thêm Thể Loại Truyện Mới</h4>
                    <form action="add-category" class="forms-sample" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                      <div class="form-group">
                        <label for="exampleInputName1">Tên Thể Loại</label>
                        <input type="text" class="form-control" name="name" >
                      </div>     
                      <button type="submit" class="btn btn-primary mr-2">Thêm Mới</button>
                      <button class="btn btn-dark">Thoát</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection     