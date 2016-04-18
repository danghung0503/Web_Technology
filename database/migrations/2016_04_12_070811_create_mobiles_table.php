<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mobiles', function(Blueprint $table)
		{
			$table->integer('id_product');
			$table->primary('id_product');
			$table->string('screen_tech');
			$table->integer('resolution1');
			$table->integer('resolution2');
			$table->integer('screen_width');
			$table->string('touch');//chọn
			$table->integer('back_cam');//chọn
			$table->string('back_cam_type');//chọn
			$table->string('flash');//chọn
			$table->integer('front_cam');//Chọn
			$table->string('front_cam_type');//chọn
			$table->string('film_shoot');
			$table->string('video_call');//chọn
			$table->string('operating_system');
			$table->integer('core_amount');//chọn
			$table->string('proccesor');
			$table->string('CPU_rate');
			$table->string('ram');//chọn
			$table->string('internal_memory');//chọn
			$table->string('mem_support');//chọn
			$table->string('mem_support_max');
			$table->string('sup_2g');
			$table->string('sup_3g');
			$table->string('sup_4g');
			$table->integer('sim_track');//chọn
			$table->string('sim_type');//chọn
			$table->string('wifi');
			$table->integer('battery_capacity');
			$table->string('battery_type');
			$table->integer('dimension1');
			$table->integer('dimension2');
			$table->integer('dimension3');
			$table->integer('weight');
			$table->string('bluetooth');
			$table->string('nfc');//chọn
			$table->string('record');//chọn
			$table->string('radio');//chọn
			$table->string('design');//chọn
			$table->string('color');
			$table->string('material');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mobiles');
	}

}
