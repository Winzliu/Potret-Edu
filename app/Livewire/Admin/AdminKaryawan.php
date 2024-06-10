<?php

namespace App\Livewire\Admin;

use App\Models\user;
use App\Models\order;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class AdminKaryawan extends Component
{

    use WithPagination;
    protected $paginationTheme = 'tailwind'; // Pastikan theme pagination diatur ke tailwind

    public $modalHapus = false;
    public $karyawan_id;
    public $search;

    protected $listeners = ['refresh' => 'refresh'];

    public function mount()
    {
        $this->employees = user::orderBy('created_at', 'desc')->get();
        $this->search = '';
    }
    public function modal_hapus($karyawan_id)
    {
        $this->karyawan_id = $karyawan_id;
        $this->modalHapus = true;
    }

    public function hapusKaryawan()
    {
        $cek_user = order::where('user_id', $this->karyawan_id)->count();
        $this->modalHapus = false;

        if ($cek_user == 0) {
            DB::beginTransaction();
            try {
                user::find($this->karyawan_id)->delete();
                request()->session()->flash('success', 'Karyawan berhasil dihapus.');
                DB::commit();
                $this->modalHapus = false;
                $this->render();
            } catch (\Exception $e) {
                request()->session()->flash('error', 'Gagal menghapus Karyawan!' . $e->getMessage());
                DB::rollBack();
            }
            $this->dispatch('refresh_notif');
        } else if ($cek_user > 0) {
            request()->session()->flash('error', 'Karyawan ini masih menangani pesanan!');
        }
    }

    public function searchKaryawan()
    {
        $this->resetPage();
    }

    public function render()
    {
        if ($this->search == '') {
            $employees = User::where('role', 'cashier')
                ->orWhere('role', 'waiter')
                ->orWhere('role', 'kitchen')
                ->orderByRaw("CASE 
        WHEN role = 'cashier' THEN 1 
        WHEN role = 'waiter' THEN 2 
        WHEN role = 'selesai' THEN 3 
        ELSE 4 END")->paginate(7);
        } else {
            $employees = User::whereHas('userDetail', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
                ->orWhere(function ($query) {
                    $query->where('role', 'like', '%' . $this->search . '%')
                        ->where('role', '<>', 'admin');
                })
                ->where('role', '<>', 'admin')
                ->paginate(7);
        }
        // dd($employees);
        return view('livewire.admin.admin-karyawan', [
            'employees' => $employees,
        ])
            ->layout('components.layouts.app', ['title' => 'Admin | Karyawan', 'active' => 'admin-karyawan', 'role' => 'admin']);
    }
}