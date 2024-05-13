<?php

namespace App\Livewire\Waiter;

use App\Models\order;
use Livewire\Component;

class WaiterProgressOrder extends Component
{
    public $pesanans;
    public $type = 'Dine In';
    public $status = 'Menunggu';

    protected $listeners = ['updatePesanan' => 'updatePesanan'];

    public function mount()
    {
        $this->pesanans = order::where('user_id', auth()->user()->user_id)->get();
        $this->type = 'Dine In';
        $this->status = 'Menunggu';
    }

    public function updatePesanan()
    {
        $this->pesanans = order::where('user_id', auth()->user()->user_id)->get();
    }

    public function getPesanans($status, $type)
    {
        $this->type = $type ? $type : $this->type;
        $this->status = $status ? $status : $this->status;
        $this->dispatch('getPesanans', [$status, $type]);
        $this->dispatch('searchPesanan', [$status, $type]);
    }

    public function render()
    {
        return view('livewire.waiter.waiter-progress-order')
            ->layout('components.layouts.app', ['title' => 'Waiter | Proses Order', 'active' => 'waiter-pesanan', 'role' => 'waiter']);
    }
}
