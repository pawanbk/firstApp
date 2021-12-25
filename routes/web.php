<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LoginController;

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
//     return view('welcome');
// });
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/auth/login',[LoginController::class, 'auth_login'])->name('auth.login');


Route::get('/dashboard',[MainController::class, 'index'])->name('index');
Route::get('/customerlists',[MainController::class, 'lists'])->name('list') ;
//add new customer
Route::post('/add/customer', [MainController::class, 'add_customer'])-> name('add_customer');

// display edit form
Route::get('/customer/edit/{id}', [MainController::class, 'edit_customer'])->name('customer.edit');

//update customer's details
Route::post('/customer/update/{id}', [MainController::class, 'update_customer'])->name('update.customer');

//delete customer
Route::get('/customer/delete/{id}', [MainController::class, 'delete_customer'])-> name('delete.customer');

//update profile image
Route::post('/customer/changeprofile/{id}', [MainController::class, 'change_profile'])->name('change.profile');

//logout user
Route::get('/logout', [MainController::class, 'logout'])->name('logout');


//mail form and send mail
Route::get('/mail/{id}',[MainController::class, 'mailform'])->name('customer.mail');
Route::post('/send/mailtocustomer',[MainController::class ,'send_mail'])->name('send.mail');

