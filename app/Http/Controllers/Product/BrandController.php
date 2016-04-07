<?php namespace App\Http\Controllers\Product;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\BrandUpdateRequest;
use App\Brand;
use Input;
class BrandController extends Controller {

	public function getList(){
		$brand = DB::table('brands')->paginate(5);		
		$url = "/Web_Technology/admin/brand/list";
		$brand->setPath($url);
		return view('admin.brand.list')->with(['brands'=>$brand]);
	}

	public function getAdd(){
		return view('admin.brand.add');
	}
	public function postAdd(BrandRequest $request){
		$brand = new Brand();
		$brand->name = $request->name;
		$brand->country = $request->country;
		$brand->description = $request->description;
		$brand->save();
		$id = $brand->id;
		$p_folder = 'resources/upload/brand/';
		if(input::hasFile('logo')){	//Nếu tồn tại file
			$logo_name = $id.'_'.$request->file('logo')->getClientOriginalName();
			$request->file('logo')->move($p_folder,$logo_name);
			$brand->logo = $logo_name;
			$brand->save();
		}
		return redirect('admin/brand/list');
	}
	public function getUpdate($id){
		$brand = Brand::find($id);
		return view('admin.brand.update')->with(['brand'=>$brand]);
	}
	public function postUpdate(BrandUpdateRequest $request){
		$brand = Brand::find($request->id);
		$brand->name = $request->name;
		$brand->country = $request->country;
		$brand->description = $request->description;
		$id = $brand->id;
		$p_folder = 'resources/upload/brand/';
		if(file_exists($p_folder.$brand->logo)){
			unlink($p_folder.$brand->logo);
		}
		if(input::hasFile('logo')){	//Nếu tồn tại file
			$logo_name = $id.'_'.$request->file('logo')->getClientOriginalName();
			$request->file('logo')->move($p_folder,$logo_name);
			$brand->logo = $logo_name;
		}
		$brand->save();
		return redirect('admin/brand/list');
	}
	public function getDelete($id){
		$brand = Brand::find($id);
		if(!empty($brand->logo)){
				$url = 'resources/upload/brand/'.$brand->logo;
				if(file_exists($url)){
					unlink($url);
				}
			}
		$brand->delete();
		return redirect('admin/brand/list');
	}

	public function postDelete(Request $request){
		$array = $request->check;
		foreach($array as $id){
			$brand = Brand::find($id);
			//Xóa ảnh
			if(!empty($brand->logo)){
				$url = 'resources/upload/brand/'.$brand->logo;
				if(file_exists($url)){
					unlink($url);
				}
			}
			$brand->delete();
		}
		return redirect('admin/brand/list');
	}

}