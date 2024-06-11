<?php

namespace App\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\history;
use App\Models\menu;
use App\Models\historyDetail;
use App\Models\user;
use Illuminate\Support\Facades\DB;

class AdminHome extends Component
{
    public $histories;
    public $menus;
    public $pesanans;
    public $users;
    public $totalUser;
    public $totalMenu;
    public $totalHistory;
    public $today_history;
    public $mostOrdered;
    public $mostOrderedPrice;


    public function mount()
    {

        // Mendapatkan tanggal awal dan akhir bulan ini
        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();
        $startOfDay = now()->startOfDay()->toDateString();

        $this->histories = history::all();
        $this->menus = menu::all();
        $this->pesanans = history::whereDate('payment_date', $startOfDay)->orderBy('payment_date', 'desc')->get();
        $this->users = user::where('role', '!=', 'admin')->get();
        $this->totalMenu = $this->menus->count();
        $this->totalUser = $this->users->count();
        $this->totalHistory = $this->histories->count();

        // Query untuk menghitung jumlah pesanan setiap menu dalam bulan ini
        $this->mostOrdered = historyDetail::select('menu_name', DB::raw('sum(quantity) as total_orders'))
            ->whereBetween('menu_date', [$startOfMonth, $endOfMonth])
            ->groupBy('menu_name')
            ->orderBy('total_orders', 'desc')
            ->limit(10)
            ->get();

        // dd($this->mostOrdered);
    }

    public function render()
    {
        return view('livewire.admin.admin-home')
            ->layout('components.layouts.app', ['title' => 'Admin | Beranda', 'active' => 'admin-home', 'role' => 'admin']);
    }
}