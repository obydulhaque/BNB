<?php $__env->startSection('content'); ?>
    <?php if(Auth::check()): ?>
        <?php if(Auth::user()->user==1): ?>


            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Main Category
                            <span class="tools pull-right">
            <a href="javascript:;" class="fa fa-chevron-down"></a>
            <a href="javascript:;" class="fa fa-times"></a>
        </span>
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                                <?php echo Form::open(['url' => 'categoryManage','class'=>'cmxform form-horizontal','id'=>'signupForm' ]); ?>

                                 <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-4">Main Manu</label>
                                    <div class="col-lg-5">
                                        <select name="mainManu" class="form-control input-sm m-bot15" id="selectText">
                                            <option value="0">Some Select</option>
                                            <?php foreach($mainManu as $value): ?>
                                                <option value="<?php echo e($value->id); ?>"><?php echo e($value->manu_name); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-4">Main Category</label>
                                    <div class="col-lg-5">
                                        <input class=" form-control" id="mainCategory" name="mainCategory"  type="text"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        <button class="btn btn-default" type="reset">Cancel</button>
                                    </div>
                                </div>
                                <?php echo Form::close(); ?>

                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <div class="row">
                        <div class="col-sm-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    Main Category Table
                                    <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                                </header>
                                <div class="panel-body">
                                    <div class="adv-table editable-table ">
                                        <div class="space15"></div>
                                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                            <thead>
                                            <tr style="color:black;">
                                                <th>Name</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($mainCategoryShow as $value): ?>
                                                <tr class="" style="color:black;">
                                                    <?php echo Form::open(['url'=>['categoryUpdate',$value->id],'class'=>'form-horizontal']); ?>

                                                    <td class="center"><input type="text" class=" form-control" id="mainCategory" name="mainCategory" value="<?php echo e($value->category_name); ?>"></td>
                                                    <td><input type="submit" value="Update" class="btn btn-success" style="margin-top: 5px"></td>
                                                    <?php echo Form::close(); ?>

                                                    <td> <button  class="main_category_delete btn btn-danger" data-item-id="<?php echo e($value->id); ?>">Delete</button></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>
            </div>
                </div>
            <!--- Swite message show  delete form main category by obydul date:28-7-16-->
            <script>
                $('button.main_category_delete').click(function() {
                    var itemId = $(this).attr("data-item-id");
                    mainCategoryDelete(itemId);
                });
                function mainCategoryDelete(itemId) {
                    swal({
                        title: "Are you sure?",
                        text: "Are you sure that you want to delete this Item ?",
                        type: "warning",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        confirmButtonText: "Yes, delete it!",
                        confirmButtonColor: "#ec6c62"
                    }, function() {
                        $.ajax({
                            method: "GET",
                            url: "<?php echo e(URL::to('/')); ?>/categoryDelete/" + itemId,
                            type: "DELETE"
                        })
                                .done(function(data) {
                                    swal("Deleted!", "Your item was successfully deleted!", "success");
                                    location.reload();
                                })
                                .error(function(data) {
                                    swal("Oops", "We couldn't connect to the server!", "error");
                                    location.reload();
                                });
                    });
                }
            </script>


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