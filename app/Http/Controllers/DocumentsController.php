<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Response;
use Input;
use App;

class DocumentsController extends Controller
{

	public function index(Request $request)
	{
		if(!Input::has('q'))
		{
			App::abort(400, "Include HTTP parameter 'q' to search text.");
		}
		$documents = Document::where('title', 'like', '%' . Input::get('q') . '%');
		return Response::json($documents, 200);
	}

}
