<?php $__env->startSection('content'); ?>
<center>
	<form action="login.php" method="post">
		<fieldset>
			<legend>Login Now!</legend>
			<p><label for="Username">Username:</label>
			<input type="text" name="Username" placeholder="Username" size="30"/></p>
			<p><label for="Password">Password:</label>
			<input type="Password" name="Password" placeholder="Password" size="30"/></p>
		</fieldset>
		<button type="Submit" name="Login">Login</button>
		New? <a href="registerpage.php">Register By Clicking Here!</a>
	</form>
</center>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>