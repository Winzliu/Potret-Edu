<?php

namespace App\Livewire\Admin;

use App\Models\menu;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;


class AdminMenu extends Component
{

    use WithPagination;
    protected $paginationTheme = 'tailwind'; // Pastikan theme pagination diatur ke tailwind

    public $modalHapus = false;
    public $menu_id;
    public $search;
    protected $listeners = ['refresh' => 'refresh'];

    public function mount()
    {
        $this->menus = menu::orderBy('created_at', 'desc')->get();
        $this->search = '';
    }
    public function modal_hapus($menu_id)
    {
        $this->menu_id = $menu_id;
        $this->modalHapus = true;
    }

    public function hapusMenu()
    {
        DB::beginTransaction();
        try {
            Menu::find($this->menu_id)->delete();
            request()->session()->flash('success', 'Menu berhasil dihapus.');
            DB::commit();
            $this->modalHapus = false;
            $this->render();
        } catch (\Exception $e) {
            request()->session()->flash('error', 'Gagal mengubah status!' . $e->getMessage());
            DB::rollBack();
        }
        $this->dispatch('refresh_notif');
    }

    public function searchMenu()
    {
        $this->resetPage();
    }

    public function render()
    {
        $this->menus = Menu::where('menu_name', 'like', '%' . $this->search . '%')->orderBy('created_at', 'desc')->paginate(7);

        return view('livewire.admin.admin-menu', [
            'menus' => $this->menus,
        ])
            ->layout('components.layouts.app', [
                'title'  => 'Admin | Menu',
                'active' => 'admin-menu',
                'role'   => 'admin'
            ]);
    }
    // public function boot()
    // {
    //     Paginator::useTailwind();
    // }
}