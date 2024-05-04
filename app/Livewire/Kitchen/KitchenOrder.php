<?php

namespace App\Livewire\Kitchen;

use Livewire\Component;

class KitchenOrder extends Component
{
    public function render()
    {
        return view('livewire.kitchen.kitchen-order')
            ->layout('components.layouts.app', ['title' => 'Dapur | Pesanan', 'active' => 'kitchen-pesanan', 'role' => 'kitchen']);
    }


}