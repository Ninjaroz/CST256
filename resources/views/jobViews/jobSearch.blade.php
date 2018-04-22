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
	        var searchBy = $("#searchBy").val();
	        var searchByOrder = $("#searchOrderBy").val();
	        $.post("jobPostingsSearch", {'_token': $('meta[name=csrf-token]').attr('content'), search: txt, searchBy: searchBy, searchByOrder: searchByOrder}, function(result){
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
	        		$("<td><button type='button' value='"+result[numOfJobs].idjob_posting+"' onclick='addToJobCard(this)'>Add to cart</td>").appendTo(row);
					//appends row to table body
					row.appendTo(tBody);
	        	}
		        });
	    });
	    
	});

	function addToJobCard(objButton){
		alert("clicked! "+ objButton.value);
		$.ajax({
	  	type: 'POST',
	  	url: "addToJobCart",
	  	data: {
		  	   '_token': $('meta[name=csrf-token]').attr('content'),
		  	   job: objButton.value
			   },	
	  		success: function(){  		  	

	  		}
    	});
	}
 </script>

	<center>
    <h1>Job Search page</h1>
    <input type="text">
    <select id="searchBy">
    	<option value="date" selected="selected">Date</option>
    	<option value="salary">Salary</option>
    	<option value="pTime">Part Time</option>
    	<option value="fTime">Full Time</option>
    	<option value="remote">Remote</option>
    </select id="searchByOrder">
        <select id="searchOrderBy">
    	<option value="asc" selected="selected">Ascending</option>
    	<option value="desc">Descending</option>
    </select>
    <!--  results of search -->
    <table id="jobsTable">
		<thead>
    		<tr>
    			<th style="padding-right:15px;">Job Title</th>
    			<th style="padding-right:15px;">Job Description</th>
    			<th style="padding-right:15px;">Job Page</th>
    			<th>Add To Job Cart</th>
    		</tr>
    	</thead>
    	<tr>
    	<!-- Data from ajax input keyup will populate here -->
    	</tr>
    </table>
    </center>
@stop