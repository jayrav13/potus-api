<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\President;
use App\Models\VicePresident;
use Response;

class PresidentsController extends Controller
{

	public function index(Request $request)
	{
		$presidents = President::all();

		for($i = 0; $i < count($presidents); $i++)
		{
			$presidents[$i] = $this->get_vice_presidents($presidents[$i]);
		}

		return Response::json($presidents, 200);
	}

	private function get_vice_presidents($president)
	{
		if($president->end_date != null)
		{
			$president->vice_presidents = VicePresident::where('start_date', '<=', $president->end_date)->where('end_date', '>=', $president->start_date)->where('start_date', '!=', $president->end_date)->where('end_date', '!=', $president->start_date)->get();
		}
		else
		{
			$president->vice_presidents = VicePresident::where('end_date', null)->get();
		}
		return $president;
	}

}
