<?php

namespace App\Livewire\Cashier\Component;

use Livewire\Component;

class SearchPesanan extends Component
{
    public $search;
    public $status;
    public $type;

    protected $listeners = ['searchPesananCashier' => 'searchPesananCashier'];

    public function searchPesananCashier($params = null)
    {
        $this->status = isset($params[0]) ? $params[0] : $this->status;
        $this->type = isset($params[1]) ? $params[1] : $this->type;
        $this->dispatch('getPesanansCashier', [$this->status, $this->type, $this->search]);
    }

    public function render()
    {
        return view('livewire.cashier.component.search-pesanan');
    }
}
