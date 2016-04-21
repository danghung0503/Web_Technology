<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobile extends Model {

	protected $table = 'mobiles';
	protected $fillable = ['id','screen_tech','resolution1','resolution2','screen_width',
	'touch','back_cam','back_cam_type','flash','front_cam','front_cam_type','film_shoot','video_call',
	'operating_system','core_amount','proccesor','CPU_rate','ram','internal_memory','mem_support','mem_support_max',
	'sup_2g','sup_3g','sup_4g','sim_track','sim_type','wifi','battery_capacity','battery_type','dimension1','dimension2',
	'dimension3','weight','bluetooth','record','radio','design','material','touch_glass','photo_advance','grapic_chip'
	,'remain_memory','gps','connector','other_connect','watch_movie','listen_music','other_func','headphone'];
	public $timestamps = false;
}
