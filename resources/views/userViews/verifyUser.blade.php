@extends('layouts.default')
@section('content')

<!--  Checks if a valid user is signing in and displays  -->
<!-----------  appropriate error message  ----------------->
<center> 
@if(!empty(Session::get('user')))
<fieldset>
	<legend>Successful login</legend>
	<p>You are logged in as: {{ Session::get('user')}}</p>
	<p><a href="{{ url('logout') }}">Log out</a></p>
	<a href="userspage.php">Continue to your Dashboard</a>
</fieldset>
@else 
	@include('userViews.failedLogin')
</center>
@endif	
@stop 