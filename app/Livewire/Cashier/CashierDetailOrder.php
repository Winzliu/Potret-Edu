<?php

namespace App\Livewire\Cashier;

use App\Models\discount;
use App\Models\history;
use App\Models\historyDetail;
use App\Models\order;
use App\Models\paymentMethod;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;

class CashierDetailOrder extends Component
{
    public $pesanan;
    public $payments;
    public $discounts;
    public $input_discount;
    public $discount_pembayaran;
    public $taxes_pembayaran;

    public function mount($pesanan)
    {
        $this->pesanan = order::where('order_id', $pesanan)->first();
        $this->payments = paymentMethod::all();
        $this->discounts = discount::all();
        $this->discount_pembayaran = 0;
        $this->taxes_pembayaran = 0;
    }

    public function deleteOrder($id)
    {
        sleep(1);
        DB::beginTransaction();

        $history_id = Str::uuid();

        try {
            history::create([
                'history_id'   => $history_id,
                'cashier_name' => auth()->user()->userDetail->name,
                'waiter_name'  => $this->pesanan->user->userDetail->name,
                'table_number' => $this->pesanan->table_number,
                'order_type'   => $this->pesanan->order_type,
                'order_status' => 'batal',
                'payment_date' => NOW(),
            ]);

            foreach ($this->pesanan->orderDetail as $orderDetail) {
                historyDetail::create([
                    'history_detail_id' => Str::uuid(),
                    'history_id'        => $history_id,
                    'menu_name'         => $orderDetail->menu->menu_name,
                    'menu_notes'        => $orderDetail->notes,
                    'quantity'          => $orderDetail->quantity,
                    'price'             => $orderDetail->menu->menu_price,
                ]);
            }

            Order::where('order_id', $id)->delete();
            request()->session()->flash('notif_berhasil', 'Pesanan Berhasil Dibatalkan');
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            request()->session()->flash('notif_berbayar', 'Pesanan Gagal Dibatalkan');
            dd($th);
        }

        return redirect('/cashier/pesanan');
    }

    public function render()
    {
        return view('livewire.cashier.cashier-detail-order')
            ->layout('components.layouts.app', ['title' => 'Cashier | Detail Pesanan', 'active' => 'cashier-pesanan', 'role' => 'cashier']);
        ;
    }
}
