@extends('layouts.default')
@section('content')
<center>
		<fieldset>
		<p>User: {{ Session::get('user')}}  has been successfully registered.</p>
		</fieldset>
</center>
@stop