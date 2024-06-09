<?php

namespace App\Livewire\Admin;

use App\Models\paymentMethod;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
class AdminMetodePembayaran extends Component
{
    use WithPagination;
    public $payment_method_id;
    public $modalHapus = false;
    protected $paginationTheme = 'tailwind'; // Pastikan theme pagination diatur ke tailwind
    protected $listeners = ['refresh' => 'refresh'];

    public function modal_hapus($payment_method_id){
        $this->payment_method_id = $payment_method_id;
        $this->modalHapus=true;
    }    

    public function hapusMetodePembayaran(){
        $this->modalHapus=false;

        DB::beginTransaction();
        try{
            paymentMethod::find($this->payment_method_id_id)->delete();
                request()->session()->flash('success', 'Diskon berhasil dihapus.');
            DB::commit();
            $this->modalHapus = false;
            $this->render();
        } catch (\Exception $e) {
                request()->session()->flash('error', 'Gagal menghapus Diskon!' . $e->getMessage());
            DB::rollBack();
        }    
        // $this->dispatch('refresh_notif');
    }
    public function render()
    {
        $payment_methods = paymentMethod::orderBy('method', 'asc')->paginate(5);
        // dd($discounts);
        return view('livewire.admin.admin-metode-pembayaran',[
            'discounts'=>$payment_methods,
        ])
    ->layout('components.layouts.app', ['title' => 'Admin | Metode Pembayaran', 'active' => 'admin-diskon', 'role' => 'admin']);
    }    
}