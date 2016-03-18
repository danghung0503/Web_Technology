<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {

	$table = 'customers';
	$fillable = ['id','fullname','email','phonenumber','address','gender'];
	public $timestamps = false;
}
