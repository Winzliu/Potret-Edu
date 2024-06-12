<?php

namespace App\Livewire\Admin;

use App\Models\menuCategory;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AdminKategoriMenuEdit extends Component
{
    public $menu_category_name;
    public $menu_category;
    public $menu_category_id;
    public $modalTambah;

    public function modal_tambah()
    {
        $this->modalTambah = true;
    }
    public function mount()
    {
        $this->menu_category_id = request('id_kategori_menu');
        if ($this->menu_category_id) {
            $kategori = menuCategory::findOrFail($this->menu_category_id);
            $this->menu_category_name = $kategori->menu_category_name;
        }
    }
    public function editKategoriMenu()
    {
        // dd($this->karyawan_id);
        $this->modalTambah = false;
        $this->menu_category = menuCategory::findOrFail($this->menu_category_id);

        if ($this->menu_category_name != $this->menu_category->menu_category_name) {
            $rules['menu_category_name'] = 'required|string|unique:menu_categories';
        } else {
            $rules['menu_category_name'] = 'required|string';
        }

        $this->validate($rules, [
            'menu_category_name.required' => 'Kategori ini harus diisi.',
            'menu_category_name.unique'   => 'Kategori ini sudah ada.',
        ]);

        // dd($this->position);
        DB::beginTransaction();
        // $this->discount_rate_conversion = (double) $this->taxes / 100;
        try {
            sleep(1);
            menuCategory::where('menu_category_id', $this->menu_category_id)->update([
                'menu_category_name' => $this->menu_category_name,
            ]);
            DB::commit();
            $this->reset(['menu_category_name']);
            request()->session()->flash('success', 'Kategori Menu berhasil diedit.');
            return redirect('/admin/kategori-menu');
        } catch (\Exception $e) {
            DB::rollBack();
            // throw $e;
            session()->flash('error', 'Terjadi kesalahan saat mengedit kategori menu!');
        }
    }
    public function render()
    {
        return view('livewire..admin.admin-kategori-menu-edit')
        ->layout('components.layouts.app', ['title' => 'Admin | Kategori Menu', 'active' => 'admin-kategoriMenu', 'role' => 'admin']);
    }
    
}