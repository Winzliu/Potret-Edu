<?php

namespace App\Livewire\Admin;

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
    public $users;
    public $totalUser;
    public $totalMenu;
    public $totalHistory;

    public $mostOrdered;
    

    public function mount(){
        $this->histories = history::all();    
        $this->menus = menu::all();    
        // Mengambil semua pengguna kecuali yang memiliki role 'admin'
        $this->users = user::where('role', '!=', 'admin')->get();        
        $this->totalMenu = $this->menus->count();    
        $this->totalUser = $this->users->count();    
        $this->totalHistory = $this->histories->count();   
        
        // Mendapatkan tanggal awal dan akhir bulan ini
        $startOfMonth = now()->startOfMonth()->toDateString();
        $endOfMonth = now()->endOfMonth()->toDateString();
        
        // Query untuk menghitung jumlah pesanan setiap menu dalam bulan ini
        $this->mostOrdered = historyDetail::select('menu_name', DB::raw('count(quantity) as total_orders'))
            ->whereBetween('menu_date', [$startOfMonth, $endOfMonth])
            ->groupBy('menu_name')
            ->orderBy('total_orders', 'desc')
            ->get();
        
            dd($this->mostOrdered);
    }
    
    public function render()
    {
        return view('livewire.admin.admin-home')
            ->layout('components.layouts.app', ['title' => 'Admin | Beranda', 'active' => 'admin-home', 'role' => 'admin']);
    }
}   