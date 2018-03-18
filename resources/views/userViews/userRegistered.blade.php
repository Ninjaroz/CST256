<!-- 
Project Name: Networking Site v1
Developer: Gary Sundquist
3/18/18
This page is a view for when the user is successfully registered
 -->
@extends('layouts.default')
@section('content')
<center>
		<fieldset>
		<p>User: {{ Session::get('user')}}  has been successfully registered.</p>
		</fieldset>
</center>
@stop