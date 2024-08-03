<?php

use App\Http\Controllers\admin\InvoiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;

Route::get('/', function () {
    return view('auth.login');
});

// Route::controller(LoginController::class)->group(function () {
//     Route::get('/login', 'index')->name('login');
// });

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::get('/register', [LoginController::class, 'register'])->name('register');  
    // Route::post('/store', [LoginController::class, 'store'])->name('store');
    Route::get('/auth', [LoginController::class, 'auth']) ->name('auth');
    // Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
});
Route::controller(LoginController::class)->group(function () {
    Route::post('/store', 'store')->name('store');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
});



// Halaman utama yang menampilkan daftar invoice
Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');

// Form untuk membuat invoice baru
Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');

// Menyimpan data invoice baru
Route::post('/invoices', [InvoiceController::class, 'store'])->name('invoices.store');

// Menghasilkan PDF dari invoice tertentu
Route::get('/invoices/{id}/pdf', [InvoiceController::class, 'generatePDF'])->name('invoices.generate-pdf');

// Halaman untuk melihat detail invoice tertentu (opsional)
Route::get('/invoices/{id}', [InvoiceController::class, 'show'])->name('invoices.show');

// Form untuk mengedit invoice tertentu (opsional)
Route::get('/invoices/{id}/edit', [InvoiceController::class, 'edit'])->name('invoices.edit');

// Memperbarui data invoice tertentu (opsional)
Route::put('/invoices/{id}', [InvoiceController::class, 'update'])->name('invoices.update');

// Menghapus invoice tertentu (opsional)
Route::delete('/invoices/{id}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');
