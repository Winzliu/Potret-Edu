<?php

namespace App\Livewire\Cashier;

use Livewire\Component;

class CashierHistory extends Component
{
    public function render()
    {
        return view('livewire.cashier.cashier-history')
            ->layout('components.layouts.app', ['title' => 'Cashier | Riwayat', 'active' => 'riwayat', 'role' => 'cashier']);
    }
}
