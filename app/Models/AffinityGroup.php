<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffinityGroup extends Model
{
	//Defining user table
	protected $table = 'affinity_group';
	protected $fillable = ['name','description'
	];
	public $timestamps = false;
	
	//Setting primarykey and setting incrementing to false
	protected $primaryKey = 'name';
	public $incrementing = false;
}