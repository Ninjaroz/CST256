<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request as Request;
use App\Models\User;

class userController extends Controller{
	
	/*
	 * Verifies user credentials and adds
	 * user to session
	 * 
	 * @param Request
	 * @return response
	 */
	public static function loginAuth(Request $request){
		$results = DB::table('users')
		->where('userName',$request->input('userName'))
		->where('password', $request->input('password'))->count();
		if ($results>0){
			session(['user' => $request->input('userName')]);
			return true;
		}else{
			session(['user' => null]);
			return false;
		}
	}
	
	//removes user from session
	public static function logoutAuth(){
		session(['user' => null]);
	}
		
	//Registers user
	public static function registerUser(Request $request){
					$user = User::create(
		 			['name' => $request->input('name'),
		 			'userName' => $request->input('userName'),
		 			'password' => $request->input('password'),
		 			'fk_role_id' => 1,
		 			'address' => $request->input('address')]
		 			);				
	}
	
	//Checks if a user exists
	public static function checkUser(Request $request){
		$user = User::where('userName', '=', $request->input('userName'))->first();
		if ($user != null){
			return true;
		}else return false;
	}
}