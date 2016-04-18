<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'username'=>'required|max:255|unique:users',
			'password'=>'required||confirmed|min:6',
			'email'	=>'required|email|max:255|unique:users',
			'gender'=>'required',
			'fullname'=>'required|max:255',
			'phonenumber'=>'required|numeric|min:1000000000|max:99999999999',
			'address'=>'required',
			'avatar'=>'image|max:5000'
		];
	}
	public function messages(){
		return[
			'username.required'=>"Vui lòng nhập tên đăng nhập của bạn",
			'username.unique'=>'Người dùng đã tồn tại',
			'password.required'=>'Vui lòng nhập mật khẩu',
			'password.min'	=>'Mật khẩu phải chứa ít nhất 6 ký tự',
			'password.confirmed'=>'Xác nhận mật khẩu không chính xác',
			'email.required'=>'Vui lòng nhập địa chỉ email',
			'email.email'=>'Email không hợp lệ',
			'email.unique'=>'Địa chỉ email đã tồn tại',
			'email.max'	=>'Địa chỉ email có độ dài vượt quá số ký tự cho phép',
			'gender.required'=>'Vui lòng chọn giới tính của bạn',
			'fullname.required'=>'Vui lòng nhập tên đầy đủ của bạn',
			'phonenumber.required'=>'Vui lòng nhập số điện thoại của bạn',
			'phonenumber.numeric'=>'Dữ liệu mà bạn nhập vào không ở dạng số',
			'phonenumber.min'=>'Số điện thoại không hợp lệ',
			'phonenumber.max'=>'Số điện thoại không hợp lệ',
			'address.required'=>'Vui lòng nhập địa chỉ của bạn',
			'avatar.image' =>'File được nhập không phải là ảnh',
			'avatar.max'=>'Kích thước file quá lớn'
		];
	}

}
