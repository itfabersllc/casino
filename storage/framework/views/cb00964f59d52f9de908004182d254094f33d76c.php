<tr>        
    <td>
		<?php if($shop->user_id == auth()->user()->id || Auth::user()->hasRole('admin')): ?>
		<a href="<?php echo e(route('backend.shop.edit', $shop->shop_id)); ?>"><?php echo e($shop->name); ?></a>
		<?php else: ?>
		<?php echo e($shop->name); ?>

		<?php endif; ?>
	</td>
	<td>
		<a href="<?php echo e(route('backend.profile.setshop', ['shop_id' => $shop->shop_id])); ?>"><?php echo app('translator')->get('app.switch'); ?></a>
	</td>
	<td>
		<?php if($shop->creator): ?>
			<?php if($shop->user_id == auth()->user()->id || Auth::user()->hasRole('admin')): ?>
			<a href="<?php echo e(route('backend.user.edit', $shop->creator->id)); ?>" ><?php echo e($shop->creator->username); ?></a>
			<?php else: ?>
			<?php echo e($shop->creator->username); ?>

			<?php endif; ?>
		<?php endif; ?>
	</td>
	<td><a href="<?php echo e(route('frontend.jpstv', $shop->shop_id)); ?>" target="_blank"><?php echo e($shop->shop_id); ?></a></td>
    <td><?php echo e($shop->balance); ?></td>
	<td><?php echo e($shop->get_percent_label($shop->percent)); ?></td>
	<td><?php echo e($shop->max_win); ?></td>
	<td><?php echo e($shop->frontend); ?></td>
	<td><?php echo e($shop->currency); ?></td>
	<td><?php echo e($shop->orderby); ?></td>
	<td>
		<?php if($shop->is_blocked): ?>
			<small><i class="fa fa-circle text-red"></i></small>
		<?php else: ?>
			<small><i class="fa fa-circle text-green"></i></small>
		<?php endif; ?>
	</td>
	<td>
		<?php if( Auth::user()->hasRole(['distributor']) ): ?>
		
		<a class="addPayment" href="#" data-toggle="modal" data-target="#openAddModal" data-id="<?php echo e($shop->shop_id); ?>" >
		<button type="button" class="btn btn-block btn-success btn-xs"> <?php echo app('translator')->get('app.add'); ?></button>
	    </a>
		<?php elseif( Auth::user()->hasRole(['agent']) ): ?>
		<button type="button" class="btn btn-block btn-success hidden btn-xs"> <?php echo app('translator')->get('app.add'); ?></button>
		
		<?php else: ?>
			<button type="button" class="btn btn-block btn-success disabled btn-xs"> <?php echo app('translator')->get('app.add'); ?></button>
		<?php endif; ?>
	</td>
	<td>
		<?php if( Auth::user()->hasRole(['distributor']) ): ?>
		<a class="outPayment" href="#" data-toggle="modal" data-target="#openOutModal" data-id="<?php echo e($shop->shop_id); ?>" >
	    <button type="button" class="btn btn-block btn-danger btn-xs"> <?php echo app('translator')->get('app.out'); ?></button>
		</a>
		<?php elseif( Auth::user()->hasRole(['agent']) ): ?>
		<button type="button" class="btn btn-block btn-danger hidden btn-xs"> <?php echo app('translator')->get('app.out'); ?></button>
		<?php else: ?>
			<button type="button" class="btn btn-block btn-danger disabled btn-xs"> <?php echo app('translator')->get('app.out'); ?></button>
		<?php endif; ?>
	</td>
</tr><?php /**PATH /var/www/casino/resources/views/backend/shops/partials/row.blade.php ENDPATH**/ ?>