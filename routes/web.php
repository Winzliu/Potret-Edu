<?php

use App\Livewire\Cashier\Home;
use App\Livewire\Waiter\Test;
use App\Livewire\Waiter\WaiterCartMenu;
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

Route::get('/waiter', WaiterCartMenu::class);

Route::get('/test', Home::class);
