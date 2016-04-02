<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\UserUpdateRequest;
use App\User;
use Hash;
class UserController extends Controller {
	public function __construct(){
		$this->middleware('auth');
		$this->beforefilter(function(){
			if(Auth::check()){
				if(Auth::user()->level==2){
					return redirect('admin');
				}
			}
		});
	}
	public function index(){
		return view('users.index');
	}
	public function getUpdate(){
		return view('users.members.update');
	}
	public function postUpdate(UserUpdateRequest $request){
		$user = User::find(Auth::user()->id);
		$user->username 		= $request->username;
		$user->password 		= Hash::make($request->password);
		$user->gender 			= $request->gender;
		$user->fullname 		= $request->fullname;
		$user->phonenumber 		= $request->phonenumber;
		$user->address 			= $request->address;
		$user->company 			= $request->company;
		//Nếu tồn tại file để thay đổi ảnh đại diện
		if(!empty($request->file('avatar'))){
			$img_name = $request->file('avatar')->getClientOriginalName();
			$request->file('avatar')->move('resources/views/images/upload/member/'.$user->id.'/',$img_name);
			//Nếu chưa tồn tại ảnh đại diện
			if(!empty($user->avatar)){
				$old_img = 'resources/views/images/upload/member/'.$user->id.'/'.$user->avatar;
				if(file_exists($old_img)){
					unlink($old_img);
				}
			}
			$user->avatar = $img_name;
		}
		$user->save();
		Auth::attempt(['username'=>$user->username,'password'=>$user->password]);
		return redirect('user/member/index');
	}
}
