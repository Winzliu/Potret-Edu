<?php

namespace App\Livewire\Kitchen\Component;

use App\Models\menu;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CardMenuMakanan extends Component
{
    public $categoryId;

    public $menus;

    public $search;

    public $pesanan_id;

    public $modalNonaktif = false;
    public $modalAktif = false;
    public $menu_id;

    protected $listeners = ['getMenuKitchen' => 'getMenuKitchen', 'searchMenuKitchen' => 'searchMenuKitchen', 'refresh' => 'refresh'];
    
    public function mount()
    {
        $this->menus = menu::orderBy('menu_name', 'asc')->get();
    }

    public function refresh()
    {
        '$refresh';
    }
    public function modal_nonaktif($id)
    {
        $this->menu_id = $id;
        $this->modalNonaktif = true;  
    }
    public function modal_aktif($id)
    {
        $this->menu_id = $id;
        $this->modalAktif = true;  
    }

    public function nonaktif()
    {
        DB::beginTransaction();
        try {
            menu::where('menu_id', $this->menu_id)->update(['menu_state' => 'tidak_aktif']);
            request()->session()->flash('nonaktif_berhasil', 'Berhasil menonaktifkan menu!');
            DB::commit();
            $this->modalNonaktif = false;
            $this->refreshMenu();
        } catch (\Exception $e) {
            request()->session()->flash('nonaktif_gagal', 'Gagal menonaktifkan menu!' . $e->getMessage());
            DB::rollBack();
        }
        $this->dispatch('refresh_notif');
    }
    public function aktif()
    {
        DB::beginTransaction();
        try {
            menu::where('menu_id', $this->menu_id)->update(['menu_state' => 'aktif']);
            request()->session()->flash('aktif_berhasil', 'Berhasil mengaktifkan menu!');
            DB::commit();
            $this->modalAktif = false;
            $this->refreshMenu();
        } catch (\Exception $e) {
            request()->session()->flash('aktif_gagal', 'Gagal mengaktifkan menu!' . $e->getMessage());
            DB::rollBack();
        }
        $this->dispatch('refresh_notif');
    }

    public function refreshMenu()
    {
        // Memuat ulang orderDetails dan mengurutkannya berdasarkan menu_date
        $this->menus = menu::orderBy('menu_name', 'asc')->get();
    }

    public function getMenuKitchen($categoryId)
    {
        $this->categoryId = $categoryId;
        
        if ($this->search) {
            if ($this->categoryId != '0') {
                $this->menus = menu::where('menu_category_id', $this->categoryId)->where('menu_name', 'like', '%' . $this->search . '%')
                ->orderBy('menu_name', 'asc')->get();
            } else {
                $this->menus = menu::where('menu_name', 'like', '%' . $this->search . '%')
                ->orderBy('menu_name', 'asc')->get();
            }
        } else {
            if ($this->categoryId != '0') {
                $this->menus = menu::where('menu_category_id', $this->categoryId)
                ->orderBy('menu_name', 'asc')->get();
            } else {
                $this->menus = menu::orderBy('menu_name', 'asc')->get();
            }
        }
    }

    public function searchMenuKitchen($search)
    {
        $this->search = $search;

        if ($this->categoryId != '0') {
            $this->menus = menu::where('menu_name', 'like', '%' . $search . '%')->where('menu_category_id', $this->categoryId)->get();
        } else {
            $this->menus = menu::where('menu_name', 'like', '%' . $search . '%')->get();
        }
    }

    public function render()
    {
        return view('livewire.kitchen.component.card-menu-makanan');
    }
}