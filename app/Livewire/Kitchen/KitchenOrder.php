<?php

namespace App\Livewire\Kitchen;

use Livewire\Component;
use App\Models\Order;

class KitchenOrder extends Component
{    
    public $pesanans;
    public $type = 'Dine In';
    public $status = 'Menunggu';

    protected $listeners = ['updatePesananKitchen' => 'updatePesananKitchen'];


    public function mount()
    {
        $this->pesanans = order::all();
        $this->type = 'Dine In';
        $this->status = 'Menunggu';
    }

    public function updatePesananKitchen()
    {
        $this->pesanans = order::all();
    }

    public function getPesanansKitchen($status, $type)
    {
        $this->type = $type ? $type : $this->type;
        $this->status = $status ? $status : $this->status;
        $this->dispatch('getPesanansKitchen', [$status, $type]);
        $this->dispatch('searchPesananKitchen', [$status, $type]);
    }
    public function render()
    {
        return view('livewire.kitchen.kitchen-order')
            ->layout('components.layouts.app', ['title' => 'Dapur | Pesanan', 'active' => 'kitchen-pesanan', 'role' => 'kitchen']);
    }

}