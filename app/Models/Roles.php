<?php
/*
 * Project Name: Networking Site v1
 * Developer: Gary Sundquist
 * 3/20/18
 * This is the model for the user table
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model 
{
	//Defining role table
	protected $table = 'role';
	protected $fillable = ['role_id','role'];
	public $timestamps = false;
	
	//Setting primarykey and setting incrementing to true
	protected $primaryKey = 'role_id';
	public $incrementing = true;	
}
