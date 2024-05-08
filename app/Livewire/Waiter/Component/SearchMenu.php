<?php

namespace App\Livewire\Waiter\Component;

use Livewire\Component;

class SearchMenu extends Component
{
    public $search;

    public function searchMenu()
    {
        $this->dispatch('searchMenu', $this->search);
    }

    public function render()
    {
        return view('livewire.waiter.component.search-menu');
    }
}
