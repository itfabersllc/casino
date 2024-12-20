<?php $__env->startSection('page-title', $role->name .' '. trans('app.tree')); ?>
<?php $__env->startSection('page-heading', $role->name .' '. trans('app.tree')); ?>

<?php $__env->startSection('content'); ?>

<section class="content-header">
    <?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e($role->name); ?> <?php echo app('translator')->get('app.tree'); ?></h3>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <?php if( auth()->user()->role_id > 4 ): ?>
                            <th><?php echo app('translator')->get('app.agent'); ?></th>
                            <th><?php echo app('translator')->get('app.distributor'); ?></th>
                            <th><?php echo app('translator')->get('app.shop'); ?></th>
                            <?php endif; ?>
                            <?php if( auth()->user()->role_id > 3 ): ?>
                            <th><?php echo app('translator')->get('app.manager'); ?></th>
                            <?php endif; ?>
                            <th><?php echo app('translator')->get('app.cashier'); ?></th>
                            <th><?php echo app('translator')->get('app.user'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($users)): ?>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <?php if($user->hasRole('agent')): ?>
                            <td rowspan="<?php echo e($user->getRowspan()); ?>">
                                <a href="<?php echo e(route('backend.user.edit', $user->id)); ?>">
                                    <?php echo e($user->username ?: trans('app.n_a')); ?>

                                </a>
                            </td>
                            <?php if( $distributors = $user->getInnerUsers() ): ?>
                            <?php $__currentLoopData = $distributors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('backend.user.partials.distributor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <td colspan="5"></td>
                        </tr>
                        <tr></tr>
                        <tr>
                            <?php endif; ?>
                            <?php elseif($user->role_id == auth()->user()->role_id-1): ?>
                            <?php echo $__env->make('backend.user.partials.distributor', ['member' => $user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <tr>
                            <td colspan="6"><?php echo app('translator')->get('app.no_data'); ?></td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                    <thead>
                        <tr>
                            <?php if( auth()->user()->role_id > 4 ): ?>
                            <th><?php echo app('translator')->get('app.agent'); ?></th>
                            <th><?php echo app('translator')->get('app.distributor'); ?></th>
                            <th><?php echo app('translator')->get('app.shop'); ?></th>
                            <?php endif; ?>
                            <?php if( auth()->user()->role_id > 3 ): ?>
                            <th><?php echo app('translator')->get('app.manager'); ?></th>
                            <?php endif; ?>
                            <th><?php echo app('translator')->get('app.cashier'); ?></th>
                            <th><?php echo app('translator')->get('app.user'); ?></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</section>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/casino/resources/views/backend/user/tree.blade.php ENDPATH**/ ?>