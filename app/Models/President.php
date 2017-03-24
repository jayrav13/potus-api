<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class President extends Model
{

	protected $table = 'presidents';

	protected $fillable = [
		'name',
		'image',
		'number',
		'previous_office',
		'presidency_url',
		'party_affiliation',
		'start_date',
		'end_date'
	];

}
