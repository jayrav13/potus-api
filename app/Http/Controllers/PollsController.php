<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poll;
use Response;
use Input;
use App\Libraries\Polls\Gallup;

class PollsController extends Controller
{

	public function index(Request $request)
	{
		$output = [
			"live" => [],
			"recent" => Poll::with('president')->get()
		];

		if(Input::has('live') && Input::get('live') == 'true')
		{
			$output["live"] = [
				"gallup" => Gallup::scrape()
			];
		}

		return Response::json($output, 200);

	}

}
