<?php

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
    return view('welcome');
});


Route::post('/employeeadd', 'App\Http\Controllers\EmployeeController@store')->name('employees.store');

Route::resource('employees', 'App\Http\Controllers\EmployeeController');

Route::get('/employee/{id}', 'App\Http\Controllers\EmployeeController@getEmployeebyId')->name('employee.getbyid');

Route::put('/editemployee', 'App\Http\Controllers\EmployeeController@updateEmployee')->name('employee.update');

Route::get('delete/{id}','App\Http\Controllers\EmployeeController@destroy');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
