<?php

namespace App\Livewire\Cashier\Component;

use App\Models\menuCategory;
use Livewire\Component;

class KategoriMakanan extends Component
{
    public $categories;
    public $active;

    public function categoryActive($id)
    {
        $this->active = $id;
        $this->category = menuCategory::find($id);
        $this->dispatch('categoryActive', $id);
    }

    public function render()
    {
        return view('livewire.cashier.component.kategori-makanan');
    }
}
