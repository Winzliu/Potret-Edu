<?php

namespace App\Livewire\Kitchen\Component;

use App\Models\order;
use App\Models\orderDetail;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Pesanan extends Component
{
    public $pesanans;
    public $status;
    public $type;
    public $search;

    protected $listeners = ['getPesanansKitchen' => 'getPesanansKitchen'];

    public function mount()
    {
        $this->pesanans = Order::where('order_type', 'Dine In')->where('order_status', 'masak')
        ->orderBy('date', 'asc')
        ->get();
    }


    public function getPesanansKitchen($params)
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
            order::where('order_id', $id)->update(['order_status' => 'selesai']);
            request()->session()->flash('notif_berhasil', 'Pesanan Siap Disajikan!');
            $this->dispatch('getPesanansKitchen', [$this->status, $this->type, $this->search]);
            $this->dispatch('updatePesananKitchen');
            DB::commit();
            $this->refreshPesanan();
        } catch (\Exception $e) {
            request()->session()->flash('notif_gagal', 'Gagal Menyelesaikan Pesanan');
            DB::rollBack();
            $this->refreshPesanan();

        }
    }

    public function render()
    {
        return view('livewire.kitchen.component.pesanan');
    }

    public function refreshPesanan()
    {
        $this->pesanans = Order::where('order_type', 'Dine In')->where('order_status', 'masak')
        ->orderBy('date', 'asc')
        ->get();
    }
}