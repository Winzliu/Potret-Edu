<?php

namespace App\Livewire\Admin;

use App\Models\menuCategory;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class AdminKategoriMenu extends Component
{
    public $menu_category_id;

    public $warnHapus = false;
    public $modalHapus = false;
    public $categoryName = false;
    protected $paginationTheme = 'tailwind'; // Pastikan theme pagination diatur ke tailwind
    public $search;
    protected $listeners = ['refresh' => 'refresh'];

    use WithPagination;

    public function mount()
    {
        $this->search = '';
    }
    
    public function modal_warnHapus($menu_category_id)
    {
        $this->menu_category_id = $menu_category_id;
        $this->categoryName = menuCategory::where('menu_category_id', $menu_category_id)->first();
        $this->warnHapus = true;
    }
    
    public function modal_hapus()
    {
        $this->warnHapus = false;
        $this->modalHapus = true;
    }

    public function hapusKategoriMenu()
    {
        $this->modalHapus = false;

        DB::beginTransaction();
        try {
            sleep(1);
            menuCategory::find($this->menu_category_id)->delete();
            request()->session()->flash('success', 'Kategori Menu berhasil dihapus!');
            DB::commit();
            $this->modalHapus = false;
            $this->render();
        } catch (\Exception $e) {
            request()->session()->flash('error', 'Gagal menghapus Kategori Menu!' . $e->getMessage());
            DB::rollBack();
        }
        // $this->dispatch('refresh_notif');
    }

    public function searchPembayaran()
    {
        $this->resetPage();
    }

    public function render()
    {
        $menu_categories = menuCategory::where('menu_category_name', 'like', '%' . $this->search . '%')->orderBy('menu_category_name', 'asc')->paginate(5);

        return view('livewire..admin.admin-kategori-menu',[
            'menu_categories' => $menu_categories,
        ])->layout('components.layouts.app', ['title' => 'Admin | Kategori Menu', 'active' => 'admin-kategori-menu', 'role' => 'admin']);
    }
}