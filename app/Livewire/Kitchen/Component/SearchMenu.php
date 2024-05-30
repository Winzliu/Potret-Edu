<?php

namespace App\Livewire\Kitchen\Component;

use Livewire\Component;

class SearchMenu extends Component
{

    public $search;

    public function searchMenu()
    {
        $this->dispatch('searchMenuKitchen', $this->search);
    }
    public function render()
    {
        return view('livewire.kitchen.component.search-menu');
    }
}