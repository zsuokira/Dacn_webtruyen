<!DOCTYPE html>
<html  lang="vi">
<head>
    <head>
        <!--Header-->
        <title >{{$chapter -> story -> name}}</title>
        @include('public.index.header')
</head>
<body class="page-read body-home" >
<div class="page-wrapper">
    <!--NavBar-->
    @include('public.index.navbar')

    <!--Body-->
    <div class="truyen-main">
        <div class="truyen-breadcrumb">
            <div class="container">
                <ol class="breadcrumb" style="background-color: inherit">
                    <li class="breadcrumb-item">
                        <a property="item" typeof="WebPage"href="tieuthuyetviet.com">
                            <span property="name">Trang chủ</span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="trangtruyen/{{$chapter -> story -> id}}">{{$chapter -> story -> name}}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Chương {{$chapter->chapterNum}}: {{$chapter->name}}
                    </li>
                </ol>
            </div>
        </div>
        <div class="truyen-div div-read-info">
            <div class="container">
                <div class="read-info-block text-center">
                   <h2> BÁO LỖI </h2>
                   <h4>Truyện: {{$chapter->story->name}} </h4>
                </div>
            </div>
        </div>
        <div class="truyen-div div-read-container">
            <div class="container">
                <div class="truyen-read-block">
                <form action="bao-loi-truyen/{{$chapter->id}}" class="forms-sample" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                      <div class="form-group">
                        <label for="exampleTextarea1">Nội Dung</label>
                        <textarea class="form-control" name="content" rows="10"></textarea>
                      </div>    
                      <button type="submit" class="btn btn-primary mr-2">Gửi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<!--Footer-->
@include('public.index.footer')
</body>

</html>