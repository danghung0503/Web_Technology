<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageDetail extends Model {

	protected $table='image_details';
	protected $fillable = ['id','name','id_product'];
}
