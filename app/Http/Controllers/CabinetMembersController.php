<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\President;
use Response;
use App;

class CabinetMembersController extends Controller
{

	public function presidents(Request $request, $number)
	{
		$president = President::where('number', $number)->first();
		return Response::json($president->cabinet_members, 200);
	}

}
