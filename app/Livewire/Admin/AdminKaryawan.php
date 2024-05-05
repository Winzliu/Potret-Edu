<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class AdminKaryawan extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-karyawan')
            ->layout('components.layouts.app', ['title' => 'Admin | Karyawan', 'active' => 'admin-karyawan', 'role' => 'admin']);
    }
}
