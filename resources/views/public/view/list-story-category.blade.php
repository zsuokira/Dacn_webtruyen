@extends('public.index.index')
@section('content') 
<div class="truyen-main" >
        <div class="container container-truyen">
            <div class="truyen-div div-featured">
                <div class="featured-content">
                    <h2 class="shadow-1">DANNH SÁCH TRUYỆN THỂ LOẠI: {{$category->name}}</h2>
                    <div class="row">
                        @foreach($story as $st)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="block">
                                <div class="block-content">
                                    <div class="editors-choice-list">
                                        <div class="row">
                                            <block >
                                                <div class="col-12 col-sm-12 col-md-6 btv-2">
                                                    <div class="item">
                                                        <a class="thumb" href="#">
                                                            <img class="img-fluid" src="public_asset/static/images/300.png" >
                                                        </a>
                                                        <h2 class="title">
                                                            <a href="#"
                                                               title="#">{{$st->name}}</a>
                                                        </h2>
                                                        <div class="view text-secondary"><span
                                                                class="text-red fz-16" >20</span>
                                                            người truy cập
                                                        </div>
                                                        <p class="description">Một vị dương cầm sư đánh đàn trên biển, tiếng đàn của hắn thướt tha như những dải lụa vắt ngang mặt biển</p>
                                                    </div>
                                                </div>
                                            </block>
                                            <div class="clearfix hidden-xs"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                       
                       
                    </div> 
                    <div class="truyen-div mb-4">
                            <div class="featured-content">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="block block-default block-list-new">
                                        {{$story->links('pagination::bootstrap-4');}}
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