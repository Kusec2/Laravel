

<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>

<?php $__env->startSection('content'); ?>


<div class="row">
    <div class="col-md-12 mb-3">
        <a href="<?php echo e(route('exercises.create')); ?>" class="btn btn-primary">Add Exercise</a>
    </div>
</div>


<table class= "table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Type</th>
            <th>Repetitions</th>
            <th>Duration</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $exercises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exercise): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($exercise -> id); ?></td>
            <td><?php echo e($exercise -> name); ?></td>
            <td><?php echo e($exercise -> description); ?></td>
            <td><?php echo e($exercise -> type); ?></td>
            <td><?php echo e($exercise -> repetitions); ?></td>
            <td><?php echo e($exercise -> duration); ?></td>
            <td class="text-end">

                    <a href="<?php echo e(route('exercises.edit', $exercise->id)); ?>" class="btn btn-sm btn-outline-primary me-2">
                        Edit
                    </a>

                    
                    <form action="<?php echo e(route('exercises.destroy', $exercise->id)); ?>" method="POST" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tomis\Desktop\Marko\Faks\BPIO\aplikacija_za_fitness\resources\views/exercises/index.blade.php ENDPATH**/ ?>