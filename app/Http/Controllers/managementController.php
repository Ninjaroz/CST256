<?php
/*
 * Project Name: Networking Site v1
 * Developer: Gary Sundquist
 * 3/18/18
 * this is the controller class for users
 */
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\JobPosting;
use App\Models\AffinityGroup;
use Illuminate\Http\Request;

class managementController extends Controller{	

/*
 * 
 * User Management
 * 
 */	
	
//returns admin Management page
public function getAdminManagement(){
		//Gets all user data
		$users = User::all();
		$jobPostings = JobPosting::all();
		$affinityGroups = AffinityGroup::all();
		return view('management.adminManagement',compact('users', 'jobPostings','affinityGroups'));
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
 * Job Posting Management
 * 
 */

//Create job posting
public function createJobPosting(Request $request){
	JobPosting::create(
			['name' => $request->input('newJobPosting'),
			 'description' => $request->input('newJobDescription'),
			 'date' => now(),
			 'url'  => $request->input('url'),
			 'type' => $request->input('type'),
			 'salary' => $request->input('salary')
			]
			);	
	return $this->getAdminManagement();
}

//Delete job posting
public function deleteJobPosting(Request $request){
	$delJob = JobPosting::find($request->input('jobID'));
	$delJob->delete();
	return $this->getAdminManagement();
}

/*
 * 
 * Affinity Group Management
 * 
 * 
 */

//Create a affinity group
public function createAffinityGroup(Request $request){
	AffinityGroup::create(
			['name' => $request->input('name'),
			 'description' => $request->input('description')
 			]);
	return $this->getAdminManagement();
}

//Update affinity group
public function updateAffinityGroup(Request $request){
	AffinityGroup::where('name', $request->name)
	->update(['description' => $request->description]);
	return $this->getAdminManagement();
}

//Returns affinity group description
public function getAffinityGroupDescription(Request $request){
	return AffinityGroup::where('name', $request->name)
	->get();
}


//Delete affinity group
public function deleteAffinityGroup(Request $request){
	$delAffinityGroup = AffinityGroup::find($request->input('name'));
	$delAffinityGroup->delete();
	return $this->getAdminManagement();
}
}