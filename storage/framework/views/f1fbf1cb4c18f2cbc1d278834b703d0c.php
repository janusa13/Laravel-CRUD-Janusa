

<?php $__env->startSection('content'); ?>

<div class="row justify-content-center mt-3" data-bs-theme="dark">
    <div class="col-md-12">

        <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e($message); ?>

            </div>
        <?php endif; ?>

        <div class="card" data-bs-theme="dark">
            <div class="card-header">Student List</div>
            <div class="card-body">
                <a href="<?php echo e(route('student.create')); ?>" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Student</a>
                  <a href="<?php echo e(route('lesson.created')); ?>" class="btn btn-success btn-sm my-2"><i  class="bi bi-pencil-square""></i>Class options</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">S#</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Fecha de nacimiento</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <th scope="row"><?php echo e($loop->iteration); ?></th>
                            <td><?php echo e($student->alumn_DNI); ?></td>
                            <td><?php echo e($student->nombre); ?></td>
                            <td><?php echo e($student->apellido); ?></td>
                            <td><?php echo e($student->fecha_nac); ?></td>
                            <td>
                                <form action="<?php echo e(route('student.destroy', $student->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <a href="<?php echo e(route('student.show', $student->id)); ?>" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    <a href="<?php echo e(route('student.edit', $student->id)); ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                    
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this student?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                                <a href="<?php echo e(route('student.assists', ['id' => $student->id])); ?>" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i> Asistencias</a>
                                <a href="<?php echo e(route('student.addAssists', ['id' => $student->id])); ?>"  class="btn btn-success btn-sm my-2"><i class="bi bi-eye"></i> Agregar asistencia</a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Student Found!</strong>
                                </span>
                            </td>
                        <?php endif; ?>
                        <?php echo e($students->links()); ?>

                    </tbody>
                  </table>
                

            </div>
        </div>
    </div>    
</div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Laravel-CRUD-Janusa\resources\views/student/index.blade.php ENDPATH**/ ?>