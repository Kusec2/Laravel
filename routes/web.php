<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\UserWorkoutController;
use App\Http\Controllers\ExerciseWorkoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

# authentication
Route::group(['prefix' => 'auth'], function () {
    Route::get('login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('login', [AuthController::class, 'postLogin'])->name('auth.do_login');
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::get('register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('register', [AuthController::class, 'postRegister'])->name('auth.do_register');
});

# users
Route::resource('users', UserController::class);

# exercises
Route::resource('exercises', ExerciseController::class);

# progress
Route::resource('progress', ProgressController::class);

# workout
Route::resource('workouts', WorkoutController::class);

# user_workout
Route::resource('user_workout', UserWorkoutController::class);
Route::get('user_workout/{user_id}/{workout_id}/edit', [UserWorkoutController::class, 'edit'])
    ->name('user_workout.edit');
Route::put('user_workout/{user_id}/{workout_id}', [UserWorkoutController::class, 'update'])
    ->name('user_workout.update');
Route::delete('user_workout/{user_id}/{workout_id}', [UserWorkoutController::class, 'destroy'])->name('user_workout.destroy');

# exercise_workout
Route::resource('exercise_workout', ExerciseWorkoutController::class);
Route::get('exercise_workout/{exercise_id}/{workout_id}/edit', [ExerciseWorkoutController::class, 'edit'])
    ->name('exercise_workout.edit');
Route::put('exercise_workout/{exercise_id}/{workout_id}', [ExerciseWorkoutController::class, 'update'])
    ->name('exercise_workout.update');
Route::delete('exercise_workout/{exercise_id}/{workout_id}', [ExerciseWorkoutController::class, 'destroy'])
    ->name('exercise_workout.destroy');
