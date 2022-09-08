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
                    <h1 class="title">
                        <a >Chương {{$chapter->chapterNum}}: {{$chapter->name}}</a>
                    </h1>
                    <ul class="list-unstyled meta">
                        <li>
                            <a class="author js-popover" data-toggle="popover" data-target="#js-popover-read-author" data-placement="bottom" data-original-title="">
                                <div class="avatar">
                                    <img class="img-fluid lazyload"  src="public_asset/static/images/avt.jpg">
                                </div>
                                <span >{{$chapter -> story ->user -> name}}</span>
                            </a>
                        </li>
                        <li>
                            <span class="item-icon">
                                <i class="truyen-icon icon-eye-grey"></i>
                            </span> <span >{{$chapter->countView}}</span> lượt xem
                        </li>
                        <li>
                            <span class="item-icon">
                                <i class="truyen-icon icon-list-grey"></i>
                            </span>
                            <span >{{$chapter->countWord}} Chữ</span>
                        </li>
                        <li>
                            <span class="item-icon">
                                <i class="truyen-icon icon-time-grey"></i>
                            </span>
                            <span >3 giờ trước</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="truyen-div div-read-container">
            <div class="container">
                <div class="truyen-read-block">
                    <div class="truyen-read-navigation text-center">
                        <a href="pre-chapter/{{$chapter -> id}}"
                           class="btn btn-primary" 
                           data-toggle="tooltip" data-placement="bottom" title="Chương trước">
                            <span class="btn-icon"> <i class="truyen-icon icon-prev-bold"></i> </span>
                        </a>
                        <a href="#" class="btn btn-transparent btn-outline-primary waves-effect">
                            <span class="btn-icon js-tooltip " data-toggle="tooltip" data-placement="bottom"
                                  title="Mục lục"> <i class="truyen-icon icon-list"></i> </span> </a>
                        <a href="next-chapter/{{$chapter -> id}}"
                           class="btn btn-primary" 
                           data-toggle="tooltip" data-placement="bottom" title="Chương sau">
                            <span class="btn-icon"> <i class="truyen-icon icon-next-bold"></i> </span>
                        </a>
                    </div>
                    <div class="truyen-read-content" data-font-family="'Palatino Linotype', sans-serif"
                             style="width:  100%">
                       
                        <div class="content" id="js-truyen-content"
                                 style="font-size: 26px; line-height: 140%; font-family: 'Palatino Linotype', sans-serif; word-wrap: break-word;white-space: pre-line;">
                            {{$chapter->content}}
                                
                        </div>
                        
                    </div>
                    <div class="truyen-read-navigation text-center">
                        <a href="pre-chapter/{{$chapter -> id}}"
                           class="btn btn-primary" 
                           data-toggle="tooltip" data-placement="bottom" title="Chương trước">
                            <span class="btn-icon"> <i class="truyen-icon icon-prev-bold"></i> </span>
                        </a>
                        <a href="#" class="btn btn-transparent btn-outline-primary waves-effect">
                            <span class="btn-icon js-tooltip" data-toggle="tooltip" data-placement="bottom"
                                  title="Mục Lục"> <i class="truyen-icon icon-list"></i> </span> </a>
                        <?php if(Auth::check()){ ?>
                        <a href="bao-loi/{{$chapter->id}}" data-toggle="modal" class="btn btn-transparent btn-outline-primary waves-effect">
                            <span class="btn-icon js-tooltip" data-toggle="tooltip" data-placement="bottom">
                             <i class="truyen-icon icon-warning"></i> </span> </a>
                        <?php }?>
                        <a href="next-chapter/{{$chapter -> id}}"
                           class="btn btn-primary" title="Chương sau">
                            <span class="btn-icon"> <i class="truyen-icon icon-next-bold"></i> </span>
                        </a>
                    </div>
                    <!-- comment -->
                    @include('public.block.comment')
                </div>
            </div>
        </div>
    </div>

</div>

<!--Footer-->
@include('public.index.footer')
</body>

</html>