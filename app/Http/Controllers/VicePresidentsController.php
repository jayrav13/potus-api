<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VicePresident;
use App\Models\President;
use Response;

class VicePresidentsController extends Controller
{

	public function index(Request $request)
	{
		$vice_presidents = VicePresident::all();

		for($i = 0; $i < count($vice_presidents); $i++)
		{
			$vice_presidents[$i] = $this->get_presidents($vice_presidents[$i]);
		}

		return Response::json($vice_presidents, 200);
	}

	private function get_presidents($vice_president)
	{
		if($vice_president->end_date != null)
		{
			$vice_president->presidents = President::where('start_date', '<=', $vice_president->end_date)->where('end_date', '>=', $vice_president->start_date)->where('start_date', '!=', $vice_president->end_date)->where('end_date', '!=', $vice_president->start_date)->get();
		}
		else
		{
			$vice_president->presidents = President::where('end_date', null)->get();
		}
		return $vice_president;
	}

}
