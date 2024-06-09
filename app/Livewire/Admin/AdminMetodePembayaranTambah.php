<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\paymentMethod;
use Illuminate\Support\Facades\DB;

class AdminMetodePembayaranTambah extends Component
{
    public $modalTambah = false;
    public $method;
    public $taxes;

    public function modal_tambah(){
        $this->modalTambah = true;
    }

    public function buatMetodePembayaran(){
        $this->modalTambah = false;

        // dd($this->discount_rate);
        $this->validate([
            'method' => 'required|string|unique:payment_methods',
            'taxes' => 'required|numeric|between: 0,100',  
        ],
        [
            'method.required' => 'Nama metode pembayaran harus diisi.',
            'method.unique' => 'Nama metode pembayaran sudah ada.',
            'taxes.required' => 'Kolom persentase diskon harus diisi.',
            'taxes.between' => 'Rentang yang diterima adalah 1-100',
        ]);
        DB::beginTransaction();
        // $this->discount_rate_conversion = (double) $this->discount_rate / 100;
        try{
            sleep(1);
            paymentMethod::create([
                'payment_method_id' => str()->uuid(),
                'method' => $this->method,
                'taxes' => (double) $this->taxes,
            ]);
            DB::commit();
            $this->reset(['method', 'taxes']);
            // Close the modal
        $this->modalTambah = false;
        request()->session()->flash('success', 'Metode Pembayaran Berhasil Ditambahkan.');
    return redirect('/admin/metode-pembayaran');
        } catch (\Exception $e) {
            DB::rollBack();
            // throw $e;
            session()->flash('error', 'Terjadi kesalahan saat menambahkan metode pembayaran!');
        }

    }

    public function render()
    {
        return view('livewire..admin.admin-metode-pembayaran-tambah')
        ->layout('components.layouts.app', ['title' => 'Admin | Metode Pembayaran', 'active' => 'admin-metodePembayaran', 'role' => 'admin']);
    }
}