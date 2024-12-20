<?php if( $member->hasRole('distributor') && $member->shops() && count($member->shops()) ): ?>
<td rowspan="<?php echo e($member->getRowspan()); ?>">
    <a href="<?php echo e(route('backend.user.edit', $member->id)); ?>">
        <?php echo e($member->username ?: trans('app.n_a')); ?>

    </a>
</td>
    <?php if($shops = $member->rel_shops): ?>
        <?php $__currentLoopData = $shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($shop = $shop->shop): ?>
                <td rowspan="<?php echo e($shop->getRowspan()); ?>">
                    <a href="<?php echo e(route('backend.shop.edit', $shop->id)); ?>"><?php echo e($shop->name); ?></a>
                </td>

                <?php if( $managers = $shop->getUsersByRole('manager') ): ?>
                    <?php if(count($managers)): ?>
                        <?php $__currentLoopData = $managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td rowspan="<?php echo e($manager->getRowspan()); ?>">
                                <a href="<?php echo e(route('backend.user.edit', $manager->id)); ?>">
                                    <?php echo e($manager->username ?: trans('app.n_a')); ?>

                                </a>
                            </td>

                            <?php if( $cashiers = $manager->getInnerUsers() ): ?>
                                <?php $__currentLoopData = $cashiers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cashier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <a href="<?php echo e(route('backend.user.edit', $cashier->id)); ?>">
                                            <?php echo e($cashier->username ?: trans('app.n_a')); ?>

                                        </a>
                                    </td>

                                    <td>
                                        <a href="<?php echo e(route('backend.profile.setshop', ['shop_id' => $shop->id, 'to' => route('backend.user.list', ['role' => 1])])); ?>">
                                            >> <?php echo app('translator')->get('app.users'); ?>
                                        </a>

                                    </td></tr><tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <td colspan="2"></td></tr><tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <td colspan="3"></td></tr><tr>
                    <?php endif; ?>
                <?php endif; ?>
            <?php else: ?>
                <td colspan="4"></td></tr><tr>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php elseif($member->hasRole('manager')): ?>
    <td rowspan="<?php echo e($member->getRowspan()); ?>">
        <a href="<?php echo e(route('backend.user.edit', $member->id)); ?>">
            <?php echo e($member->username ?: trans('app.n_a')); ?>

        </a>
    </td>

    <?php if( $cashiers = $member->getInnerUsers() ): ?>
        <?php $__currentLoopData = $cashiers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cashier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td>
                <a href="<?php echo e(route('backend.user.edit', $cashier->id)); ?>">
                    <?php echo e($cashier->username ?: trans('app.n_a')); ?>

                </a>
            </td>

            <td>
                <a href="<?php echo e(route('backend.profile.setshop', ['shop_id' => $member->shop_id, 'to' => route('backend.user.list', ['role' => 1])])); ?>">
                    >> <?php echo app('translator')->get('app.users'); ?>
                </a>

            </td></tr><tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <td colspan="2"></td></tr><tr>
    <?php endif; ?>
<?php elseif($member->hasRole('cashier')): ?>
    <td>
        <a href="<?php echo e(route('backend.user.edit', $member->id)); ?>">
            <?php echo e($member->username ?: trans('app.n_a')); ?>

        </a>
    </td>

    <td>
        <a href="<?php echo e(route('backend.profile.setshop', ['shop_id' => $member->shop_id, 'to' => route('backend.user.list', ['role' => 1])])); ?>">
            >> <?php echo app('translator')->get('app.users'); ?>
        </a>

    </td></tr><tr>
<?php endif; ?><?php /**PATH /home/itfabers/casino.dev.itfabers.com/resources/views/backend/user/partials/distributor.blade.php ENDPATH**/ ?>