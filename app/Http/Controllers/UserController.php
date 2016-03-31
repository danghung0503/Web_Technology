<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
class UserController extends Controller {
	public function __construct(){
		$this->middleware('auth');
		$this->beforefilter(function(){
			if(Auth::check()){
				if(Auth::user()->actived==0){
					return redirect('/');
				}
			}
		});
	}
	public function index(){
		return view('user.index');
	}
}
