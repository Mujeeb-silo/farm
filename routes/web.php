<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\CapacityController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\RequirmentController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\SubscribtionController;

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

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
/*Route::get('dashboard', [AuthController::class, 'dashboard']); */
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['prefix'=>'admin','middleware' => ['auth', 'admin']], function () {

    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');


    Route::get('requirement', [RequirmentController::class, 'index']);
    Route::get('capacity', [CapacityController::class, 'dashboard']);
    Route::get('publish', [HomeController::class, 'dashboard']);
    Route::get('partner', [PartnerController::class, 'index']);
    Route::get('partner/add', [PartnerController::class, 'addPartner']);
    Route::get('partner/list',[PartnerController::class,'listPartner']);
    Route::get('users', [UsersController::class, 'dashboard']);
    Route::get('email', [EmailController::class, 'dashboard']);
    Route::get('help', [HelpController::class, 'dashboard']);

    Route::get('requirement/add', [RequirmentController::class, 'addRequirement']);
    Route::get('requirement/edit/{id}', [RequirmentController::class, 'editRequirement']);
    Route::post('requirement/save', [RequirmentController::class, 'saveRequirement']);
    Route::match(array('GET', 'POST'),'requirement/get/list', [RequirmentController::class, 'listRequirement']);
    Route::post('partner/save', [PartnerController::class, 'savePartner']);
    
    
});
Route::get('/',[HomeController::class, 'dashboard'])->name('/')->middleware(['auth','admin']);

Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::group(['prefix'=>'partner','middleware' => ['auth', 'partner']], function () {
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    
});