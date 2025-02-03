

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12 mb-5">
        <a href="<?php echo e(route('workouts.index')); ?>" class="btn btn-secondary">Back</a>
</div>

<form action="<?php echo e(route('workouts.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label"> Description</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
    </div>
    <div class="mb-3">
        <label for="difficulty" class="form-label">Difficulty</label>
        <input type="text" class="form-control" id="difficulty" name="difficulty" required>
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <input type="text" class="form-control" id="type" name="type" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tomis\Desktop\Marko\Faks\BPIO\aplikacija_za_fitness\resources\views/workouts/create.blade.php ENDPATH**/ ?>