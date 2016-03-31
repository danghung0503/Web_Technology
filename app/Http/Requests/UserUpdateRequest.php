<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserUpdateRequest extends Request {

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
			'username'=>'required|max:255',
			'password'=>'required||confirmed|min:6',
			'gender'=>'required',
			'fullname'=>'required|max:255',
			'phonenumber'=>'required|numeric|min:10',
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
			'gender.required'=>'Vui lòng chọn giới tính của bạn',
			'fullname.required'=>'Vui lòng nhập tên đầy đủ của bạn',
			'phonenumber.required'=>'Vui lòng nhập số điện thoại của bạn',
			'phonenumber.numeric'=>'Dữ liệu mà bạn nhập vào không ở dạng số',
			'phonenumber.min'=>'Số điện thoại không hợp lệ',
			'address.required'=>'Vui lòng nhập địa chỉ của bạn',
			'avatar.image' =>'File được nhập không phải là ảnh',
			'avatar.max'=>'Kích thước file quá lớn'
		];
	}

}
