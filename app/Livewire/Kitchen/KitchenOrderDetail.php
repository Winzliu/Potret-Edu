<?php

namespace App\Livewire\Kitchen;

use Livewire\Component;
use App\Models\order;
use App\Models\orderDetail;
use Illuminate\Support\Facades\DB;


class KitchenOrderDetail extends Component
{

    public $modalKosong = false;
    public $modalSelesai = false;
    public $pesanan;
    public $orderDetails;
    public $flashMessage = null;

    public $order_detail_id;

    protected $listeners = ['refresh' => 'refresh'];

    public function modal_kosong($order_detail_id)
    {
        $this->order_detail_id = $order_detail_id;
        $this->modalKosong = true;  
    }
    public function modal_selesai($order_detail_id)
    {
        $this->order_detail_id = $order_detail_id;
        $this->modalSelesai = true;  
    }

    
    public function refresh()
    {
        '$refresh';
    }

    
    public function mount($pesanan)
    {
        $this->pesanan = order::where('order_id', $pesanan)->first();
        $this->orderDetails = orderDetail::where('order_id', $pesanan)->orderByRaw("CASE 
        WHEN menu_status = 'masak' THEN 1 
        WHEN menu_status = 'kosong' THEN 2 
        WHEN menu_status = 'selesai' THEN 3 
        ELSE 4 END")->get();
        // dd($this->orderDetails);

    }


    public function render()
    {
        return view('livewire.kitchen.kitchen-order-detail')
            ->layout('components.layouts.app', ['title' => 'Dapur | Detail Pesanan', 'active' => 'kitchen-pesanan', 'role' => 'kitchen']);
    }

    public function switchKosong()
    {
        DB::beginTransaction();
        try {
            orderDetail::where('order_detail_id', $this->order_detail_id)->update(['menu_status' => 'kosong']);
            request()->session()->flash('kosong_berhasil', 'Mengubah Pesanan Menjadi Kosong!');
            DB::commit();
            $this->modalKosong = false;
            $this->refreshPesanan();
        } catch (\Exception $e) {
            request()->session()->flash('kosong_gagal', 'Gagal mengubah status!');
            DB::rollBack();
        }
        // $this->dispatch('refresh_notif');
    }
    public function switchSelesai()
    {
        DB::beginTransaction();
        try {
            orderDetail::where('order_detail_id', $this->order_detail_id)->update(['menu_status' => 'selesai']);
            request()->session()->flash('selesai_berhasil', 'Berhasil Menyelesaikan Pesanan!');
            DB::commit();
            $this->modalSelesai = false;
            $this->refreshPesanan();
        } catch (\Exception $e) {
            request()->session()->flash('selesai_gagal', 'Gagal mengubah status!');
            DB::rollBack();
        }
        // $this->dispatch('refresh_notif');
    }

    public function refreshPesanan()
    {
        // Memuat ulang orderDetails dan mengurutkannya berdasarkan menu_date
        $this->orderDetails = OrderDetail::where('order_id', $this->pesanan->order_id)
                                         ->orderByRaw("CASE 
                                         WHEN menu_status = 'masak' THEN 1 
                                         WHEN menu_status = 'kosong' THEN 2 
                                         WHEN menu_status = 'selesai' THEN 3 
                                         ELSE 4 END")->get();
        // dd($this->orderDetails);
    }

}