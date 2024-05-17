<?php

namespace App\Livewire\Kitchen;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Http\Request;

class KitchenOrder extends Component
{    
    public function render()
    {
        $orders = order::where('order_status', 'masak')->get();
        // dd($orders);
        return view('livewire.kitchen.kitchen-order',[
            'orders' => $orders,
        ])
            ->layout('components.layouts.app', ['title' => 'Dapur | Pesanan', 'active' => 'kitchen-pesanan', 'role' => 'kitchen']);
    }

}