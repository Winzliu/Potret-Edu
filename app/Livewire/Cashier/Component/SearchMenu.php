<?php

namespace App\Livewire\Cashier\Component;

use Livewire\Component;

class SearchMenu extends Component
{
    public $search;

    public function searchMenu()
    {
        $this->dispatch('searchMenuCashier', $this->search);
    }

    public function render()
    {
        return view('livewire.cashier.component.search-menu');
    }
}
