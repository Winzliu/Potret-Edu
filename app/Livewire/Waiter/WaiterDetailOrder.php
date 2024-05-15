<?php

namespace App\Livewire\Waiter;

use App\Models\order;
use Livewire\Component;

class WaiterDetailOrder extends Component
{
    public $pesanan;

    public function mount($pesanan)
    {
        $this->pesanan = order::where('user_id', auth()->user()->user_id)->where('order_id', $pesanan)->first();
    }

    public function render()
    {
        return view('livewire.waiter.waiter-detail-order')
            ->layout('components.layouts.app', ['title' => 'Waiter | Detail Order', 'active' => 'waiter-pesanan', 'role' => 'waiter']);
    }
}
