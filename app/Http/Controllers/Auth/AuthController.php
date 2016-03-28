<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserLoginRequest;
use App\User;
use Hash;
use Input;
use Auth;
use Mail;
class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	//thay đổi lại thuộc tính của lớp cha
//	protected $loginPath = '/login';
	protected $redirectTo = '/admin';
	protected $redirectAfterLogout = '/';
	//Chứa các phương thức thực hiện đăng nhập, đăng xuất, dăng ký thành viên
	public function __construct(Guard $auth, Registrar $registrar)
	{

		$this->auth = $auth;
		$this->registrar = $registrar;

		//Mỗi khi gọi đến thì sẽ tạo thành đối tượng mới, mỗi khi gọi sẽ 
		//lại gọi đến phương thức khởi tạo một lần
		//Từ khóa except chỉ định action không bị ảnh hưởng=>getLogout sẽ không bị ảnh hưởng bởi middleware
		$this->middleware('guest', ['except' => 'getLogout']);
	}
	public function getRegister(){
		return view('auth.register');
	}
	public function postRegister(UserRequest $request){
		$user = new User();
		$user->username 		= $request->username;
		$user->email 			= $request->email;
		$user->password 		= Hash::make($request->password);	//mã hóa mật khẩu
		$user->gender 			= $request->gender;
		$user->fullname 		= $request->fullname;
		$user->phonenumber 		= $request->phonenumber;
		$user->address 			= $request->address;
		$user->company 			= $request->company;
		$user->level 			= 1;
		$user->actived 			= 0;
		$user->verification_code = str_random(30);
		$user->remember_token   = $request->_token;
		$user->save();
		if(input::hasFile('avatar')){	//Nếu tồn tại file
			$avatar_name = $request->file('avatar')->getClientOriginalName();
			$id = $user->id;
			$p_folder = 'resources/views/images/upload/member/'.$id;
			mkdir($p_folder);
			$request->file('avatar')->move($p_folder,$avatar_name);
			$user->avatar = $avatar_name;
			$user->save();
		}
		//Gửi email xác thực đến khách hàng
		$data = array(
			'name'=>$user->username,
			'email' =>$user->email,
			'verification_code'=>$user->verification_code
		);
		//Gửi email đến người dùng đăng ký để xác nhận
		
					  //1. Tên của view sẽ chứa thômh điệp email
					  //2. Mảng dữl iệu muốn truy nhập đến view
					  //3. Cái nhận một sự thực hiện thông điệp
		Mail::send('emails.welcome',$data, function($message) use ($data){
			//Địa chỉ gửi
			$message->from('danghung3136@gmail.com','Thế Giới Công Nghệ');
			$message->subject('Welcome to site name');
			//Địa chỉ nhận
			$message->to($data['email']);
		});
		//Chuyển đến trang login
		return redirect('/');
	}
	public function getVerify($code){
		//so sánh với dữ liệu đã lưu phía database
		$data = User::where('verification_code','=',"$code")->get();
		if(!empty($data)){
		$user = User::find($data[0]['id']);
		$user->verification_code = "";
		$user->actived = 1;
		$user->save();
		//Xác nhận xong sẽ tự động đăng nhập vào tài khoản
		return redirect('auth/login')->with(['email'=>$data[0]['username']]);
		}
	}
}