<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CabinetMember extends Model
{

	protected $table = 'cabinet_members';

	protected $fillable = [
		"name",
		"permalink",
		"start_date",
		"end_date",
		"url",
		"department_url",
		"department_name",
		"years"
	];

	public function president()
	{
		return $this->belongsTo('App\Models\President', 'president_id', 'id');
	}

}
