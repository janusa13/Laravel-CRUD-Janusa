

<?php $__env->startSection('content'); ?>

<div class="row justify-content-center mt-3" data-bs-theme="dark">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Asistencias.
                </div>
                <div class="float-end">
                    <a href="<?php echo e(route('student.index')); ?>" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Nombre:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        <?php echo e($student->nombre); ?>

                    </div>
                </div>

                <div class="row">
                    <label for="lastname" class="col-md-4 col-form-label text-md-end text-start"><strong>Apellido:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        <?php echo e($student->apellido); ?>

                    </div>
                </div>
                                                <div class="row">
                    <label for="lastname" class="col-md-4 col-form-label text-md-end text-start"><strong>Cantidad de asistencias:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        <?php echo e($asist); ?>

                    </div>

                <div class="row">
                    <label for="assists" class="col-md-4 col-form-label text-md-end text-start"><strong>Porcentaje de asistencias:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        <?php echo e($cant); ?>%
                    </div>
                </div>
                                <div class="row">
                    <label for="lastname" class="col-md-4 col-form-label text-md-end text-start"><strong>Condicion:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        <?php echo e($condicion); ?>

                    </div>
                </div>
                <div class="row">
                <label for="assists" class="col-md-4 col-form-label text-md-end text-start"><strong>Fecha de Asistencias:</strong></label>
                <div class="col-md-6" style="line-height: 35px;">
                <?php $__currentLoopData = $assists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>Fecha:  <?php echo e($assist->created_at->format('d-m-Y')); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
        
            </div>
        </div>
    </div>    
</div>
    
<?php $__env->stopSection(); ?>



<?php echo $__env->make('../dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Laravel-CRUD-Janusa\resources\views/student/assists.blade.php ENDPATH**/ ?>