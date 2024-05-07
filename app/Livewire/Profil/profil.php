<?php

namespace App\Livewire\Profil;

use Livewire\Component;

class Profil extends Component
{
    public function render()
    {
        return view('livewire.profil')
            ->layout('components.layouts.app', ['title' => 'Cashier | Detail Pesanan', 'active' => 'cashier-pesanan', 'role' => 'cashier']);
    }


}