<?php

namespace App\Livewire\Cashier\Component;

use App\Models\order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Pesanan extends Component
{
    public $pesanans;
    public $status;
    public $type;
    public $search;

    protected $listeners = ['getPesanansCashier' => 'getPesanansCashier'];

    public function mount()
    {
        $this->pesanans = Order::where('order_type', 'Dine In')->where('order_status', 'masak')->get();
    }

    public function getPesanansCashier($params)
    {
        $this->status = $params[0];
        $this->type = $params[1];
        $this->search = isset($params[2]) ? $params[2] : '';
        if ($this->status == 'Menunggu') {
            $this->pesanans = order::where('order_type', $this->type)->where('order_status', 'masak')->where('table_number', 'like', '%' . $this->search . '%')->orderBy('table_number', 'asc')->get();
        } elseif ($this->status == 'Selesai') {
            $this->pesanans = order::where('order_type', $this->type)->where('order_status', 'selesai')->where('table_number', 'like', '%' . $this->search . '%')->get();
        } else {
            $this->pesanans = order::where('order_type', $this->type)->where('order_status', 'saji')->where('table_number', 'like', '%' . $this->search . '%')->get();
        }
    }

    public function saji($id)
    {
        DB::beginTransaction();
        try {
            order::where('order_id', $id)->update(['order_status' => 'saji']);
            request()->session()->flash('notif_berhasil', 'Status Berubah Disajikan');
            $this->dispatch('getPesanansCashier', [$this->status, $this->type, $this->search]);
            $this->dispatch('updatePesananCashier');
            DB::commit();
        } catch (\Exception $e) {
            request()->session()->flash('notif_gagal', 'Status Gagal Berubah Disajikan');
            DB::rollBack();
        }
    }

    public function render()
    {
        return view('livewire.cashier.component.pesanan');
    }
}
