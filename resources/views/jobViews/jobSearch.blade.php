<!-- 
Project Name: Networking Site v1
Developer: Gary Sundquist
4/7/18
Job seach page
 -->
 
@extends('layouts.default')
@section('content')

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script>
 $(document).ready(function(){
	    $("input").keyup(function(){
	        var txt = $("input").val();
	        $.post("jobPostingsSearch", {'_token': $('meta[name=csrf-token]').attr('content'), search: txt}, function(result){
				var numOfJobs = 0;
	        	var tBody = $("#jobsTable tbody");
	        	//Clears any existing row data
	        	tBody.empty();
	        	for(numOfJobs; numOfJobs<result.length; numOfJobs++){
		        	var row = $("<tr>");
		        	//adds data from result to row
	        		$("<td/>", {text: result[numOfJobs].name}).appendTo(row);
	        		$("<td/>", {text: result[numOfJobs].description.substring(0,4)+"..."}).appendTo(row);
	        		$("<td><a href='"+result[numOfJobs].url+"'>Job page</a></td>").appendTo(row);	
					//appends row to table body
					row.appendTo(tBody);
	        	}
		        });
	    });
	    
	});
 </script>

	<center>
    <h1>Job Search page</h1>
    <input type="text">
    <!--  results of search -->
    <table id="jobsTable">
		<thead>
    		<tr>
    			<th style="padding-right:15px;">Job Title</th>
    			<th style="padding-right:15px;">Job description</th>
    			<th>Job Page</th>
    		</tr>
    	</thead>
    	<tr>
    	<!-- Data from ajax input keyup will populate here -->
    	</tr>
    </table>
    </center>
@stop