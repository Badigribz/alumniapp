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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware([SuperAdmin::class])->group(function () {

});


Route::get('/createjob', [HomeController::class, 'createjob'])->middleware('permission:create-job')->name('createjob');
Route::post('/jobcreate', [HomeController::class, 'jobcreate'])->middleware('permission:create-job')->name('jobcreate');
Route::get('/viewjob', [HomeController::class, 'viewjob'])->middleware('permission:view-job')->name('viewjob');
Route::get('/deletejob/{id}',[HomeController::class,'deletejob'])->middleware('permission:delete-job')->name('deletejob');
Route::get('/editjob/{id}',[HomeController::class,'editjob'])->middleware('permission:update-job')->name('editjob');
Route::post('/jobedit/{id}',[HomeController::class,'jobedit'])->middleware('permission:update-job')->name('jobedit');
Route::get('/viewposting', [HomeController::class, 'viewposting'])->middleware('permission:view-job-postings')->name('viewposting');
Route::get('postview', [HomeController::class, 'postview'])->middleware('permission:view-job-postings')->name('postview');
Route::get('jobdesc/{id}', [HomeController::class, 'jobdesc'])->middleware('permission:view-job-postings')->name('jobdesc');
Route::get('/viewport', [HomeController::class, 'viewport'])->middleware('permission:view-portfolio')->name('viewport');
Route::get('addport', [HomeController::class, 'addport'])->middleware('permission:create-portfolio')->name('addport');
Route::post('/portadd', [HomeController::class, 'portadd'])->middleware('permission:create-portfolio')->name('portadd');
Route::delete('/deleteport/{id}', [HomeController::class, 'deleteport'])->middleware('permission:delete-portfolio')->name('deleteport');
Route::get('/editport/{id}', [HomeController::class, 'editport'])->middleware('permission:edit-portfolio')->name('editport');
Route::put('/portedit/{id}', [HomeController::class, 'portedit'])->middleware('permission:edit-portfolio')->name('portedit');
Route::get('myportfolio', [HomeController::class, 'myportfolio'])->middleware('permission:myportfolio')->name('myportfolio');
Route::get('search_job', [HomeController::class, 'search_job'])->middleware('permission:search-job')->name('search_job');
Route::get('createGallery', [HomeController::class, 'createGallery'])->name('createGallery');
Route::post('storeGallery', [HomeController::class, 'storeGallery'])->name('storeGallery');
Route::get('viewGallery', [HomeController::class, 'viewGallery'])->name('viewGallery');
Route::delete('deleteGallery/{id}', [HomeController::class, 'deleteGallery'])->name('deleteGallery');
Route::get('editGallery/{id}', [HomeController::class, 'editGallery'])->name('editGallery');
Route::post('updateGallery/{id}', [HomeController::class, 'updateGallery'])->name('updateGallery');



Route::post('/updateRole/{id}', [HomeController::class, 'updateRole'])->name('updateRole');


// Routes for users
Route::get('/users', [UserController::class, 'index'])->middleware('permission:view-user')->name('viewuser');
Route::get('/add/users', function () {
    $roles = Role::all();
    return view('super.layouts.adduser', compact('roles'));
})->middleware('permission:create-user')->name('adduser');
Route::post('/add/users', [UserController::class, 'store'])->middleware('permission:create-user')->name('createuser');
Route::post('/uploadjson', [UserController::class, 'uploadJSON'])->middleware('permission:create-user')->name('uploadjson');
Route::get('download-cv/{id}', [HomeController::class, 'downloadCv'])->name('portfolio.downloadCv');
Route::get('/edit/users/{user}', [UserController::class, 'edit'])->middleware('permission:update-user')->name('edituser');
Route::put('/update/users/{user}', [UserController::class, 'update'])->middleware('permission:update-user')->name('updateuser');
Route::delete('/delete/users/{user}', [UserController::class, 'destroy'])->middleware('permission:delete-user')->name('deleteuser');


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
