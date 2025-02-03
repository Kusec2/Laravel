

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12 mb-5">
        <a href="<?php echo e(route('users.index')); ?>" class="btn btn-secondary">Back</a>
</div>

<form action="<?php echo e(route('users.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label for="first_name" class="form-label">First name</label>
        <input type="text" class="form-control" id="first_name" name="first_name" required>
    </div>
    <div class="mb-3">
        <label for="last_name" class="form-label">Last name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="tel" class="form-control" id="phone" name="phone" required>
    </div>
    <div class="mb-3">
        <label for="birth_date" class="form-label">Birthdate</label>
        <input type="date" class="form-control" id="birth_date" name="birth_date">
    </div>
    <div class="mb-3">
        <label for="height" class="form-label">Height (cm)</label>
        <input type="number" class="form-control" id="height" name="height" step="0.1" min="0"> 
    </div>
    <div class="mb-3">
        <label for="weight" class="form-label">Weight (kg)</label>
        <input type="number" class="form-control" id="weight" name="weight" step="0.1" min="0"> 
    </div>
    <div class="mb-3">
        <label for="gender" class="form-label">Gender</label><br>
        <input type="radio"  name="gender" value="male"> Male
        <input type="radio"  name="gender" value="female"> Female

    </div>
    <div class="mb-3">
        <label for="goal" class="form-label">Goal</label>
        <textarea class="form-control" id="goal" name="goal" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tomis\Desktop\Marko\Faks\BPIO\aplikacija_za_fitness\resources\views/users/create.blade.php ENDPATH**/ ?>