<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $table = 'products';
	protected $fillable = ['id','id_brand','name','amount','amountsold','price','price_new','image','description'];

	public function imagedetail(){
		return $this->hasMany('App\ImageDetail');
	}

	public function brand(){
		return $this->belongsTo('App\Brand');
	}

	public function order(){
		return $this->hasMany('App\Order');
	}
}
