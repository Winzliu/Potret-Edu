<?php

namespace App\Livewire\Cashier;

use Livewire\Component;

class CashierDetailOrder extends Component
{
    public function render()
    {
        return view('livewire.cashier.cashier-detail-order')
            ->layout('components.layouts.app', ['title' => 'Cashier | Detail Pesanan', 'active' => 'pesanan', 'role' => 'cashier']);
        ;
    }
}
