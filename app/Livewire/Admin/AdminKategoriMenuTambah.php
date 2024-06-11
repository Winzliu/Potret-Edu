<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\menuCategory;
use Illuminate\Support\Facades\DB;

class AdminKategoriMenuTambah extends Component
{
    public $modalTambah = false;
    public $menu_category_name;

    public function modal_tambah()
    {
        $this->modalTambah = true;
    }
    public function buatKategoriMenu()
    {
        $this->modalTambah = false;

        // dd($this->discount_rate);
        $this->validate(
            [
                'menu_category_name' => 'required|string|unique:menu_categories',
            ],
            [
                'menu_category_name.required' => 'Kategori ini harus diisi.',
                'menu_category_name.unique'   => 'Kategori ini sudah ada.',
            ]
        );
        DB::beginTransaction();
        // $this->discount_rate_conversion = (double) $this->discount_rate / 100;
        try {
            sleep(1);
            menuCategory::create([
                'menu_category_id'      => str()->uuid(),
                'menu_category_name'    => $this->menu_category_name,
            ]);
            DB::commit();
            $this->reset(['menu_category_name']);
            // Close the modal
            $this->modalTambah = false;
            request()->session()->flash('success', 'Kategori Menu Berhasil Ditambahkan!');
            return redirect('/admin/kategori-menu');
        } catch (\Exception $e) {
            DB::rollBack();
            // throw $e;
            session()->flash('error', 'Terjadi kesalahan saat menambahkan kategori menu!');
        }

    }
    
    public function render()
    {
        return view('livewire..admin.admin-kategori-menu-tambah')
        ->layout('components.layouts.app', ['title' => 'Admin | Kategori Menu', 'active' => 'admin-kategoriMenu', 'role' => 'admin']);
    }
}