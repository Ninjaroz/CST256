<!-- 
Project Name: Networking Site v1
Developer: Gary Sundquist
3/18/18
This page is a view for the failed login page
 -->
 
@extends('layouts.default')
@section('content')
<center>
	<form action="verifyUser" method='POST'>
		<fieldset>
			<!--  Checks if user is logged in or not and displays appropriate message -->
			@if(!empty(Session::get('user')))
			@include('userViews.verifyUser')>
			@else
			<legend style ="color: red;">Please enter a valid username and password</legend>
			@endif
			<p><label for="Username">Username:</label>
			<input type="text" name="userName" placeholder="Username" size="30"/></p>
			<p><label for="Password">Password:</label>
			<input type="Password" name="password"  placeholder="Password" size="30"/></p>
			{{ csrf_field() }}
		</fieldset>
		<button type="Submit">Login</button>
		New? <a href="{{ url('register') }}">Register By Clicking Here!</a>
	</form>
</center>
@stop