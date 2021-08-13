<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\DownloadManagementController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserManagementController;
use App\Models\Download;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function() {
    /* Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard'); */

    //Main UI for Users
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //Downloading route
    Route::get('/download/{id}', [DashboardController::class, 'download'])->name('download');
    //User management CRUD
    Route::get('/usermanagement', [UserManagementController::class, 'index'])->name('user-management');
    Route::get('/usermanagement-create', [UserManagementController::class, 'create'])->name('user-create');
    Route::get('/usermanagement-edit/{id}', [UserManagementController::class, 'edit'])->name('user-edit');
    Route::post('/usermanagement', [UserManagementController::class, 'store'])->name('user-store');
    Route::put('/usermanagement-update/{id}', [UserManagementController::class, 'update'])->name('user-update');
    Route::delete('/usermanagement-delete/{id}', [UserManagementController::class, 'destroy'])->name('user-delete');
    //Download management for selected user from user management
    Route::get('/downloadmanagement/{id}', [DownloadManagementController::class, 'index'])->name('downloads');
    //Adding download for specific user
    Route::post('/addDownload', [DownloadManagementController::class, 'attachDownload']);
    //Removing download for specific user
    Route::post('/removeDownload', [DownloadManagementController::class, 'detachDownload']);
    //Uploading of files
    Route::get('/Upload', [UploadController::class, 'index'])->name('Upload');
    Route::post('save-multiple-files', [DownloadController::class, 'store']);
});
require __DIR__.'/auth.php';
