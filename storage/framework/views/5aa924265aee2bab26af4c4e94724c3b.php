

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12 mb-5">
        <a href="<?php echo e(route('exercises.index')); ?>" class="btn btn-secondary">Back</a>
</div>

<form action="<?php echo e(route('exercises.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea  class="form-control" id="description" name="description" required></textarea>
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <input type="text" class="form-control" id="type" name="type" required>
    </div>
    <div class="mb-3">
        <label for="repetitions" class="form-label">Repetitions</label>
        <input type="number" class="form-control" id="repetitions" name="repetitions" step="0.1" min="0">
    </div>
    <div class="mb-3">
        <label for="duration" class="form-label">Duration (s)</label>
        <input type="number" class="form-control" id="duration" name="duration" step="1" min="0">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tomis\Desktop\Marko\Faks\BPIO\aplikacija_za_fitness\resources\views/exercises/create.blade.php ENDPATH**/ ?>