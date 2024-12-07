<?php $__env->startSection('page-title', trans('app.search')); ?>
<?php $__env->startSection('page-heading', trans('app.search')); ?>

<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>

    <section class="content">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo e(__('app.search_results', ['query' => $query])); ?></h3>
            </div>
        </div>



        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo app('translator')->get('app.users'); ?></h3>
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
                            <th><?php echo app('translator')->get('app.refund'); ?></th>
                            <th><?php echo app('translator')->get('app.wb'); ?></th>
                            <th><?php echo app('translator')->get('app.sb'); ?></th>

                            <th><?php echo app('translator')->get('app.pay_in'); ?></th>
                            <th><?php echo app('translator')->get('app.pay_out'); ?></th>

                            <th><?php echo app('translator')->get('app.shop'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(count($users)): ?>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('backend.user.partials.row', ['show_shop' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr><td colspan="15"><?php echo app('translator')->get('app.no_data'); ?></td></tr>
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
                            <th><?php echo app('translator')->get('app.refund'); ?></th>
                            <th><?php echo app('translator')->get('app.wb'); ?></th>
                            <th><?php echo app('translator')->get('app.sb'); ?></th>

                            <th><?php echo app('translator')->get('app.pay_in'); ?></th>
                            <th><?php echo app('translator')->get('app.pay_out'); ?></th>

                            <th><?php echo app('translator')->get('app.shop'); ?></th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo app('translator')->get('app.pay_stats'); ?></h3>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <?php if(auth()->user()->hasRole(['admin'])): ?>
                                <th><?php echo app('translator')->get('app.admin'); ?></th>
                            <?php endif; ?>
                            <?php if(auth()->user()->hasRole(['admin', 'agent'])): ?>
                                <th><?php echo app('translator')->get('app.agent'); ?></th>
                            <?php endif; ?>
                            <?php if(auth()->user()->hasRole(['admin', 'agent', 'distributor'])): ?>
                                <th><?php echo app('translator')->get('app.distributor'); ?></th>
                            <?php endif; ?>
                            <?php if(auth()->user()->hasRole(['admin', 'agent', 'distributor'])): ?>
                                <th><?php echo app('translator')->get('app.shop'); ?></th>
                            <?php endif; ?>
                            <th><?php echo app('translator')->get('app.cashier'); ?></th>
                            <th><?php echo app('translator')->get('app.type'); ?></th>
                            <th><?php echo app('translator')->get('app.user'); ?></th>
                            <?php if(auth()->user()->hasRole(['admin', 'agent'])): ?>
                                <th><?php echo app('translator')->get('app.agent'); ?> <?php echo app('translator')->get('app.in'); ?></th>
                                <th><?php echo app('translator')->get('app.agent'); ?> <?php echo app('translator')->get('app.out'); ?></th>
                            <?php endif; ?>
                            <?php if(auth()->user()->hasRole(['admin', 'agent', 'distributor'])): ?>
                                <th><?php echo app('translator')->get('app.distributor'); ?> <?php echo app('translator')->get('app.in'); ?></th>
                                <th><?php echo app('translator')->get('app.distributor'); ?> <?php echo app('translator')->get('app.out'); ?></th>
                            <?php endif; ?>
                            <?php if(auth()->user()->hasRole(['admin'])): ?>
                                <th><?php echo app('translator')->get('app.type'); ?> <?php echo app('translator')->get('app.in'); ?></th>
                                <th><?php echo app('translator')->get('app.type'); ?> <?php echo app('translator')->get('app.out'); ?></th>
                            <?php endif; ?>
                            <?php if(auth()->user()->hasRole(['admin', 'agent', 'distributor'])): ?>
                                <th><?php echo app('translator')->get('app.credit'); ?> <?php echo app('translator')->get('app.in'); ?></th>
                                <th><?php echo app('translator')->get('app.credit'); ?> <?php echo app('translator')->get('app.out'); ?></th>
                            <?php endif; ?>
                            <th><?php echo app('translator')->get('app.money'); ?> <?php echo app('translator')->get('app.in'); ?></th>
                            <th><?php echo app('translator')->get('app.money'); ?> <?php echo app('translator')->get('app.out'); ?></th>
                            <th><?php echo app('translator')->get('app.date'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(count($pay_stats)): ?>
                            <?php $__currentLoopData = $pay_stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('backend.stat.partials.transaction_stat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr><td colspan="18"><?php echo app('translator')->get('app.no_data'); ?></td></tr>
                        <?php endif; ?>
                        </tbody>
                        <thead>
                        <tr>
                            <?php if(auth()->user()->hasRole(['admin'])): ?>
                                <th><?php echo app('translator')->get('app.admin'); ?></th>
                            <?php endif; ?>
                            <?php if(auth()->user()->hasRole(['admin', 'agent'])): ?>
                                <th><?php echo app('translator')->get('app.agent'); ?></th>
                            <?php endif; ?>
                            <?php if(auth()->user()->hasRole(['admin', 'agent', 'distributor'])): ?>
                                <th><?php echo app('translator')->get('app.distributor'); ?></th>
                            <?php endif; ?>
                            <?php if(auth()->user()->hasRole(['admin', 'agent', 'distributor'])): ?>
                                <th><?php echo app('translator')->get('app.shop'); ?></th>
                            <?php endif; ?>
                            <th><?php echo app('translator')->get('app.cashier'); ?></th>
                            <th><?php echo app('translator')->get('app.type'); ?></th>
                            <th><?php echo app('translator')->get('app.user'); ?></th>
                            <?php if(auth()->user()->hasRole(['admin', 'agent'])): ?>
                                <th><?php echo app('translator')->get('app.agent'); ?> <?php echo app('translator')->get('app.in'); ?></th>
                                <th><?php echo app('translator')->get('app.agent'); ?> <?php echo app('translator')->get('app.out'); ?></th>
                            <?php endif; ?>
                            <?php if(auth()->user()->hasRole(['admin', 'agent', 'distributor'])): ?>
                                <th><?php echo app('translator')->get('app.distributor'); ?> <?php echo app('translator')->get('app.in'); ?></th>
                                <th><?php echo app('translator')->get('app.distributor'); ?> <?php echo app('translator')->get('app.out'); ?></th>
                            <?php endif; ?>
                            <?php if(auth()->user()->hasRole(['admin'])): ?>
                                <th><?php echo app('translator')->get('app.type'); ?> <?php echo app('translator')->get('app.in'); ?></th>
                                <th><?php echo app('translator')->get('app.type'); ?> <?php echo app('translator')->get('app.out'); ?></th>
                            <?php endif; ?>
                            <?php if(auth()->user()->hasRole(['admin', 'agent', 'distributor'])): ?>
                                <th><?php echo app('translator')->get('app.credit'); ?> <?php echo app('translator')->get('app.in'); ?></th>
                                <th><?php echo app('translator')->get('app.credit'); ?> <?php echo app('translator')->get('app.out'); ?></th>
                            <?php endif; ?>
                            <th><?php echo app('translator')->get('app.money'); ?> <?php echo app('translator')->get('app.in'); ?></th>
                            <th><?php echo app('translator')->get('app.money'); ?> <?php echo app('translator')->get('app.out'); ?></th>
                            <th><?php echo app('translator')->get('app.date'); ?></th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>


        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo app('translator')->get('app.game_stats'); ?></h3>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                        <tr>
                            <th><?php echo app('translator')->get('app.game'); ?></th>
                            <th><?php echo app('translator')->get('app.user'); ?></th>
                            <th><?php echo app('translator')->get('app.balance'); ?></th>
                            <th><?php echo app('translator')->get('app.bet'); ?></th>
                            <th><?php echo app('translator')->get('app.win'); ?></th>
                            <?php if(auth()->user()->hasRole('admin')): ?>
                                <th><?php echo app('translator')->get('app.in_game'); ?></th>
                                <th><?php echo app('translator')->get('app.in_jpg'); ?></th>
                                <th><?php echo app('translator')->get('app.profit'); ?></th>
                            <?php endif; ?>
                            <th><?php echo app('translator')->get('app.denomination'); ?></th>
                            <th><?php echo app('translator')->get('app.slots'); ?></th>
                            <th><?php echo app('translator')->get('app.fish'); ?></th>
                            <th><?php echo app('translator')->get('app.table_bank'); ?></th>
                            <th><?php echo app('translator')->get('app.little'); ?></th>
                            <th><?php echo app('translator')->get('app.bonus'); ?></th>
                            <th><?php echo app('translator')->get('app.total'); ?></th>
                            <th><?php echo app('translator')->get('app.date'); ?></th>
                        </tr>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(count($game_stats)): ?>
                            <?php $__currentLoopData = $game_stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('backend.games.partials.row_stat', ['show_shop' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr><td colspan="16"><?php echo app('translator')->get('app.no_data'); ?></td></tr>
                        <?php endif; ?>
                        </tbody>
                        <thead>
                        <tr>
                        <tr>
                            <th><?php echo app('translator')->get('app.game'); ?></th>
                            <th><?php echo app('translator')->get('app.user'); ?></th>
                            <th><?php echo app('translator')->get('app.balance'); ?></th>
                            <th><?php echo app('translator')->get('app.bet'); ?></th>
                            <th><?php echo app('translator')->get('app.win'); ?></th>
                            <?php if(auth()->user()->hasRole('admin')): ?>
                                <th><?php echo app('translator')->get('app.in_game'); ?></th>
                                <th><?php echo app('translator')->get('app.in_jpg'); ?></th>
                                <th><?php echo app('translator')->get('app.profit'); ?></th>
                            <?php endif; ?>
                            <th><?php echo app('translator')->get('app.denomination'); ?></th>
                            <th><?php echo app('translator')->get('app.slots'); ?></th>
                            <th><?php echo app('translator')->get('app.fish'); ?></th>
                            <th><?php echo app('translator')->get('app.table_bank'); ?></th>
                            <th><?php echo app('translator')->get('app.little'); ?></th>
                            <th><?php echo app('translator')->get('app.bonus'); ?></th>
                            <th><?php echo app('translator')->get('app.total'); ?></th>
                            <th><?php echo app('translator')->get('app.date'); ?></th>
                        </tr>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>







    </section>

    <div class="modal fade" id="openAddModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo e(route('backend.user.balance.update')); ?>" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><?php echo app('translator')->get('app.balance'); ?> <?php echo app('translator')->get('app.pay_in'); ?></h4>
                    </div>
                    <div class="modal-body">
                        <?php if($happyhour && auth()->user()->hasRole('cashier')): ?>
                            <div class="alert alert-success">
                                <h4><?php echo app('translator')->get('app.happyhours'); ?></h4>
                                <p> <?php echo app('translator')->get('app.all_player_deposits'); ?> <?php echo e($happyhour->multiplier); ?></p>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="OutSum"><?php echo app('translator')->get('app.sum'); ?></label>
                            <input type="text" class="form-control" id="OutSum" name="summ" placeholder="<?php echo app('translator')->get('app.sum'); ?>" required>
                            <input type="hidden" name="type" value="add">
                            <input type="hidden" id="AddId" name="user_id">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><?php echo app('translator')->get('app.close'); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('app.pay_in'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="openOutModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo e(route('backend.user.balance.update')); ?>" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><?php echo app('translator')->get('app.balance'); ?> <?php echo app('translator')->get('app.pay_out'); ?></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="OutSum"><?php echo app('translator')->get('app.sum'); ?></label>
                            <input type="text" class="form-control" id="OutSum" name="summ" placeholder="<?php echo app('translator')->get('app.sum'); ?>" required>
                            <input type="hidden" name="type" value="out">
                            <input type="hidden" id="OutId" name="user_id">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><?php echo app('translator')->get('app.close'); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('app.pay_out'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>

        var table = $('#users-table').dataTable();
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
        });


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

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/itfabers/casino.dev.itfabers.com/resources/views/backend/dashboard/search.blade.php ENDPATH**/ ?>