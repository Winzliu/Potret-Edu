<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class AdminMenu extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-menu')
            ->layout('components.layouts.app', ['title' => 'Admin | Beranda', 'active' => 'admin-menu', 'role' => 'admin']);
    }
}