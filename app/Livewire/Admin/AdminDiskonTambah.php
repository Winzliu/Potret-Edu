<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\discount;
use Illuminate\Support\Facades\DB;

class AdminDiskonTambah extends Component
{
    public $modalTambah = false;
    public $discount_rate;
    public $discount_rate_conversion_;
    public $discount_name;

    public function modal_tambah(){
        $this->modalTambah = true;
    }

    public function buatDiskon(){
        $this->modalTambah = false;

        // dd($this->discount_rate);
        $this->validate([
            'discount_name' => 'required|string|unique:discounts',
            'discount_rate' => 'required|numeric|digits_between: 0,100',  
        ],
        [
            'discount_name.required' => 'Kolom nama diskon harus diisi.',
            'discount_name.unique' => 'Nama diskon sudah ada.',
            'discount_rate.required' => 'Kolom persentase diskon harus diisi.',
            'discount_rate.digits_between' => 'Rentang yang diterima adalah 1-100',
        ]);
        DB::beginTransaction();
        $this->discount_rate_conversion = (double) $this->discount_rate / 100;
        try{
            sleep(1);
            discount::create([
                'discount_id' => str()->uuid(),
                'discount_name' => $this->discount_name,
                'discount_rate' => (double) $this->discount_rate_conversion,
            ]);
            DB::commit();
            $this->reset(['discount_name', 'discount_rate']);
            // Close the modal
        $this->modalTambah = false;
        request()->session()->flash('success', 'Diskon berhasil ditambahkan.');
    return redirect('/admin/diskon');
        } catch (\Exception $e) {
            DB::rollBack();
            // throw $e;
            session()->flash('error', 'Terjadi kesalahan saat menambahkan diskon!');
        }

    }

    public function render()
    {
        return view('livewire..admin.admin-diskon-tambah')
        ->layout('components.layouts.app', ['title' => 'Admin | Tambah Diskon', 'active' => 'admin-diskon', 'role' => 'admin']);
    }
}