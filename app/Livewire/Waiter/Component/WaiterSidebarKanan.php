<?php

namespace App\Livewire\Waiter\Component;

use App\Models\cart;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class WaiterSidebarKanan extends Component
{
    public $carts;

    protected $listeners = ['getCart' => 'getCart', 'refresh' => 'refresh'];

    public function mount()
    {
        $this->carts = cart::where('user_id', auth()->user()->user_id)->get();
    }

    public function getCart()
    {
        $this->carts = cart::where('user_id', auth()->user()->user_id)->get();
    }

    public function deleteCart($id)
    {
        DB::beginTransaction();
        try {
            cart::where('cart_id', $id)->delete();
            $this->carts = cart::where('user_id', auth()->user()->user_id)->get();
            request()->session()->flash('notif_berhasil', 'Menu Berhasil Dihapus');
            DB::commit();
        } catch (\Exception $e) {
            request()->session()->flash('notif_gagal', 'Menu Gagal Dihapus');
            DB::rollBack();
        }
        $this->dispatch('refresh_notif');
    }

    public function refresh()
    {
        '$refresh';
    }

    public function render()
    {
        return view('livewire.waiter.component.waiter-sidebar-kanan');
    }
}
