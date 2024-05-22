
<?php $__env->startSection('content'); ?>

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e($message); ?>

            </div>
        <?php endif; ?>
        <?php if($errors->any()): ?>
            <div class="alert alert-warning" role="alert">
                <?php echo e($errors->first()); ?>

            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Search Student
                </div>
                <div class="float-end">
                    <a href="<?php echo e(route('student.index')); ?>" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('student.showSearch')); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <div class="mb-3 row">
                        <label for="alumn_DNI" class="col-md-4 col-form-label text-md-end text-start">DNI</label>
                        <div class="col-md-6">
                          <input type="text" pattern="[0-9]*" class="form-control <?php $__errorArgs = ['alumn_DNI'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="alumn_DNI" name="alumn_DNI">
                            <?php if($errors->has('alumn_DNI')): ?>
                                <span class="text-danger"><?php echo e($errors->first('alumn_DNI')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Buscar Alumno">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Laravel-CRUD-Janusa\resources\views/student/search.blade.php ENDPATH**/ ?>