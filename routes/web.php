<?php

use App\Http\Controllers\DashboardController;
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


Route::get('/test', function () {
    $user = User::find(2);
    //dd($user->downloads());
    foreach ($user->downloads as $download) {
       echo $download->name;
    }
});

require __DIR__.'/auth.php';
