<?php $__env->startSection('content'); ?>
<center>
	<form action="verifyUser" method='POST'>
		<fieldset>
			<!--  Checks if user is logged in or not and displays appropriate message -->
			<?php if(!empty(Session::get('user'))): ?>
			<?php echo $__env->make('userViews.verifyUser', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>>
			<?php else: ?>
			<legend>Please enter a valid username and password</legend>
			<?php endif; ?>
			<p><label for="Username">Username:</label>
			<input type="text" name="userName" placeholder="Username" size="30"/></p>
			<p><label for="Password">Password:</label>
			<input type="Password" name="password" placeholder="Password" size="30"/></p>
			<?php echo e(csrf_field()); ?>

		</fieldset>
		<button type="Submit">Login</button>
		New? <a href="<?php echo e(url('register')); ?>">Register By Clicking Here!</a>
	</form>
</center>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>