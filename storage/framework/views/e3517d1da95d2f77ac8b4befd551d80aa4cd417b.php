<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div>
	<h3><a href=""><?php echo e($post->title); ?></a></h3>
	<p><?php echo $post->description; ?></p>


	<div class="text-right">
		<button class="btn btn-success">Read More</button>
	</div>


	<hr style="margin-top:5px;">
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/appmantr/healthcareweb.appmantra.live/resources/views/data.blade.php ENDPATH**/ ?>