<?php $__env->startSection('content'); ?>
<form action = "/CLC Registration and Login Pages/Handlers/RegisterHandler.php" method="post">
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
                <input type="text" id="password" name="password" required></p>  
             	<p><label><b>Address:</b></label>
                <input type="text" id="address" name="address" required></p>  
        	</fieldset>
        	<h4>Once Complete, Click the Button Below</h4>
        	<td colspan = "2"><input type="submit" value="Submit" /></td>
    </center>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>