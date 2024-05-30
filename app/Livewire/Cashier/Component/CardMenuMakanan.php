<?php

namespace App\Livewire\Cashier\Component;

use App\Models\cart;
use App\Models\menu;
use App\Models\orderDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;

class CardMenuMakanan extends Component
{
    public $categoryId;

    public $menus;

    public $search;

    public $pesanan_id;

    protected $listeners = ['getMenuCashier' => 'getMenuCashier', 'searchMenuCashier' => 'searchMenuCashier', 'refresh' => 'refresh'];

    public function mount()
    {
        $this->menus = menu::all();
    }

    public function getMenuCashier($categoryId)
    {
        $this->categoryId = $categoryId;

        if ($this->search) {
            if ($this->categoryId != '0') {
                $this->menus = menu::where('menu_category_id', $this->categoryId)->where('menu_name', 'like', '%' . $this->search . '%')->get();
            } else {
                $this->menus = menu::where('menu_name', 'like', '%' . $this->search . '%')->get();
            }
        } else {
            if ($this->categoryId != '0') {
                $this->menus = menu::where('menu_category_id', $this->categoryId)->get();
            } else {
                $this->menus = menu::all();
            }
        }
    }

    public function searchMenuCashier($search)
    {
        $this->search = $search;

        if ($this->categoryId != '0') {
            $this->menus = menu::where('menu_name', 'like', '%' . $search . '%')->where('menu_category_id', $this->categoryId)->get();
        } else {
            $this->menus = menu::where('menu_name', 'like', '%' . $search . '%')->get();
        }
    }

    public function addToCart($id)
    {
        if (cart::where('menu_id', $id)->where('user_id', auth()->user()->user_id)->exists()) {
            request()->session()->flash('notif_gagal', 'Menu sudah ada di keranjang');
        } else {
            DB::beginTransaction();
            try {
                cart::create([
                    'cart_id'  => Str::uuid(),
                    'user_id'  => auth()->user()->user_id,
                    'menu_id'  => $id,
                    'quantity' => 1
                ]);
                request()->session()->flash('notif_berhasil', "Menu berhasil ditambahkan");
                DB::commit();
                sleep(1);
            } catch (\Exception $e) {
                request()->session()->flash('notif_gagal', 'Menu gagal ditambahkan');
                DB::rollBack();
            }
        }
        $this->dispatch('getCartCashier');
        $this->dispatch('refresh_notif');
    }

    public function addToPesanan($id)
    {
        if (orderDetail::where('menu_id', $id)->where('order_id', $this->pesanan_id)->exists()) {
            request()->session()->flash('notif_gagal', 'Menu sudah ada di pesanan');
        } else {
            $this->dispatch('buatPesananCashier', $id);
            request()->session()->flash('notif_berhasil', "Menu berhasil ditambahkan");
        }
        $this->dispatch('refresh_notif');
    }

    public function refresh()
    {
        '$refresh';
    }

    public function render()
    {
        return view('livewire.cashier.component.card-menu-makanan');
    }
}