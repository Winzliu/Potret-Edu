<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminMenuDetail extends Component
{
    use WithFileUploads;

    public $modalTambah = false;
    public $gambar;
    public $nama;
    public $harga;
    public $alergen;
    public $deskripsi_menu;

    protected $rules = [
        'gambar' => 'image|max:1024', // maksimal 1MB
        'nama' => 'required|string|max:255',
        'harga' => 'required|numeric',
        'alergen' => 'nullable|string',
        'deskripsi_menu' => 'nullable|string',
    ];

    public function modal_tambah()
    {
        $this->validate();

        DB::beginTransaction();

        try {
            $imageName = $this->gambar->store('menu-images', 'public');

            Menu::create([
                'menu_name' => $this->nama,
                'menu_price' => $this->harga,
                'menu_allergen' => $this->alergen,
                'menu_description' => $this->deskripsi_menu,
                'menu_image' => $imageName,
            ]);

            DB::commit();

            // Reset form fields
            $this->reset(['gambar', 'nama', 'harga', 'alergen', 'deskripsi_menu']);

            // Close the modal
            $this->modalTambah = false;

            session()->flash('message', 'Menu berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Terjadi kesalahan saat menambahkan menu: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.admin-menu-detail')
            ->layout('components.layouts.app', [
                'title' => 'Admin | Beranda',
                'active' => 'admin-menu',
                'role' => 'admin'
            ]);
    }
}