<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Response;
use Input;
use App\Models\User;
use Validator;
use Hash;
use App;

class UsersController extends Controller
{

	/**
	 *	get
	 *
	 *	Return a user.
	 */
	public function get(Request $request)
	{
		$user = $request->user();
		return [
			"user" => $user,
			"api_token" => $user->api_token
		];
	}

	public function create(Request $request)
	{

		if($this->validateUser(Input::all()))
		{
			$user = new User;
			$user->fill(Input::all());
			$user->password = Hash::make(Input::get('password'));
			$user->api_token = str_random(60);
			$user->save();
			return Response::json($user, 200);
		}
		else
		{
			App::abort(500);
		}

	}

	/**
	 *	validateUser
	 *
	 *	Confirms inputs for User.
	 */
	private function validateUser($input)
	{
		$validator = Validator::make($input, [
			"name" => "required",
			"email" => "required|email|unique:users,email",
			"password" => "required|min:8|max:16"
		]);

		if($validator->fails())
		{
			App::abort(400, $validator->errors());
		}

		return true;

	}

}
