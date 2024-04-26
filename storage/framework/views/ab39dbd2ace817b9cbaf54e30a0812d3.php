

<?php $__env->startSection('content'); ?>

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Lessons
                </div>
                <div class="float-end">
                    <a href="<?php echo e(route('student.index')); ?>" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('lesson.add')); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <div class="mb-3 row">
                        <label for="lessons" class="col-md-4 col-form-label text-md-end text-start">Cantidad de Clases</label>
                        <div class="col-md-6">
                          <input type="number" class="form-control <?php $__errorArgs = ['lesson'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="lessons" name="lessons" value="<?php echo e(old('lessons')); ?>">
                            <?php if($errors->has('lessons')): ?>
                                <span class="text-danger"><?php echo e($errors->first('lessons')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="promocion" class="col-md-4 col-form-label text-md-end text-start">Porcentaje minimo: Promocion</label>
                        <div class="col-md-6">
                          <input type="number" class="form-control <?php $__errorArgs = ['promocion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="promocion" name="promocion" value="<?php echo e(old('promocion')); ?>">
                            <?php if($errors->has('promocion')): ?>
                                <span class="text-danger"><?php echo e($errors->first('promocion')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="regular" class="col-md-4 col-form-label text-md-end text-start">Porcentaje minimo: Regular</label>
                        <div class="col-md-6">
                          <input type="number" step="0.01" class="form-control <?php $__errorArgs = ['regular'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="regular" name="regular" value="<?php echo e(old('regular')); ?>">
                            <?php if($errors->has('regular')): ?>
                                <span class="text-danger"><?php echo e($errors->first('regular')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Lessons">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Laravel-CRUD-Janusa\resources\views/lessons/create.blade.php ENDPATH**/ ?>