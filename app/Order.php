<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

	protected $table = 'orders';
	protected $fillable = ['id_customer','id_product','amount'];

	public function customer(){
		return $this->belongsTo('App\Customer');
	}

	public function product(){
		return $this->belongsTo('App\Product');
	}
}
