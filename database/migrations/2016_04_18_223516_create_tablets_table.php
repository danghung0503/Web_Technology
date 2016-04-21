<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabletsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tablets', function(Blueprint $table)
		{
			$table->integer('id');
			$table->primary('id');
			$table->string('screen_tech');
			$table->integer('resolution1');
			$table->integer('resolution2');
			$table->float('screen_width');
			$table->integer('back_cam');//chọn
			$table->string('film_shoot');
			$table->string('cam_feat');//chọn
			$table->float('front_cam');//Chọn
			$table->string('operating_system');
			$table->string('proccesor');
			$table->string('CPU_rate');
			$table->string('graphic_chip');
			$table->string('ram');//chọn
			$table->string('internal_memory');//chọn
			$table->string('remain_memory');//chọn
			$table->string('mem_support');//chọn
			$table->string('mem_support_max');
			$table->string('sensor');
			$table->integer('sim_track');//chọn
			$table->string('sim_type');//chọn
			$table->string('sup_3g');
			$table->string('sup_4g');
			$table->string('wifi');
			$table->string('bluetooth');
			$table->string('gps');//chọn
			$table->string('connector');
			$table->float('headphone');
			$table->string('otg');
			$table->string('other_connect');
			$table->string('record');//chọn
			$table->string('radio');//chọn
			$table->string('material');
			$table->integer('dimension1');
			$table->integer('dimension2');
			$table->integer('dimension3');
			$table->integer('weight');
			$table->string('battery_type');
			$table->string('other_func');
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
		Schema::drop('tablets');
	}

}
