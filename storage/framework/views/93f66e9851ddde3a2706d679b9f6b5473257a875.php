<?php $__env->startSection('page-title', trans('app.users')); ?>
<?php $__env->startSection('page-heading', trans('app.users')); ?>

<?php $__env->startSection('content'); ?>

	<section class="content-header">
		<?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</section>



	<section class="content">

		<?php if(auth()->user()->hasRole('cashier') &&
			$openshift = \VanguardLTE\OpenShift::where(['shop_id' => auth()->user()->shop_id, 'end_date' => NULL])->first()): ?>

			<?php $summ = \VanguardLTE\User::where(['shop_id' => auth()->user()->shop_id, 'role_id' => 1])->sum('balance'); ?>

			<div class="row">
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-light-blue">
						<div class="inner">
							<?php
								$money = $openshift->users;
                                if($openshift->end_date == NULL){
                                    $money = $summ;
                                }
							?>

							<h3><?php echo e(number_format($money, 2, ".", "")); ?></h3>
							<p>User <?php echo app('translator')->get('app.balance'); ?></p>
						</div>
						<div class="icon">
							<i class="fa fa-refresh"></i>
						</div>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-green">
						<div class="inner">
							<h3><?php echo e(number_format($openshift->money_in, 2, ".", "")); ?></h3>
							<p><?php echo app('translator')->get('app.in'); ?></p>
						</div>
						<div class="icon">
							<i class="fa fa-level-up"></i>
						</div>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-yellow">
						<div class="inner">
							<h3><?php echo e(number_format ($openshift->money_out, 2, ".", "")); ?></h3>
							<p><?php echo app('translator')->get('app.out'); ?></p>
						</div>
						<div class="icon">
							<i class="fa fa-level-down"></i>
						</div>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-red">
						<div class="inner">
							<?php
								$total = $openshift->money_in - $openshift->money_out;
							?>

							<h3><?php echo e(number_format ($total, 2, ".", "")); ?></h3>
							<p><?php echo app('translator')->get('app.total'); ?> Money</p>
						</div>
						<div class="icon">
							<i class="fa fa-line-chart"></i>
						</div>
					</div>
				</div>
				<!-- ./col -->
			</div>

		<?php endif; ?>

			<form action="" method="GET" id="users-form" >
			<div class="box box-danger collapsed-box users_show">

					<div class="box-header with-border">
						<h3 class="box-title"><?php echo app('translator')->get('app.filter'); ?></h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-md-4">
								<label><?php echo app('translator')->get('app.search'); ?></label>
								<input type="text" class="form-control" name="search" value="<?php echo e(Request::get('search')); ?>" placeholder="<?php echo app('translator')->get('app.search_for_users'); ?>">
							</div>
							<?php if(!Auth::user()->hasRole('cashier')): ?>
								<div class="col-md-4">
									<label><?php echo app('translator')->get('app.status'); ?></label>
									<?php echo Form::select('status', $statuses, Request::get('status'), ['id' => 'status', 'class' => 'form-control']); ?>

								</div>
								<div class="col-md-4">
									<label><?php echo app('translator')->get('app.role'); ?></label>
									<?php echo Form::select('role', $roles, Request::get('role'), ['id' => 'role', 'class' => 'form-control']); ?>

								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">
							<?php echo app('translator')->get('app.filter'); ?>
						</button>
					</div>

			</div>
			</form>


			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"><?php echo app('translator')->get('app.users'); ?></h3>
					<div class="pull-right box-tools">
					<?php if(auth()->user()->hasRole('agent')): ?>
						<a href="<?php echo e(route('backend.user.create')); ?>" class="btn btn-block btn-primary hidden btn-sm"><?php echo app('translator')->get('app.add'); ?></a>
					<?php elseif(auth()->user()->hasRole('distributor')): ?>
					    <a href="<?php echo e(route('backend.user.create')); ?>" class="btn btn-block btn-primary hidden btn-sm"><?php echo app('translator')->get('app.add'); ?></a>
					<?php elseif(auth()->user()->hasRole('manager')): ?>
					    <a href="<?php echo e(route('backend.user.create')); ?>" class="btn btn-block btn-primary hidden btn-sm"><?php echo app('translator')->get('app.add'); ?></a>
					<?php elseif(auth()->user()->hasRole('cashier')): ?>
					    <a href="<?php echo e(route('backend.user.create')); ?>" class="btn btn-block btn-primary hidden btn-sm"><?php echo app('translator')->get('app.add'); ?></a>
						<?php else: ?>		
			            
					    <a href="<?php echo e(route('backend.user.create')); ?>" class="btn btn-block btn-primary btn-sm"><?php echo app('translator')->get('app.add'); ?></a>
		                
						<?php endif; ?>
						
					</div>
				</div>
				<div class="box-body">
					<div class="table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
							<tr>
								<th><?php echo app('translator')->get('app.username'); ?></th>
								<?php if(auth()->user()->hasRole('admin')): ?>
								<th>Log In</th>
							    <?php endif; ?>

								<th><?php echo app('translator')->get('app.balance'); ?></th>

								<th><?php echo app('translator')->get('app.rating'); ?></th>
								<th><?php echo app('translator')->get('app.tb'); ?></th>
								<th><?php echo app('translator')->get('app.pb'); ?></th>
								<th><?php echo app('translator')->get('app.de'); ?></th>
								<th><?php echo app('translator')->get('app.if'); ?></th>
								<th><?php echo app('translator')->get('app.hh'); ?></th>
								<th><?php echo app('translator')->get('app.wb'); ?></th>
								<th><?php echo app('translator')->get('app.sb'); ?></th>
								<th><?php echo app('translator')->get('app.refund'); ?></th>

                                <?php if(auth()->user()->hasRole('distributor')): ?>
								
							    <?php elseif(auth()->user()->hasRole('manager')): ?>
								
							    <?php else: ?>
								<th><?php echo app('translator')->get('app.pay_in'); ?></th>
								<th><?php echo app('translator')->get('app.pay_out'); ?></th>
                                <?php endif; ?>
	                             
							</tr>
							</thead>
							<tbody>
							<?php if(count($users)): ?>
								<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php echo $__env->make('backend.user.partials.row', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php else: ?>
								<tr><td colspan="14"><?php echo app('translator')->get('app.no_data'); ?></td></tr>
							<?php endif; ?>
							</tbody>
							<thead>
							<tr>
								<th><?php echo app('translator')->get('app.username'); ?></th>
								<?php if(auth()->user()->hasRole('admin')): ?>
								<th>Log In</th>
							    <?php endif; ?>

								<th><?php echo app('translator')->get('app.balance'); ?></th>

								<th><?php echo app('translator')->get('app.rating'); ?></th>
								<th><?php echo app('translator')->get('app.tb'); ?></th>
								<th><?php echo app('translator')->get('app.pb'); ?></th>
								<th><?php echo app('translator')->get('app.de'); ?></th>
								<th><?php echo app('translator')->get('app.if'); ?></th>
								<th><?php echo app('translator')->get('app.hh'); ?></th>
								<th><?php echo app('translator')->get('app.wb'); ?></th>
								<th><?php echo app('translator')->get('app.sb'); ?></th>
								<th><?php echo app('translator')->get('app.refund'); ?></th>
                                <?php if(auth()->user()->hasRole('distributor')): ?>
								
							    <?php elseif(auth()->user()->hasRole('manager')): ?>
								
							    <?php else: ?>
								<th><?php echo app('translator')->get('app.pay_in'); ?></th>
								<th><?php echo app('translator')->get('app.pay_out'); ?></th>
                                <?php endif; ?>



							</tr>
							</thead>
						</table>
					</div>
					<?php echo e($users->appends(Request::except('page'))->links()); ?>

				</div>
			</div>
	</section>

		<?php echo $__env->make('backend.user.partials.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script>

		$(function() {

			$('.btn-box-tool').click(function(event){
				if( $('.users_show').hasClass('collapsed-box') ){
					$.cookie('users_show', '1');
				} else {
					$.removeCookie('users_show');
				}
			});

			if( $.cookie('users_show') ){
				$('.users_show').removeClass('collapsed-box');
				$('.users_show .btn-box-tool i').removeClass('fa-plus').addClass('fa-minus');
			}

			$("#view").change(function () {
				$("#shops-form").submit();
			});

			$("#filter").detach().appendTo("div.toolbar");


			$("#status").change(function () {
				$("#users-form").submit();
			});
			$("#role").change(function () {
				$("#users-form").submit();
			});
			$('.addPayment').click(function(event){
				if( $(event.target).is('.newPayment') ){
					var id = $(event.target).attr('data-id');
				}else{
					var id = $(event.target).parents('.newPayment').attr('data-id');
				}
				$('#AddId').val(id);

			});

			$('.outPayment').click(function(event){
				if( $(event.target).is('.newPayment') ){
					var id = $(event.target).attr('data-id');
				}else{
					var id = $(event.target).parents('.newPayment').attr('data-id');
				}
				$('#OutId').val(id);
				$('#outAll').val('');
			});

			$('#doOutAll').click(function () {
				$('#outAll').val('1');
				$('form#outForm').submit();
			});




			setInterval(function() {
				$.getJSON(' <?php echo e(route('backend.user.balance.get')); ?> ', function(data) {
					for (var key in data) {
						$('.balance_' + key).html(data[key].balance);
						$('.bonus_' + key).html(data[key].bonus);
						$('.wager_' + key).html(data[key].wager);
					};
				});
			}, 3000);


		});

	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/casino/resources/views/backend/user/list.blade.php ENDPATH**/ ?>