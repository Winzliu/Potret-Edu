<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Menu;
use App\Models\menuCategory;
use Illuminate\Support\Facades\DB;
class AdminMenuEdit extends Component
{
    use WithFileUploads;

    public $modalTambah = false;
    // #[Rule('required|file|max:5120|mimes:jpeg,jpg,png')]
    public $oldImageUrl;
    public $gambar;
    
    public $menu_name;
    public $menu_id;
    public $menu_price;
    public $menu_allergen;
    public $menu_description;
    
    public $menu_categories;
    public $menu_category;

    public function mount()
    {
        $this->menu_id = request('id_pesanan');
        $this->menu_categories = menuCategory::all();
        if ($this->menu_id) {
            $menu = Menu::findOrFail($this->menu_id);
            $this->menu_id = $menu->menu_id;
            $this->menu_name = $menu->menu_name;
            $this->menu_price = $menu->menu_price;
            $this->menu_allergen = $menu->menu_allergen;
            $this->menu_description = $menu->menu_description;
            $this->menu_category = $menu->menu_category_id;
            $this->oldImageUrl = $menu->menu_image;
        }
    }

    public function editMenu()
    {
        $this->modalTambah = false;
        
        $rules = [
            'menu_name' => 'required|string|max:255|unique:menus,menu_name,' . $this->menu_id . ',menu_id',
            'menu_price' => 'required',
            'menu_category' => 'required|string',
            'menu_allergen' => 'nullable|string|regex:/^(\d*\s*[a-zA-Z]+(?:\s+[a-zA-Z]+)*)(,\s*\d*\s*[a-zA-Z]+(?:\s+[a-zA-Z]+)*)*$/',
            'menu_description' => 'nullable|string|regex:/^(\d*\s*[a-zA-Z]+(?:\s+[a-zA-Z]+)*)(,\s*\d*\s*[a-zA-Z]+(?:\s+[a-zA-Z]+)*)*$/',        
        ];
    
        // Jika ada gambar yang diunggah, tambahkan validasi untuk gambar
        if ($this->gambar) {
            $rules['gambar'] = 'required|file|max:5120|mimes:jpeg,jpg,png';
        }
    
        $this->validate($rules, [
            'gambar.required'  => 'Gambar harus diisi',
            'gambar.file'  => 'Gambar harus berbentuk file',
            'gambar.max'   => 'Gambar terlalu besar',
            'gambar.mimes' => 'Masukkan format file JPEG, JPG, dan PNG',
            'menu_name.required'  => 'Nama Menu harus diisi',
            'menu_name.unique'  => 'Menu ini sudah ada.',
            'menu_price.required'  => 'Harga Menu harus diisi',            
            'menu_price.numeric'  => 'Harga Menu harus angka.',            
            'menu_category.required'  => 'Kategori Menu harus diisi', 
            'menu_allergen.regex' => 'Gunakan format yang sesuai',           
            'menu_description.regex' => 'Gunakan format yang sesuai',           
        ]);
        // dd($this->menu_price);
        // Proses penyimpanan gambar dan pembaruan data
        DB::beginTransaction();

        try {
            // Jika ada gambar yang diunggah, simpan gambar baru
            if ($this->gambar) {
                // Hapus gambar lama dari penyimpanan
               \Storage::delete('public/menu-images/' . $this->oldImageUrl);
                // Simpan gambar baru
                $imageName = $this->gambar->store('public/menu-images');
                $imageName = basename($imageName);
            } else {
                // Jika tidak ada gambar yang diunggah, gunakan gambar lama
                $imageName = $this->oldImageUrl;
            }

            // Update data menu
            Menu::where('menu_id', $this->menu_id)->update([
                'menu_name' => $this->menu_name,
                'menu_price' => (float)$this->menu_price,
                'menu_allergen' => $this->menu_allergen,
                'menu_description' => $this->menu_description,
                'menu_category_id' => $this->menu_category,
                'menu_image' => $imageName,
            ]);

            DB::commit();

            // Reset form fields
            $this->reset(['gambar', 'menu_name', 'menu_price', 'menu_allergen', 'menu_description']);

            // Close the modal
            $this->modalTambah = false;

            session()->flash('success', 'Menu berhasil diperbarui.');
            return redirect('/admin/menu');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

    }
    
    // public function buatMenu()
    // {        
    //     $this->modalTambah = false;
    //     $this->validate([
    //         'gambar' => 'required|file|max:5120|mimes:jpeg,jpg,png', // maksimal 1MB
    //         'menu_name' => 'required|string|max:255|unique:menus',
    //         'menu_price' => 'required|numeric',
    //         'menu_category' => 'required|string',
    //         'menu_allergen' => 'nullable|string|regex:/^(\d*\s*[a-zA-Z]+(?:\s+[a-zA-Z]+)*)(,\s*\d*\s*[a-zA-Z]+(?:\s+[a-zA-Z]+)*)*$/',
    //         'menu_description' => 'nullable|string|regex:/^(\d*\s*[a-zA-Z]+(?:\s+[a-zA-Z]+)*)(,\s*\d*\s*[a-zA-Z]+(?:\s+[a-zA-Z]+)*)*$/',        
    //     ],
    //     [
    //         'gambar.required'  => 'Gambar harus diisi',
    //         'gambar.file'  => 'Gambar harus berbentuk file',
    //         'gambar.max'   => 'Gambar terlalu besar',
    //         'gambar.mimes' => 'Masukkan format file JPEG, JPG, dan PNG',
    //         'menu_name.required'  => 'Nama Menu harus diisi',
    //         'menu_name.unique'  => 'Menu ini sudah ada.',
    //         'menu_price.required'  => 'Harga Menu harus diisi',            
    //         'menu_price.numeric'  => 'Harga Menu harus angka.',            
    //         'menu_category.required'  => 'Kategori Menu harus diisi', 
    //         'menu_allergen.regex' => 'Gunakan format yang sesuai',           
    //         'menu_description.regex' => 'Gunakan format yang sesuai',           
    //     ]);

    //     // dd('alwin');
    //     DB::beginTransaction();

    //     try {
    //         $imageName['menu_image'] = $this->gambar->store('public/menu-images');
    //         $imageName['menu_image'] = basename($imageName['menu_image']);
    //         sleep(1);

    //         Menu::create([
    //             'menu_id' => str()->uuid(),
    //             'menu_name' => $this->menu_name,
    //             'menu_price' => $this->menu_price,
    //             'menu_allergen' => $this->menu_allergen,
    //             'menu_description' => $this->menu_description,
    //             'menu_category_id' => $this->menu_category,
    //             'menu_image' => str_replace("gambar_menu/", "", $imageName['menu_image']),
    //         ]);

    //         DB::commit();
    //         // Reset form fields
    //         $this->reset(['gambar', 'menu_name', 'menu_price', 'menu_allergen', 'menu_description']);
    //         // Close the modal
    //         $this->modalTambah = false;
    //         request()->session()->flash('success', 'Menu berhasil ditambahkan.');
    //         return redirect('/admin/menu');
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         throw $e;
    //         // session()->flash('tambah_menu_gagal', 'Terjadi kesalahan saat menambahkan menu: ' . $e->getMessage());
    //     }
    // }

    public function modal_tambah(){
        $this->modalTambah = true;
    }
    public function render()
    {
        return view('livewire.admin.admin-menu-edit')
            ->layout('components.layouts.app', ['title' => 'Admin | Beranda', 'active' => 'admin-menu', 'role' => 'admin']);
    }
}