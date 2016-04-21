<?php namespace App;

use Illuminate\Database\Eloquent\Model;
class AccessoryType extends Model {

	protected $table = 'accessory_types';
	protected $fillable = ['id','name','image'];
	public $timestamps = false;
}
