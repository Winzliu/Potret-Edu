<?php

namespace App\Livewire\Admin;

use App\Models\history;
use Livewire\Component;
use Livewire\WithPagination;

class AdminOrderHistory extends Component
{
    use WithPagination;
    public $history_print;
    public $search;
    public function mount()
    {
        $this->search = '';
        $this->history_print = history::where('history_id', 'like', '%' . $this->search . '%')->orWhere('order_status', 'like', '%' . $this->search . '%')->orderBy('payment_date', 'desc')->get();
    }

    public function searchHistory()
    {
        $this->resetPage();
    }

    public function render()
    {
        $this->histories = history::where('history_id', 'like', '%' . $this->search . '%')->orWhere('order_status', 'like', '%' . $this->search . '%')->orderBy('payment_date', 'desc')->paginate(8);

        $this->history_print = history::where('history_id', 'like', '%' . $this->search . '%')->orWhere('order_status', 'like', '%' . $this->search . '%')->orderBy('payment_date', 'desc')->get();

        return view('livewire.admin.admin-order-history', [
            'histories' => $this->histories
        ])
            ->layout('components.layouts.app', ['title' => 'Admin | Riwayat-Pesanan', 'active' => 'admin-riwayat', 'role' => 'admin']);
    }
}
