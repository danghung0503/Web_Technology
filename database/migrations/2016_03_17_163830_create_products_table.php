<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_brand')->unsigned();
			$table->foreign('id_brand')->references('id')->on('brands')->onDelete('cascade');
			$table->string('name');
			$table->string('amount');
			$table->string('amountsold');
			$table->integer('price');
			$table->integer('price_new');
			$table->string('image');
			$table->text('description');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
