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
			if($vice_presidents[$i]->end_date != null)
			{
				$vice_presidents[$i]->presidents = President::where('start_date', '<=', $vice_presidents[$i]->end_date)->where('end_date', '>=', $vice_presidents[$i]->start_date)->where('start_date', '!=', $vice_presidents[$i]->end_date)->where('end_date', '!=', $vice_presidents[$i]->start_date)->get();
			}
			else
			{
				$vice_presidents[$i]->presidents = President::where('end_date', null)->get();
			}
		}

		return Response::json($vice_presidents, 200);
	}

}
