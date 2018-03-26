<!-- 
Project Name: Networking Site v1
Developer: Gary Sundquist
3/18/18
This page is a view for the user to update their profile
 -->
@extends('layouts.default')
@section('content')
@if(!empty(Session::get('user')))
<center>
<form action="updateUserProfile" method='POST'>
		<fieldset>	
			<legend><h1>{{Session::get('user')}} Profile</h1></legend>
			<fieldset>
				<legend><h2>Name</h2></legend>
				<p><label for="name">Name:</label>
				<input type="text" name="name" placeholder="Enter your name here" size="30" value="{{$results->name}}" required title="cannot update profile without a name"/></p>							
			</fieldset>	
			<fieldset>
				<legend><h2>Update Password</h2></legend>
				<p><label for="oldPassword">Current Password:</label>
				<input type="Password" name="oldPassword" placeholder="Old Password" size="30" required title="Required to update profile"/></p>
				<p><label for="newPassword">New Password:</label>
				<input type="Password" name="password" placeholder="New Password" size="30"/></p>							
			</fieldset>
			<fieldset>
				<legend><h2>Email</h2></legend>
				<p><label for="email">Email:</label>
				<input type="text" name="email" placeholder="Enter email here" size="30" value="{{$results->email}}"/></p>							
			</fieldset>	
			<fieldset>
				<legend><h2>Address</h2></legend>
				<p><label for="address">address:</label>
				<input type="text" name="address" placeholder="Enter address here" size="30" value="{{$results->address}}" required title="cannot update profile without address"/></p>							
			</fieldset>
			<fieldset>
				<legend><h2>Background</h2></legend>
				<p><label for="background">background:</label>
				<textarea rows="4" cols="50" name="background" placeholder="Enter background information here">{{$results->background}}</textarea></p>							
			</fieldset>	
			<fieldset>
				<legend><h2>Skills</h2></legend>
				<p><label for="skills">Skills:</label>
				<textarea rows="4" cols="50" name="skills" placeholder="Enter your skills here">{{$results->skills}}</textarea></p>							
			</fieldset>				
			{{ csrf_field() }}
		</fieldset>
		<button type="Submit">Update</button>
</form>
@else
	@include('userViews.login')
@endif	
</center>
@stop