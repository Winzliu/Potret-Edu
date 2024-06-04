<?php

namespace App\Livewire\Admin;

use App\Models\history;
use Livewire\Component;
use Livewire\WithPagination;

class AdminOrderHistory extends Component
{
    use WithPagination;
    public function render()
    {
        $histories = history::orderBy('payment_date', 'desc')->paginate(8);

        return view('livewire.admin.admin-order-history', [
            'histories' => $histories
        ])
            ->layout('components.layouts.app', ['title' => 'Admin | Riwayat-Pesanan', 'active' => 'admin-riwayat', 'role' => 'admin']);
    }
}
