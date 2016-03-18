<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model {

	protected $table = 'brands';
	protected $fillable = ['id','name','logo','country','description','id_productgroup'];

	public function product(){
		return $this->hasMany('App\Product');
	}

	public function productgroup(){
		return $this->belongsTo('App\ProductGroup');
	}

}
