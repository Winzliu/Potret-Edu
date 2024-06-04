<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class AdminMenuEdit extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-menu-edit')
            ->layout('components.layouts.app', ['title' => 'Admin | Beranda', 'active' => 'admin-menu', 'role' => 'admin']);
    }
}