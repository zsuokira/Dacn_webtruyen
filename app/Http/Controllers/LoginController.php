<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Notification;
class LoginController extends Controller
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
    public function getIndex(){
        return view('admin.layout.index');
    }
}
