

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12 mb-5">
        <a href="<?php echo e(route('user_workout.index')); ?>" class="btn btn-secondary">Back</a>
</div>

<form action="<?php echo e(route('user_workout.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label for="user_id" class="form-label">User</label>
        <select class="form-control" id="user_id" name="user_id" required>
            <option value="" disabled selected>Select User</option>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($user->id); ?>">
                    <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="workout_id" class="form-label">Workout</label>
        <select class="form-control" id="workout_id" name="workout_id" required>
            <option value="" disabled selected>Select Workout</option>
            <?php $__currentLoopData = $workouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($id); ?>"><?php echo e($name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    
    
    <button type="submit" class="btn btn-primary">Submit</button>

</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tomis\Desktop\Marko\Faks\BPIO\aplikacija_za_fitness\resources\views/user_workout/create.blade.php ENDPATH**/ ?>