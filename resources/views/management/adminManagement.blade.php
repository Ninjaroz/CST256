<!-- 
Project Name: Networking Site v1
Developer: Gary Sundquist
3/31/18
This page is a view for the admininstrator management of users
 -->
@extends('layouts.default')
@section('content')

<script>

	//delete user validation
	function ValidateDeleteUser(){
		if (window.confirm("Are you sure you want to delete this user?")){
				return true;
		}else{
				return false;
		}
	};
	
</script>

<center>  
        	<table>
        		<caption><h2>User Management</h2></caption>
            	<tr>
            		<th><label style="margin-right:25px;">User Name</label></th>
            		<th><label>Delete User</label></th>
            		<th><label>Suspend User</label></th>
            	</tr>
               	@foreach($users as $user)
               		<tr>
                    	<th>
                    		<label style="margin-right:25px;">{{$user->userName}}</label>
                    	</th>
                    	<th>
                    	    <form name = "confirmDelUser" action="adminManagementDeleteUser" onsubmit="return ValidateDeleteUser()" method="post">
    							<input type="hidden" name="userName" value="{{$user->userName}}" />
    							{{ csrf_field() }}
    							<button>Delete User</button>
							</form>
						</th>              
               			<th>
               				<form action="adminManagementSuspendUser" method="post">
    							<input type="hidden" name="userName" value="{{$user->userName}}" />
    							{{ csrf_field() }}
    							<button>Suspend User</button>
							</form>
               			</th> 
               		</tr>
               	@endforeach
            	{{ csrf_field() }}
        	</table>
        	       	      	
        	<table>
        		<caption><h2>Job Posting Management</h2></caption>
            	<tr>
            		<th><label style="margin-right:25px;">Job Posting</label></th>
            		<th><label>Delete Job Posting</label></th>
            	</tr>
               	@foreach($jobPostings as $jobPosting)
               		<tr>
                    	<th><label style="margin-right:25px;">{{$jobPosting->name}}</label></th>
                    	<th>
                    		<form action="adminManagementDeleteJobPosting" method="post">
    							<input type="hidden" name="jobID" value="{{$jobPosting->idjob_posting}}" />
    							{{ csrf_field() }}
    							<button>Delete Job Posting</button>
							</form>
						</th>                
               		</tr>
               	@endforeach
            	{{ csrf_field() }}
        	</table>
        	
        	<fieldset>
        		<legend><h2>New Job Posting</h2></legend>
        		<form action="adminManagementCreateJobPosting" method="post">
        			<p><label for="newJobPosting">Name:</label>
					<input type="Text" name="newJobPosting" placeholder="Job name" size="30"/></p>
        			<p><label for="newJobDescription">Description:</label>
					<textarea rows="4" cols="50" name="newJobDescription" placeholder="Enter your job description here"></textarea></p>
    				{{ csrf_field() }}
    				<button>Create Job Posting</button>
				</form>
        	</fieldset>      	
</center>

@stop