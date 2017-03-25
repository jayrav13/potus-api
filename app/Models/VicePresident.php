<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VicePresident extends Model
{

	protected $table = 'vice_presidents';

	protected $fillable = [
		'name',
		'image',
		'number',
		'previous_office',
		'party_affiliation',
		'start_date',
		'end_date'
	];

}
