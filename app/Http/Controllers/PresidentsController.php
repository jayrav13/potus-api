<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\President;
use Response;

class PresidentsController extends Controller
{

	public function index(Request $request)
	{
		$presidents = President::all();
		return Response::json($presidents, 200);
	}

}
