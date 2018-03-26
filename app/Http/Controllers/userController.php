<?php
/*
 * Project Name: Networking Site v1
 * Developer: Gary Sundquist
 * 3/18/18
 * this is the controller class for users
 */
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;

class userController extends Controller{

/*
 * 
 * Login / Logout
 * 
 */
	
	public function getLogin(){
		return view('userViews.login');
	}
		
	public function loginAuth(Request $request){
		$results = DB::table('users')
		->where('userName',$request->input('userName'))
		->where('password', $request->input('password'))
		->first();
		if (isset($results)){
			session(['user' => $results->userName]);
			session(['userPermissions' => $results->fk_role_id]);
			return view('userViews.verifyUser');
		}else{
			session(['user' => null]);
			return view('userViews.failedLogin');
		}
	}
	
	//removes user from session
	public function userLogout(){
		session(['user' => null]);
		return view('userViews.logout');
	}
		
/*
 * 
 * user Registration
 * 
 */	
		
	//Registers user
	public function registerUser(Request $request){
		//checks if user already exists
		if (!$this->checkUser($request)){
					$user = User::create(
		 			['name' => $request->input('name'),
		 			'userName' => $request->input('userName'),
		 			'password' => $request->input('password'),
		 			'fk_role_id' => $request->input('selectRole'),
		 			'address' => $request->input('address'),
		 			'enabled' => 1]
		 			);	
					$this->loginAuth($request);
					return view('userViews.userRegistered');
		}else{
			//Gets all Roles data for combobox
			$roles = Roles::all();
			return view('userViews.registerUserFailed')->with('roles',$roles);
		}
	}
	
	//Checks if a user exists
	public function checkUser(Request $request){
		$user = User::where('userName', '=', $request->input('userName'))->first();
		if (isset($user)){
			return true;
		}else{ 
			return false;
		}
	}

	//returns register page
	public function getRegister(){
		//Gets all Roles data for combobox
		$roles = Roles::all();
		return view('userViews.registerUser')->with('roles',$roles);
	}

	
/*
 * 
 * userProfile
 * 
 */	
		
	//returns user profile page
	public function getUserProfile(){
		$results = DB::table('users')
		->where('userName', Session('user'))
		->first();
		if (isset($results)){
			return view('userViews.userProfile')->with('results',$results);
		}else{
		//if we cannot pull up user data to load profile page
		return view('userViews.failedLogin');
		}
	}
	
	//Check user credentials
	public function checkUserCredentials(Request $request){
		$user = User::where('userName', Session('user'))
					->where('password', $request->input('oldPassword'))
					->first();
		if (isset($user)){
			return true;
		}else{
			return false;
		}
	}
	
	//Updates user profile
	public function updateUserProfile(Request $request){
		//validates user crednetials were inputted before allowing update
		if ($this->checkUserCredentials($request)){
			if ($request->input('password') == ''){
				DB::table('users')
					->where('userName', Session('user'))
					->update(['name' => $request->input('name'),
							'email' => $request->input('email'),
							'address' => $request->input('address'),
							'background' => $request->input('background'),
							'skills' => $request->input('skills')]);
			}else{
				DB::table('users')
					->where('userName', Session('user'))
					->update(['name' => $request->input('name'),
							'password' => $request->input('password'),
							'email' => $request->input('email'),
							'address' => $request->input('address'),
							'background' => $request->input('background'),
							'skills' => $request->input('skills')]);
			}
			return $this->getUserProfile();
		}else{
			//If we cannot validate user password provided it reloads page
			return $this->getUserProfile();
		}
	}

}