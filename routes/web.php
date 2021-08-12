<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DownloadManagementController;
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

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/download/{id}', [DashboardController::class, 'download'])->name('download');
});


Route::get('/testDownloadsPerUser', function () {//for previewing downloads per user
    $user = User::find(2);
    //dd($user->downloads());
    foreach ($user->downloads as $download) {
       echo $download->name;
    }
});

Route::get('/testUsersPerDownload', function () {   ///for previewing users permitted to a file
    $download = Download::find(2);
    //dd($download->users());
    foreach ($download->users as $user){
        echo $user->name;
    }
});

Route::get('/testAllUsers', function () {   ///for previewing all users
    $users = User::all();//paginate(2);
    //dd($user->downloads());
    foreach ($users as $user) {
       echo $user->name;
    }
});

Route::get('/usermanagement-create', [UserManagementController::class, 'create'])->name('File Upload');
Route::get('/usermanagement', [UserManagementController::class, 'index'])->name('File Upload');
Route::get('/downloadmanagement/{id}', [DownloadManagementController::class, 'index'])->name('downloads');
Route::post('/addDownload', [DownloadManagementController::class, 'attachDownload']);
Route::post('/removeDownload', [DownloadManagementController::class, 'detachDownload']);
require __DIR__.'/auth.php';
