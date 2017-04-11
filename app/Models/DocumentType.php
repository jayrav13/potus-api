<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{

	protected $table = 'document_types';

	protected $fillable = [
		"name",
		"slug"
	];

	public function documents()
	{
		return $this->hasMany('App\Models\Document', 'document_type_id', 'id');
	}

	public function president()
	{
		return $this->belongsTo('App\Models\President', 'president_id', 'id');
	}

}

