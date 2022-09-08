@extends('public.index.index')
@section('content') 
<div class="truyen-main">
        <div class="container" >
            <div class="truyen-div div-featured">
                <div class="featured-content">
                    <div class="row">
                        <!-- Đọc Nhiều Nhất -->
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="block block-editors-choice-slider">
                                <div class="block-content">
                                    <div class="editors-choice-slider js-editors-choice-slider">
                                        <h2 class="shadow-1">BIÊN TẬP VIÊN ĐỀ CỬ</h2>
                                        <div class="swiper-container">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide" >
                                                    <div class="item">
                                                        <div class="thumb">
                                                            <a href="trangtruyen/{{$noibatnhat -> id}}" >
                                                                <img class="img-fluid lazyload" alt="" src="admin_asset/image/story/{{$noibatnhat->image}}" title="{{$noibatnhat->name}}" width="50px">
                                                            </a>
                                                        </div>
                                                        <div class="info" style ="">
                                                            <h2 class="title">
                                                                <a href="trangtruyen/{{$noibatnhat -> id}}" > {{$noibatnhat->name}}</a>
                                                            </h2>
                                                            <span>
                                                                <span class="fz-16" ></span> {{$noibatnhat->user->name}}</span>
                                                            <div class="description text-center" style="-webkit-line-clamp: 2;">{{$noibatnhat->information}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Đọc Nhiều 2 3 -->
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="block">
                                <div class="block-content">
                                    <div class="editors-choice-list">
                                        <div class="row">
                                            @foreach($noibat as $nb)
                                            <div class="col-12 col-sm-12 col-md-6 btv-2">
                                                <div class="item">
                                                    <a class="thumb" href="trangtruyen/{{$nb -> id}}">
                                                        <img class="img-fluid" src="admin_asset/image/story/{{$nb->image}}" title="{{$nb->name}}">
                                                    </a>
                                                    <h2 class="title">
                                                        <a href="trangtruyen/{{$nb -> id}}" > {{$nb -> name}}</a>
                                                    </h2>
                                                    <div class="view text-secondary">
                                                        <span class="text-red fz-16" ></span>{{$nb->user->name}}
                                                    </div>
                                                    <div class="description" >{{$nb->information}}</div>
                                                </div>
                                            </div>
                                            @endforeach
                                           
                                            <div class="clearfix hidden-xs"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Lịch Sử Đọc -->
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="block block-default block-readers-choice">
                                <div class="block-header">
                                    <h2 class="title"> Truyện Đang Đọc </h2>
                                  
                                </div>
                                <?php
                                use App\Models\Chapter;
                                use App\Models\Story;
                                $num =0;
                                if(Auth::check()) { ?>
                                <div class="block-content">
                                    <ul class="list-group">
                                        <li class="list-group-item list-group-item-primary-me" >
                                            @foreach($history as $his)
                                            <div class="content"> 
                                                <a class="thumb" href="trangtruyen/{{$his -> storyId}}">
                                                    <img class="img-fluid" src="admin_asset/image/story/{{$his -> story -> image}}" >
                                                </a>
                                                <div class="info">
                                                    <h2 class="title ">
                                                        <a href="trangtruyen/{{$his -> storyId}}" >{{$his -> story -> name}}</a>
                                                    </h2>
                                                   
                                                    <div class="view text-secondary">
                                                    <?php  
                                                            $storyId= $his->storyId;
                                                            $count = Chapter::where('storyId',$storyId)->count();
                                                            echo "Đã đọc: ",$his->chapter->chapterNum,"/",$count;
                                                    ?>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            <a href="#" class="history-view">Xem tiếp</a>
                                            
                                        </li>
                                    </ul>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Chương Mới Ra -->
            <div class="truyen-div">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="block block-default block-list-new">
                                <div class="block-header">
                                    <h2 class="title text-uppercase">Mới Cập Nhật</h2>
                                </div>
                                <div class="block-content" id="dataTable">
                                    <ul class="list-group">
                                        <li class="list-group-item list-group-item-table" >
                                            @foreach($chapterNew as $ctNew)
                                            <div class="content">
                                                <a class="thumb" href="#">
                                                    <img class="img-fluid" src="admin_asset/image/story/{{$ctNew->story->image}}" >
                                                </a>
                                                <div class="info">
                                                    <h2 class="title">
                                                        <a href="#" >
                                                            
                                                            <span class="storyNU.dealStatus == 1?'shadow-2' : ''">{{$ctNew->story->name}}</span>
                                                        </a>
                                                    </h2>
                                                    <div class="chap">{{$ctNew->story->user->name}}</div>
                                                    <div class="author">
                                                        <a  href="read-chapterStory/{{$ctNew->id}}">Chương {{$ctNew->chapterNum}}</a>:{{$ctNew->name}}
                                                    </div>
                                                    <div class="time">
                                                    {{$ctNew->createDate}}
                                                    </div>
                                                </div>
                                            </div>
                                           @endforeach
                                        </li>
                                    </ul>
                                    <div>
                                        <a href="#" class="float-right cnt-view">Xem tiếp</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Truyện Hoàn Thành -->
        <div class="truyen-div div-featured">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8">
                        <div class="block block-default">
                            <div class="block-header">
                                <h2 class="title text-uppercase"><a href="#">Top Truyện Đã Hoàn Thành</a></h2>
                            </div>
                            <div class="block-content">
                                <div class="editors-choice-list">
                                    <div class="row">
                                        @foreach($storyFinal as $stFi)
                                            <div class="col-12 col-sm-12 col-md-6 btv-2">
                                                <div class="item">
                                                    <a class="thumb" href="#">
                                                        <img class="img-fluid" src="admin_asset/image/story/{{$stFi->image}}" >
                                                    </a>
                                                    <h2 class="title">
                                                        <a href="#" > {{$stFi->name}}</a>
                                                    </h2>
                                                    <div class="view text-secondary">
                                                        <span class="text-red fz-16" ></span>{{$stFi->user->name}}
                                                    </div>
                                                    <div class="description" >{{$stFi->information}}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="clearfix hidden-xs"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Top Tác Giả -->
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="block block-default block-readers-choice">
                            <div class="block-header"><h2 class="title"><a href="#">Top Tác Giả</a></h2></div>
                            <div class="block-content">
                                <ul class="list-group">
                                    <li  class="list-group-item list-group-item-primary-me" >
                                    @foreach ($author as $au)
                                        <div class="content">
                                            <div class="index ">
                                                <?php
                                                    
                                                    $num ++;
                                                    echo $num;
                                                ?>
                                            </div>
                                            <div class="info">
                                                <h2 class="title">
                                                    <a href="#" >{{$au->name}}</a>
                                                </h2>
                                                <div class="extra-info">
                                                    <p>Số truyện đã đăng:
                                                        <?php 
                                                         $authorId = $au ->id;
                                                         $countStory = Story::where('authorId',$authorId)->count();
                                                         echo $countStory;
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach    
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="truyen-div">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="block block-default block-list-new">
                                <div class="block-header">
                                    <h2 class="title text-uppercase">Góc Đàm Đạo</h2>
                                </div>
                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @endsection