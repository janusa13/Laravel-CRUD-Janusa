<?php $__env->startSection('content'); ?>

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e($message); ?>

            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-header">Product List</div>
            <div class="card-body">
                <a href="<?php echo e(route('products.create')); ?>" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Product</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <th scope="row"><?php echo e($loop->iteration); ?></th>
                            <td><?php echo e($product->code); ?></td>
                            <td><?php echo e($product->name); ?></td>
                            <td><?php echo e($product->quantity); ?></td>
                            <td><?php echo e($product->price); ?></td>
                            <td>
                                <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <a href="<?php echo e(route('products.show', $product->id)); ?>" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this product?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Product Found!</strong>
                                </span>
                            </td>
                        <?php endif; ?>
                    </tbody>
                  </table>

                  <?php echo e($products->links()); ?>


            </div>
        </div>
    </div>    
</div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('products.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-10-crud\resources\views/products/index.blade.php ENDPATH**/ ?>