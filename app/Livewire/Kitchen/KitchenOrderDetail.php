<?php

namespace App\Livewire\Kitchen;

use Livewire\Component;
use App\Models\order;
use App\Models\orderDetail;
use Illuminate\Support\Facades\DB;


class KitchenOrderDetail extends Component
{
    // public $showSelesaiButton = false;
    // public $showKosongButton = false;
    // public $buttonClicked = false;
    // public $isOn = false;
    // public $emptyMenu = false;
    public $pesanan;
    public $orderDetails;
    public $flashMessage = null;


    public function mount($pesanan)
    {
        $this->pesanan = order::where('order_id', $pesanan)->orderBy('date', 'asc')->first();
        $this->orderDetails = orderDetail::where('order_id', $pesanan)->orderBy('menu_date', 'asc')->get();
    }


    public function render()
    {
        return view('livewire.kitchen.kitchen-order-detail')
            ->layout('components.layouts.app', ['title' => 'Dapur | Detail Pesanan', 'active' => 'kitchen-pesanan', 'role' => 'kitchen']);
    }

    public function switchKosong($id)
    {
        DB::beginTransaction();
        try {
            orderDetail::where('order_detail_id', $id)->update(['menu_status' => 'kosong']);
            request()->session()->flash('kosong_berhasil', 'Mengubah Pesanan Menjadi Kosong!');
            DB::commit();
            $this->refreshPesanan();
        } catch (\Exception $e) {
            request()->session()->flash('kosong_gagal', 'Gagal mengubah status!');
            DB::rollBack();
        }
    }
    public function switchSelesai($id)
    {
        DB::beginTransaction();
        try {
            orderDetail::where('order_detail_id', $id)->update(['menu_status' => 'selesai']);
            request()->session()->flash('selesai_berhasil', 'Berhasil Menyelesaikan Pesanan!');
            DB::commit();
            $this->refreshPesanan();
        } catch (\Exception $e) {
            request()->session()->flash('selesai_gagal', 'Gagal mengubah status!');
            DB::rollBack();
        }
    }

    public function refreshPesanan()
    {
        // Memuat ulang orderDetails dan mengurutkannya berdasarkan menu_date
        $this->orderDetails = OrderDetail::where('order_id', $this->pesanan->order_id)
                                         ->orderBy('menu_date', 'asc')
                                         ->get();
    }

}