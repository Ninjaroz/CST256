<!doctype html>

<html>

	<head>
		<!-- CSS -->
		<link href="<?php echo e(asset('css/Main.css')); ?>" rel="stylesheet">
	</head>
	
	<Body>
		
		<div class="container">
			
			<!--  Page Header -->
			<header>
				<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			</header>
			
			<!--  Content -->
			<div id="main">
				<?php echo $__env->yieldContent('content'); ?>
			</div>
			
			<!--  footer -->
			<footer>
		
			</footer>
			
		</div>
		
	</Body>
	
</html>
