<?php

use App\Http\Livewire\Counter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\DeactivationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipeController;


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
    return view('welcome');
});


Route::get('/counter', Counter::class);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);


Route::middleware(['auth', 'active'])->group(function () {
    Route::post('/logout', [Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('/home', [HomeController::class, 'index'])->name('home');

});

Route::middleware(['auth'])->group(function () {
    Route::post('/deactivate/{user}', [DeactivationController::class, 'deactivate'])->name('deactivate');
});



Route::get('/fetch-recipes', [RecipeController::class, 'fetchRecipes']);


Route::get('/recipes/search', 'RecipeController@searchRecipes')->name('recipes.search');
Route::get('/recipes/search', [RecipeController::class, 'searchRecipes'])->name('recipes.search');
Route::get('/recipes/{id}', 'RecipeController@show')->name('recipes.show');
Route::get('/recipes/showApi/{uri}', [RecipeController::class, 'showApi'])->name('recipes.showApi');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
