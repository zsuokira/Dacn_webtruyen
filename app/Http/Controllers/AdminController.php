<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\InforPage;
use App\Models\Invite;
use App\Models\Chapter;
use App\Models\Story;
use App\Models\Report;
use App\Models\Comment;
use App\Models\History;
use App\Models\Favorite;
use App\Models\Notification;
use App\Models\User;
use DB;
use Auth;
class AdminController extends Controller
{
    function __construct()
	{
        if(Auth::check()){
            $userId = Auth::user()->id;
        }else{
            $userId = "";
        }
        
        $noti = Notification::where('userId',$userId)->get();
        view()->share('noti',$noti);

	}
    public function addCategory(){
        return view('admin.pages.admin.add-category');
    }
    
    public function postCategory(Request $request){
        $this->validate($request,[         
            'name'=>'required'
            ],[
            'name.required'=>'Mời nhập tên thể loại',      
            ]);
        $category = new Category();
        $category ->  name = $request -> name;
        $category -> metaTitle = changeTitle($request->name) ;
        $category -> status = "1";
        $category -> createBy = Auth::user()->name;
        
        $category -> save();

        return redirect('add-category')->with('message','Thêm Thành Công.');
        
    }

    public function listCategory(){
        $category = Category::all();
        return view('admin.pages.admin.all-category',['category' => $category]);
    }

    public function editCategory($id){
        $category = Category::find($id);
        return view('admin.pages.admin.edit-category',['category' => $category]);
    }
    
    public function postEditCategory(Request $request,$id){
        $this->validate($request,[         
            'name'=>'required'
            ],[
            'name.required'=>'Mời nhập tên thể loại',      
            ]);
        $category = Category::find($id);
        $category ->  name = $request -> name;
        $category -> metaTitle = changeTitle($request->name) ;
        $category -> createBy = Auth::user()->name;
        $category -> status = "$request->status";
        $category -> save();

        return redirect('list-category')->with('message','Sửa Thành Công.');
        
    }

    public function delCategory($id){
        $category = Category::find($id);
        $category ->delete();
        return redirect('list-category')->with('message','Xoá Thành Công.');
    }
    public function getInfo()
    {
        return view('admin.pages.admin.add-info');
    }
    public function postInfo(Request $req)
    {
        $info = new InforPage();
        $info->name = $req->name;
        $info->content = $req->content;
        $info->save();
        return redirect('index');
    }
    public function acptAuthor()
    {
        $invite= new Invite();
        $invite->userId = Auth::user()->id;
        $invite->noiQuy = "1";
        $invite->save();
        return redirect('index');
    }
    public function listAuthorApp()
    {
        $invite = Invite::all();
        return view('admin.pages.mod.list-author-app',['invite'=>$invite]);
    }
    public function acpAuthorApp($id)
    {
        $invite = Invite::find($id);
        $userId = $invite->userId;
        $userInvite = DB::table('role_user')->where('user_id',$userId)->update(['role_id' => 6]);
        $invite->delete();
        return redirect('list-author-application');
        
    }
    public function refAuthorApp($id)
    {
        $invite = Invite::find($id);
        $invite->delete();
        return redirect('list-author-application');
    }
    public function getReport()
    {
        $report = Report::all();
        return view('admin.pages.mod.list-report',['report'=>$report]);
    }
    public function getReportView($id)
    {
        $report = Report::find($id);
        return view('admin.pages.mod.report',['report'=>$report]);
    }
    public function acpReport($id)
    {
        $report = Report::find($id);
        $chapterId = $report -> chapterId;
        $userId = $report ->userId;
        $chapterb = Chapter::find($id)->orderBy('id','DESC')->first();
        $storyId = $chapterb -> storyId;
      
        $comment = Comment::where('storyId',$storyId)->delete();
        $history = History::where('storyId',$storyId)->delete();
        $favorite = Favorite::where('storyId',$storyId)->delete();
        $rep = Report::where('chapterId',$chapterId)->delete();
        $chapter = Chapter::where('storyId',$storyId)->delete();
        $story = Story::find($storyId)->delete();
        $noti = new Notification();
        $noti ->content = "Truyện của bạn đã bị báo cáo. Sau khi kiểm duyệt đã vi phạm quy định của Website và đã bị kiểm duyệt viên xoá!.Nếu vi phạm 3 lần, tài khoản của bạn sẽ bị xoá bỏ.";
        $noti ->name = "Truyện của bạn đã bị xoá";
        $noti ->userId = $userId;
        $noti ->status = "1";
        return redirect('list-report');
    }
    public function refReport($id)
    {
        $report = Report::find($id);
        $report->delete();
        return redirect('list-report');
    }
    public function listStoryMod()
    {
        $story = Story::all()->sortByDesc('countView');
        return view('admin.pages.mod.list-story',['story'=>$story]);
    }
    public function deCu($id)
    {
        $story = Story::find($id);
        $noibat = $story->noibat;
        if($noibat==0) {
            $story ->noibat="1";
            $story->save();
        }
        if($noibat==1) {
            $story ->noibat="0";
            $story->save();
        }
        if($noibat==2) {
            $story ->noibat="1";
            $story->save();
        }; 
        return redirect('list-story-mod'); 
    }
    public function top1($id)
    {
        $story = Story::find($id);
        $noibat = $story->noibat;
        if($noibat==2) {
            return redirect('list-story-mod'); 
        };  
        $story ->noibat="2";
        $story ->save();
        $story2 = Story::where('noibat',"2")->first(); $story2 -> noibat = "1";$story2 ->save();
        return redirect('list-story-mod'); 
    }
    public function listAuthorMod()
    {
        $author = DB::table('role_user')
        ->join('users', 'role_user.user_id', '=', 'users.id')
        ->join('role', 'role_user.role_id', '=', 'role.id')
        ->where('role.name','AUTHOR')
        ->select('users.id','users.name','users.create_at','users.decu')
        ->get(); 
        return view('admin.pages.mod.list-author',['author'=>$author]);
    }
    public function noiBat($id)
    {
        $user = User::find($id);
        $decu = $user ->decu;
        if($decu==0){
            $user->decu = "1";
            $user->save();
        }
        if($decu==1){
            $user->decu = "0";
            $user->save();
        }
        return redirect('list-author-mod'); 
    }
    public function listUser()
    {
        $user = User::all();
        return view('admin.pages.admin.list-user',['user'=>$user]);
    }
    public function delUser($id)
    {
        $user = User::find($id)->role()->orderBy('id','DESC')->first();
        echo $user;
        if($user)
        {
            $na=$user->name;
            if($na=="USER") {
                $user->delete(); 
                return redirect('list-user'); 
            }
            if($na=="AUTHOR") {
                $userBlock = User::find($id);
                    $userBlock -> status = "0";
                    $userBlock ->save();
                return redirect('list-user'); 
            }
        }
        // $user -> delete();
        // return redirect('list-user'); 
    }
    public function unckUser($id)
    {
        $user = User::find($id);
        $user ->status = "1";
        $user ->save();
        return redirect('list-user'); 
    }
}
