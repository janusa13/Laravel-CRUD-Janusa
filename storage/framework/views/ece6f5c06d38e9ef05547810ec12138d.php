

<?php $__env->startSection('content'); ?>

<div class="row justify-content-center mt-3">
    <div class="col-md-12">
        <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e($message); ?>

            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">Actions List</div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#s</th>
                        <th scope="col">Ip</th>
                        <th scope="col">Name</th>
                        <th scope="col">accion</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">hora</th>
                        <th scope="col">Navegador</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $registros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <th scope="row"><?php echo e($loop->iteration); ?></th>

                            <td><?php echo e($registro->ip); ?></td>
                            <td><?php echo e($registro->user); ?></td>
                            <td><?php echo e($registro->accion); ?></td>
                            <td><?php echo e($registro->fecha); ?></td>
                            <td><?php echo e($registro->hora); ?></td>
                            <td><?php echo e($registro->navegador); ?></td>
                            <td>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Actions Found!</strong>
                                </span>
                            </td>
                        <?php endif; ?>
                    </tbody>
                  </table>

                  <?php echo e($registros->links()); ?>


            </div>
        </div>
    </div>    
</div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Laravel-CRUD-Janusa\resources\views/registros/index.blade.php ENDPATH**/ ?>