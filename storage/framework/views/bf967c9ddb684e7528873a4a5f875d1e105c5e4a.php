<?php $__env->startSection('content'); ?>
<center>
		<fieldset>
		<p>User: <?php echo e(Session::get('user')); ?>  has been successfully registered.</p>
		</fieldset>
</center>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>