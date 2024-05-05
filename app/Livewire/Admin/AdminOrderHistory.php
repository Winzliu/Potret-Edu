<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class AdminOrderHistory extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-order-history')
            ->layout('components.layouts.app', ['title' => 'Admin | Riwayat-Pesanan', 'active' => 'admin-riwayat', 'role' => 'admin']);
    }
}
