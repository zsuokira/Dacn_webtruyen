@extends('admin.layout.index')
@section('content')     
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
               
                    <h4 style="text-align: center;">Đơn tố cáo truyện: {{$report->chapter->story->name}}</h4>
                    <div style="text-align: center;">=====================================</div>
                    <br>
                    <div> Người gửi: {{$report->user->name}} </div>
                    <div> Thời gian gửi: {{$report->create_at}} </div>
                    <div> Truyện bị báo cáo: {{$report->chapter->story->name}} </div>
                    <div> Chương bị báo cáo: Chương {{$report->chapter->chapterNum}}: {{$report->chapter->name}} </div>
                    <div> Lý do báo cáo: </div>
                    <div style="white-space: pre-line;">
                    {{$report->content}}
                    </div>
                    </br> </br> </br>
                    <a href="accept-report/{{$report->id}}"class="btn btn-primary" style=" margin-left: 100px">
                        <span class="btn-icon">ĐỒNG Ý</span>
                    </a>
                    <a href="ref-report/{{$report->id}}"class="btn btn-primary" style=" margin-left: 700px">
                        <span class="btn-icon">TỪ CHỐI</span>
                    </a>
                    
                  </div>
                </div>
              </div>
@endsection             