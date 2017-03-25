<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

class GenericController extends Controller
{

	public function heartbeat(Request $request)
	{
		return Response::json(['success' => true], 200);
	}

}
