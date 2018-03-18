<?php $__env->startSection('content'); ?>

<!--  Checks if a valid user is signing in and displays  -->
<!-----------  appropriate error message  ----------------->
<center> 
<?php if(!empty(Session::get('user'))): ?>
<fieldset>
	<legend>Successful login</legend>
	<p>You are logged in as: <?php echo e(Session::get('user')); ?></p>
	<p><a href="<?php echo e(url('logout')); ?>">Log out</a></p>
	<a href="userspage.php">Continue to your Dashboard</a>
</fieldset>
<?php else: ?> 
	<?php echo $__env->make('userViews.failedLogin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</center>
<?php endif; ?>	
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>