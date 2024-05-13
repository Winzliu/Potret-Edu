<?php

namespace App\Livewire\Waiter\Component;

use Livewire\Component;

class SearchPesanan extends Component
{
    public $search;
    public $status;
    public $type;

    protected $listeners = ['searchPesanan' => 'searchPesanan'];

    public function searchPesanan($params = null)
    {
        $this->status = isset($params[0]) ? $params[0] : $this->status;
        $this->type = isset($params[1]) ? $params[1] : $this->type;
        $this->dispatch('getPesanans', [$this->status, $this->type, $this->search]);
    }
    public function render()
    {
        return view('livewire.waiter.component.search-pesanan');
    }
}
