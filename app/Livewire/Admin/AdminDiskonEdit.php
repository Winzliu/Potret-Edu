<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\discount;
use Illuminate\Support\Facades\DB;

class AdminDiskonEdit extends Component
{
    public $discount_name;
    public $discount_rate;
    public $discounts;
    public $discount_id;
    public $modalTambah = false;

    public function modal_tambah()
    {
        $this->modalTambah = true;
    }

    public function mount()
    {
        $this->discount_id = request('id_diskon');
        // $this->menu_categories = menuCategory::all();
        if ($this->discount_id) {
            $diskon = discount::findOrFail($this->discount_id);
            $this->discount_name = $diskon->discount_name;
            $this->discount_rate = $diskon->discount_rate * 100;
        }
    }

    public function editDiskon()
    {
        // dd($this->karyawan_id);
        $this->modalTambah = false;
        $this->discount = discount::findOrFail($this->discount_id);
        $rules = [
            'discount_rate' => 'required|numeric|between: 0,100',
        ];
        if ($this->discount_name != $this->discount->discount_name) {
            $rules['discount_name'] = 'required|string|unique:discounts';
        } else {
            $rules['discount_name'] = 'required|string';
        }
        $this->validate($rules, [
            'discount_name.required'       => 'Kolom nama diskon harus diisi.',
            'discount_name.unique'         => 'Nama diskon sudah ada.',
            'discount_rate.required'       => 'Kolom persentase diskon harus diisi.',
            'discount_rate.digits_between' => 'Rentang yang diterima adalah 1-100',
        ]);

        // dd($this->position);
        DB::beginTransaction();
        $this->discount_rate_conversion = (double) $this->discount_rate / 100;
        try {
            sleep(1);
            discount::where('discount_id', $this->discount_id)->update([
                'discount_name' => $this->discount_name,
                'discount_rate' => (double) $this->discount_rate_conversion,
            ]);
            DB::commit();
            $this->reset(['discount_name', 'discount_rate']);
            // Close the modal
            $this->modalTambah = false;
            request()->session()->flash('success', 'Diskon berhasil diperbarui!.');
            return redirect('/admin/diskon');
        } catch (\Exception $e) {
            DB::rollBack();
            // throw $e;
            session()->flash('error', 'Terjadi kesalahan saat memperbarui diskon!');
        }
    }



    public function render()
    {
        return view('livewire..admin.admin-diskon-edit')
            ->layout('components.layouts.app', ['title' => 'Admin | Edit Diskon', 'active' => 'admin-diskon', 'role' => 'admin']);
        ;
    }
}