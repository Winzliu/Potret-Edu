<?php

use App\Livewire\Profil\Profil;
use App\Livewire\Admin\AdminHome;
use App\Livewire\Admin\AdminMenu;
use App\Livewire\Admin\AdminKaryawan;
use App\Livewire\Admin\AdminOrderHistory;
use App\Livewire\Cashier\CashierDetailOrder;
use App\Livewire\Cashier\CashierHistory;
use App\Livewire\Cashier\Home;
use App\Livewire\Kitchen\KitchenMenu;
use App\Livewire\Kitchen\KitchenOrder;
use App\Livewire\Kitchen\KitchenOrderDetail;
use App\Livewire\Waiter\Test;
use App\Livewire\Waiter\WaiterCartMenu;
use App\Livewire\Waiter\WaiterProgressOrder;
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

// Waiter
Route::get('/waiter', WaiterCartMenu::class);

Route::get('/waiter/pesanan', WaiterProgressOrder::class);
// Akhir Waiter

// Cashier
Route::get('/cashier/pesanan/{pesanan}', CashierDetailOrder::class);

Route::get('/cashier/riwayat', CashierHistory::class);
// Akhir Cashier

// Admin
Route::get('/admin', AdminHome::class);
Route::get('/admin/riwayat-pesanan', AdminOrderHistory::class);
Route::get('/admin/menu', AdminMenu::class);
Route::get('/admin/karyawan', AdminKaryawan::class);
// Akhir Admin

//Awal Kitchen
Route::get('/kitchen', KitchenOrder::class);
Route::get('/kitchen-order-detail', KitchenOrderDetail::class);
Route::get('/kitchen-menu', KitchenMenu::class);
//Akhir Kitchen
Route::get('/profil/1', Profil::class);