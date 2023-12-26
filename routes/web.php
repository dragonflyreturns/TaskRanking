<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TaskController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(TaskController::class)->middleware(['auth'])->group(function(){
    Route::get('/tasks', 'show')->name('tasks');
    Route::get('/tasks/create', 'create')->name('create');
    Route::get('/tasks/createType', 'createType')->name('createType');
    Route::post('/tasks/createType', 'storeType')->name('storeType');
    Route::post('/tasks', 'store')->name('store');
    Route::delete('/tasks/{task}', 'destroy')->name('tasks.destroy');
    Route::delete('/tasks/createType/{category}', 'destroyType')->name('type.destroy');
});

Route::get('/', [EventController::class, 'show'])->name("show")->middleware('auth');
Route::post('/calendar/get',  [EventController::class, 'get'])->name("get"); 

require __DIR__.'/auth.php';
