<?php

namespace App\Livewire\Cashier;

use App\Models\history;
use Livewire\Component;

class CashierDetailHistory extends Component
{
    public $history;

    public function mount($history)
    {
        $this->history = history::where('history_id', $history)->first();
    }

    public function render()
    {
        return view('livewire.cashier.cashier-detail-history')
            ->layout('components.layouts.app', ['title' => 'Cashier | Riwayat', 'active' => 'cashier-riwayat', 'role' => 'cashier']);
    }
}
