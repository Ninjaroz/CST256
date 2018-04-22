<!-- 
Project Name: Networking Site v1
Developer: Gary Sundquist
4/19/18
Job Cart page
 -->
@extends('layouts.default')
@section('content')

<center>
    <table id="jobsTable">
		<thead>
    		<tr>
    			<th style="padding-right:15px;">Job Title</th>
    			<th style="padding-right:15px;">Job Description</th>
    			<th style="padding-right:15px;">Apply</th>
    		</tr>
    	</thead>
    	<tr>
    	<!-- Display each item in job cart -->
    	@if (!empty($jobs))
    		@foreach ($jobs as $job)
    			<tr>
    			<td>{{$job[0]->name}}</td>
    			<td>{{$job[0]->description}}</td>
    			<td><a href="apply">Apply</a></td>
    		@endforeach
    	@else
    		
    		<p>There are no jobs in your cart!</p>
    	@endif
    	</tr>
    </table>
</center>
@stop