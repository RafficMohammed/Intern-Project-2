<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\ForgotPassword;
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

//Login
Route::get('/', function () {
    return view('login');
});
Route::post('/',[UserController::class,'loginUserDetails']);





//Forgot Password
Route::get('forgot/user-password',[ForgotPassword::class,'forgotPasswordView']);
Route::post('forgot/user-password',[ForgotPassword::class,'linkForgotPassword']);
Route::get('reset/user-password/{slug}',[ForgotPassword::class,'resetPasswordView']);
Route::post('reset/user-password/{slug}',[ForgotPassword::class,'passwordChanged']);






//Logout
Route::get('logout',[UserController::class,'logoutUser']);

//Register
Route::get('register-new-member',[UserController::class,'registerUi']);
Route::post('register-new-member',[UserController::class,'registerUserDetails']);

//Contact
Route::get('contact',[ContactController::class,'contactUi']);
Route::post('contact',[ContactController::class,'contactStore']);
Route::get('user-contact',[ContactController::class,'contactUserView']);
Route::post('user-contact',[ContactController::class,'contactStoreDetails']);
Route::get('delete-contact/{slug}',[ContactController::class,'deleteContactDetail']);
Route::get('edit-contact/{slug}',[ContactController::class,'editContact']);
Route::post('update-contact/{slug}',[ContactController::class,'updateContact']);


//Dashboard
Route::get('dashboard',[DashboardController::class,'dashboardHomePage'])->middleware('auth');


//AdminContact
Route::middleware(['admin'])->group(function ()
{
    //contact
    Route::get('edit/admin-contact/{slug}',[\App\Http\Controllers\Admin\ContactController::class,'editAdminContact']);
    Route::post('update/admin-contact/{slug}',[\App\Http\Controllers\Admin\ContactController::class,'updateAdminContact']);
    Route::get('delete/admin-contact/{slug}',[\App\Http\Controllers\Admin\ContactController::class,'deleteAdminContact']);


    //ManageUser
    Route::get('manage/alluser',[ManageUserController::class,'manageAllUser']);
    Route::get('edit/admin-user/{slug}',[ManageUserController::class,'editAllUser']);
    Route::post('update/admin-user/{slug}',[ManageUserController::class,'updateAdminUser']);
    Route::get('delete/admin-user/{slug}',[ManageUserController::class,'deleteAdminUser']);

    Route::get('new/admin-user',[ManageUserController::class,'newUser']);
    Route::post('new/admin-user',[ManageUserController::class,'newUserStoreDetails']);

});
