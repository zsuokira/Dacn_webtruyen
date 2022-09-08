@extends('admin.layout.index')
@section('content')     
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
               
                    <h4 style="text-align: center;"> Để được phép đăng truyện, bạn phải đáp ứng những yêu cầu sau</h4>
                    <div style="text-align: center;">=====================================</div>
                    <br>
                    <div style="white-space: pre-line;">
                    {{$noiquy->content}}
                    </div>
                    </br> </br> </br>
                    <a href="accept-author"class="btn btn-primary" style=" margin-left: 100px">
                        <span class="btn-icon">ĐỒNG Ý</span>
                    </a>
                    <a href="index"class="btn btn-primary" style=" margin-left: 700px">
                        <span class="btn-icon">TỪ CHỐI</span>
                    </a>
                    
                  </div>
                </div>
              </div>
@endsection             