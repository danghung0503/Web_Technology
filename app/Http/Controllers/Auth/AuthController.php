<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UserLoginRequest;
use App\User;
use Hash;
use Input;
use Auth;
use Mail;
use DB;
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
		
		$this->middleware('guest', ['except' => array('getLogout')]);
	}

	public function postLogin(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email', 'password' => 'required',
		],[
			'email.required'=>"Bạn chưa nhập email",
			'email.email'=>'Email không hợp lệ',
			'password.required'=>'Bạn chưa nhập password'
		]);
		//Lấy về một mảng trong đó gồm hai key là email và password
		$credentials = $request->only('email', 'password');
		$credentials['actived'] = 1;
		//Trường hợp đăng nhập thành công
												//Nếu tích vào ô nhớ thì sẽ trả về 1
												// và thực hiện lưu thông tin đăng nhập
		if ($this->auth->attempt($credentials, $request->has('remember')))
		{
				return redirect()->intended($this->redirectPath());
		}
		//trường hợp thông tin đăng nhập không đúng
		//Chuyển đến trang login cùng với các tham số
		return redirect($this->loginPath())
					->withInput($request->only('email', 'remember'))
					->withErrors([
						'email' => $this->getFailedLoginMessage(),	//Trả về thông báo lỗi của email
					]);
	}

	protected function getFailedLoginMessage()
	{
		return 'Email hoặc mật khẩu không đúng.';
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
		$user->verification_code = str_random(32);
		$user->remember_token   = $request->_token;


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
		// Mail::send('emails.welcome',$data, function($message) use ($data){
		// 	//Địa chỉ gửi
		// 	$message->from('danghung3136@gmail.com','dienthoai123456.org');
		// 	$message->subject('Chào mừng bạn đến với Website của chúng tôi!');
		// 	//Địa chỉ nhận
		// 	$message->to($data['email']);
		// });

		$user->save();
		$id = $user->id;
		$p_folder = 'resources/upload/avatar/'.$id;
		mkdir($p_folder);
		if(input::hasFile('avatar')){	//Nếu tồn tại file
			$avatar_name = $request->file('avatar')->getClientOriginalName();
			$request->file('avatar')->move($p_folder,$avatar_name);
			$user->avatar = $avatar_name;
			$user->save();
		}
		//Lưu dữ liệu vào bảng password_resets
		DB::table('password_resets')->insert([
				'email'=> $request->email,
				'token'=>str_random(32)
			]);

		//Chuyển đến trang login
		return redirect('/');
	}

	//authentication user
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