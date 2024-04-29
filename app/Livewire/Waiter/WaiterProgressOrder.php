<?php

namespace App\Livewire\Waiter;

use Livewire\Component;

class WaiterProgressOrder extends Component
{
    public function render()
    {
        return view('livewire.waiter.waiter-progress-order')
            ->layout('components.layouts.app', ['title' => 'Waiter | Proses Order', 'active' => 'pesanan', 'role' => 'waiter']);
    }
}
