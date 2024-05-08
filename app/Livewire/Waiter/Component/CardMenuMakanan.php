<?php

namespace App\Livewire\Waiter\Component;

use App\Models\menu;
use App\Models\menuCategory;
use Livewire\Component;

class CardMenuMakanan extends Component
{
    public $categoryId;

    public $menus;

    public $search;

    protected $listeners = ['getMenu' => 'getMenu', 'searchMenu' => 'searchMenu'];

    public function mount()
    {
        $this->menus = menu::all();
    }

    public function getMenu($categoryId)
    {
        $this->categoryId = $categoryId;

        if ($this->search) {
            if ($this->categoryId != '0') {
                $this->menus = menu::where('menu_category_id', $this->categoryId)->where('menu_name', 'like', '%' . $this->search . '%')->get();
            } else {
                $this->menus = menu::where('menu_name', 'like', '%' . $this->search . '%')->get();
            }
        } else {
            if ($this->categoryId != '0') {
                $this->menus = menu::where('menu_category_id', $this->categoryId)->get();
            } else {
                $this->menus = menu::all();
            }
        }
    }

    public function searchMenu($search)
    {
        $this->search = $search;

        if ($this->categoryId != '0') {
            $this->menus = menu::where('menu_name', 'like', '%' . $search . '%')->where('menu_category_id', $this->categoryId)->get();
        } else {
            $this->menus = menu::where('menu_name', 'like', '%' . $search . '%')->get();
        }
    }

    public function render()
    {
        return view('livewire.waiter.component.card-menu-makanan');
    }
}
