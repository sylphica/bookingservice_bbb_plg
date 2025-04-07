<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CSController;
use App\Http\Controllers\SAController;
use App\Http\Controllers\SMController;
use App\Http\Controllers\MekanikController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SparepartController;
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
Route::any('/', [IndexController::class, 'index'])->name('index');
Route::any('/about', [IndexController::class, 'about'])->name('about');
Route::any('/testimoni', [IndexController::class, 'testimoni'])->name('testimoni');
Route::any('/register', [LoginController::class, 'register'])->name('register');
Route::any('/prosesRegister', [LoginController::class, 'prosesRegister'])->name('prosesRegister');
Route::any('/login', [LoginController::class, 'login'])->name('login');
Route::any('/proses_login', [LoginController::class, 'prosesLogin'])->name('prosesLogin');
Route::any('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->middleware(['admin'])->group(function () {
        Route::any('/home', [AdminController::class, 'index'])->name('admin.index');
        Route::any('/profile', [AdminController::class, 'profile'])->name('admin.profile');
        Route::any('/update_profile', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');

        Route::any('/customer', [AdminController::class, 'customer'])->name('admin.customer');
        Route::any('/add_customer', [AdminController::class, 'addCustomer'])->name('admin.addCustomer');
        Route::any('/update_customer', [AdminController::class, 'updateCustomer'])->name('admin.updateCustomer');
        Route::any('/delete_customer/{id}', [AdminController::class, 'deleteCustomer'])->name('admin.deleteCustomer');

        Route::any('/cs', [AdminController::class, 'cs'])->name('admin.cs');
        Route::any('/add_cs', [AdminController::class, 'addCS'])->name('admin.addCS');
        Route::any('/update_cs', [AdminController::class, 'updateCS'])->name('admin.updateCS');
        Route::any('/delete_cs/{id}', [AdminController::class, 'deleteCS'])->name('admin.deleteCS');

        Route::any('/sa', [AdminController::class, 'sa'])->name('admin.sa');
        Route::any('/add_sa', [AdminController::class, 'addSA'])->name('admin.addSA');
        Route::any('/update_sa', [AdminController::class, 'updateSA'])->name('admin.updateSA');
        Route::any('/delete_sa/{id}', [AdminController::class, 'deleteSA'])->name('admin.deleteSA');

        Route::any('/sm', [AdminController::class, 'sm'])->name('admin.sm');
        Route::any('/add_sm', [AdminController::class, 'addSM'])->name('admin.addSM');
        Route::any('/update_sm', [AdminController::class, 'updateSM'])->name('admin.updateSM');
        Route::any('/delete_sm/{id}', [AdminController::class, 'deleteSM'])->name('admin.deleteSM');

        Route::any('/mekanik', [AdminController::class, 'mekanik'])->name('admin.mekanik');
        Route::any('/add_mekanik', [AdminController::class, 'addMekanik'])->name('admin.addMekanik');
        Route::any('/update_mekanik', [AdminController::class, 'updateMekanik'])->name('admin.updateMekanik');
        Route::any('/delete_mekanik/{id}', [AdminController::class, 'deleteMekanik'])->name('admin.deleteMekanik');

        Route::any('/sparepart', [AdminController::class, 'sparepart'])->name('admin.sparepart');
        Route::any('/add_sparepart', [AdminController::class, 'addSparepart'])->name('admin.addSparepart');
        Route::any('/update_sparepart', [AdminController::class, 'updateSparepart'])->name('admin.updateSparepart');
        Route::any('/delete_sparepart/{id}', [AdminController::class, 'deleteSparepart'])->name('admin.deleteSparepart');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('customer')->middleware(['customer'])->group(function () {
        Route::any('/home', [CustomerController::class, 'index'])->name('customer.index');
        Route::any('/daftar', [CustomerController::class, 'daftar'])->name('customer.daftar');
        Route::any('/profile', [CustomerController::class, 'profile'])->name('customer.profile');
        Route::any('/update_profile', [CustomerController::class, 'updateProfile'])->name('customer.updateProfile');

        Route::any('/booking', [CustomerController::class, 'booking'])->name('customer.booking');
        Route::any('/prosesBooking', [CustomerController::class, 'prosesBooking'])->name('customer.prosesBooking');
        Route::any('/detail_booking/{id}', [CustomerController::class, 'detailBooking'])->name('customer.detailBooking');
        Route::any('/delete_booking/{id}', [CustomerController::class, 'deleteBooking'])->name('customer.deleteBooking');
        Route::any('/update_booking', [CustomerController::class, 'updateBooking'])->name('customer.updateBooking');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('cs')->middleware(['cs'])->group(function () {
        Route::any('/home', [CSController::class, 'index'])->name('cs.index');
        Route::any('/profile', [CSController::class, 'profile'])->name('cs.profile');
        Route::any('/update_profile', [CSController::class, 'updateProfile'])->name('cs.updateProfile');

        Route::any('/booking', [CSController::class, 'booking'])->name('cs.booking');
        Route::any('/detail_booking/{id}', [CSController::class, 'detailBooking'])->name('cs.detailBooking');
        Route::any('/update_booking', [CSController::class, 'updateBooking'])->name('cs.updateBooking');

        Route::any('/service', [CSController::class, 'service'])->name('cs.service');
        Route::any('/detail_service/{id}', [CSController::class, 'detailService'])->name('cs.detailService');
        Route::any('/update_service', [CSController::class, 'updateService'])->name('cs.updateService');

        Route::any('/history', [CSController::class, 'history'])->name('cs.history');
        Route::any('/detail_history/{id}', [CSController::class, 'detailHistory'])->name('cs.detailHistory');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('sa')->middleware(['sa'])->group(function () {
        Route::any('/home', [SAController::class, 'index'])->name('sa.index');
        Route::any('/profile', [SAController::class, 'profile'])->name('sa.profile');
        Route::any('/update_profile', [SAController::class, 'updateProfile'])->name('sa.updateProfile');

        Route::any('/booking', [SAController::class, 'booking'])->name('sa.booking');
        Route::any('/detail_booking/{id}', [SAController::class, 'detailBooking'])->name('sa.detailBooking');
        Route::any('/update_booking', [SAController::class, 'updateBooking'])->name('sa.updateBooking');

        Route::any('/history', [SAController::class, 'history'])->name('sa.history');
        Route::any('/detail_history/{id}', [SAController::class, 'detailHistory'])->name('sa.detailHistory');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('sm')->middleware(['sm'])->group(function () {
        Route::any('/home', [SMController::class, 'index'])->name('sm.index');
        Route::any('/profile', [SMController::class, 'profile'])->name('sm.profile');
        Route::any('/update_profile', [SMController::class, 'updateProfile'])->name('sm.updateProfile');

        Route::any('/service', [SMController::class, 'service'])->name('sm.service');
        Route::any('/add_service', [SMController::class, 'addService'])->name('sm.addService');
        Route::any('/update_service', [SMController::class, 'updateService'])->name('sm.updateService');
        Route::any('/delete_service/{id}', [SMController::class, 'deleteService'])->name('sm.deleteService');

        Route::any('/booking', [SMController::class, 'booking'])->name('sm.booking');
        Route::any('/detail_booking/{id}', [SMController::class, 'detailBooking'])->name('sm.detailBooking');
        Route::any('/update_booking', [SMController::class, 'updateBooking'])->name('sm.updateBooking');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('mekanik')->middleware(['mekanik'])->group(function () {
        Route::any('/home', [MekanikController::class, 'index'])->name('mekanik.index');
        Route::any('/profile', [MekanikController::class, 'profile'])->name('mekanik.profile');
        Route::any('/update_profile', [MekanikController::class, 'updateProfile'])->name('mekanik.updateProfile');

        Route::any('/service', [MekanikController::class, 'service'])->name('mekanik.service');
        Route::any('/detail_service/{id}', [MekanikController::class, 'detailService'])->name('mekanik.detailService');
        Route::any('/update_service', [MekanikController::class, 'updateService'])->name('mekanik.updateService');

        Route::any('/pdf/{id}', [MekanikController::class, 'pdf'])->name('mekanik.pdf');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('sparepart')->middleware(['sparepart'])->group(function () {
        Route::any('/home', [SparepartController::class, 'index'])->name('sparepart.index');
        Route::any('/profile', [SparepartController::class, 'profile'])->name('sparepart.profile');
        Route::any('/update_profile', [SparepartController::class, 'updateProfile'])->name('sparepart.updateProfile');

        Route::any('/booking', [SparepartController::class, 'booking'])->name('sparepart.booking');
        Route::any('/detail_booking/{id}', [SparepartController::class, 'detailBooking'])->name('sparepart.detailBooking');
        Route::any('/update_booking', [SparepartController::class, 'updateBooking'])->name('sparepart.updateBooking');

        Route::any('/sparepart', [SparepartController::class, 'sparepart'])->name('sparepart.sparepart');
        Route::any('/add_sparepart', [SparepartController::class, 'addSparepart'])->name('sparepart.addSparepart');
        Route::any('/update_sparepart', [SparepartController::class, 'updateSparepart'])->name('sparepart.updateSparepart');
        Route::any('/delete_sparepart/{id}', [SparepartController::class, 'deleteSparepart'])->name('sparepart.deleteSparepart');
    });
});
