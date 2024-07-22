<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Alumni;
use App\Http\Middleware\SuperAdmin;
use Spatie\Permission\Models\Role;

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

//put this route and imported it above in an attempt to change the beginning page to login directly

 Route::get('/', function () {
    return view('welcome');
 });

//Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');
//

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
    Route::get('/viewjob', [HomeController::class, 'viewjob'])->name('viewjob');
    Route::get('/deletejob/{id}',[HomeController::class,'deletejob'])->name('deletejob');
    Route::get('/editjob/{id}',[HomeController::class,'editjob'])->name('editjob');
    Route::post('/jobedit/{id}',[HomeController::class,'jobedit'])->name('jobedit');
});

Route::middleware([Alumni::class])->group(function () {
    Route::get('/viewposting', [HomeController::class, 'viewposting'])->name('viewposting');
    Route::get('/postview', [HomeController::class, 'postview'])->name('postview');

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



Route::post('/updateRole/{id}', [HomeController::class, 'updateRole'])->name('updateRole');




// Routes for users
Route::get('/users', [UserController::class, 'index'])->middleware('permission:view-user')->name('viewuser');
Route::get('/add/users', function () {
    $roles = Role::all();
    return view('super.layouts.adduser', compact('roles'));
})->middleware('permission:create-user')->name('adduser');
Route::post('/add/users', [UserController::class, 'store'])->middleware('permission:create-user')->name('createuser');
Route::get('/edit/users/{user}', [UserController::class, 'edit'])->middleware('permission:update-user')->name('edituser');
Route::put('/update/users/{user}', [UserController::class, 'update'])->middleware('permission:update-user')->name('updateuser');
Route::delete('/delete/users/{user}', [UserController::class, 'destroy'])->middleware('permission:delete-user')->name('deleteuser');


require __DIR__.'/auth.php';
