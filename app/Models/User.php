<?php

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
