<?php namespace App\Http\Controllers;
use Auth;
use App\User;
use DB;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//Gọi đến midleware chứng thực
		$this->middleware('auth');
		$this->beforeFilter(function(){
			if(Auth::check()){
			if(Auth::user()->level == 1){
				return redirect('users/members/index');
			}
		}
		});
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.index');
	}


	public function getList(){
		$users = DB::table('users')->where(['level'=>1,'actived'=>'1'])->paginate(5);
		$url = "/Web_Technology/admin/member/list";
		$users->setPath($url);
		return view('admin.member.list')->with(['users'=>$users]);
	}


	public function getDelete($id){
		//Xóa dữ liệu ảnh
		$user = User::find($id);
		if(!empty($user->avatar)){
			$p_folder = 'resources/upload/avatar/'.$id.'/';
			if(file_exists($p_folder.$user->avatar)){
				unlink($p_folder.$user->avatar);
			}
			if(is_dir($p_folder)){
				rmdir($p_folder);
			}
		}
		DB::table('password_resets')->where('email',$user->email)->delete();
		$user->delete();
		return redirect('admin/member/list');
	}

	public function postDelete(){
		$array = $_POST["check"];
		foreach($array as $id){
			$user = User::find($id);
			if(!empty($user->avatar)){
				$p_folder = 'resources/upload/avatar/'.$id.'/';
				if(file_exists($p_folder.$user->avatar)){
					unlink($p_folder.$user->avatar);
				}
				if(is_dir($p_folder)){
					rmdir($p_folder);
				}
		}
		DB::table('password_resets')->where('email',$user->email)->delete();
		$user->delete();
		}
		return redirect('admin/member/list');
	}
	// public function getUpdate($id){
	// 	$user = User::find($id);
	// 	return view('admin.member.update')->with(['user'=>$user]);
	// }

	// public function postUpdate(){
	// 	$user = User::find($_POST['id']);
	// 	$user->level = $_POST['level'];
	// 	$user->save();
	// 	return redirect('admin/member/list');
	// }
}
