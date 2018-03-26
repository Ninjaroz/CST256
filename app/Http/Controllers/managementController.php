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

class managementController extends Controller{	

/*
 * 
 * Admin Panel 
 * 
 */	
	
//returns admin Management page
public function getAdminManagement(){
		//Gets all user data
		$users = User::all();
		return view('management.adminManagement')->with('users', $users);
}

public function deleteUser(Request $request){
	$delUser = User::find($request->input('userName'));
	if ($request->input('userName') != session('user')){
	$delUser->delete();
	}
	return $this->getAdminManagement();
}

public function suspendUser(Request $request){
	User::where('userName', $request->input('userName'))
		->update(['enabled' => 0]);
	return $this->getAdminManagement();
}

/*
 * 
 * 
 * 
 */

}