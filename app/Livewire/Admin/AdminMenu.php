<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\menu;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;


class AdminMenu extends Component
{

    use WithPagination;
    public $modalHapus = false;
    public $menu_id;
    public $menus;
    
    public function mount(){
        $this->menus=menu::All();
    }
    public function modal_hapus($menu_id){
        $this->menu_id = $menu_id;
        $this->modalHapus=true;
    }    
    public function render()
    {
        // $menus = Menu::paginate(10); // Menggunakan paginate pada query builder

        return view('livewire.admin.admin-menu',[
            'menus'=> $this->menus,
        ])
            ->layout('components.layouts.app', [
                'title' => 'Admin | Beranda',
                'active' => 'admin-menu',
                'role' => 'admin'
            ]);
    }
    public function boot()
{
    Paginator::useTailwind();
}
}