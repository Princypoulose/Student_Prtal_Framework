<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Cookie;

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
})->name('login');

Route::get('/signout', function (Request $request) {
    $response = redirect('/');

    $response->withCookie(Cookie::forget('accessToken'));
    $response->withCookie(Cookie::forget('refreshToken'));

    return $response;
})->name('signout');

Route::post('/flash-error', function(Request $request) {
    session()->flash('error', $request->errorMessage);
    return response()->json(['status' => 'success']);
});

Route::get('/register', 'App\Http\Controllers\RegisterController@index')->name('register');
Route::post('/setToken', 'App\Http\Controllers\TokenController@setToken')->name('setToken');



Route::middleware(['auth'])->group(function () {
    Route::get('/home', [StudentController::class, 'show'])->name('home');
    Route::get('/courses', [StudentController::class, 'courses'])->name('courses');
    Route::post('/enroll', [StudentController::class, 'enroll'])->name('enroll');
    Route::get('/graduation', [StudentController::class, 'graduation'])->name('graduation');
    Route::post('/graduate', [StudentController::class, 'graduate'])->name('graduate');
    Route::get('/invoices', [StudentController::class, 'invoices'])->name('invoices');
    Route::post('/pay', [StudentController::class, 'pay'])->name('pay');
});


