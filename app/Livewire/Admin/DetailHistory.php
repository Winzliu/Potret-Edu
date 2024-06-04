<?php

namespace App\Livewire\Admin;

use App\Models\history;
use Livewire\Component;

class DetailHistory extends Component
{
    public $history;

    public function mount($history)
    {
        $this->history = history::where('history_id', $history)->first();
    }

    public function render()
    {
        return view('livewire.admin.detail-history')
            ->layout('components.layouts.app', ['title' => 'Admin | Riwayat-Pesanan', 'active' => 'admin-riwayat', 'role' => 'admin']);
    }
}
