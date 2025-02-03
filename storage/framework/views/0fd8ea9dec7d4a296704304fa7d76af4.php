

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
        <a href="<?php echo e(route('progress.create')); ?>" class="btn btn-primary">Add Progress</a>
    </div>
</div>


<table class="table table-striped">
    <thead>
        <th>Id</th>
        <th>User Id</th>
        <th>Measurement date</th>
        <th>Weight</th>
        <th>Chest</th>
        <th>Waist</th>
        <th>Hip</th>
        <th>Max bench</th>
        <th>Max deadlift</th>
        <th>Max squat</th>
    </thead>
<tbody>
    <?php $__currentLoopData = $progress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $progress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($progress -> id); ?></td>
        <td><?php echo e($progress -> user_id); ?></td>
        <td><?php echo e($progress -> measurement_date); ?></td>
        <td><?php echo e($progress -> weight); ?></td>
        <td><?php echo e($progress -> chest); ?></td>
        <td><?php echo e($progress -> waist); ?></td>
        <td><?php echo e($progress -> hip); ?></td>
        <td><?php echo e($progress -> max_bench); ?></td>
        <td><?php echo e($progress -> max_deadlift); ?></td>
        <td><?php echo e($progress -> max_squat); ?></td>
        <td class="text-end">

                    <a href="<?php echo e(route('progress.edit', $progress->id)); ?>" class="btn btn-sm btn-outline-primary me-2">
                        Edit
                    </a>
                    
                    <form action="<?php echo e(route('progress.destroy', $progress->id)); ?>" method="POST" class="d-inline">
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tomis\Desktop\Marko\Faks\BPIO\aplikacija_za_fitness\resources\views/progress/index.blade.php ENDPATH**/ ?>