<!-- 
Project Name: Networking Site v1
Developer: Gary Sundquist
4/19/18
Apply page
 -->
@extends('layouts.default')
@section('content')
<script src="http://code.jquery.com/jquery-1.7.1.min.js">></script>
<script>
	function submit(){
		alert("clicked!");
		$('#FormStatus').html('Application Status: Submitted!');
	}
</script>

<center>
	<h1>Submit your application</h1>
	<fieldset>
		<legend>Application File</legend>
		<input type="file" id="uploadFile">
		<br><br>
		<input type="submit" value="Submit application" onclick="submit()">
	</fieldset>
	<br><br>
	<fieldset>
		  	<legend>Application Form</legend>
		  	<label>Name:</label>
  		  	<input type="text" name="name">
		  	<br><br>
  		  	<input type="submit" value="Submit" onclick="submit()">
  	</fieldset>
	<p id="FormStatus">Application Status: </p>
</center>
@stop