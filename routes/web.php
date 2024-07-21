<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Alumni;
use App\Http\Middleware\SuperAdmin;


Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

//put this route and imported it above in an attempt to change the beginning page to login directly 

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');

// Route::get('/dashboard', function () { 
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware([SuperAdmin::class])->group(function () {
   
});

Route::middleware([Admin::class])->group(function () {
    Route::get('/createjob', [HomeController::class, 'createjob'])->name('createjob');
    Route::post('/jobcreate', [HomeController::class, 'jobcreate'])->name('jobcreate');
});

Route::middleware([Alumni::class])->group(function () {
   
});


// Route::group(['middleware' => ['role:super-admin|admin']], function() {

//     Route::resource('permissions', App\Http\Controllers\PermissionController::class);

//     Route::get('permissions/{permissionId}/delete', [App\Http\Controllers\PermissionController::class, 'destroy']);


//     Route::resource('roles', App\Http\Controllers\RoleController::class);
//     Route::get('roles/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'destroy']);
//     Route::get('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
//     Route::put('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'givePermissionToRole']);

//     Route::resource('users', App\Http\Controllers\UserController::class);
//     Route::get('users/{userId}/delete', [App\Http\Controllers\UserController::class, 'destroy']);

// });


require __DIR__.'/auth.php';
