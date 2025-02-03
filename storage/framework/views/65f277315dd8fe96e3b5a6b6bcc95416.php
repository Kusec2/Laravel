

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
        <a href="<?php echo e(route('users.create')); ?>" class="btn btn-primary">Add User</a>
    </div>
</div>

<div class="table-responsive">
<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Phone</th>
            <th>Birth date</th>
            <th>Gender</th>
            <th>Height</th>
            <th>Weight</th>
            <th>Goal</th>
        </tr>
    </thead>
<tbody>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($user -> id); ?></td>
        <td><?php echo e($user -> first_name); ?></td>
        <td><?php echo e($user -> last_name); ?></td>
        <td><?php echo e($user -> email); ?></td>
        <td class="break-word-column"><?php echo e($user -> password); ?></td>
        <td><?php echo e($user -> phone); ?></td>
        <td><?php echo e($user -> birth_date); ?></td>
        <td><?php echo e($user -> gender); ?></td>
        <td><?php echo e($user -> height); ?></td>
        <td><?php echo e($user -> weight); ?></td>
        <td class="break-word-column"><?php echo e($user -> goal); ?></td>
        <td class="text-end">
            
                    <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn btn-sm btn-outline-primary me-2">
                        Edit
                    </a>
                    
                    <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="POST" class="d-inline">
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
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tomis\Desktop\Marko\Faks\BPIO\aplikacija_za_fitness\resources\views/users/index.blade.php ENDPATH**/ ?>