<?php $__env->startSection('css'); ?>

<?php $__env->startSection('title'); ?>
    نظام المخازن
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">لوحة التحكم</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item">الرئيسية</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <p>Page content goes here<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></p>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\dashboard\resources\views/empty.blade.php ENDPATH**/ ?>