<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\Category;
use Auth;
use App\Models\Chapter;
use App\Models\Notification;
use Str;
class AuthorController extends Controller
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
    public function listStory($authorId){
        $story = Story::where('authorId',$authorId)->get();
        return view('admin.pages.author.list-story', ['story' => $story]);
    }

    public function addStory(){
        $category = Category::all();
        return view('admin.pages.author.add-story',['category' => $category]);
    }

    public function addStoryDB(Request $request){
        $this->validate($request,[         
            'name'      =>'required',
            'storydesc' => 'required',
            'category'  => 'required'
            ],[
            'name.required'=>'Mời nhập tên truyện.',  
            'storydesc.required'=>'Mời nhập mô tả truyện',  
            'category.required'=>'Mời chọn thể loại',      
            ]);
        $story = new Story();
        $story -> name          = $request -> name;
        $story -> authorId      = Auth::user() ->id;
        $story -> categoryId    = $request -> category; 
        $story -> information   = $request -> storydesc;
        $story -> countView     = "0";
        $story -> status        = "0";
        $story -> noibat        = "1";

     

        if($request->hasFile('image'))
        {
            $file = $request->file('image');          
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png' && $duoi != 'jpeg')
            {
                  return redirect('add-story')->with('message','Bạn Chỉ Được Chọn File Có Đuôi jpg,png,jpeg');
            }
            
            $name = $file->getClientOriginalName();
            $Hinh =  Str::random(4)."_". $name;
            
            
            while (file_exists("admin_asset/image/story".$Hinh)) 
            {
                $Hinh = Str::random(4)."_". $name;
            }
            $file->move("admin_asset/image/story",$Hinh);
            $story-> image = $Hinh;
            
            
        }
        else
        {
            
            
            $story->image = "";
        }
        
        $story->save();


        return redirect('add-story')->with('message','Thêm Thành Công.');
        
    }

    public function editstory(){
        return view('admin.pages.author.edit');
    }

    public function delStory($id){
        $story = Story::find($id);
        $story ->delete();
        $author = Auth::user()->id;
        return redirect('list-story/'.$author);

    }
    public function story($id){
        $story = Story::find($id);
        $chapter2 = Chapter::where('storyId',$id)->get();
      
        return view('admin.pages.author.story',['story' => $story,'chapter2'=>$chapter2]);
    }

    public function addchapter($id){
        $story = Story::find($id);
        return view('admin.pages.author.addChapter',['story' => $story]);
    }

    public function addchapterDB(Request $request, $id){
        $this->validate($request,[         
            'numChapter'      =>'required',
            'nameChapter' => 'required',
            'contentChapter'  => 'required'
            ],[
            'numChapter.required'=>'Mời nhập số chương.',  
            'nameChapter.required'=>'Mời nhập tên chương',  
            'contentChapter.required'=>'Mời nhập nội dung chương',      
            ]);
        $chapter = new Chapter();
        $chapter -> chapterNum  = $request -> numChapter;
        $chapter -> name        = $request -> nameChapter;
        $chapter -> storyId     = $id;
        $chapter -> content     = $request -> contentChapter;
        $text =$request -> contentChapter;
        $count = strlen($text);
        $chapter -> countWord   = $count;
        $chapter -> countView   = "0";
        $chapter ->save();
        $story = Story::find($id);
        $chapter2 = Chapter::where('storyId',$id)->get();
        return view('admin.pages.author.story',['story' => $story,'chapter2'=>$chapter2])->with('message','Thêm Thành Công.');
    }

    public function editchapter(){
        return view('admin.pages.author.editChapter');
    }


    
}
