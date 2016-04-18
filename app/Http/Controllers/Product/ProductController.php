<?php namespace App\Http\Controllers\Product;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\ProductRequest;
use App\Brand;
use Validator;
use App\Product;
use App\ImageDetail;
use Input;
use App\Mobile;
use DB;
use App\Helpers\ProcessText;
class ProductController extends Controller {
	public function getList($type){
		if($type=='mobile'){
			$products = DB::table('products')->join('mobiles','products.id','=','mobiles.id')->where('type',$type)->paginate(5);
			$url = "/Web_Technology/admin/product/list/mobile";
			$products->setPath($url);
			return view('admin.product.list')->with(['products'=>$products,'type'=>$type]);
		}
	}

	//1:Điện thoại
	//2: Laptop
	//3: Máy tính bảng
	//4: Phụ kiện
	public function getAdd($type){
		$brands = Brand::all();
		return view('admin.product.add')->with(['brands'=>$brands,'type'=>$type]);
	}
	public function postAdd(ProductRequest $request){
		$valid = Validator::make($request->all(),[
				'resolution1'=>'numeric',
				'resolution2'=>'numeric',		
				'screen_width'=>'numeric',
				'battery_capacity'=>'numeric',
				'dimension1'=>'numeric',
				'dimension2'=>'numeric',
				'dimension3'=>'numeric',
				'weight'=>'numeric'
			],
			[
				'resolution1.numeric'=>'Giá Trị Đầu Của Độ Phân Giài Không Ở Dạng Số',
				'resolution2.numeric'=>'Giá Trị Thứ Hai Của Độ Phân Giài Không Ở Dạng Số',
				'screen_width.numeric'=>'Độ Rộng Của Màn Hình Không Ở Dạng Số',
				'battery_capacity.numeric'=>'Dung Lượng Pin Không Ở Dạng Số',
				'dimension1.numeric'=>'Dữ Liệu Của Chiều Dài Điện Thoại Không Ở Dạng Số',
				'dimension2.numeric'=>'Dữ Liệu Của Chiều Rộng Điện Thoại Không Ở Dạng Số',
				'dimension3.numeric'=>'Dữ Liệu Của Chiều Cao Điện Thoại Không Ở Dạng Số',
				'weight.numeric'=>'Dữ Liệu Về Trọng Lượng Của Điện Thoại Không Ở Dạng Số'

			]);
		if($valid->fails()){
			return redirect()->back()->withErrors($valid->errors());
		}
		$product = new Product;
		$product->name = $request->name;
		$product->id_brand = $request->id_brand;
		$brand = Brand::find($request->id_brand);
		$keywords = $brand->name." ".$request->name;
		$product->keywords = changeTitle($keywords);
		$product->amount = $request->amount;
		$product->price = $request->price;
		$product->type = $request->type;
		$product->save();

		$id = $product->id;
		//Xử lý ảnh đại diện
		$path_folder = 'resources/upload/product/'.$id;
		if(!file_exists($path_folder))
			mkdir($path_folder);
		$path_folder = $path_folder.'/';
		//lưu ảnh
		if(input::hasFile('image')){
			$img_name = $request->file('image')->getClientOriginalName();
			$request->file('image')->move($path_folder,$img_name);
			$product->image = $img_name;
		}

		//Xử lý ảnh chi tiết
		$p_detail_folder = $path_folder.'detail';
		if(!file_exists($p_detail_folder))
			mkdir($p_detail_folder);
		$p_detail_folder = $p_detail_folder.'/';
		if(input::hasFile('image_details')){
			foreach(input::file("image_details") as $file_detail){
				if(isset($file_detail)){
					$file_detail->move($p_detail_folder,$file_detail->getClientOriginalName());
					$img_detail = new ImageDetail;
					$img_detail->id_product = $id;
					$img_detail->name = $file_detail->getClientOriginalName();
					$img_detail->save();
				}
			}
		}

		$product->save();
		if($request->type=="mobile"){
			$mobile = new Mobile;
			$mobile->id = $id;
			$mobile->screen_tech = $request->screen_tech;
			$mobile->resolution1 = $request->resolution1;
			$mobile->resolution2 = $request->resolution2;
			$mobile->screen_width = $request->screen_width;
			$mobile->touch = $request->touch;
			$mobile->back_cam = $request->back_cam;
			$mobile->back_cam_type = $request->back_cam_type;
			$mobile->flash = $request->flash;
			$mobile->front_cam = $request->front_cam;
			$mobile->front_cam_type = $request->front_cam_type;
			$mobile->film_shoot = $request->film_shoot;
			$mobile->video_call = $request->video_call;
			$mobile->operating_system = $request->operating_system;
			$mobile->core_amount = $request->core_amount;
			$mobile->proccesor = $request->proccesor;
			$mobile->CPU_rate = $request->CPU_rate;
			$mobile->ram = $request->ram;
			$mobile->internal_memory = $request->internal_memory;
			$mobile->mem_support = $request->mem_support;
			$mobile->mem_support_max = $request->mem_support_max;
			$mobile->sup_2g = $request->sup_2g;
			$mobile->sup_3g = $request->sup_3g;
			$mobile->sup_4g = $request->sup_4g;
			$mobile->sim_track = $request->sim_track;
			$mobile->sim_type = $request->sim_type;
			$mobile->wifi = $request->wifi;
			$mobile->battery_capacity = $request->battery_capacity;
			$mobile->battery_type = $request->battery_type;
			$mobile->dimension1 = $request->dimension1;
			$mobile->dimension2 = $request->dimension2;
			$mobile->dimension3 = $request->dimension3;
			$mobile->weight = $request->weight;
			$mobile->bluetooth = $request->bluetooth;
			$mobile->nfc = $request->nfc;
			$mobile->record = $request->record;
			$mobile->radio = $request->radio;
			$mobile->design = $request->design;
			$mobile->color = $request->color;
			$mobile->material = $request->material;
			$mobile->save();
			return redirect('admin/product/list/mobile');
		}
		
	}
	public function getUpdate($id){
		$brands = Brand::all();
		$product = Product::find($id);
		$imagedetails = $product->imagedetail;
		if($product->type=='mobile'){
			$product = DB::table('products')->join('mobiles','products.id','=','mobiles.id')->where('products.id',$id)->get();
		}
		return view('admin.product.update')->with(['product'=>$product[0],'brands'=>$brands,'imagedetails'=>$imagedetails]);
	}
	public function postUpdate(UpdateProductRequest $request){
		$valid = Validator::make($request->all(),[
				'resolution1'=>'numeric',
				'resolution2'=>'numeric',		
				'screen_width'=>'numeric',
				'battery_capacity'=>'numeric',
				'dimension1'=>'numeric',
				'dimension2'=>'numeric',
				'dimension3'=>'numeric',
				'weight'=>'numeric'
			],
			[
				'resolution1.numeric'=>'Giá Trị Đầu Của Độ Phân Giài Không Ở Dạng Số',
				'resolution2.numeric'=>'Giá Trị Thứ Hai Của Độ Phân Giài Không Ở Dạng Số',
				'screen_width.numeric'=>'Độ Rộng Của Màn Hình Không Ở Dạng Số',
				'battery_capacity.numeric'=>'Dung Lượng Pin Không Ở Dạng Số',
				'dimension1.numeric'=>'Dữ Liệu Của Chiều Dài Điện Thoại Không Ở Dạng Số',
				'dimension2.numeric'=>'Dữ Liệu Của Chiều Rộng Điện Thoại Không Ở Dạng Số',
				'dimension3.numeric'=>'Dữ Liệu Của Chiều Cao Điện Thoại Không Ở Dạng Số',
				'weight.numeric'=>'Dữ Liệu Về Trọng Lượng Của Điện Thoại Không Ở Dạng Số'

			]);
		if($valid->fails()){
			return redirect()->back()->withErrors($valid->errors());
		}

		$product = Product::find($request->id);
		$product->name = $request->name;
		$brand = Brand::find($request->id_brand);
		$keywords = $brand->name." ".$request->name;
		$product->keywords = changeTitle($keywords);
		$product->id_brand = $request->id_brand;
		$product->amount = $request->amount;
		$product->price = $request->price;
		$product->type = $request->type;

		$id = $request->id;
		//Xử lý ảnh đại diện
		$path_folder = 'resources/upload/product/'.$id.'/';
		//lưu ảnh
		if(input::hasFile('image')){
			//Xóa ảnh khỏi tệp
			$old_img = $path_folder.$product->image;
			if(file_exists($old_img))
				unlink($old_img);
			$img_name = $request->file('image')->getClientOriginalName();
			$request->file('image')->move($path_folder,$img_name);
			$product->image = $img_name;
		}

		//Xử lý ảnh chi tiết
		$p_detail_folder = $path_folder.'detail';
		if(!file_exists($p_detail_folder))
			mkdir($p_detail_folder);
		$p_detail_folder = $p_detail_folder.'/';
		if(input::hasFile('image_details')){
			foreach(input::file("image_details") as $file_detail){
				if(isset($file_detail)){
					$file_detail->move($p_detail_folder,$file_detail->getClientOriginalName());
					$img_detail = new ImageDetail;
					$img_detail->id_product = $id;
					$img_detail->name = $file_detail->getClientOriginalName();
					$img_detail->save();
				}
			}
		}

		$product->save();
		if($product->type=="mobile"){
			$mobile = Mobile::find($product->id);
			$mobile->screen_tech = $request->screen_tech;
			$mobile->resolution1 = $request->resolution1;
			$mobile->resolution2 = $request->resolution2;
			$mobile->screen_width = $request->screen_width;
			$mobile->touch = $request->touch;
			$mobile->back_cam = $request->back_cam;
			$mobile->back_cam_type = $request->back_cam_type;
			$mobile->flash = $request->flash;
			$mobile->front_cam = $request->front_cam;
			$mobile->front_cam_type = $request->front_cam_type;
			$mobile->film_shoot = $request->film_shoot;
			$mobile->video_call = $request->video_call;
			$mobile->operating_system = $request->operating_system;
			$mobile->core_amount = $request->core_amount;
			$mobile->proccesor = $request->proccesor;
			$mobile->CPU_rate = $request->CPU_rate;
			$mobile->ram = $request->ram;
			$mobile->internal_memory = $request->internal_memory;
			$mobile->mem_support = $request->mem_support;
			$mobile->mem_support_max = $request->mem_support_max;
			$mobile->sup_2g = $request->sup_2g;
			$mobile->sup_3g = $request->sup_3g;
			$mobile->sup_4g = $request->sup_4g;
			$mobile->sim_track = $request->sim_track;
			$mobile->sim_type = $request->sim_type;
			$mobile->wifi = $request->wifi;
			$mobile->battery_capacity = $request->battery_capacity;
			$mobile->battery_type = $request->battery_type;
			$mobile->dimension1 = $request->dimension1;
			$mobile->dimension2 = $request->dimension2;
			$mobile->dimension3 = $request->dimension3;
			$mobile->weight = $request->weight;
			$mobile->bluetooth = $request->bluetooth;
			$mobile->nfc = $request->nfc;
			$mobile->record = $request->record;
			$mobile->radio = $request->radio;
			$mobile->design = $request->design;
			$mobile->color = $request->color;
			$mobile->material = $request->material;
			$mobile->save();
			return redirect('admin/product/list/mobile');
		}

	}
	public function getDetail($type,$keywords){
		$product = DB::table('products')->where('keywords','=',$keywords)->get();
		$product = $product[0];
		$product->id_brand;
		$brand = Brand::find($product->id_brand);
		
		$id = $product->id;
		$im_product = Product::find($id);
		$imagedetails = $im_product->imagedetail;
		if($type=='mobile'){
			$product = DB::table('products')->join('mobiles','products.id','=','mobiles.id')->where('products.id',$id)->get();
		}
		return view('admin.product.detail')->with(['product'=>$product[0],'brand'=>$brand,'imagedetails'=>$imagedetails]);
	}

	public function getDelete($id){

	}
	public function postDelete(){
		
	}

}
