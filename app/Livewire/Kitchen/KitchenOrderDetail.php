<?php

namespace App\Livewire\Kitchen;

use Livewire\Component;

class KitchenOrderDetail extends Component
{
    public $showSelesaiButton = false;
    public $showKosongButton = false;
    public $buttonClicked = false;

    
    public function render()
    {
        return view('livewire.kitchen.kitchen-order-detail')
            ->layout('components.layouts.app', ['title' => 'Dapur | Pesanan', 'active'=>'masakan', 'role' => 'kitchen']);
    }

    public function toggleSelesaiButton()
    {
        $this->showSelesaiButton = !$this->showSelesaiButton;
        $this->showKosongButton = false;
        $this->buttonClicked = true;

    }

    public function toggleKosongButton()
    {
        $this->showKosongButton = !$this->showKosongButton;
        $this->showSelesaiButton = false;
        $this->buttonClicked = true;

    }


}