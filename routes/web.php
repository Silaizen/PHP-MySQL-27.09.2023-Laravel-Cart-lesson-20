<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'index'])->name('main');


Auth::routes();

//Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('main');







// Маршрут для регистрации пользователей
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
// Маршруты для аутентификации
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
//Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');


// Маршрут для создания голосования
//Route::get('/create/vote', [VoteController::class, 'create'])->name('create.vote');
//Route::post('/create-vote', [VoteController::class, 'store']);
// Добавляем маршруты для методов контроллера VoteController
Route::get('/votes/create', [VoteController::class, 'create'])->name('create.vote.form');
Route::post('/votes', [VoteController::class, 'store'])->name('create.vote');
//Route::post('/votes', [VoteController::class, 'store'])->name('store.vote');
Route::get('/votes/{id}', [VoteController::class, 'view'])->name('view.vote');
Route::post('/votes/{id}/vote', [VoteController::class, 'vote'])->name('vote');
Route::get('/votes/{id}/results', [VoteController::class, 'results'])->name('results.vote');






// Маршрут для управления кандидатами
Route::get('/manage/candidates', [CandidateController::class, 'manage'])->name('candidates.manage');
Route::get('/manage/candidates', [CandidateController::class, 'manage'])->name('manage.candidates');
Route::get('/candidates/create', [CandidateController::class, 'create'])->name('candidates.create');
Route::post('/candidates', [CandidateController::class, 'store'])->name('candidates.store');



Route::get('/candidates/{id}/edit', [CandidateController::class, 'edit'])->name('candidates.edit');



Route::put('/candidates/{id}', [CandidateController::class, 'update'])->name('candidates.update');
Route::delete('/candidates/{id}', [CandidateController::class, 'destroy'])->name('candidates.destroy');







// Маршрут для создания нового кандидата (отображение формы)
Route::get('/candidates/create', [CandidateController::class, 'create'])->name('candidates.create');

// Маршрут для сохранения созданного кандидата (обработка формы)
Route::post('/candidates', [CandidateController::class, 'store'])->name('candidates.store');

// Маршрут для отображения формы редактирования кандидата
Route::get('/candidates/{id}/edit', [CandidateController::class, 'edit'])->name('candidates.edit');

// Маршрут для обновления редактированного кандидата (обработка формы редактирования)
Route::put('/candidates/{id}', [CandidateController::class, 'update'])->name('candidates.update');

// Маршрут для удаления кандидата
Route::delete('/candidates/{id}', [CandidateController::class, 'destroy'])->name('candidates.destroy');









//Route::get('/vote/{id}', 'VoteController@view')->name('view.vote');
//Route::get('/create/vote', [VoteController::class, 'create'])->name('create.vote');


