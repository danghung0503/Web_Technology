<?php namespace App\Http\Controllers\Product;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Brand;
class ProductController extends Controller {

	public function getList(){
		return view('admin.product.list');
	}

	public function getAdd(){
		$brands = Brand::all();
		return view('admin.product.add')->with(['brands'=>$brands]);
	}
	public function postAdd(AddProductRequest $request){
		
	}
	public function getUpdate($id){

	}
	public function postUpdate(UpdateProductRequest $request){

	}
	public function getDelete($id){

	}

}
