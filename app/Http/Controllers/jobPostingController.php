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
use Session;

class jobPostingController extends Controller{

	public function getjobPosting(){
		return view('jobViews.jobSearch');
	}
	//returns jobs where the name or description is similar to user search
	public function displayJobPostings(Request $request){
		if($request->search!= null){
			$jobs=jobPosting::where('name', 'like', '%'.$request->search.'%')
			->orWhere('description', 'like', '%'.$request->search.'%')
			->orderBy($request->searchBy, $request->searchByOrder)
			->get();
			return $jobs;
		}
	}
	
	public function getTestJob(){
		$job=jobPosting::where('url', '=', "/testJob");
		return view('jobViews.testJob', compact('job'));
	}
	
	//adds jobs to the job cart
	public function addToJobCart(Request $request){
		$job = $request->job;
		Session::push('jobCart', $job);
	}
		
	//view job cart page
	public function viewJobCart(){
		//get jobs info to pass to jobCart page
		$jobs = array();
		if (session()->has('jobCart')){
			foreach(session()->get('jobCart') as $jobId){
				$job = jobPosting::where('idjob_posting', '=', $jobId)
				->get();
				array_push($jobs,$job);
			}
			return view('jobViews.jobCart', compact('jobs'));	
		}
		return view('jobViews.jobCart');
	}
	
	//apply for job
	public function apply(Request $request){
		return view('jobViews.apply');
	}
}