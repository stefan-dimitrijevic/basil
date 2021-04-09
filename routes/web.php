<?php

use App\Http\Controllers\AboutMeController;
use App\Http\Controllers\admin\RecipeController as AdminRecipeController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RecipeLikesController;
use App\Http\Controllers\RegisterController;
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

Route::group(['middleware' => 'redirect_if_authenticated'], function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.showRegistrationForm');
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.showLoginForm');
});

Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/about-me', [AboutMeController::class, 'index'])->name('about-me');

Route::group(['prefix' => 'admin', 'middleware' => 'redirect_if_not_admin'], function () {
    Route::resource('recipes', AdminRecipeController::class, ['names' => 'admin.recipes'])->except(['show', 'update']);
    Route::post('/recipes/{recipe}', [AdminRecipeController::class, 'update']);
    Route::resource('users', UserController::class, ['names' => 'admin.users'])->except(['show']);
    Route::get('/logs', [LogController::class, 'index'])->name('logs');
    Route::get('/', function () {
        return redirect()->route('admin.recipes.index');
    });
});

Route::get('/filter', [RecipeController::class, 'filter']);

Route::resource('recipes', RecipeController::class)->except(['edit', 'update', 'destroy']);
Route::group(['middleware' => 'redirect_if_not_his_recipe'], function (){
    Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::post('/recipes/{recipe}', [RecipeController::class, 'update']);
    Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy']);
});

Route::group(['middleware' => 'redirect_if_not_authenticated'], function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/recipes/{recipe}/like', [RecipeLikesController::class, 'store']);
    Route::delete('/recipes/{recipe}/like', [RecipeLikesController::class, 'destroy']);
});

Route::get('/profile/{profile}', [ProfileController::class, 'show'])->name('profile.show');

Route::get('/', function () {
    return redirect()->route('recipes.index');
});

Route::get('/not-found', [PageController::class, 'show404'])->name('not-found');

Route::fallback([PageController::class, 'show404']);


