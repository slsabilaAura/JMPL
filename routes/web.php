<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaptchaServiceController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FileUploadController;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['2fa'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Route::get('/upload', [HomeController::class, 'showUploadForm'])->name('upload.form');
    Route::post('/upload', [HomeController::class, 'uploadFile'])->name('upload.file');
    Route::post('/2fa', function () {
        return redirect(route('home'));
    })->name('2fa');
});




// Route::middleware(['auth'])->group(function () {
//     Route::get('/upload', [FileUploadController::class, 'showUploadForm'])->name('upload.form');
//     Route::post('/upload', [FileUploadController::class, 'uploadFile'])->name('upload.file');
// });


Route::get('/contact-form', [CaptchaServiceController::class, 'index']);
Route::post('/captcha-validation', [CaptchaServiceController::class, 'captchaFormValidate']);
Route::get('/reload-captcha', [CaptchaServiceController::class, 'reloadCaptcha']);

Route::get('/complete-login', [App\Http\Controllers\Auth\LoginController::class, 'completeLogin'])->name('complete-login');
