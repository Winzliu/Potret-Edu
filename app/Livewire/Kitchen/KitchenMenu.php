<?php

namespace App\Livewire\Kitchen;

use Livewire\Component;
use App\Models\menu;
use App\Models\menuCategory;

class KitchenMenu extends Component
{
    // public $isOn = false;
    // public $confirmingToggle = false;
    public $categories;
    public $category_id;
    public $menus;

    public $active;

    protected $listeners = ['categoryActive' => 'categoryActive'];


    public function mount(){
        $this->categories = menuCategory::all();
        $this->menus = menu::all();
        $this->category_id = '0';
        $this->active = '0';
    }

    public function categoryActive($id)
    {
        if ($id != '0') {
            $this->category_id = menuCategory::where('menu_category_id', $id)->first()->menu_category_id;
        } else {
            $this->category_id = $id;
        }
        $this->dispatch('getMenuKitchen', $this->category_id);
    }

    
    public function render()
    {
        return view('livewire.kitchen.kitchen-menu')
            ->layout('components.layouts.app', ['title' => 'Dapur | Menu', 'active' => 'kitchen-kelolaMenu', 'role' => 'kitchen']);
    }

    // public function confirmToggle()
    // {
    //     $this->confirmingToggle = true;
    // }

    // public function toggle()
    // {
    //     $this->isOn = !$this->isOn;
    //     $this->confirmingToggle = false;
    // }


}