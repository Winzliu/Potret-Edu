<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class AdminHome extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-home')
            ->layout('components.layouts.app', ['title' => 'Admin | Beranda', 'active' => 'admin-home', 'role' => 'admin']);
    }
}   