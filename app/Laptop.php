<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Laptop extends Model {

		protected $table = 'laptops';
	protected $fillable = ['id','CPU_brand','CPU_tech','CPU_type','CPU_rate','cache','max_CPU_rate',
							'chipset','bus_rate_main','max_ram_sup','ram_type','ram_track','ram',
							'ram_bus_rate','disk_type','hard_disk','screen_width','resolution1',
							'resolution2','screen_tech','touch','grapic_chip','grapic_mem','card_design',
							'sound_mode','optical_avail','optical_type','lan','wifi','bluetooth',
							'read_mem_card','read_mem_track','wc','wc_info','battery_capacity',
							'operating_system','software_avail','dimension1','dimension2','dimension3',
							'weight','material'];
	public $timestamps = false;
}
