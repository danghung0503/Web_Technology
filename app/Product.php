<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $table = 'products';
	protected $fillable = ['id','id_brand','name','amount','amountsold','price','price_new','image','description'];
}
