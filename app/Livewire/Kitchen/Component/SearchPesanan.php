<?php

namespace App\Livewire\Kitchen\Component;

use Livewire\Component;

class SearchPesanan extends Component
{
    public $search;
    public $status;
    public $type;

    protected $listeners = ['searchPesananKitchen' => 'searchPesananKitchen'];
    
    public function searchPesananKitchen($params = null)
    {
        $this->status = isset($params[0]) ? $params[0] : $this->status;
        $this->type = isset($params[1]) ? $params[1] : $this->type;
        $this->dispatch('getPesanansKitchen', [$this->status, $this->type, $this->search]);
    }
    public function render()
    {
        return view('livewire.kitchen.component.search-pesanan');
    }
}