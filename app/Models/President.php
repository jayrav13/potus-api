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

	public function cabinet_members()
	{
		return $this->hasMany('App\Models\CabinetMember', 'president_id', 'id');
	}

	public function polls()
	{
		return $this->hasMany('App\Models\Poll', 'president_id', 'id');
	}

	public function document_types()
	{
		return $this->hasMany('App\Models\DocumentType', 'president_id', 'id');
	}

}
