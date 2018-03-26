<!-- 
Project Name: Networking Site v1
Developer: Gary Sundquist
3/21/18
This page is a view for the admininstrator management of users
 -->
@extends('layouts.default')
@section('content')

<center>
<fieldset>    
    	<h2>User Profile Management</h2>   
		<form>
        	<table>
            	<tr>
            		<th><label style="margin-right:25px;">User Name</label></th>
            		<th><label>Delete User</label></th>
            		<th><label>Suspend User</label></th>
            	</tr>
               	@foreach($users as $user)
               		<tr>
                    	<th><label style="margin-right:25px;">{{$user->userName}}</label></th>
                    	<th>
                    		<form action="adminManagementDeleteUser" method="post">
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
        	<p id="userDeleted"></p>
        	<p id="userSuspended"></p>
        </form>
</fieldset>
</center>

@stop