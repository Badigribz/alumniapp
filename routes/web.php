<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Alumni;
use App\Http\Middleware\SuperAdmin;
use Spatie\Permission\Models\Role;

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

//put this route and imported it above in an attempt to change the beginning page to login directly

//  Route::get('/', function () {
//     return view('welcome');
//  });

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');
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
    Route::get('postview', [HomeController::class, 'postview'])->name('postview');
    Route::get('jobdesc/{id}', [HomeController::class, 'jobdesc'])->name('jobdesc');
    Route::get('/viewport', [HomeController::class, 'viewport'])->name('viewport');
    Route::get('addport', [HomeController::class, 'addport'])->middleware('permission:create-portfolio')->name('addport');
    Route::post('/portadd', [HomeController::class, 'portadd'])->middleware('permission:create-portfolio')->name('portadd');
    Route::delete('/deleteport/{id}', [HomeController::class, 'deleteport'])->name('deleteport');
    Route::get('/editport/{id}', [HomeController::class, 'editport'])->name('editport');
    Route::put('/portedit/{id}', [HomeController::class, 'portedit'])->name('portedit');
    Route::get('myportfolio', [HomeController::class, 'myportfolio'])->name('myportfolio');
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
Route::get('/createjob', [HomeController::class, 'createjob'])->middleware('permission:create-job')->name('createjob');


//Routes for roles
Route::get('/roles', [RoleController::class, 'index'])->middleware('permission:view-role')->name('viewrole');
Route::get('/add/roles', [RoleController::class, 'create'])->middleware('permission:create-role')->name('createrole');
Route::post('/add/roles', [RoleController::class, 'store'])->middleware('permission:create-role')->name('storerole');
Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->middleware('permission:update-role')->name('editrole');
Route::put('/roles/{role}', [RoleController::class, 'update'])->middleware('permission:update-role')->name('updaterole');
Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->middleware('permission:delete-role')->name('deleterole');

//Routes for permissions
Route::get('/permissions', [PermissionController::class, 'index'])->middleware('permission:view-permission')->name('viewpermission');
Route::get('/add/permissions', [PermissionController::class, 'create'])->middleware('permission:create-permission')->name('createpermission');
Route::post('/add/permissions', [PermissionController::class, 'store'])->middleware('permission:create-permission')->name('storepermission');
Route::get('/permissions/{permission}/edit', [PermissionController::class, 'edit'])->middleware('permission:update-permission')->name('editpermission');
Route::put('/permissions/{permission}', [PermissionController::class, 'update'])->middleware('permission:update-permission')->name('updatepermission');
Route::delete('/permissions/{permission}', [PermissionController::class, 'destroy'])->middleware('permission:delete-permission')->name('deletepermission');

require __DIR__.'/auth.php';
