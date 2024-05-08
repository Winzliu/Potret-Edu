<?php

namespace App\Livewire\Waiter;

use App\Models\menuCategory;
use Livewire\Component;

class WaiterCartMenu extends Component
{
    public $categories;
    public $category_id;
    public $active;

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
        $this->dispatch('getMenu', $this->category_id);
    }

    public function render()
    {
        return view('livewire.waiter.waiter-cart-menu', [
        ])->layout('components.layouts.app', ['title' => 'Waiter | Menu', 'active' => 'waiter-home', 'role' => 'waiter']);
    }
}