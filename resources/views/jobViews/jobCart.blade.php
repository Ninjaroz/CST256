<!-- 
Project Name: Networking Site v1
Developer: Gary Sundquist
4/19/18
Job Cart page
 -->
@extends('layouts.default')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>

function removeJob(jobID){
	$.ajax({
	  	type: 'POST',
	  	url: "removeFromJobCart",
	  	data: {
		  	   '_token': $('meta[name=csrf-token]').attr('content'),
		  	   jobID: jobID
			   },	
	  		success: function(){  		  	

	  		}
    	});
}


</script>
<center>
    <table id="jobsTable">
		<thead>
    		<tr>
    			<th style="padding-right:15px;">Job Title</th>
    			<th style="padding-right:15px;">Job Description</th>
    			<th style="padding-right:15px;">Apply</th>
    			<th style="padding-right:15px;">Remove</th>
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
    			<td><button onclick="removeJob({{$job[0]->idjob_posting}})">Remove Job</button></td>
    		@endforeach
    	@else
    		
    		<p>There are no jobs in your cart!</p>
    	@endif
    	</tr>
    </table>
</center>
@stop