<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AccessoryTypeAddRequest extends Request {

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
			'name'=>'required',
			'image'=>'required|image|max:5000',
		];
	}

	public function messages(){
		'name.required'=>'Bạn Chưa Nhập Tên Của Loại Phụ Kiện',
		'image.required'=>'Bạn Chưa Chọn Ảnh Cho Loại Phụ Kiện',
		'image.image'=>'File Vừa Nhập Không Phải Là Ảnh',
		'image.max'=>'Kích Thước File Được Chọn Vượt Quá Giới Hạn Cho Phép'
	}

}
