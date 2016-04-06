<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class BrandRequest extends Request {

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
			'logo'=>'required|image|max:10000'
		];
	}

	public function messages(){
		return [
			'name.required'=>"Bạn Chưa Nhập Tên Hãmg Sản Xuất",
			'logo.required'=>'Bạn Chưa Chọng Logo Cho Hãng Sản Xuất',
			'logo.image'=>'File Nhập Vào Không PHải Lả Ảnh',
			'logo.max'=>'Kích Thước Ảnh Quá Lớn'
		];
	}
}
