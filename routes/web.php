<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NgoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\ProfileController;

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
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes provided by Breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes related to Admin
Route::middleware(['auth','role:0'])->group(function(){
    Route::get('/admin/dashboard',[AdminController::class,'showadmindashboard'])->name('admin.dashboard');
});

// Routes related to NGOs
Route::middleware(['auth','role:1'])->group(function(){
    Route::get('/ngo/dashboard',[NgoController::class,'showngodashboard'])->name('ngo.dashboard');
    Route::post('/ngo/posts', [NgoController::class, 'createPost'])->name('ngo.posts.create');
});

// Routes related to People
Route::middleware(['auth','role:2'])->group(function(){
    Route::get('/people/dashboard',[PeopleController::class,'showpeopledashboard'])->name('people.dashboard');
});


require __DIR__.'/auth.php';
