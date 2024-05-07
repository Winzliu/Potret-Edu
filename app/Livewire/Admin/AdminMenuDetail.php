<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class AdminMenuDetail extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-menu-detail')
            ->layout('components.layouts.app', ['title' => 'Admin | Beranda', 'active' => 'admin-home', 'role' => 'admin']);
    }
}