<?php $__env->startSection('content'); ?>
    <thread-view :initial-replies-count="<?php echo e($thread->replies_count); ?>" inline-template>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="level">
                                <span class="flex">
                                    <a href="<?php echo e(route('profile', $thread->creator)); ?>"><?php echo e($thread->creator->name); ?></a> posted:
                                    <?php echo e($thread->title); ?>

                                </span>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $thread)): ?>
                                    <form action="<?php echo e($thread->path()); ?>" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('DELETE')); ?>


                                        <button type="submit" class="btn btn-link">Delete Thread</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="panel-body">
                            <?php echo e($thread->body); ?>

                        </div>
                    </div>

                    <replies @added="repliesCount++" @removed="repliesCount--"></replies>
                </div>

                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p>
                                This thread was published <?php echo e($thread->created_at->diffForHumans()); ?> by
                                <a href="#"><?php echo e($thread->creator->name); ?></a>, and currently
                                has <span
                                        v-text="repliesCount"></span> <?php echo e(str_plural('comment', $thread->replies_count)); ?>

                                .
                            </p>

                            <p>
                                <subscribe-button :active="<?php echo e(json_encode($thread->isSubscribedTo)); ?>"></subscribe-button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </thread-view>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>