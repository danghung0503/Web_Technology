<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authenticate {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
		//middleware auth gọi đến thằng này
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		//Nếu chưa thiết lập session hay session không tồn tại
		//ở đây, nếu chúng ta đã logged in thì nó sẽ trả về fail
		if ($this->auth->guest())
		{
			//Nếu người dùng nhập sai ngay trong phần có tham chiếu đến ajax
			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			else
			{
				//Nếu dữ liệu nhập vào của người dùng là đã hợp lệ thì mới tiến hành kiểm tra
				return redirect()->guest('auth/login');
			}
		}
		//Dùng $next này để tiếp tục pass vào sự điểu khiển của controller
		return $next($request);
	}

}
