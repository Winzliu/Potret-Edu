<?php

namespace App\Livewire\Cashier;

use App\Models\order;
use Livewire\Component;

class CashierDetailOrder extends Component
{
    public $pesanan;

    public function mount($pesanan)
    {
        $this->pesanan = order::where('order_id', $pesanan)->first();
    }

    public function render()
    {
        return view('livewire.cashier.cashier-detail-order')
            ->layout('components.layouts.app', ['title' => 'Cashier | Detail Pesanan', 'active' => 'cashier-pesanan', 'role' => 'cashier']);
        ;
    }
}
