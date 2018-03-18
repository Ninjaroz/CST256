@extends('layouts.default')
@section('content')
<center>
	<form action="verifyUser" method='POST'>
		<fieldset>
			<!--  Checks if user is logged in or not and displays appropriate message -->
			@if(!empty(Session::get('user')))
			@include('userViews.verifyUser')>
			@else
			<legend>Please enter a valid username and password</legend>
			@endif
			<p><label for="Username">Username:</label>
			<input type="text" name="userName" placeholder="Username" size="30"/></p>
			<p><label for="Password">Password:</label>
			<input type="Password" name="password" placeholder="Password" size="30"/></p>
			{{ csrf_field() }}
		</fieldset>
		<button type="Submit">Login</button>
		New? <a href="{{ url('register') }}">Register By Clicking Here!</a>
	</form>
</center>
@stop