<?php

use App\Http\Controllers\LetterController;
use App\Http\Controllers\LetterTypeController;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;
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

// Route::middleware(['auth'])->group(function () {

Route::middleware('IsGuest')->group(function () {
    Route::get('/', function () {
        return view('login');
    })->name('login');
    Route::post('/login', [UserController::class, 'authLogin'])->name('auth-login');
});

Route::middleware('IsLogin')->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('auth-logout');
    Route::get('/dashboard', [UserController::class, 'hitung'])->name('dashboard');

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // });

Route::middleware('IsStaff')->group(function () {

    Route::prefix('/account')->name('account.')->group(function () {
        Route::get('/staff/data', [UserController::class, 'dataStaff'])->name('user-staff');
        Route::get('/staff/create', [UserController::class, 'createStaff'])->name('create-staff');
        Route::post('/staff/store', [UserController::class, 'storeStaff'])->name('store-staff');
        Route::get('/staff/edit/{id}', [UserController::class, 'editStaff'])->name('edit-staff');
        Route::patch('/staff/update/{id}', [UserController::class, 'updateStaff'])->name('update-staff');
        Route::delete('/staff/delete/{id}', [UserController::class, 'destroyStaff'])->name('delete-staff');

        Route::get('/guru/data', [UserController::class, 'dataGuru'])->name('user-guru');
        Route::get('/guru/create', [UserController::class, 'createGuru'])->name('create-guru');
        Route::post('/guru/store', [UserController::class, 'storeGuru'])->name('store-guru');
        Route::get('/guru/edit/{id}', [UserController::class, 'editGuru'])->name('edit-guru');
        Route::patch('/guru/update/{id}', [UserController::class, 'updateGuru'])->name('update-guru');
        Route::delete('/guru/delete/{id}', [UserController::class, 'destroyGuru'])->name('delete-guru');
    });

    Route::prefix('/letter-type')->name('letterType.')->group(function () {
        Route::get('/data', [LetterTypeController::class, 'index'])->name('index');
        Route::get('/create', [LetterTypeController::class, 'create'])->name('create');
        Route::post('/store', [LetterTypeController::class, 'store'])->name('store');
        Route::get('/detail/{id}', [LetterTypeController::class, 'detail'])->name('detail');
        Route::get('/edit/{id}', [LetterTypeController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [LetterTypeController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [LetterTypeController::class, 'destroy'])->name('delete');
        Route::get('/download-excel', [LetterTypeController::class, 'downloadExcel'])->name('download-excel');
        Route::get('/download-pdf/{id}', [LetterTypeController::class, 'downloadPDF'])->name('download-pdf');
    });

    Route::prefix('/letter')->name('letter.')->group(function () {
        Route::get('/data', [LetterController::class, 'index'])->name('index');
        Route::get('/create', [LetterController::class, 'create'])->name('create');
        Route::post('/store', [LetterController::class, 'store'])->name('store');
        Route::get('/detail/{id}', [LetterController::class, 'detail'])->name('detail');
        Route::get('/edit/{id}', [LetterController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [LetterController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [LetterController::class, 'destroy'])->name('delete');
        Route::get('/download-excel', [LetterController::class, 'downloadExcel'])->name('download-excel');
        Route::get('/download-pdf', [LetterController::class, 'downloadPDF'])->name('download-pdf');
    });


});

Route::middleware('IsTeacher')->group(function () {

    Route::prefix('/letter')->name('suratMasuk.')->group(function () {
        Route::get('/data', [ResultController::class, 'index'])->name('index');
        Route::get('/create', [ResultController::class, 'create'])->name('create');
        Route::post('/store', [ResultController::class, 'store'])->name('store');
        Route::get('/detail/{id}', [ResultController::class, 'detail'])->name('detail');
        Route::get('/edit/{id}', [ResultController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [ResultController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ResultController::class, 'destroy'])->name('delete');
        Route::get('/download-excel', [ResultController::class, 'downloadExcel'])->name('download-excel');
    });

});

});

// });