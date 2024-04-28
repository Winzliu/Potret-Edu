<?php

namespace App\Livewire\Kitchen;

use Livewire\Component;

class KitchenMenu extends Component
{
    public function render()
    {
        return view('livewire.kitchen.kitchen-order')
            ->layout('components.layouts.app', ['title' => 'Dapur Potret Edupark']);
    }
}