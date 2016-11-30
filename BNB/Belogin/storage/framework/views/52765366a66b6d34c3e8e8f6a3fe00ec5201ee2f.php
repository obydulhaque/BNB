<?php $__env->startSection('content'); ?>

    <?php if(Auth::check()): ?>
        <?php if(Auth::user()->user==1): ?>

            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            product Order Manage Table.
                            <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                        </header>
                        <div class="panel-body">
                            <div class="adv-table">
                                <table  class="table table-striped table-hover table-bordered" id="editable-sample">
                                    <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Product Number</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($productList as $value): ?>
                                        <tr>
                                            <td><?php echo e($value->product_name); ?></td>
                                            <td><?php echo e($value->product_code_no); ?></td>
                                            <td><?php echo e($value->quentity); ?></td>
                                            <td><?php echo e($value->price); ?></td>
                                            <td><?php echo e($value->phone); ?></td>
                                            <td><?php echo e($value->address); ?></td>
                                            <td><?php echo e($value->date); ?></td>
                                            <td>
                                                <?php echo Form::open(['url'=>['BnbProductOrder',$value->id],'class'=>'form-horizontal']); ?>

                                                <select name="bnbProductOrderStatus" id="selectText" class="form-control m-bot15" onchange='this.form.submit()' >
                                                    <option selected>
                                                        <?php if($value->order_status == 1): ?>
                                                           <option value="1" selected>Forward</option>
                                                           <option value="0">Keep</option>
                                                           <option value="2">Disconnect</option>
                                                        <?php elseif($value->order_status == 2): ?>
                                                           <option value="2" selected>Disconnect</option>
                                                           <option value="0">Keep</option>
                                                           <option value="1">Forward</option>
                                                        <?php elseif($value->order_status == 0): ?>
                                                           <option value="0" selected>Keep</option>
                                                           <option value="1">Forward</option>
                                                           <option value="2">Disconnect</option>
                                                        <?php endif; ?>
                                                    </option>


                                                </select>
                                                <?php echo Form::close(); ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

        <?php else: ?>
            <?php
            Session::flash('error', 'please your not permitted...');
            ?>
        <?php endif; ?>
    <?php else: ?>
        <?php
        Session::flash('error', 'please try to login again...');
        ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backentMaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>