<!-- 
Project Name: Networking Site v1
Developer: Gary Sundquist
3/18/18
This page is a view for the register user page
 -->
@extends('layouts.default')
@section('content')
<form action = "registerPost" method="POST">
    <center>
    		<h1>Registration Page</h1>
        	<h2>Create Your New Account By Filling Out The Information Below</h2>
        	<fieldset>
            	<p><label><b>Name:</b></label>
                <input type="text" id="Name" name="name" required></p>
            	<p><label><b>Username:</b></label>
                <input type="text" id="UserName" name="userName" required></p>
            	<!--cannot be duplicate of another user-->
				<p><label><b>Password:</b></label>
                <input type="password" id="password" name="password" pattern=".{8,}"   required title="8 characters minimum" required></p>  
             	<p><label><b>Address:</b></label>
                <input type="text" id="address" name="address" required></p>  
                <label for="selectRole">Select Role:</label>
				<select id="selectRole" name="selectRole" style="width:175px; height:25px;">
				@foreach($roles as $role)
					<option value="{{$role->role_id}}">{{$role->role}}</option>
				@endforeach
				</select>		
                {{ csrf_field() }}
        	</fieldset>
        	<h4>Once Complete, Click the Button Below</h4>
        	<td colspan = "2"><button type="Submit">Submit</button></td>
    </center>
</form>
@stop