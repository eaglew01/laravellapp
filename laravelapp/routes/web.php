<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactUsFormController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Orchid\Screens\TaskScreen;
use App\Orchid\Screens\VacancyScreen;
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

Route::get('/vacancy', [VacancyController::class, 'getAll'])->name('vacancy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('companies', CompanyController::class);

Route::resource('/vacancies', VacancyController::class);

Route::resource('/users', UserController::class);

Route::get('/contact', [ContactUsFormController::class, 'createForm'])->name('contact');
Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');

Route::resource('categories', CategoryController::class);
Route::resource('faqs', FAQController::class);



require __DIR__.'/auth.php';
