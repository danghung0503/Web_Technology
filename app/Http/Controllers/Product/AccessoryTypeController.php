<?php namespace App\Http\Controllers\Product;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\AccessoryTypeAddRequest;
use App\Http\Requests\AccessoryTypeUpdateRequest;
use App\AccessoryType;
use Input;
class AccessoryTypeController extends Controller {
	public function getList(){
		$accessory_types = AccessoryType::all();
		return view('admin.accessorytype.list')->with(['accessory_types'=>$accessory_types]);
	}

	public function getAdd(){
		return view('admin.accessorytype.add');
	}

	public function postAdd(AccessoryTypeAddRequest $request){
		$accessory_type = new AccessoryType;
		$accessory_type->name = $request->name;
		$accessorytype->save();
		$id = $accessorytype->id;
		//lưu ảnh
		$file = $request->file('image');
		$img_name = $id."_".$file->getClientOriginalName();
		$img_url = 'resources/upload/accessorytype';
		$file->move($img_url,$img_name);
		$accessorytype->image = $img_name;
		$accessorytype->save();
		return url('admin/accessorytype/list');
	}

	public function getUpdate($id){
		$accessorytype = AccessoryType::fine($id);
		return view('admin.accessory.update')->with(['accessorytype'=>$accessorytype]);
	}

	public function postUpdate(AccessoryTypeUpdateRequest $request){
		$accessorytype = AccessoryType::find($request->id);
		$accessorytype->name = $request->name;
		if(input::hasFile($request->image)){
			$img_url = 'resources/upload/accessorytype';
			if(file_exists($img_url.'/'.$accessorytype->image)){
				unlink($img_url.'/'.$accessorytype->image);
			}
			$img_name = $request->id.'_'.$request->file('image')->getClientOriginalName();
			$request->file('image')->move($img_url,$img_name);
			$accessorytype->image = $img_name;
		}
		$accessorytype->save();
		return url('admin/accessorytype/list');
	}

	public function getDelete($id){
		$accessorytype = AccessoryType::fine($id);
		if(!empty($accessorytype->image)){
			$img_url = 'resources/upload/accessorytype/'.$accessorytype->image;
			if(file_exists($img_url)){
				unlink($img_url);
			}
		}
		$accessorytype->delete();
	}

	public function postDelete(Request $request){
		$array = $request->check;
		if(count($array)!=0){
			foreach($array as $id){
				$accessorytype = AccessoryType::fine($id);
				if(!empty($accessorytype->image)){
					$img_url = 'resources/upload/accessorytype/'.$accessorytype->image;
					if(file_exists($img_url)){
						unlink($img_url);
					}
				}
				$accessorytype->delete();
			}
		}
	}
}
