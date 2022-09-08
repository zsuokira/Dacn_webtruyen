<div class="chapter-comment">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="comment_field">
                                    <div class="cm-based">
                                        <p class="comment-count"><span id="count_comment"></span> bình luận
                                        </p>
                                        <?php if(Auth::check()){ ?>
                                        <form name="frmContact" id="frmContact" method="post" action="postComment/{{$chapter->story->id}}/{{$chapter->id}}" novalidate>
                                        {{ csrf_field() }}
                                            <div class="form row">
                                                <div class="form-group col-md-10 comment-text">
                                                        <textarea model="commentText" name="content" class="form-control">
                                                        </textarea>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <button type="submit" class="btn btn-truyen btn-lg btn-block " name="btnComment"
                                                            id="btnComment">
                                                        <span class="fas fa-check" aria-hidden="true"></span>
                                                    </button>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </form>
                                        <?php }?>
                                        <?php 
                                        
                                            use App\Models\Story;
                                            use App\Models\Chapter;
                                            use App\Models\Comment;
                                            $storyId = $chapter -> story -> id;
                                            $comment = Comment::where('storyId',$storyId)->orderBy('create_at','DESC')->paginate(5);
                                        
                                        ?>
                                        <div id="truyen-detail-comment" class="blog-comment">
                                          <?php if($comment==""){?>
                                            <div class="alert alert-primary" role="alert" show="listComment.length === 0">
                                                <h5 class="text-center">Chưa có Bình Luận nào</h5>
                                            </div>
                                          <?php }?>
                                            <ul class="comments" id="comment_list" show="listComment.length !== 0">
                                                @foreach($comment as $cmm)
                                                <li class="clearfix" id="comment_4">
                                                    <div style="float:left;width:40px;height:80px;">
                                                        <a href="#">
                                                            <img class="avatar"src="#">
                                                        </a>{{$cmm->user->name}}<br style="clear:both"> 
                                                    </div>
                                                    <div class="post-comments">
                                                    <p bind-html="comment.content">{{$cmm->content}}</p>
                                                        <p class="meta-2">
                                                            <!-- <a href="#">jdfhsdlbff<abbr title="Thành viên"></abbr></a> -->
                                                            <small>
                                                                <small><a>Báo xấu</a></small>
                                                            </small>
                                                            <small class="float-right">{{$cmm->create_at}}
                                                            </small>
                                                        </p>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                            {{$comment->links('pagination::bootstrap-4');}}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>