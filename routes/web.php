
<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
Project Name: Networking Site v1
Developer: Gary Sundquist
4/22/18
This is the web routes class that handles all page view routing
*/

use App\Http\Controllers\userController;
use App\Http\Controllers\managementController;
use App\Http\Controllers\jobPostingController;

//Shows the home page
Route::get('/', function () {
	//shows the login page (resources/views/home.blade.php)
	return View::make('home');
});

/*
 * 
 * USERCONTROLLER
 * 
 */

//shows the login page (resources/views/userViews/login.blade.php)
Route::get('login', 'userController@getLogin');

//Shows verifyUser page (resources/views/userViews/verifyUser.blade.php)
Route::post('verifyUser', 'userController@loginAuth');

//shows the logout page (resources/views/userViews/logout.blade.php)
Route::get('logout', 'userController@userLogout');

//User registration page (resources/views/userViews/registerUser.blade.php)
Route::get('register', 'userController@getRegister');

//Confim registration page (resources/views/userViews/userRegistered.blade.php)
Route::post('registerPost', 'userController@registerUser');

//User profile page (resources/views/userViews/userProfile.blade.php)
Route::get('userProfile', 'userController@getUserProfile');

//Updates user profile and posts back to user profile page
Route::post('updateUserProfile', 'userController@updateUserProfile');

/*
 * 
 * MANAGEMENTCONTROLLER
 * 
 */

//Admin management page (resources/views/management/adminManagement.blade.php)
Route::get('adminManagement', 'managementController@getAdminManagement');

Route::post('adminManagementDeleteUser', 'managementController@deleteUser');

Route::post('adminManagementSuspendUser', 'managementController@suspendUser');

Route::post('adminManagementCreateJobPosting', 'managementController@createJobPosting');

Route::post('adminManagementDeleteJobPosting','managementController@deleteJobPosting');

Route::post('adminManagementDeleteAffinityGroup', 'managementController@deleteAffinityGroup');

Route::post('adminManagementCreateAffinityGroup', 'managementController@createAffinityGroup');

Route::post('adminManagementUpdateAffinityGroup', 'managementController@updateAffinityGroup');

/*
 * 
 * Job Search
 * 
 */

Route::get('jobPostings', 'jobPostingController@getjobPosting');

Route::post('jobPostingsSearch', 'jobPostingController@displayJobPostings');

Route::get('testJob','jobPostingController@getTestJob');

Route::post('addToJobCart', 'jobPostingController@addToJobCart');

/*
 * 
 * Job Cart
 *  
 */

Route::get('jobCart', 'jobPostingController@viewJobCart');

Route::get('apply','jobPostingController@apply');

?>