<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $table = 'products';
	protected $fillable = ['id','id_brand','type','name','keywords','amount','amountsold','price','price_new','image','description'];

	public function imagedetail(){
		return $this->hasMany('App\ImageDetail','id_product');
	}
	public function mobile(){
		return $this->hasOne('App\Mobile','id');
	}
	public function brand(){
		return $this->belongsTo('App\Brand');
	}

	public function order(){
		return $this->hasMany('App\Order');
	}
}
