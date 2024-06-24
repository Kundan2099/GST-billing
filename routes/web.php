<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\GstBillController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\VendorInvoiceController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [AppController::class, 'index'])->name('view.welcome');

// Login
Route::get('/login', [AuthController::class, 'viewLogin'])->name('view.login');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('handle.login');

Route::get('register', [AuthController::class, 'viewRegister'])->name('view.register');
Route::post('register', [AuthController::class, 'handleRegister'])->name('handle.register');

Route::post('logout', [AuthController::class, 'handleLogout'])->name('handle.logout');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [AppController::class, 'dashboard'])->name('dashboard');

    // Party
    Route::get('/add-party', [PartyController::class, 'addParty'])->name('add-party');
    Route::post('/create-party', [PartyController::class, 'createParty'])->name('create-party');
    Route::get('/manage-party', [PartyController::class, 'manageParty'])->name('manage-party');
    Route::get('/update/{id}', [PartyController::class, 'viewPartyUpdate'])->name('view.party.update');
    Route::post('/update/{id}', [PartyController::class, 'handlePartyUpdate'])->name('handal.party.update');
    Route::get('/delete/{id}', [PartyController::class, 'handlePartyDelete'])->name('handle.party.delete');

    // Gst Bill
    Route::prefix('gst-billing')->controller(GstBillController::class)->group(function () {
        Route::get('/', 'viewGstBillList')->name('view.gst.bill.list');
        Route::get('/create', 'viewGstBillCreate')->name('view.gst.bill.create');
        Route::get('/print/{id}', 'viewGstBillPrint')->name('view.gst.bill.print');
        Route::post('/create', 'handleGstBillCreate')->name('handle.gst.bill.create');
        Route::get('/delete/{id}', 'handleGstBillDelete')->name('handle.gst.bill.delete');
    });

    // vendor
    Route::prefix('vendor')->controller(VendorInvoiceController::class)->group(function () {
        Route::get('/create', 'viewVendorCreate')->name('view.vendor.create');
        Route::post('/create', 'handleVendorCreate')->name('handle.vendor.create');
        Route::get('/print/{id}', 'viewPrintCreate')->name('view.print.list');
    });
});