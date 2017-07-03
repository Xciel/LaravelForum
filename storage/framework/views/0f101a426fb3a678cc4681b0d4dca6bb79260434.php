<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <?php $__empty_1 = true; $__currentLoopData = $threads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="level">
                                <h4 class="flex">
                                    <a href="<?php echo e($thread->path()); ?>">
                                        <?php if(auth()->check() && $thread->hasUpdatesFor(auth()->user())): ?>
                                            <strong>
                                                <?php echo e($thread->title); ?>

                                            </strong>
                                        <?php else: ?>
                                            <?php echo e($thread->title); ?>

                                        <?php endif; ?>
                                    </a>
                                </h4>

                                <a href="<?php echo e($thread->path()); ?>">
                                    <?php echo e($thread->replies_count); ?> <?php echo e(str_plural('reply', $thread->replies_count)); ?>

                                </a>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="body"><?php echo e($thread->body); ?></div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p>There are no relevant results at this time.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>