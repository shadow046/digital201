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

// Route::get('/', function () {
//     return 'Hello World';
// });

// Route::any('/home','PagesController@home');
Route::any('/employees', 'PagesController@employees');
Route::any('/memos', 'PagesController@memos');
Route::any('/evaluation', 'PagesController@evaluation');
Route::any('/contracts', 'PagesController@contracts');
Route::any('/users', 'PagesController@users');

Route::any('/employees/listOfEmployees','EmployeesController@listOfEmployees');//To display data table of list of employees
Route::any('/employees/save','EmployeesController@save');//To save single data into data base
Route::any('/employees/insert','EmployeesController@insert');//For inserting multiple data into database
Route::any('/employees/fetch','EmployeesController@fetch');//For Fetch data, based on id

Route::any('/users/listOfUsers','UsersController@listOfUsers');
Route::any('/users/save','UsersController@save');
Route::any('/users/fetch','UsersController@fetch');

//Authentication Routes
// Auth::routes();
Auth::routes(['register' => false, 'verify' => false, 'confirm' => false]);
Route::get('/logout',[LoginController::class,'logout']);

Route::get('/', 'HomeController@index');
