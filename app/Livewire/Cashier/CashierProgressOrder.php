<?php

namespace App\Livewire\Cashier;

use App\Models\order;
use Livewire\Component;

class CashierProgressOrder extends Component
{
    public $pesanans;
    public $type = 'Dine In';
    public $status = 'Menunggu';

    protected $listeners = ['updatePesananCashier' => 'updatePesananCashier'];

    public function mount()
    {
        $this->pesanans = order::all();
        $this->type = 'Dine In';
        $this->status = 'Menunggu';
    }

    public function updatePesananCashier()
    {
        $this->pesanans = order::all();
    }

    public function getPesanansCashier($status, $type)
    {
        $this->type = $type ? $type : $this->type;
        $this->status = $status ? $status : $this->status;
        $this->dispatch('getPesanansCashier', [$status, $type]);
        $this->dispatch('searchPesananCashier', [$status, $type]);
    }

    public function render()
    {
        return view('livewire.cashier.cashier-progress-order')
            ->layout('components.layouts.app', ['title' => 'Cashier | Proses Order', 'active' => 'cashier-pesanan', 'role' => 'cashier']);
    }
}
