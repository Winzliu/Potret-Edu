<?php

namespace App\Livewire\Cashier;

use App\Models\menuCategory;
use Livewire\Component;

class CashierCartMenu extends Component
{
    public $categories;
    public $category_id;
    public $active;
    public $pesanan_id;

    protected $listeners = ['categoryActive' => 'categoryActive'];

    public function mount()
    {
        $this->category_id = '0';
        $this->active = '0';
        $this->categories = menuCategory::all();
    }

    public function categoryActive($id)
    {
        if ($id != '0') {
            $this->category_id = menuCategory::where('menu_category_id', $id)->first()->menu_category_id;
        } else {
            $this->category_id = $id;
        }
        $this->dispatch('getMenuCashier', $this->category_id);
    }

    public function render()
    {
        return view('livewire.cashier.cashier-cart-menu')
            ->layout('components.layouts.app', ['title' => 'Cashier | Menu', 'active' => 'cashier-home', 'role' => 'cashier']);
    }
}