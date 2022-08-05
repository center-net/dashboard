<!-- jquery -->
<script src="<?php echo e(URL::asset('assets/js/jquery-3.3.1.min.js')); ?>"></script>
<!-- plugins-jquery -->
<script src="<?php echo e(URL::asset('assets/js/plugins-jquery.js')); ?>"></script>
<!-- plugin_path -->
<script type="text/javascript">var plugin_path = '<?php echo e(asset('assets/js')); ?>/';</script>

<!-- chart -->
<script src="<?php echo e(URL::asset('assets/js/chart-init.js')); ?>"></script>
<!-- calendar -->
<script src="<?php echo e(URL::asset('assets/js/calendar.init.js')); ?>"></script>
<!-- charts sparkline -->
<script src="<?php echo e(URL::asset('assets/js/sparkline.init.js')); ?>"></script>
<!-- charts morris -->
<script src="<?php echo e(URL::asset('assets/js/morris.init.js')); ?>"></script>
<!-- datepicker -->
<script src="<?php echo e(URL::asset('assets/js/datepicker.js')); ?>"></script>
<!-- sweetalert2 -->
<script src="<?php echo e(URL::asset('assets/js/sweetalert2.js')); ?>"></script>
<!-- toastr -->
<?php echo $__env->yieldContent('js'); ?>
<script src="<?php echo e(URL::asset('assets/js/toastr.js')); ?>"></script>
<!-- validation -->
<script src="<?php echo e(URL::asset('assets/js/validation.js')); ?>"></script>
<!-- lobilist -->
<script src="<?php echo e(URL::asset('assets/js/lobilist.js')); ?>"></script>
<!-- custom -->
<script src="<?php echo e(URL::asset('assets/js/custom.js')); ?>"></script>


<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    } );
</script>



<?php if(App::getLocale() == 'en'): ?>
    <script src="<?php echo e(URL::asset('assets/js/bootstrap-datatables/en/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/bootstrap-datatables/en/dataTables.bootstrap4.min.js')); ?>"></script>
<?php else: ?>
    <script src="<?php echo e(URL::asset('assets/js/bootstrap-datatables/ar/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/bootstrap-datatables/ar/dataTables.bootstrap4.min.js')); ?>"></script>
<?php endif; ?>



<script>
    function CheckAll(className, elem) {
        var elements = document.getElementsByClassName(className);
        var l = elements.length;

        if (elem.checked) {
            for (var i = 0; i < l; i++) {
                elements[i].checked = true;
            }
        } else {
            for (var i = 0; i < l; i++) {
                elements[i].checked = false;
            }
        }
    }
</script>


<script>
    $(document).ready(function () {
        $('select[name="Grade_id"]').on('change', function () {
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "<?php echo e(URL::to('Get_classrooms')); ?>/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="Classroom_id"]').empty();
                        $('select[name="Classroom_id"]').append('<option selected disabled ><?php echo e(trans('Parent_trans.Choose')); ?>...</option>');
                        $.each(data, function (key, value) {
                            $('select[name="Classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });

                    },
                });
            }

            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>


<script>
    $(document).ready(function () {
        $('select[name="Classroom_id"]').on('change', function () {
            var Classroom_id = $(this).val();
            if (Classroom_id) {
                $.ajax({
                    url: "<?php echo e(URL::to('Get_Sections')); ?>/" + Classroom_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="section_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });

                    },
                });
            }

            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>





<script>
    $(document).ready(function () {
        $('select[name="Grade_id_new"]').on('change', function () {
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "<?php echo e(URL::to('Get_classrooms')); ?>/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="Classroom_id_new"]').empty();
                        $('select[name="Classroom_id_new"]').append('<option selected disabled ><?php echo e(trans('Parent_trans.Choose')); ?>...</option>');
                        $.each(data, function (key, value) {
                            $('select[name="Classroom_id_new"]').append('<option value="' + key + '">' + value + '</option>');
                        });

                    },
                });
            }

            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>


<script>
    $(document).ready(function () {
        $('select[name="Classroom_id_new"]').on('change', function () {
            var Classroom_id = $(this).val();
            if (Classroom_id) {
                $.ajax({
                    url: "<?php echo e(URL::to('Get_Sections')); ?>/" + Classroom_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="section_id_new"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="section_id_new"]').append('<option value="' + key + '">' + value + '</option>');
                        });

                    },
                });
            }

            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>


<?php /**PATH E:\laravel\dashboard\resources\views/layouts/footer-scripts.blade.php ENDPATH**/ ?>