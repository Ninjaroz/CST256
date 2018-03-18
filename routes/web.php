
<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
Project Name: Networking Site v1
Developer: Gary Sundquist
3/18/18
This is the web routes class that handles all page view routing
*/
use Illuminate\Http\Request as Request;
use App\Http\Controllers\user\userController;

//Shows the home page
Route::get('/', function () {
	//shows the login page (resources/views/home.blade.php)
	return View::make('home');
});

//Shows the login page
Route::get('login', function () {
		//shows the login page (resources/views/userAuth/login.blade.php)
		return View::make('userViews.login');
});

//Shows verifyUser page
Route::post('verifyUser', function (Request $request) {
		//Adds user to session
		userController::loginAuth($request);
		//shows the verifyUser page (resources/views/userAuth/verifyUser.blade.php)
		return View::make('userViews.verifyUser');
});

//Shows the logout page
Route::get('logout', function () {
		//removes user from session
		userController::logoutAuth();
		//shows the logout page (resources/views/userAuth/logout.blade.php)
		return View::make('userViews.logout');
});

//User registration page
Route::get('register', function(){
		return View::make('userViews.registerUser');
});

//Confim registration page

Route::post('registerPost', function(Request $request){
		if (!userController::checkUser($request)){
		userController::registerUser($request);
		userController::loginAuth($request);
		return View::make('userViews.userRegistered');
		}else{ 
		return View::make('userViews.registerUserFailed');
		}
		
});

?>