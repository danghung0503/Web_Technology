<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request {

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
			'amount'=> 'required|numeric|max:2000000000',
			'price'=> 'required|numeric|max:2000000000',
			'image'=> 'required|image|max:5000'
		];
	}
	public function messages(){
		return[
			'name.required'=>'Bạn Chưa Nhập Tên Sản Phẩm',
			'amount.required'=>'Bạn Chưa Nhập Số Lượng Sản Phẩm',
			'amount.numeric'=>'Số Lượng Sản Phẩm Vừa Được Nhập Vào Của Bạn Không Ở Dạng Số',
			'amount.max'=>'Số Lượng Vượt Quá Giới Hạn Cho Phép',
			'price.required'=>'Bạn Chưa Nhập Giá Cho Sản Phẩm',
			'price.numeric'=>'Giá Của Sản Phẩm Được Nhập Không Ở Dạng Số',
			'price.max'=>'Giá Của Sản Phẩm Vượt Quá Giới Hạn Cho Phép',
			'image.required'=>'Bạn Chưa Nhập Ảnh Đại Diện Cho Sản Phẩm',
			'image.image'=>'File Mà Bạn Chọn Không Phải Là Ảnh',
			'image.max'=>'Dung lượng file vượt quá giới hạn cho phép'
		];
	}

}
