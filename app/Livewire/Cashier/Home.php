<?php

namespace App\Livewire\Cashier;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.cashier.home')
            ->layout('components.layouts.app', ['title' => 'Show Posts']);
    }
}
