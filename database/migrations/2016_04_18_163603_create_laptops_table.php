<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaptopsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('laptops', function(Blueprint $table)
		{

			$table->integer('id');
			$table->primary('id');
			$table->string('CPU_brand');
			$table->string('CPU_tech');
			$table->string('CPU_type');
			$table->string('CPU_rate');
			$table->string('cache');
			$table->string('max_CPU_rate');
			$table->string('chipset');
			$table->string('bus_rate_main');
			$table->string('max_ram_sup');
			$table->string('ram_type');
			$table->integer('ram_track');
			$table->string('ram');
			$table->string('ram_bus_rate');
			$table->string('disk_type');
			$table->string('hard_disk');
			$table->float('screen_width');
			$table->integer('resolution1');
			$table->integer('resolution2');
			$table->string('screen_tech');
			$table->string('touch');
			$table->string('grapic_chip');
			$table->string('grapic_mem');
			$table->string('card_design');
			$table->string('sound_mode');
			$table->string('optical_avail');
			$table->string('optical_type');
			$table->string('lan');
			$table->string('wifi');
			$table->string('bluetooth');
			$table->string('read_mem_card');
			$table->string('read_mem_track');
			$table->float('wc');
			$table->string('wc_info');
			$table->string('battery_capacity');
			$table->string('operating_system');
			$table->string('software_avail');
			$table->float('dimension1');
			$table->float('dimension2');
			$table->float('dimension3');
			$table->float('weight');
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
		Schema::drop('laptops');
	}

}
