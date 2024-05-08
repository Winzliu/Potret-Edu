<?php

use App\Http\Controllers\UserController;
use App\Livewire\Profil\Profil;
use App\Livewire\Admin\AdminHome;
use App\Livewire\Admin\AdminMenu;
use App\Livewire\Admin\AdminMenuDetail;
use App\Livewire\Admin\AdminMenuEdit;
use App\Livewire\Admin\AdminKaryawan;
use App\Livewire\Admin\AdminOrderHistory;
use App\Livewire\Cashier\CashierDetailOrder;
use App\Livewire\Cashier\CashierHistory;
use App\Livewire\Cashier\Home;
use App\Livewire\Kitchen\KitchenMenu;
use App\Livewire\Kitchen\KitchenOrder;
use App\Livewire\Kitchen\KitchenOrderDetail;
use App\Livewire\Login;
use App\Livewire\Waiter\Test;
use App\Livewire\Waiter\WaiterCartMenu;
use App\Livewire\Waiter\WaiterProgressOrder;
use App\Models\User;
use App\Models\userDetail;
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
Route::get('/test', function () {
  return userDetail::first()->user;
});

// Login
Route::get('/', [UserController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [UserController::class, 'loginPost'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
// Akhir Login

Route::group(['middleware' => 'auth'], function () {
  Route::get('/profil/{id}', Profil::class);
  // Waiter
  Route::group(['middleware' => 'cekRole:waiter'], function () {
    Route::get('/waiter', WaiterCartMenu::class)->middleware('auth');

    Route::get('/waiter/pesanan', WaiterProgressOrder::class);
  });
  // Akhir Waiter

  // Cashier
  Route::group(['middleware' => 'cekRole:cashier'], function () {
    Route::get('/cashier/pesanan/{pesanan}', CashierDetailOrder::class);
    Route::get('/cashier/riwayat', CashierHistory::class);
  });
  // Akhir Cashier

  // Admin
  Route::group(['middleware' => 'cekRole:admin'], function () {
    Route::get('/admin', AdminHome::class)->middleware('auth');

    Route::get('/admin/menu', AdminMenu::class);

    Route::get('/admin/tambah-menu', AdminMenuDetail::class);
    
    Route::get('/admin/edit-menu/{id_pesanan}', AdminMenuEdit::class);

    Route::get('/admin/riwayat-pesanan', AdminOrderHistory::class);

    Route::get('/admin/karyawan', AdminKaryawan::class);
  });
  // Akhir Admin

  // Kitchen
  Route::group(['middleware' => 'cekRole:kitchen'], function () {
    Route::get('/kitchen', KitchenOrder::class);
    Route::get('/kitchen-order-detail', KitchenOrderDetail::class);
    Route::get('/kitchen-menu', KitchenMenu::class);
  });
  // Akhir Kitchen
});