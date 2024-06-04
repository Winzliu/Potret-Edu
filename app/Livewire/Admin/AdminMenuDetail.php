<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Menu;
use App\Models\menuCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminMenuDetail extends Component
{
    use WithFileUploads;

    public $modalTambah = false;
    // #[Rule('required|file|max:5120|mimes:jpeg,jpg,png')]
    public $gambar;
    
    // #[Rule('required|string|max:255')]
    public $menu_name;
    
    // #[Rule('required|int')]
    public $menu_price;
    public $menu_allergen;
    public $menu_description;
    
    public $menu_categories;
    public $menu_category;

    public function mount(){
        $this->menu_categories = menuCategory::all();
    }

    public function modal_tambah(){
        $this->modalTambah = true;
    }

    public function buatMenu()
    {
        $this->modalTambah = false;
        $this->validate([
            'gambar' => 'required|file|max:5120|mimes:jpeg,jpg,png', // maksimal 1MB
            'menu_name' => 'required|string|max:255|unique:menus',
            'menu_price' => 'required|numeric',
            'menu_category' => 'required|string',
            'menu_allergen' => 'nullable|string',
            'menu_description' => 'nullable|string',        
        ],
        [
            'gambar.required'  => 'Gambar harus diisi',
            'gambar.file'  => 'Gambar harus berbentuk file',
            'gambar.max'   => 'Gambar terlalu besar',
            'gambar.mimes' => 'Masukkan format file JPEG, JPG, dan PNG',
            'menu_name.required'  => 'Nama Menu harus diisi',
            'menu_name.unique'  => 'Menu ini sudah ada.',
            'menu_price.required'  => 'Harga Menu harus diisi',            
            'menu_price.numeric'  => 'Harga Menu harus angka.',            
            'menu_category.required'  => 'Kategori Menu harus diisi',            
        ]);

        // dd('alwin');
        DB::beginTransaction();

        try {
            $imageName['menu_image'] = $this->gambar->store('menu-images');

            Menu::create([
                'menu_id' => str()->uuid(),
                'menu_name' => $this->menu_name,
                'menu_price' => $this->menu_price,
                'menu_allergen' => $this->menu_allergen,
                'menu_description' => $this->menu_description,
                'menu_category_id' => $this->menu_category,
                'menu_image' => str_replace("gambar_menu/", "", $imageName['menu_image']),
                
            ]);

            DB::commit();
            // Reset form fields
            $this->reset(['gambar', 'menu_name', 'menu_price', 'menu_allergen', 'menu_description']);
            // Close the modal
            $this->modalTambah = false;
            request()->session()->flash('success', 'Menu berhasil ditambahkan.');
            return redirect('/admin/menu');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
            // session()->flash('tambah_menu_gagal', 'Terjadi kesalahan saat menambahkan menu: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.admin-menu-detail')
            ->layout('components.layouts.app', [
                'title' => 'Admin | Tambah Menu',
                'active' => 'admin-menu',
                'role' => 'admin'
            ]);
    }
}