<?php

namespace App\Livewire\Waiter\Component;

use App\Models\cart;
use App\Models\order;
use App\Models\orderDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Rule;
use Illuminate\Support\Str;
use Livewire\Component;

class WaiterSidebarKanan extends Component
{
    public $carts;
    public $cart_total;
    #[Rule('numeric|max:99')]
    public $input_nomor_meja;
    public $nomor_meja;
    public $service;
    public $input_service;
    public $n = [];

    protected $messages = [
        'input_nomor_meja.required' => 'Nomor Meja Tidak Boleh Kosong',
        'input_nomor_meja.max'      => 'Nomor Meja Tidak Boleh Lebih dari 2 Angka',
    ];

    protected $listeners = ['getCart' => 'getCart', 'refresh' => 'refresh'];

    public function mount()
    {
        $this->carts = cart::where('user_id', auth()->user()->user_id)->get();
        $this->cart_total = cart::where('user_id', auth()->user()->user_id)->count();
        foreach ($this->carts as $cart) {
            $this->n[$cart->cart_id] = Session::get($cart->cart_id, '');
        }
        $this->input_service = 'Dine In';
    }

    public function getCart()
    {
        $this->carts = cart::where('user_id', auth()->user()->user_id)->get();
        $this->cart_total = cart::where('user_id', auth()->user()->user_id)->count();
        foreach ($this->carts as $cart) {
            $this->n[$cart->cart_id] = Session::get($cart->cart_id, '');
        }
        '$refresh';
    }

    public function saveText($id)
    {
        Session::put($id, $this->n[$id]);
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
        $this->cart_total = cart::where('user_id', auth()->user()->user_id)->count();
        $this->dispatch('refresh_notif');
    }

    public function refresh()
    {
        '$refresh';
    }

    public function increment($cart_id)
    {
        cart::where('cart_id', $cart_id)->increment('quantity', 1);
        $this->dispatch('getCart');
    }
    public function decrement($cart_id)
    {
        if (cart::where('cart_id', $cart_id)->first()->quantity > 1) {
            cart::where('cart_id', $cart_id)->decrement('quantity', 1);
        }
        $this->dispatch('getCart');
    }

    public function input_meja()
    {
        $this->nomor_meja = $this->input_nomor_meja;
    }

    public function changeService()
    {
        $this->service = $this->input_service;
    }

    public function createOrder()
    {
        sleep(1);

        $order_id = Str::uuid();

        if ($this->input_nomor_meja != null && $this->input_service == "Dine In" && order::where('table_number', $this->input_nomor_meja)->where('order_type', 'Dine In')->exists()) {
            request()->session()->flash('notif_gagal', 'Nomor Meja Sudah Ada');
            $this->dispatch('refresh_notif');
            return;
        }

        DB::beginTransaction();

        try {
            cart::where('user_id', auth()->user()->user_id)->delete();

            order::create([
                'order_id'     => $order_id,
                'date'         => NOW(),
                'user_id'      => auth()->user()->user_id,
                'table_number' => $this->input_nomor_meja ? $this->input_nomor_meja : '',
                'order_type'   => $this->input_service,
                'order_status' => 'masak',
            ]);

            foreach ($this->carts as $cart) {
                $order_detail_id = Str::uuid();
                orderDetail::create([
                    'order_detail_id' => $order_detail_id,
                    'menu_date'       => NOW(),
                    'order_id'        => $order_id,
                    'menu_id'         => $cart->menu_id,
                    'quantity'        => $cart->quantity,
                    'status'          => 'baru',
                    'menu_status'     => 'masak'
                ]);
                if (isset($this->n[$cart->cart_id])) {
                    orderDetail::where('order_detail_id', $order_detail_id)->update([
                        'notes' => $this->n[$cart->cart_id]
                    ]);
                }
            }

            $this->input_nomor_meja = "";
            $this->cart_total = cart::where('user_id', auth()->user()->user_id)->count();

            request()->session()->flash('notif_berhasil', 'Pesanan Berhasil Dibuat');
            DB::commit();
        } catch (\Exception $e) {
            request()->session()->flash('notif_gagal', 'Pesanan Gagal Dibuat');
            DB::rollBack();
            // throw $e;
        }
        $this->dispatch('refresh_notif');
    }

    public function render()
    {
        return view('livewire.waiter.component.waiter-sidebar-kanan');
    }
}
