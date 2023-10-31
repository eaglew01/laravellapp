<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacancyController;

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
//     $vacancies = Vacancy::all();
//     return view('vacancyHome', ['vacancies' => $vacancies]);
// });

Route::get('/', [VacancyController::class, 'getAll']);

Route::get('profileAll', function () {
    return view('profileAll');
})->name('profileAll');
Route::get('profileAll', [UserController::class,'showProfile'])->name('profileAll');
Route::get('/get-user-data/{id}', [UserController::class, 'getUserData']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('vacancies', VacancyController::class)
    ->middleware(['auth', 'verified']);

// Route::get('/vacancy', function () {
//     return view('vacancy');
// })->middleware(['auth', 'verified'])->name('vacancy');
// //Route::get('/vacancy', [VacancyController::class, 'index']);

Route::get('/vacancy', [VacancyController::class, 'getAll'])->name('vacancy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('companies', CompanyController::class);

Route::resource('/vacancies', VacancyController::class);

require __DIR__.'/auth.php';
