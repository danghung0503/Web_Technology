<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;

//middleware của thằng guest
class RedirectIfAuthenticated {

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
		//Nếu đã tồn tại session
		if ($this->auth->check())
		{
			if($this->auth->user()->level==2){
				return new RedirectResponse(url('admin'));
			}else if($this->auth->user()->level==1){
				echo $this->auth->user()->activated;
				if($this->auth->user()->activated == 0){
		//			return new RedirectResponse(url('/'));
				}
		//		return new RedirectResponse(url('member/index'));
			}
		}
		return $next($request);
	}

}
