<?php

use App\Http\Livewire\Counter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\DeactivationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\UserController;



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
Route::get('/landing', function () {
    return view('Landing-page');
});


Route::get('/counter', Counter::class);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->middleware('web');
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

Route::get('/recipes', [RecipeController::class, 'viewAllRecipes'])->name('recipes.index');




Route::get('/restaurants/search', [RestaurantController::class, 'search'])->name('restaurants.search');
Route::get('/restaurants/search-by-location', [RestaurantController::class, 'searchByLocation'])->name('restaurants.searchByLocation');

Route::get('/restaurants/search', 'RestaurantController@searchByLocation')->name('restaurants.searchByLocation');
Route::get('/restaurants', [RestaurantController::class, 'viewAllRestaurants'])->name('restaurants.index');





Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{username}', [UserController::class, 'show'])->name('users.show');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');

Route::get('/users/{first_name}', [UserController::class, 'show'])->name('users.show');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
