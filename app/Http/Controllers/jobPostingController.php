<?php
/*
 * Project Name: Networking Site v1
 * Developer: Gary Sundquist
 * 4/8/18
 * this is the controller class for job postings
 */
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\JobPosting;
use Illuminate\Http\Request;

class jobPostingController extends Controller{

	public function getjobPosting(){
		return view('jobViews.jobSearch');
	}
	//returns jobs where the name or description is similar to user search
	public function displayJobPostings(Request $request){
		if($request->search!= null){
			$jobs=jobPosting::where('name', 'like', '%'.$request->search.'%')
			->orWhere('description', 'like', '%'.$request->search.'%')
			->get();
			return $jobs;
		}
	}
	
	public function getTestJob(){
		$job=jobPosting::where('url', '=', "/testJob");
		return view('jobViews.testJob', compact('job'));
	}
}