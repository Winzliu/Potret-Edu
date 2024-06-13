<?php

namespace App\Livewire\Kitchen;

use Livewire\Component;
use App\Models\Order;

class KitchenOrder extends Component
{
    public $pesanans;
    public $type = 'Dine In';
    public $status = 'Menunggu';
    public $count_dinein;
    public $count_takeaway;

    protected $listeners = ['updatePesananKitchen' => 'updatePesananKitchen'];


    public function mount()
    {
        $this->pesanans = order::all();
        $this->type = 'Dine In';
        $this->status = 'Menunggu';
        $this->count_dinein = order::where('order_type', 'Dine In')->count();
        $this->count_takeaway = order::where('order_type', 'Take Away')->count();
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

        if ($this->count_dinein < order::where('order_type', 'Dine In')->count()) {
            request()->session()->flash('notif_berhasil', 'Ada Pesanan Dine In Baru Ni!!');
            $this->count_dinein = order::where('order_type', 'Dine In')->count();
            $this->dispatch('refreshPesanan');
        } elseif ($this->count_takeaway < order::where('order_type', 'Take Away')->count()) {
            request()->session()->flash('notif_berhasil', 'Ada Pesanan Take Away Baru Ni!!');
            $this->count_takeaway = order::where('order_type', 'Take Away')->count();
            $this->dispatch('refreshPesanan');
        }
        '$refresh';
        $this->pesanans = order::all();

        return view('livewire.kitchen.kitchen-order')
            ->layout('components.layouts.app', ['title' => 'Dapur | Pesanan', 'active' => 'kitchen-pesanan', 'role' => 'kitchen']);
    }

}