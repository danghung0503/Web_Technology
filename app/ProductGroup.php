<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model {
	protected $table = 'product_groups';
	protected $fillable = ['id','name'];

	public $timestamps = false;
}
