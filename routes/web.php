<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\GstBillController;
use App\Http\Controllers\PartyController;
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


Route::get('/', [AppController::class, 'index']);

Route::get('/dashboard', [AppController::class, 'dashboard'])->name('dashboard');

// Party
Route::get('/add-party', [PartyController::class, 'addParty'])->name('add-party');
Route::post('/create-party', [PartyController::class, 'createParty'])->name('create-party');
Route::get('/manage-party', [PartyController::class, 'manageParty'])->name('manage-party');
Route::get('/update/{id}', [PartyController::class, 'viewPartyUpdate'])->name('view.party.update');
Route::post('/update/{id}', [PartyController::class, 'handlePartyUpdate'])->name('handal.party.update');
Route::get('/delete/{id}', [PartyController::class, 'handlePartyDelete'])->name('handle.party.delete');


// Gst Bill
Route::get('/add-gst-bill', [GstBillController::class, 'addBill'])->name('add-gst-bill');
Route::get('/manage-gst-bill', [GstBillController::class, 'manageBill'])->name('manage-gst-bill');
Route::get('/print-gst-bill', [GstBillController::class, 'printBill'])->name('print-gst-bill');
