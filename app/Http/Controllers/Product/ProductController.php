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
use App\Laptop;
use App\Tablet;
use DB;
use App\Helpers\ProcessText;
class ProductController extends Controller {
	public function getList($type){
		if($type=='mobile'){
			$products = DB::table('products')->join('mobiles','products.id','=','mobiles.id')->where('type',$type)->paginate(5);
			$url = "/Web_Technology/admin/product/list/mobile";
			$products->setPath($url);
		}else if($type=='laptop'){
			$products = DB::table('products')->join('laptops','products.id','=','laptops.id')->where('type',$type)->paginate(5);
			$url = "/Web_Technology/admin/product/list/laptop";
			$products->setPath($url);
		}else if($type=='tablet'){
			$products = DB::table('products')->join('tablets','products.id','=','tablets.id')->where('type',$type)->paginate(5);
			$url = "/Web_Technology/admin/product/list/tablet";
			$products->setPath($url);
			
		}
		return view('admin.product.list')->with(['products'=>$products,'type'=>$type]);
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
		if($request->type=='mobile'){
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
		}else if($request->type=='laptop'){
			$valid = Validator::make($request->all(),[
				'ram_track'=>'numeric|min:1|max:16',
				'resolution1'=>'numeric',
				'resolution2'=>'numeric',		
				'screen_width'=>'numeric|min:10|max:20',
				'dimension1'=>'numeric',
				'dimension2'=>'numeric',
				'dimension3'=>'numeric',
				'weight'=>'numeric',
				'wc'	=>'numeric|max:3'
			],
			[
				'ram_track.numeric'=>'Số Khe RAM Vừa Nhập Không Ở Dạng Số',
				'ram_track.min'=>'Số Keh RAM Nhỏ Hơn Giới Hạn Cho Phép',
				'ram_track.max'=>'Số Khe RAM Lớn Hơn Giới Hạn Cho Phép',
				'resolution1.numeric'=>'Giá Trị Đầu Của Độ Phân Giài Không Ở Dạng Số',
				'resolution2.numeric'=>'Giá Trị Thứ Hai Của Độ Phân Giài Không Ở Dạng Số',
				'screen_width.numeric'=>'Độ Rộng Của Màn Hình Không Ở Dạng Số',
				'screen_width.min'=>'Độ Rộng Của Màn Hình Nhỏ Hơn Giới Hạn Cho Phép',
				'screen_width.max'=>'Độ Rộng Của Màn Hình Lớn Hơn Giới Hạn Cho Phép',
				'dimension1.numeric'=>'Dữ Liệu Của Chiều Dài Laptop Không Ở Dạng Số',
				'dimension2.numeric'=>'Dữ Liệu Của Chiều Rộng Laptop Không Ở Dạng Số',
				'dimension3.numeric'=>'Dữ Liệu Của Chiều Cao Laptop Không Ở Dạng Số',
				'weight.numeric'=>'Dữ Liệu Về Trọng Lượng Của Laptop Không Ở Dạng Số',
				'wc.numeric'=>'Độ Phân Giải Của Webcam Không Ở Dạng Số',
				'wc.max'	=>'Độ Phân Giải Của Webcam Lớn Hơn Giới Hạn Cho Phép'
			]);
		}else if($request->type=='tablet'){
			$valid = Validator::make($request->all(),[
				'resolution1'=>'numeric',
				'resolution2'=>'numeric',	
				'screen_width'=>'numeric',
				'dimension1'=>'numeric',
				'dimension2'=>'numeric',
				'dimension3'=>'numeric',
				'weight'=>'numeric'
			],
			[
				'resolution1.numeric'=>'Giá Trị Đầu Của Độ Phân Giài Không Ở Dạng Số',
				'resolution2.numeric'=>'Giá Trị Thứ Hai Của Độ Phân Giài Không Ở Dạng Số',
				'screen_width.numeric'=>'Độ Rộng Của Màn Hình Không Ở Dạng Số',
				'dimension1.numeric'=>'Dữ Liệu Của Chiều Dài Điện Thoại Không Ở Dạng Số',
				'dimension2.numeric'=>'Dữ Liệu Của Chiều Rộng Không Ở Dạng Số',
				'dimension3.numeric'=>'Dữ Liệu Của Chiều Cao Không Ở Dạng Số',
				'weight.numeric'=>'Dữ Liệu Về Trọng Lượng Của Không Ở Dạng Số'

			]);
		}
		
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
			$mobile->material = $request->material;
			$mobile->touch_glass = $request->touch_glass;
			$mobile->photo_advance = $request->photo_advance;
			$mobile->grapic_chip = $request->grapic_chip;
			$mobile->remain_memory = $request->remain_memory;
			$mobile->gps = $request->gps;
			$mobile->connector = $request->connector;
			$mobile->other_connect = $request->other_connect;
			$mobile->watch_movie = $request->watch_movie;
			$mobile->listen_music = $request->listen_music;
			$mobile->other_func = $request->other_func;
			$mobile->headphone = $request->headphone;
			$mobile->save();
			return redirect('admin/product/list/mobile');
		}else if($request->type=="laptop"){
			$laptop = new Laptop;
			$laptop->id = $id;
			$laptop->CPU_brand = $request->CPU_brand;
			$laptop->CPU_tech = $request->CPU_tech;
			$laptop->CPU_type = $request->CPU_type;
			$laptop->CPU_rate = $request->CPU_rate;
			$laptop->cache = $request->cache;
			$laptop->max_CPU_rate = $request->max_CPU_rate;
			$laptop->chipset = $request->chipset;
			$laptop->bus_rate_main = $request->bus_rate_main;
			$laptop->max_ram_sup = $request->max_ram_sup;
			$laptop->ram_type = $request->ram_type;
			$laptop->ram_bus_rate = $request->ram_bus_rate;
			$laptop->disk_type = $request->disk_type;
			$laptop->hard_disk = $request->hard_disk;
			$laptop->screen_width = $request->screen_width;
			$laptop->resolution1 = $request->resolution1;
			$laptop->resolution2 = $request->resolution2;
			$laptop->screen_tech = $request->screen_tech;
			$laptop->touch = $request->touch;
			$laptop->grapic_chip = $request->grapic_chip;
			$laptop->grapic_mem = $request->grapic_mem;
			$laptop->card_design = $request->card_design;
			$laptop->sound_mode = $request->sound_mode;
			$laptop->optical_avail = $request->optical_avail;
			$laptop->optical_type = $request->optical_type;
			$laptop->lan = $request->lan;
			$laptop->wifi = $request->wifi;
			$laptop->bluetooth = $request->bluetooth;
			$laptop->read_mem_card = $request->read_mem_card;
			$laptop->read_mem_track = $request->read_mem_track;
			$laptop->wc = $request->wc;
			$laptop->wc_info = $request->wc_info;
			$laptop->battery_capacity = $request->battery_capacity;
			$laptop->operating_system = $request->operating_system;
			$laptop->software_avail = $request->software_avail;
			$laptop->dimension1 = $request->dimension1;
			$laptop->dimension2 = $request->dimension2;
			$laptop->dimension3 = $request->dimension3;
			$laptop->weight = $request->weight;
			$laptop->material = $request->material;
			$laptop->save();
			return redirect('admin/product/list/laptop');
		}else if($request->type=="tablet"){
			$tablet = new Tablet;
			$tablet->id = $id;
			$tablet->screen_tech = $request->screen_tech;
			$tablet->screen_width = $request->screen_width;
			$tablet->resolution1 = $request->resolution1;
			$tablet->resolution2 = $request->resolution2;
			$tablet->back_cam = $request->back_cam;
			$tablet->film_shoot = $request->film_shoot;
			$tablet->cam_feat = $request->cam_feat;
			$tablet->front_cam = $request->front_cam;
			$tablet->operating_system = $request->operating_system;
			$tablet->proccesor = $request->proccesor;
			$tablet->CPU_rate = $request->CPU_rate;
			$tablet->graphic_chip = $request->graphic_chip;
			$tablet->ram = $request->ram;
			$tablet->internal_memory = $request->internal_memory;
			$tablet->remain_memory = $request->remain_memory;
			$tablet->mem_support = $request->mem_support;
			$tablet->mem_support_max = $request->mem_support_max;
			$tablet->sensor = $request->sensor;
			$tablet->sim_track = $request->sim_track;
			$tablet->sim_type = $request->sim_type;
			$tablet->sup_3g = $request->sup_3g;
			$tablet->sup_4g = $request->sup_4g;
			$tablet->wifi = $request->wifi;
			$tablet->bluetooth = $request->bluetooth;
			$tablet->gps = $request->gps;
			$tablet->connector = $request->connector;
			$tablet->headphone = $request->headphone;
			$tablet->otg = $request->otg;
			$tablet->other_connect = $request->other_connect;
			$tablet->record = $request->record;
			$tablet->radio = $request->radio;
			$tablet->material = $request->material;
			$tablet->dimension1 = $request->dimension1;
			$tablet->dimension2 = $request->dimension2;
			$tablet->dimension3 = $request->dimension3;
			$tablet->weight = $request->weight;
			$tablet->battery_type = $request->battery_type;
			$tablet->other_func = $request->other_func;
			$tablet->save();
			return redirect('admin/product/list/tablet');
		}
		
		
	}
	public function getUpdate($id){
		$brands = Brand::all();
		$product = Product::find($id);
		$imagedetails = $product->imagedetail;
		if($product->type=='mobile'){
			$product = DB::table('products')->join('mobiles','products.id','=','mobiles.id')->where('products.id',$id)->get();
		}else if($product->type=='laptop'){
			$product = DB::table('products')->join('laptops','products.id','=','laptops.id')->where('products.id',$id)->get();
		}else if($product->type=='tablet'){
			$product = DB::table('products')->join('tablets','products.id','=','tablets.id')->where('products.id',$id)->get();
		}
		return view('admin.product.update')->with(['product'=>$product[0],'brands'=>$brands,'imagedetails'=>$imagedetails]);
	}
	public function postUpdate(UpdateProductRequest $request){
		if($request->type=='mobile'){
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
		}else if($request->type=='laptop'){
			$valid = Validator::make($request->all(),[
				'ram_track'=>'numeric|min:1|max:16',
				'resolution1'=>'numeric',
				'resolution2'=>'numeric',		
				'screen_width'=>'numeric|min:10|max:20',
				'dimension1'=>'numeric',
				'dimension2'=>'numeric',
				'dimension3'=>'numeric',
				'weight'=>'numeric',
				'wc'	=>'numeric|max:3'
			],
			[
				'ram_track.numeric'=>'Số Khe RAM Vừa Nhập Không Ở Dạng Số',
				'ram_track.min'=>'Số Keh RAM Nhỏ Hơn Giới Hạn Cho Phép',
				'ram_track.max'=>'Số Khe RAM Lớn Hơn Giới Hạn Cho Phép',
				'resolution1.numeric'=>'Giá Trị Đầu Của Độ Phân Giài Không Ở Dạng Số',
				'resolution2.numeric'=>'Giá Trị Thứ Hai Của Độ Phân Giài Không Ở Dạng Số',
				'screen_width.numeric'=>'Độ Rộng Của Màn Hình Không Ở Dạng Số',
				'screen_width.min'=>'Độ Rộng Của Màn Hình Nhỏ Hơn Giới Hạn Cho Phép',
				'screen_width.max'=>'Độ Rộng Của Màn Hình Lớn Hơn Giới Hạn Cho Phép',
				'dimension1.numeric'=>'Dữ Liệu Của Chiều Dài Điện Thoại Không Ở Dạng Số',
				'dimension2.numeric'=>'Dữ Liệu Của Chiều Rộng Điện Thoại Không Ở Dạng Số',
				'dimension3.numeric'=>'Dữ Liệu Của Chiều Cao Điện Thoại Không Ở Dạng Số',
				'weight.numeric'=>'Dữ Liệu Về Trọng Lượng Của Điện Thoại Không Ở Dạng Số',
				'wc.numeric'=>'Độ Phân Giải Của Webcam Không Ở Dạng Số',
				'wc.max'	=>'Độ Phân Giải Của Webcam Lớn Hơn Giới Hạn Cho Phép'
			]);
		}else if($request->type=='tablet'){
			$valid = Validator::make($request->all(),[
				'resolution1'=>'numeric',
				'resolution2'=>'numeric',	
				'screen_width'=>'numeric',
				'dimension1'=>'numeric',
				'dimension2'=>'numeric',
				'dimension3'=>'numeric',
				'weight'=>'numeric'
			],
			[
				'resolution1.numeric'=>'Giá Trị Đầu Của Độ Phân Giài Không Ở Dạng Số',
				'resolution2.numeric'=>'Giá Trị Thứ Hai Của Độ Phân Giài Không Ở Dạng Số',
				'screen_width.numeric'=>'Độ Rộng Của Màn Hình Không Ở Dạng Số',
				'dimension1.numeric'=>'Dữ Liệu Của Chiều Dài Điện Thoại Không Ở Dạng Số',
				'dimension2.numeric'=>'Dữ Liệu Của Chiều Rộng Không Ở Dạng Số',
				'dimension3.numeric'=>'Dữ Liệu Của Chiều Cao Không Ở Dạng Số',
				'weight.numeric'=>'Dữ Liệu Về Trọng Lượng Của Không Ở Dạng Số'

			]);
		}
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
			$mobile->material = $request->material;
			$mobile->touch_glass = $request->touch_glass;
			$mobile->photo_advance = $request->photo_advance;
			$mobile->grapic_chip = $request->grapic_chip;
			$mobile->remain_memory = $request->remain_memory;
			$mobile->gps = $request->gps;
			$mobile->connector = $request->connector;
			$mobile->other_connect = $request->other_connect;
			$mobile->watch_movie = $request->watch_movie;
			$mobile->listen_music = $request->listen_music;
			$mobile->other_func = $request->other_func;
			$mobile->headphone = $request->headphone;
			$mobile->save();
			return redirect('admin/product/list/mobile');
		}else if($product->type=='laptop'){
			$laptop = Laptop::find($id);
			$laptop->CPU_brand = $request->CPU_brand;
			$laptop->CPU_tech = $request->CPU_tech;
			$laptop->CPU_type = $request->CPU_type;
			$laptop->CPU_rate = $request->CPU_rate;
			$laptop->cache = $request->cache;
			$laptop->max_CPU_rate = $request->max_CPU_rate;
			$laptop->chipset = $request->chipset;
			$laptop->bus_rate_main = $request->bus_rate_main;
			$laptop->max_ram_sup = $request->max_ram_sup;
			$laptop->ram_type = $request->ram_type;
			$laptop->ram_bus_rate = $request->ram_bus_rate;
			$laptop->disk_type = $request->disk_type;
			$laptop->hard_disk = $request->hard_disk;
			$laptop->screen_width = $request->screen_width;
			$laptop->resolution1 = $request->resolution1;
			$laptop->resolution2 = $request->resolution2;
			$laptop->screen_tech = $request->screen_tech;
			$laptop->touch = $request->touch;
			$laptop->grapic_chip = $request->grapic_chip;
			$laptop->grapic_mem = $request->grapic_mem;
			$laptop->card_design = $request->card_design;
			$laptop->sound_mode = $request->sound_mode;
			$laptop->optical_avail = $request->optical_avail;
			$laptop->optical_type = $request->optical_type;
			$laptop->lan = $request->lan;
			$laptop->wifi = $request->wifi;
			$laptop->bluetooth = $request->bluetooth;
			$laptop->read_mem_card = $request->read_mem_card;
			$laptop->read_mem_track = $request->read_mem_track;
			$laptop->wc = $request->wc;
			$laptop->wc_info = $request->wc_info;
			$laptop->battery_capacity = $request->battery_capacity;
			$laptop->operating_system = $request->operating_system;
			$laptop->software_avail = $request->software_avail;
			$laptop->dimension1 = $request->dimension1;
			$laptop->dimension2 = $request->dimension2;
			$laptop->dimension3 = $request->dimension3;
			$laptop->weight = $request->weight;
			$laptop->material = $request->material;
			$laptop->save();
			return redirect('admin/product/list/laptop');
		}else if($product->type == 'tablet'){
			$tablet = Tablet::find($id);
			$tablet->screen_tech = $request->screen_tech;
			$tablet->screen_width = $request->screen_width;
			$tablet->resolution1 = $request->resolution1;
			$tablet->resolution2 = $request->resolution2;
			$tablet->back_cam = $request->back_cam;
			$tablet->film_shoot = $request->film_shoot;
			$tablet->cam_feat = $request->cam_feat;
			$tablet->front_cam = $request->front_cam;
			$tablet->operating_system = $request->operating_system;
			$tablet->proccesor = $request->proccesor;
			$tablet->CPU_rate = $request->CPU_rate;
			$tablet->graphic_chip = $request->graphic_chip;
			$tablet->ram = $request->ram;
			$tablet->internal_memory = $request->internal_memory;
			$tablet->remain_memory = $request->remain_memory;
			$tablet->mem_support = $request->mem_support;
			$tablet->mem_support_max = $request->mem_support_max;
			$tablet->sensor = $request->sensor;
			$tablet->sim_track = $request->sim_track;
			$tablet->sim_type = $request->sim_type;
			$tablet->sup_3g = $request->sup_3g;
			$tablet->sup_4g = $request->sup_4g;
			$tablet->wifi = $request->wifi;
			$tablet->bluetooth = $request->bluetooth;
			$tablet->gps = $request->gps;
			$tablet->connector = $request->connector;
			$tablet->headphone = $request->headphone;
			$tablet->otg = $request->otg;
			$tablet->other_connect = $request->other_connect;
			$tablet->record = $request->record;
			$tablet->radio = $request->radio;
			$tablet->material = $request->material;
			$tablet->dimension1 = $request->dimension1;
			$tablet->dimension2 = $request->dimension2;
			$tablet->dimension3 = $request->dimension3;
			$tablet->weight = $request->weight;
			$tablet->battery_type = $request->battery_type;
			$tablet->other_func = $request->other_func;
			$tablet->save();
			return redirect('admin/product/list/tablet');
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
		}else if($type=='laptop'){
			$product = DB::table('products')->join('laptops','products.id','=','laptops.id')->where('products.id',$id)->get();
		}else if($type=='tablet'){
			$product = DB::table('products')->join('tablets','products.id','=','tablets.id')->where('products.id',$id)->get();
		}
		return view('admin.product.detail')->with(['product'=>$product[0],'brand'=>$brand,'imagedetails'=>$imagedetails]);
	}

	public function getDelete($id){
		$product = Product::find($id);
		$type = $product->type;
		$img_detail = 'resources/upload/product/'.$id.'/detail/';
		$imagedetails = $product->imagedetail;
		if(!empty($imagedetails)){
			foreach($imagedetails as $image){
				if(file_exists($img_detail.$image->name))
					unlink($img_detail.$image->name);
				$image->delete();
			}
		}
		$img_folder = 'resources/upload/product/'.$id;
		$img_src = $img_folder.'/'.$product->image;
		if(file_exists($img_src)){
			unlink($img_src);
			rmdir($img_folder.'/detail');
			rmdir($img_folder);
		}
		$product->delete();
		if($type=='mobile'){
			$mobile = Mobile::find($id);
			$mobile->delete();
		}else if($type=='laptop'){
			$laptop = Laptop::find($id);
			$laptop->delete();
		}else if($type=='tablet'){
			$tablet = Tablet::find($id);
			$tablet->delete();
		}
		return redirect('admin/product/list/'.$type);
	}
	public function postDelete(Request $request){
		$array = $request->check;
		if(empty($array)){
			return redirect()->back();
		}
		$type = $request->type;
		foreach($array as $id){
			$product = Product::find($id);

			$img_detail = 'resources/upload/product/'.$id.'/detail/';
			$imagedetails = $product->imagedetail;
			if(!empty($imagedetails)){
				foreach($imagedetails as $image){
					if(file_exists($img_detail.$image->name))
						unlink($img_detail.$image->name);
					$image->delete();
				}
			}
			$img_folder = 'resources/upload/product/'.$id;
			$img_src = $img_folder.'/'.$product->image;
			if(file_exists($img_src)){
				unlink($img_src);
				rmdir($img_folder.'/detail');
				rmdir($img_folder);
			}

			$product->delete();
			if($type=='mobile'){
				$mobile = Mobile::find($id);
				$mobile->delete();
			}else if($type == 'laptop'){
				$laptop = Laptop::find($id);
				$laptop->delete();
			}else if($type=='tablet'){
			$tablet = Tablet::find($id);
			$tablet->delete();
			}
		}
		return redirect('admin/product/list/'.$type);
	}

}
