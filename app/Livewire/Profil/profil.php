<?php

namespace App\Livewire\Profil;

use App\Models\User;
use Livewire\Component;

class Profil extends Component
{
    public $font;

    protected $listeners = ['refresh' => '$refresh'];

    public function mount()
    {
        if (auth()->user()->userDetail->custom == 'kecil') {
            $this->font = 1;
        } else if (auth()->user()->userDetail->custom == 'normal') {
            $this->font = 2;
        } else if (auth()->user()->userDetail->custom == 'besar') {
            $this->font = 3;
        }
    }

    public function changeFont()
    {
        try {
            if ($this->font == 1) {
                auth()->user()->userDetail->update([
                    'custom' => 'kecil'
                ]);
                request()->session()->flash('notif_berhasil', "Font Berhasil Diubah");
            } else if ($this->font == 2) {
                auth()->user()->userDetail->update([
                    'custom' => 'normal'
                ]);
                request()->session()->flash('notif_berhasil', "Font Berhasil Diubah");
            } else if ($this->font == 3) {
                auth()->user()->userDetail->update([
                    'custom' => 'besar'
                ]);
                request()->session()->flash('notif_berhasil', "Font Berhasil Diubah");
            }
        } catch (\Exception $e) {
            request()->session()->flash('notif_gagal', "Font Gagal Diubah");
        }
        $this->dispatch('refresh_notif');
    }

    public function refresh()
    {
        '$refresh';
    }

    public function render()
    {
        return view('livewire.profil')
            ->layout('components.layouts.app', ['title' => auth()->user()->username . ' | Profile', 'active' => 'Profile', 'role' => auth()->user()->role]);
    }


}