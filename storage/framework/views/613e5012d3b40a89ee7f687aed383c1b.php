

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
        <a href="<?php echo e(route('exercise_workout.create')); ?>" class="btn btn-primary">Add Exercise_Workout</a>
    </div>
</div>


<table class="table table-striped">
    <thead>
        <tr>
            <th>Exercise Id</th>
            <th>Workout Id</th>
            <th>Order number</th>
            <th>Sets</th>
            <th>Repetitions</th>
            <th>Duration</th>
        </tr>
    </thead>
<tbody>
    <div class="card" style="width: 18rem;">
        <img src="image.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h7 class="card-title">Naziv uređaja</h5>
          <p class="card-text">Opis uređaja.</p>
        </div>
      </div>    
    <?php $__currentLoopData = $exercise_workout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exercise_workout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($exercise_workout -> exercise_id); ?></td>
        <td><?php echo e($exercise_workout -> workout_id); ?></td>
        <td><?php echo e($exercise_workout -> order_num); ?></td>
        <td><?php echo e($exercise_workout -> sets); ?></td>
        <td><?php echo e($exercise_workout -> repetitions); ?></td>
        <td><?php echo e($exercise_workout -> duration); ?></td>
        <td class="text-end">

            <a href="<?php echo e(route('exercise_workout.edit', ['exercise_id' => $exercise_workout->exercise_id, 'workout_id' => $exercise_workout->workout_id])); ?>" 
                class="btn btn-sm btn-outline-primary me-2">
                Edit
             </a>
                    
                    <form action="<?php echo e(route('exercise_workout.destroy',['exercise_id'=>$exercise_workout->exercise_id, 'workout_id'=>$exercise_workout->workout_id])); ?>" method="POST" class="d-inline">
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tomis\Desktop\Marko\Faks\BPIO\aplikacija_za_fitness\resources\views/exercise_workout/index.blade.php ENDPATH**/ ?>