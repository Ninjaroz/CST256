<?php
/*
 * Project Name: Networking Site v1
 * Developer: Gary Sundquist
 * 3/30/18
 * This is the model for the user table
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
	//Defining user table
	protected $table = 'job_posting';
	protected $fillable = ['idjob_posting','name','description','date',
			  'salary','type'];
	public $timestamps = false;
	
	//Setting primarykey and setting incrementing to true
	protected $primaryKey = 'idjob_posting';
	public $incrementing = true;
}
