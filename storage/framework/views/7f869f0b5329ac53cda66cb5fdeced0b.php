<table>
    <thead>
        <tr>
            <th>DNI</th>
            <th>Apellido</th>
            <th>Nombre</th>
            <th>Asistencias</th>
            <th>Condición</th>
            <tH>Año</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $studentsData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($student['alumn_DNI']); ?></td>
                <td><?php echo e($student['apellido']); ?></td>
                <td><?php echo e($student['nombre']); ?></td>
                <td><?php echo e($student['assistsCount']); ?></td>
                <td><?php echo e($student['condition']); ?></td>
                <td><?php echo e($student['año']); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH C:\laragon\www\Laravel-CRUD-Janusa\resources\views/Student/export.blade.php ENDPATH**/ ?>