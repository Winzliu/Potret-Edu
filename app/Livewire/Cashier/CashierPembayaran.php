<?php

namespace App\Livewire\Cashier;

use App\Models\discount;
use App\Models\history;
use App\Models\historyDetail;
use App\Models\order;
use App\Models\orderDetail;
use App\Models\paymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CashierPembayaran extends Component
{
    public $pesanan;
    public $payment_method;
    public $discount;
    public $pajak;
    public $nominal_pembayaran;
    public $input_nominal;

    public function mount($pesanan, Request $request)
    {
        $this->payment_method = paymentMethod::where('payment_method_id', $request->payment)->first()->method;
        $this->discount = $request->discount ? discount::where('discount_id', $request->discount)->first()->discount_rate : 0;
        $this->pajak = paymentMethod::where('payment_method_id', $request->payment)->first()->taxes;
        $this->pesanan = order::where('order_id', $pesanan)->first();
    }

    public function hitungKembalian()
    {
        $this->nominal_pembayaran = $this->input_nominal;
        '$refresh';
    }

    public function bayar($id)
    {
        DB::beginTransaction();

        $history_id = $id;

        try {
            history::create([
                'history_id'     => $history_id,
                'cashier_name'   => auth()->user()->userDetail->name,
                'waiter_name'    => $this->pesanan->user->userDetail->name,
                'table_number'   => $this->pesanan->table_number,
                'order_type'     => $this->pesanan->order_type,
                'order_status'   => 'selesai',
                'payment_method' => $this->payment_method,
                'payment_date'   => NOW(),
                'total_payment'  => $this->nominal_pembayaran,
                'discount'       => $this->discount,
                'taxes'          => $this->pajak,
            ]);

            foreach ($this->pesanan->orderDetail as $order) {
                historyDetail::create([
                    'history_detail_id' => str()->uuid(),
                    'history_id'        => $history_id,
                    'menu_name'         => $order->menu->menu_name,
                    'menu_notes'        => $order->notes,
                    'quantity'          => $order->quantity,
                    'price'             => $order->menu->menu_price,
                ]);
            }

            orderDetail::where('order_id', $this->pesanan->order_id)->delete();

            order::where('order_id', $this->pesanan->order_id)->delete();

            DB::commit();
            request()->session()->flash('notif_berhasil', 'Pesanan Berhasil Dibayar');
        } catch (\Exception $e) {
            DB::rollBack();
            request()->session()->flash('notif_gagal', 'Pesanan Gagal Dibayar');
        }

        return redirect('/cashier/pesanan');
    }

    public function render()
    {
        return view('livewire.cashier.cashier-pembayaran')
            ->layout('components.layouts.app', ['title' => 'Cashier | Detail Pesanan', 'active' => 'cashier-pesanan', 'role' => 'cashier']);
    }
}
