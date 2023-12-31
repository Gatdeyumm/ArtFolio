<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    
    Route::middleware('permission:create-client|edit-client|delete-client')->group(function () {
        // Add the 'name' parameter to the route definition
        Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
        Route::post('/clients', [ClientController::class, 'store']);
        Route::get('/clients/{client}', [ClientController::class, 'show']);
        Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
        Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
        // Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.delete');

        // ...
    });
    
    Route::get('/clients/pdf/{client}',[ClientController::class,'pdf']);
    Route::get('/clients/email/{client}',[ClientController::class, 'email']);
    Route::resource('clients', ClientController::class);
    Route::post('/clients/toggle/{client}', [ClientController::class, 'toggle']);
    Route::get('/clients/search/{searchKey}', [ClientController::class, 'search']);

    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::post('/admin/send-mail', [AdminController::class, 'sendMailToAllClients']);
});

require __DIR__.'/auth.php';
