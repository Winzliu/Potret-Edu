<?php

namespace App\Livewire\Waiter;

use Livewire\Component;

class WaiterCartMenu extends Component
{
    public function render()
    {
        return view('livewire.waiter.waiter-cart-menu')
            ->layout('components.layouts.app', ['title' => 'Waiter | Menu', 'active' => 'waiter-home', 'role' => 'waiter']);
    }
}