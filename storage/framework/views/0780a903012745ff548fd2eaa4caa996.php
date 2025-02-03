

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12 mb-5">
        <a href="<?php echo e(route('exercise_workout.index')); ?>" class="btn btn-secondary">Back</a>
</div>

<form action="<?php echo e(route('exercise_workout.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label for="exercise_id" class="form-label">Exercise</label>
        <select class="form-control" id="exercise_id" name="exercise_id" required>
            <option value="" disabled selected>Select Exercise</option>
            <?php $__currentLoopData = $exercises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($id); ?>"><?php echo e($name); ?></option>
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
    <div class="mb-3">
        <label for="order_num" class="form-label">Order number</label>
        <input type="number" class="form-control" id="order_num" name="order_num" step="1" min="0">
    </div>
    <div class="mb-3">
        <label for="sets" class="form-label">Sets</label>
        <input type="number" class="form-control" id="sets" name="sets" step="1" min="0" required>
    </div>
    <div class="mb-3">
        <label for="repetitions" class="form-label">Repetitions</label>
        <input type="number" class="form-control" id="repetitions" name="repetitions" step="1" min="0">
    </div>
    <div class="mb-3">
        <label for="duration" class="form-label">Duration (s)</label>
        <input type="number" class="form-control" id="duration" name="duration" step="1" min="0">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tomis\Desktop\Marko\Faks\BPIO\aplikacija_za_fitness\resources\views/exercise_workout/create.blade.php ENDPATH**/ ?>