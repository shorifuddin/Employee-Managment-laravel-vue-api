<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController\HomeController;
use App\Http\Controllers\AdminController\UserController;
use App\Http\Controllers\AdminController\CityController;
use App\Http\Controllers\AdminController\CountryController;
use App\Http\Controllers\AdminController\DepartmentController;
use App\Http\Controllers\AdminController\EmployeeController;
use App\Http\Controllers\AdminController\StateController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/logouts', [HomeController::class, 'logout'])->name('logouts');

Route::resource('users', UserController::class);
Route::resource('countries', CountryController::class);
Route::resource('states', StateController::class);
Route::resource('cities', CityController::class);
Route::resource('departments', DepartmentController::class);


Route::get('/employees', function () {
    return view('employees.index');
})->where('any', '.*');
