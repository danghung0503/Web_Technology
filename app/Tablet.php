<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tablet extends Model {

	protected $table = 'tablets';
	protected $fillable = ['id','screen_tech','resolution1','resolution2','screen_width','back_cam',
	'film_shoot','cam_feat','front_cam','operating_system','proccesor','CPU_rate','graphic_chip','ram'
	,'internal_memory','remain_memory','mem_support','mem_support_max','sensor','sim_track','sim_type',
	'sup_3g','sup_4g','wifi','bluetooth','gps','connector','headphone','otg','other_connect','record',
	'radio','material','dimension1','dimension2','dimension3','weight','battery_type','other_func'];
	public $timestamps = false;
}
