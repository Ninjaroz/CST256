<?php
/*
 * Project Name: Networking Site v1
 * Developer: Gary Sundquist
 * 3/18/18
 * This is the model for the user table
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	//Defining user table
	protected $table = 'users';
	protected $fillable = ['userName', 'password','name','fk_role_id','address'];
	protected $keyType = 'String';
	public $timestamps = false;
	
	//Setting primarykey and setting incrementing to false
	protected $primaryKey = 'userName';
	public $incrementing = false;
}
