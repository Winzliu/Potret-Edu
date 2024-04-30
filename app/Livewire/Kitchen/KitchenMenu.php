<?php

namespace App\Livewire\Kitchen;

use Livewire\Component;

class KitchenMenu extends Component
{
    public $isOn = false;
    public $confirmingToggle = false;

    public function render()
    {
        return view('livewire.kitchen.kitchen-menu')
            ->layout('components.layouts.app', ['title' => 'Dapur | Menu', 'active'=>'kelolaMenu', 'role' => 'kitchen' ]);
    }

    public function confirmToggle()
    {
        $this->confirmingToggle = true;

    }

    public function toggle()
    {
        $this->isOn = !$this->isOn;
        $this->confirmingToggle = false;

    }


}