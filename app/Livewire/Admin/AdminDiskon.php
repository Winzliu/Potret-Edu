<?php

namespace App\Livewire\Admin;

use App\Models\discount;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class AdminDiskon extends Component
{
    use WithPagination;
    // public $discounts;
    public $discount_id;
    public $modalHapus = false;
    public $search;
    protected $paginationTheme = 'tailwind'; // Pastikan theme pagination diatur ke tailwind
    protected $listeners = ['refresh' => 'refresh'];


    public function mount()
    {
        $this->search = '';
    }

    public function modal_hapus($discount_id)
    {
        $this->discount_id = $discount_id;
        $this->modalHapus = true;
    }

    public function hapusDiskon()
    {
        $this->modalHapus = false;

        DB::beginTransaction();
        try {
            discount::find($this->discount_id)->delete();
            request()->session()->flash('success', 'Diskon berhasil dihapus.');
            DB::commit();
            $this->modalHapus = false;
            $this->render();
        } catch (\Exception $e) {
            request()->session()->flash('error', 'Gagal menghapus Diskon!' . $e->getMessage());
            DB::rollBack();
        }
        // $this->dispatch('refresh_notif');
    }

    public function searchDiskon()
    {
        $this->resetPage();
    }

    public function render()
    {
        $discounts = discount::where('discount_name', 'like', '%' . $this->search . '%')->orderBy('discount_name', 'asc')->paginate(5);
        // dd($discounts);
        return view('livewire.admin.admin-diskon', [
            'discounts' => $discounts,
        ])
            ->layout('components.layouts.app', ['title' => 'Admin | Diskon', 'active' => 'admin-diskon', 'role' => 'admin']);
    }
}