<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Story;
use App\Models\Chapter;
use App\Models\Favorite;
use App\Models\History;
use App\Models\InforPage;
use App\Models\Notification;
use DB;
use Illuminate\Http\RedirectResponse;
class UserController extends Controller
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
    public function getLogin(){
        return view('admin.pages.auth.login');
    }
    public function postLogin(Request $request)
    {
        $arr = ['usersname'=>$request->usersname,'password'=>$request->password];
      
       if(Auth::attempt($arr))
        {
            $status = Auth::user()->status;
            if($status=="1"){
                return redirect('tieuthuyetviet.com');
            }
            if($status=="0"){
                return redirect('login')->with('message','Tài khoản của bạn đã bị khoá vì vi phạm luật quá 3 lần :))');
            }
         
        }
        else
        {
            return redirect('login')->with('message','Đăng nhập thất bại, xem lại tài khoản và mật khẩu :)');
        }
      
    }
    public function logout(){
        Auth::logout();
        return redirect('tieuthuyetviet.com');
    }
    public function getRegister(){
        return view('admin.pages.auth.register');
    }
    public function postRegister(Request $request){
            $this->validate($request,[
                'username'=>'required|min:6|unique:users,usersname',
                'email'=>'required|min:3|unique:users,email',
                'password'=>'required|min:6|max:32',
                'name'=>'required',
                'repassword'=>'required|same:password'
                ],[
                'username.required'=>'Bạn chưa nhập tên đăng nhập',
                'username.min'=>'Tên đăng nhập phải có ít nhất 6 ký tự',
                'username.unique'=>'Tên đăng nhập đã tồn tại',
                'email.unique'=>'Email đã tồn tại',
                'email.required'=>'Bạn chưa nhập email',
                'email.email'=>'Bạn chưa nhập đúng định dạng email',
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu phải có ít nhất 6 ký tự',
                'password.max'=>'Mật khẩu có nhiều nhất 12 ký tự',
                'repassword.required'=>'Bạn chưa nhập lại mật khẩu',
                'repassword.same'=>'Mật khẩu nhập chưa khớp'
                ]);
            $user = new User();
            $user ->usersname = $request -> username;
            $user ->email    = $request -> email;
            $user ->password = bcrypt($request->password);
            $user ->name     = $request -> name;
            $user ->avatar   = "admin_asset/image/avatar.jpg";
            $user ->status   = "1";
            $user ->decu     = "0";
            $user ->save();
            DB::table('role_user')->insert(
                ['user_id' => $user->id, 'role_id' => 3]
            );
            return redirect('register')->with('message','Đăng Ký Thành Công');

    }
    public function addFavorite($id)
    {
        $userId=Auth::user()->id;
        $fav=Favorite::where('userId',$userId)->where('storyId',$id)->first();
        if($fav==null){
            $favorite=new Favorite();
            $favorite->userId=$userId;
            $favorite->storyId=$id;
            $favorite->save();
            echo $favorite;
        }
        return redirect()->action(
            [PageController::class, 'getStory'], ['id' => $id]
        );
    }
    public function delFavorite($id)
    {
        $userId=Auth::user()->id;
        $fav=Favorite::where('userId',$userId)->where('storyId',$id)->delete();
      
        return redirect()->action(
            [PageController::class, 'getStory'], ['id' => $id]
        );
    }
    public function getFavorite()
    {
        $userId=Auth::user()->id;
        $favorite = Favorite::where('userId',$userId)->get();
        return view('admin.pages.user.favorite',['favorite'=>$favorite]);
    }
    public function getAuthor()
    {
        $noiquy= InforPage::where('name',"Nội quy")->first();
        return view('admin.pages.user.author',['noiquy'=>$noiquy]);
    }
   public function getAccountPage()
   {
       
       return view('admin.pages.user.account');
   }
   public function changeAvt()
   {
    $change = "Ảnh Đại Diện";
    $meta = "anh-dai-dien";
    return view('admin.pages.user.change-account',['change'=>$change,'meta'=>$meta]);
   }
   public function postChangeAvt(Request $req)
   {
        $user = Auth::user();
        $user -> name = $req ->name;
        $user -> save();
        return redirect ('account');    
   }
   public function changeName()
   {
       $change = "Tên Hiển Thị";
       $meta = "ten-hien-thi";
       return view('admin.pages.user.change-account',['change'=>$change,'meta'=>$meta]);
   }
   public function postChangeName(Request $req)
   {
    $this->validate($request,[
        'name'=>'required|unique:users,name',
        ],[
        'name.required'=>'Bạn chưa nhập tên',
        'name.unique'=>'Tên bạn nhập đã tồn tại'
        ]);
        $user = Auth::user();
        $user -> name = $req ->name;
        $user -> save();
        return redirect ('account');    
   }
   public function changePass()
   {
    $change = "Mật Khẩu";
    $meta = "mat-khau";
    return view('admin.pages.user.change-account',['change'=>$change,'meta'=>$meta]);
   }
   public function postChangePass(Request $req)
   {
    $this->validate($req,[
        'newPassword'=>'required|min:6|max:32',
        ],[
        'newPassword.required'=>'Bạn chưa nhập mật khẩu',
        'newPassword.min'=>'Mật khẩu phải có ít nhất 6 ký tự',
        'newPassword.max'=>'Mật khẩu có nhiều nhất 12 ký tự',
        'reNewPassword.required'=>'Bạn chưa nhập lại mật khẩu',
        'reNewPassword.same'=>'Mật khẩu nhập chưa khớp'
        ]);
       
            $user = Auth::user();
            $user -> password = bcrypt($req->newPassword);
            $user -> save();
            return redirect ('account');  
      
   }
   public function changeEmail()
   {
    $change = "Email";
    $meta = "email";
    return view('admin.pages.user.change-account',['change'=>$change,'meta'=>$meta]);
   }
   public function postChangeEmail(Request $req)
   {
    $this->validate($req,[
        'email'=>'required|unique:users,email|email',
        ],[
        'email.unique'=>'Email đã tồn tại',
        'email.required'=>'Bạn chưa nhập email',
        'email.email'=>'Bạn chưa nhập đúng định dạng email',
    ]);
        $user = Auth::user();
        $user -> email = $req ->email;
        $user -> save();
        return redirect ('account');    
   }

}
