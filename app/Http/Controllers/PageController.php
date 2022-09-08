<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\Chapter;
use App\Models\Category;
use App\Models\History;
use App\Models\Comment;
use App\Models\Report;
use App\Models\Notification;
class PageController extends Controller
{
    
    function __construct()
	{
        if(Auth::check()){
            $userId = Auth::user()->id;
        }else{
            $userId = "";
        }
        
        $noti = Notification::where('userId',$userId)->get();
		$cate = Category::all();
		view()->share('cate',$cate);
        view()->share('noti',$noti);

	}
    
    public function getTrangChu(){
        if(Auth::check()){
        $userId = Auth::user()->id;
        $history = History::where('userId',$userId)->take(7)->get();
        }else {
            $history = "";
        }
        $chapterNew=Chapter::orderBy('createDate','DESC')->take(7)->get();
        $noibatnhat = Story::where('noibat','2')->first();
        $noibat = Story::where('noibat','1')->take(6)->get();
        $storyFinal = Story::where('status','1')->orderBy('createDate','DESC')->paginate(9);
        $author = DB::table('role_user')
        ->join('users', 'role_user.user_id', '=', 'users.id')
        ->join('role', 'role_user.role_id', '=', 'role.id')
        ->where('role.name','AUTHOR')
        ->select('users.id','users.name','users.decu')
        ->take(3)
        ->orderBy('users.decu','DESC')
        ->get(); 
        return view('public.view.trangchu',[
            'noibatnhat'    => $noibatnhat,
            'noibat'        => $noibat,
            'history'       => $history,
            'chapterNew'    => $chapterNew,
            'storyFinal'    => $storyFinal,
            'author'        => $author
        ]);
    }

    public function getStory($id){
        $story = Story::find($id);
        $story->countView ++;
        $story ->save();
        return view('public.view.story',['story' => $story]);
    }

    public function getChapter($id)
    {
        $chapter = Chapter::where('storyId',$id)->orderBy('id','ASC') ->first();
        if(Auth::check()){
            $userId=Auth::user()->id;
            $history = History::where('storyId',$id)->where('userId',$userId)->first();
            if($history){
            $history ->chapterId = $chapter -> id;
            $history ->save();
            }else{
                $historyNew= new History();
            $historyNew ->userId = Auth::user()->id;
            $historyNew ->chapterId =  $chapter ->id;
            $historyNew ->storyId = $id;
            $historyNew ->status = "1";
            $historyNew ->save();
            }
            }
            $chapter -> countView ++;
            $chapter ->save();
        return view('public.view.chapter',['chapter' => $chapter]);

    }
    public function getContinuteChapter($id)
    {
        $userId = Auth::user()->id;
       $history = History::where('userId',$userId)->where('storyId',$id)->first();
       $chapter = Chapter::find($history->chapterId);
       $chapter -> countView ++;
       $chapter ->save();
       return view('public.view.chapter',['chapter' => $chapter]);
    }
    public function getChapterNew($id)
    {
        $chapter = Chapter::where('storyId',$id)->orderBy('id','DESC') ->first();
        if(Auth::check()){
            $userId=Auth::user()->id;
            $history = History::where('storyId',$id)->where('userId',$userId)->first();
        if($history){
        $history ->chapterId = $chapter -> id;
        $history ->save();
        }else{
            $historyNew= new History();
        $historyNew ->userId = Auth::user()->id;
        $historyNew ->chapterId =  $chapter ->id;
        $historyNew ->storyId = $id;
        $historyNew ->status = "1";
        $historyNew ->save();
        
        }
        }
        $chapter -> countView ++;
            $chapter ->save();
        return view('public.view.chapter',['chapter' => $chapter]);
    }

    public function getList($id)
    {
        $category=Category::find($id);
        $story = Story::where('categoryId',$id)->orderBy('noibat','DESC')->paginate(9);
        
        return view('public.view.list-story-category',['story'=>$story,'category'=>$category]);
    }
    public function getListNew()
    {
        $name = "MỚI";
        $story = Story::orderBy('createDate','DESC')->take(20)->paginate(9);
        return view('public.view.list-story',['story'=>$story,'name'=>$name]);
    }
    public function getListFinal()
    {
        $name = "HOÀN THÀNH";
        $story = Story::where('status','1')->orderBy('createDate','DESC')->paginate(9);
        return view('public.view.list-story',['story'=>$story,'name'=>$name]);

    }
    public function getReadChapter($id)
    {
        $chapter = Chapter::find($id);
        if(Auth::check()){
            $userId=Auth::user()->id;
            $storyId = $chapter->storyId;
            $history = History::where('storyId',$storyId)->where('userId',$userId)->first();
            if($history){
            $history ->chapterId = $chapter -> id;
            $history ->save();
            }else{
                $historyNew= new History();
            $historyNew ->userId = Auth::user()->id;
            $historyNew ->chapterId =  $id;
            $historyNew ->storyId = $storyId;
            $historyNew ->status = "1";
            $historyNew ->save();
            }
            }
            $chapter -> countView ++;
            $chapter ->save();
        return view('public.view.chapter',['chapter' => $chapter]);
    }
    public function getNextChapter($id)
    {
        $chapterOld = Chapter::find($id);
        $chapterNum = ($chapterOld ->chapterNum)+1;
        $chapter = Chapter::where('chapterNum',$chapterNum)->where('storyId',$chapterOld->storyId)->first();
    //    echo $chapter;
    if($chapter){
        if(Auth::check()){
            $userId=Auth::user()->id;
            $history = History::where('storyId',$chapterOld->storyId)->where('userId',$userId)->first();
            if($history){
            $history ->chapterId = $chapter -> id;
            $history ->save();
            }}
            $chapter -> countView ++;
            $chapter ->save();
        return view('public.view.chapter',['chapter' => $chapter]);
     }else{
         return view('public.view.chapterb');
     }
    }
    public function getPreChapter($id)
    {
        $chapterOld = Chapter::find($id);
        $chapterNum = ($chapterOld ->chapterNum)-1;
        $chapter = Chapter::where('chapterNum',$chapterNum)->where('storyId',$chapterOld->storyId)->first();
    //    echo $chapter;
    if($chapter){
        $chapter -> countView ++;
        $chapter ->save();
       return view('public.view.chapter',['chapter' => $chapter]);
    }else{
        return view('public.view.chapterb');
    }
    }

    public function postComment(Request $request,$id,$chapterId)
    {
        $comment = new Comment();
        $comment->userId = Auth::user()->id;
        $comment->content = $request->content;
        $comment->storyId = $id;
        $comment->save();

        return redirect()->action(
            [PageController::class, 'getReadChapter'], ['id' => $chapterId]
        );

    }
    public function getLoi($id)
    {
        $chapter = Chapter::find($id);
        return view('public.view.bao-loi',['chapter' => $chapter]);
    }
    public function postLoi(Request $req,$id)
    {
        $report = new Report();
        $report -> chapterId = $id;
        $report -> userId = Auth::user()->id;
        $report -> content = $req -> content;
        $report -> status = "1";
        $report -> save();
        return redirect('tieuthuyetviet.com');
    }
}
