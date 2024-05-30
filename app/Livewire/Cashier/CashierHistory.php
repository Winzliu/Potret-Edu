<?php

namespace App\Livewire\Cashier;

use App\Models\history;
use Livewire\Component;
use Livewire\WithPagination;

class CashierHistory extends Component
{
    use WithPagination;

    public function render()
    {
        $histories = history::orderBy('payment_date', 'desc')->paginate(8);

        return view('livewire.cashier.cashier-history', [
            'histories' => $histories
        ])
            ->layout('components.layouts.app', ['title' => 'Cashier | Riwayat', 'active' => 'cashier-riwayat', 'role' => 'cashier']);
    }
}
