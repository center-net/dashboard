<?php $__env->startSection('content'); ?>
<!-- row -->
<div class="row">
    <div class="col-xl-12 mb-30">
      <div class="card card-statistics h-100">
        <div class="card-body">

            <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <button type="button" class="button x-small" data-toggle="modal" data-target="#employees">
            إضافة موظف
        </button>
        <br><br>

          <div class="table-responsive">
            <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
            data-page-length="50"
            style="text-align: center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الإسم</th>
                    <th>الجوال</th>
                    <th>البريد الالكتروني</th>
                    <th>إسم النستخدم</th>
                    <th>الحالة</th>
                    <th>الإدارة</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index+1); ?></td>
                        <td><?php echo e($employee->fullname); ?></td>
                        <td><?php echo e($employee->mobile); ?></td>
                        <td><?php echo e($employee->email); ?></td>
                        <td><?php echo e($employee->username); ?></td>
                        <td><?php echo e($employee->status); ?></td>
                        <td>

                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                            data-target="#edit<?php echo e($employee->id); ?>"
                            title="تعديل بيانات الموظف <?php echo e($employee->fullname); ?>"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#delete<?php echo e($employee->id); ?>"
                            title="حذف بيانات الموظف <?php echo e($employee->fullname); ?>"><i
                                class="fa fa-trash"></i></button>

                        </td>
                    </tr>
                    <!-- edit_modal_Grade -->
                    <div class="modal fade" id="edit<?php echo e($employee->id); ?>" tabindex="-1" role="dialog"
                        aria-labelledby="employeesLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="employeesLabel">
                                        تعديل بيانات الموظف <?php echo e($employee->fullname); ?>

                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- add_form -->
                                    <form action="<?php echo e(route('employees.update', 'test')); ?>" method="post">
                                        <?php echo e(method_field('patch')); ?>

                                        <?php echo csrf_field(); ?>


                                        <br><br>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">إلغاء</button>
                                            <button type="submit"
                                                class="btn btn-success">إرسال</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- delete_modal_Grade -->
                    <div class="modal fade" id="delete<?php echo e($employee->id); ?>" tabindex="-1" role="dialog"
                        aria-labelledby="employeesLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="employeesLabel">
                                        حذف بيانات الموظف <?php echo e($employee->fullname); ?>

                                    </h5>

                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo e(route('employees.destroy', 'test')); ?>" method="post">
                                        <?php echo e(method_field('Delete')); ?>

                                        <?php echo csrf_field(); ?>
                                        ها تريد بالتأكيد حذف بيانات الموظف <?php echo e($employee->fullname); ?> ؟؟
                                        <br><br>
                                        <input id="id" type="hidden" name="id" class="form-control"
                                            value="<?php echo e($employee->id); ?>">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">إلغاء</button>
                                            <button type="submit"
                                                class="btn btn-danger">موافق</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
         </table>
        </div>
        </div>
      </div>
    </div>

    <!-- add_modal_Grade -->
    <div class="modal fade" id="employees" tabindex="-1" role="dialog" aria-labelledby="employeesLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="employeesLabel">
                    إضافة موظف
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="<?php echo e(route('employees.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2"><?php echo e(trans('Grades_trans.stage_name_ar')); ?>

                                :</label>
                            <input id="Name" type="text" name="Name" class="form-control">
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2"><?php echo e(trans('Grades_trans.stage_name_en')); ?>

                                :</label>
                            <input type="text" class="form-control" name="Name_en">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"><?php echo e(trans('Grades_trans.Notes')); ?>

                            :</label>
                        <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">إلغاء</button>
                <button type="submit" class="btn btn-success">إرسال</button>
            </div>
            </form>

        </div>
    </div>
</div>


</div>

<!-- row closed -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    @toastr_js
    @toastr_render
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\dashboard\resources\views/employees/index.blade.php ENDPATH**/ ?>