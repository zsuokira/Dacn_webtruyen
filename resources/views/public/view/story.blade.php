@extends('public.index.index')
@section('content') 
<div class="truyen-main">
        <div class="container">
            <div class="truyen-detail-block">
                <div class="truyen-div div-featured">
                    <div class="featured-content truyen-breadcrumb p-0">
                        <ol class="breadcrumb" style="background-color: inherit">
                            <li class="breadcrumb-item">
                                <a property="item" typeof="WebPage" href="tieuthuyetviet.com">
                                    <span property="name">Trang chủ</span>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{$story->name}}
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="truyen-div div-featured div-detail-info">
                    <div class="truyen-detail-info-block">
                        <div class="row">
                            <div class="col-thumb col-3">
                                <div class="thumb hidden-xs">
                                    <img class="img-fluid lazyload" src="admin_asset/image/story/{{$story->image}}" title="{{$story->name}}">
                                </div>
                            </div>
                            <div class="col-info col-6">
                                <div class="info">
                                    <h1 class="title">
                                        <a href="" >{{$story->name}}</a>
                                    </h1>
                                    <div class="list">
                                        <div class="item">
                                            <div class="item-label"> Tác giả:</div>
                                            <div class="item-value"><span
                                                    class="author" >{{$story->user->name}}</span></div>
                                        </div>
                                        <div class="item">
                                            <div class="item-label"> Thể loại:</div>
                                            <div class="item-value">
                                                <ul class="list-unstyled categories">
                                                    <li >
                                                        <a href="{{$story->category->id}}">{{$story->category->name}}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="item-label"> Tình trạng:</div>
                                            <div class="item-value">
                                                    <span class="story-go text-center" >
                                                    @if($story -> status == 1) Hoàn Thành                            
                                                    @endif
                                                    @if($story -> status == 0) Đang ra                          
                                                    @endif
                                                    @if($story -> status == 3) Tạm Dừng                         
                                                    @endif    
                                                    </span>
                                                
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="buttons">
                                        <?php
                                                use App\Models\Chapter;
                                                use App\Models\Story;
                                                use App\Models\History;
                                                use App\Models\Favorite;
                                                if(Auth::check()){
                                                    $historyStory=$story->id;
                                                    $userId= Auth::user()->id;
                                                }else{
                                                    $historyStory="";
                                                    $userId="";
                                                }
                                                $history = History::where('storyId',$historyStory)->where('userId',$userId)->first();
                                                if($history){
                                        ?>
                                        <a  class="btn btn-truyen"
                                           href="continute-read/{{$story -> id}}">
                                            Đọc tiếp
                                        </a>
                                        <?php } else { ?>
                                        <a 
                                           class="btn btn-truyen"
                                           href="read-chapter/{{$story -> id}}">
                                            Đọc Từ Đầu
                                        </a>
                                        <?php } ?>
                                        <a 
                                           class="btn btn-truyen"
                                           href="read-chapter-new/{{$story -> id}}">
                                            Đọc Chương Mới Nhất
                                        </a>
                                        <?php 
                                        if(Auth::check()){
                                         $userId=Auth::user()->id;
                                         $id=$story -> id;
                                         $fav=Favorite::where('userId',$userId)->where('storyId',$id)->first();
                                        }else{
                                            $fav="";
                                        }

                                         if($fav==null){
                                        ?>
                                        <a class="btn btn-outline-primary waves-effect" href="add-favorite/{{$story -> id}}">Theo dõi</a>
                                        <?php }else{ ?>
                                            <a class="btn btn-outline-primary waves-effect" href="del-favorite/{{$story -> id}}">Bỏ theo dõi</a>
                                        <?php } ?>
                                        <!-- <a class="btn btn-outline-primary waves-effect">Bỏ Theo dõi</a> -->
                                        <!-- Button trigger modal -->
                                        <a class="btn btn-xs btn-read text-white"  >
                                            Đề Cử
                                        </a>
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>
                <div class="truyen-div">
                    
                    <div class="truyen-detail-tab classic-tabs" id="navbar-custom">
                        <div class="tabs-wrapper">
                            <!-- Nav tabs -->
                            
                            <ul class="nav tabs-blue" >
                                <li class="nav-item ">
                                    <a class="nav-link active waves-light active waves-effect waves-light" data-toggle="tab" href="a">
                                        Giới Thiệu 
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link  waves-light  waves-effect waves-light" data-toggle="tab" href="b" >
                                        Danh Sách Chương
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link waves-light waves-effect waves-light" data-toggle="tab" href="c" >
                                        Bình Luận
                                    </a>
                                </li>
                            </ul>
                            </div>
                            <!-- Tab panes {Fade}  -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active " id="truyen-info"
                                         name="truyen-detail-info" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-8 col-lg-9">
                                            <div class="brief">
                                            {{$story->information}}
                                            </div>
                                            <div class="list-overview" >
                                                <div class="item">
                                                    <div class="item-title">
                                                        <i class="truyen-icon icon-list"></i> Mới nhất
                                                    </div>
                                                    <div class="item-value">
                                                        <a href="#"><?php 
                                                        
                                                        

                                                        $id = $story->id;
                                                        
                                                        $chapter = Chapter::where('storyId',$id)->orderBy('createDate','DESC') ->first();
                                                        

                                                        
                                                        ?>Chương {{$chapter->chapterNum}} : {{$chapter->name}}</a>
                                                    </div>
                                                    <div class="item-time">{{$chapter->createDate}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4 col-lg-3">
                                            <div class="truyen-detail-sidebar">
                                                <div class="block block-normal">
                                                    <div class="block-content">
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-6 col-md-12">
                                                                <div class="block-detail-sidebar-author text-center">
                                                                    <div class="info">
                                                                        <a href="#" class="avatar">
                                                                            <img class="img-fluid lazyload" src="../../static/images/avt.jpg">
                                                                        </a>
                                                                        <h2 class="name">Meo Meo Siêu Cấp Đại Lão</h2>
                                                                    </div>
                                                                    <ul class="list-unstyled truyen-author-badge"></ul>
                                                                    <div class="overview">
                                                                        <span class="cap-3">Ngày Tham Gia:<span >12/01/2020</span>
                                                                        </span>
                                                                    </div>
                                                                    <div class="statistic">
                                                                        <div class="row">
                                                                            <div class="col-4">
                                                                                <div class="item">
                                                                                    <span class="item-icon">
                                                                                        <i class="truyen-icon icon-book"></i>
                                                                                    </span>
                                                                                    <span class="item-value">1</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <div class="item"><span
                                                                                        class="item-icon"> <i
                                                                                        class="truyen-icon icon-list"></i> </span>
                                                                                    <span class="item-value">1</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <div class="item">
                                                                                    <span class="item-icon"> <i class="truyen-icon icon-gold"></i> </span>
                                                                                    <span class="item-value">5</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection