<?php

namespace App\Livewire\Kitchen\Component;

use Livewire\Component;
use App\Models\menuCategory;


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
        return view('livewire.kitchen.component.kategori-makanan');
    }
}