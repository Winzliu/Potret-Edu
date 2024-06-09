<?php

namespace App\Livewire\Admin;

use App\Models\paymentMethod;
use Livewire\Component;
use Illuminate\Support\Facades\DB;



class AdminMetodePembayaranEdit extends Component
{
    public $method;
    public $payment_method;
    public $taxes;
    public $payment_method_id;
    public $modalTambah;
    
    public function modal_tambah(){
        $this->modalTambah = true;
    }
    public function mount(){
        $this->payment_method_id = request('id_metode_pembayaran');
        if ($this->payment_method_id) {
            $metode = paymentMethod::findOrFail($this->payment_method_id);
            $this->method = $metode->method;
            $this->taxes = $metode->taxes;
        }
    }
    public function editMetodePembayaran(){
        // dd($this->karyawan_id);
        $this->modalTambah = false;
        $this->payment_method = paymentMethod::findOrFail($this->payment_method_id);
        $rules = [
            'taxes' => 'required|numeric|between: 0,100',  
        ];
        if ($this->method !== $this->payment_method->method) {
            $rules['method'] = 'required|string|unique:payment_methods';
        } else {
            $rules['method'] = 'required|string';

            $this->validate($rules, [
                'method.required' => 'Kolom nama metode pembayaran harus diisi.',
            'method.unique' => 'Nama metode pembayaran sudah ada.',
            'taxes.required' => 'Kolom persentase pajak harus diisi.',
            'taxes.between' => 'Rentang yang diterima adalah 1-100',
            ]);
            
            // dd($this->position);
            DB::beginTransaction();
            // $this->discount_rate_conversion = (double) $this->taxes / 100;
            try{
                sleep(1);
                paymentMethod::where('payment_method_id', $this->payment_method_id)->update([
                    'method' => $this->method,
                    'taxes' => (double) $this->taxes,
                ]);
                DB::commit();
                $this->reset(['method', 'taxes']);
                // Close the modal
            $this->modalTambah = false;
            request()->session()->flash('success', 'Metode Pembayaran berhasil diedit.');
                return redirect('/admin/metode-pembayaran');
            } catch (\Exception $e) {
                DB::rollBack();
                // throw $e;
                session()->flash('error', 'Terjadi kesalahan saat mengedit metode pembayaran!');
            }
    
        } 
    }   
    public function render()
    {
        return view('livewire..admin.admin-metode-pembayaran-edit')
        ->layout('components.layouts.app', ['title' => 'Admin | Metode Pembayaran', 'active' => 'admin-metodePembayaran', 'role' => 'admin']);

    }
}