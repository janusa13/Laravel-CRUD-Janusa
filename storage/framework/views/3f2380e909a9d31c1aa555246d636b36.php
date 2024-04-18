

<?php $__env->startSection('content'); ?>

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Student
                </div>
                <div class="float-end">
                    <a href="<?php echo e(route('student.index')); ?>" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('student.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <div class="mb-3 row">
                        <label for="DNI" class="col-md-4 col-form-label text-md-end text-start">DNI</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control <?php $__errorArgs = ['dni'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="DNI" name="alumn_DNI" value="<?php echo e(old('alumn_DNI')); ?>">
                            <?php if($errors->has('alumn_DNI')): ?>
                                <span class="text-danger"><?php echo e($errors->first('ALUMN_DNI')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-end text-start">Nombre</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nombre" name="nombre" value="<?php echo e(old('nombre')); ?>">
                            <?php if($errors->has('nombre')): ?>
                                <span class="text-danger"><?php echo e($errors->first('nombre')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="apellido" class="col-md-4 col-form-label text-md-end text-start">Apellido</label>
                        <div class="col-md-6">
                          <input type="text" step="0.01" class="form-control <?php $__errorArgs = ['apellido'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="apellido" name="apellido" value="<?php echo e(old('apellido')); ?>">
                            <?php if($errors->has('apellido')): ?>
                                <span class="text-danger"><?php echo e($errors->first('apellido')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="fecha_nac" class="col-md-4 col-form-label text-md-end text-start">Fecha de nacimiento</label>
                        <div class="col-md-6">
                            <input type="date" step="0.01" class="form-control <?php $__errorArgs = ['fecha_nac'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="fecha_nac" name="fecha_nac" value="<?php echo e(old('fecha_nac')); ?>">
                            <?php if($errors->has('fecha_nac')): ?>
                                <span class="text-danger"><?php echo e($errors->first('fecha_nac')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Student">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Laravel-CRUD-Janusa\resources\views/student/create.blade.php ENDPATH**/ ?>