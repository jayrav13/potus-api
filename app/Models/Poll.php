<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{

	protected $table = 'polls';

	protected $fillable = [
		'polling_group',
		'approval',
		'disapproval',
		'unsure',
		'net',
		'sample_size',
		'population',
		'start_date',
		'end_date',
	];

	public function president()
	{
		return $this->belongsTo('App\Models\President', 'president_id', 'id');
	}

}
