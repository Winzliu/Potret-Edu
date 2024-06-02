<?php

namespace App\Livewire\Cashier\Component;

use App\Models\menu;
use App\Models\order;
use App\Models\orderDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EditSidebarKanan extends Component
{
    public $showDialog = false;
    public $pesananBaru;
    public $pesanan;
    public $pesanan_total;
    public $pesanan_id;
    public $input_service;
    #[Rule('numeric|max:99')]
    public $input_nomor_meja;
    public $nomor_meja;
    public $popUp_id;
    public $notes = [];
    public $quantity = [];

    protected $messages = [
        'input_nomor_meja.required' => 'Nomor Meja Tidak Boleh Kosong',
        'input_nomor_meja.max'      => 'Nomor Meja Tidak Boleh Lebih dari 2 Angka',
    ];

    protected $listeners = ['refresh_edit' => 'refresh_edit', 'buatPesananCashier' => 'buatPesananCashier'];

    public function mount()
    {
        $this->pesananBaru = [];
        $this->pesanan = order::where('order_id', $this->pesanan_id)->first();
        $this->pesanan_total = $this->pesanan->orderDetail->count();
        $this->input_service = $this->pesanan->order_type;
        foreach ($this->pesanan->orderDetail as $orderDetail) {
            $this->notes[$orderDetail->order_detail_id] = $orderDetail->notes;
            $this->quantity[$orderDetail->order_detail_id] = $orderDetail->quantity;
        }
        $this->input_nomor_meja = $this->pesanan->table_number;
    }

    public function refresh_edit()
    {
        '$refresh';
    }

    function isMenuIdExist($pesananBaru, $menuId)
    {
        foreach ($pesananBaru as $pesanan) {
            if ($pesanan['menu_id'] === $menuId) {
                return true;
            }
        }
        return false;
    }

    public function buatPesananCashier($id)
    {
        if (!$this->isMenuIdExist($this->pesananBaru, $id)) {
            $uuid = Str::uuid()->__toString();
            $this->pesananBaru[] = [
                'order_detail_id' => $uuid,
                'order_id'        => $this->pesanan_id,
                'menu_id'         => $id,
                'quantity'        => 1,
                'notes'           => '',
                'status'          => 'tambahan',
                'menu_status'     => 'masak',
                'menu_price'      => menu::where('menu_id', $id)->first()->menu_price,
                'menu_name'       => menu::where('menu_id', $id)->first()->menu_name,
                'menu_image'      => menu::where('menu_id', $id)->first()->menu_image
            ];
            $this->notes[$uuid] = '';
            $this->quantity[$uuid] = 1;
            $this->pesanan_total += 1;
        }
        sleep(1);
    }

    public function getPesananCashier()
    {
        $this->pesanan = order::where('order_id', $this->pesanan_id)->first();
        $this->pesanan_total = $this->pesanan->orderDetail->count();
        $this->input_service = $this->pesanan->order_type;
        $this->input_nomor_meja = $this->pesanan->table_number;
        '$refresh';
    }

    public function deletePesanan($id)
    {
        try {
            $this->pesananBaru = array_filter($this->pesananBaru, function ($value) use ($id) {
                return $value['order_detail_id'] != $id;
            });
            $this->showDialog = false;
            request()->session()->flash('notif_berhasil', 'Menu Berhasil Dihapus');
        } catch (\Exception $e) {
            $this->showDialog = false;
            request()->session()->flash('notif_gagal', 'Menu Gagal Dihapus');
        }
        $this->pesanan_total -= 1;
        $this->dispatch('refresh_notif');
    }

    public function deleteOrder($id)
    {
        DB::beginTransaction();
        try {
            orderDetail::where('order_detail_id', $id)->delete();
            DB::commit();
            request()->session()->flash('notif_berhasil', 'Pesanan Berhasil Dihapus');
        } catch (\Exception $e) {
            DB::rollback();
            request()->session()->flash('notif_gagal', 'Pesanan Gagal Dihapus');
        }
        $this->dispatch('refresh_notif');
    }

    public function deletePopup($id)
    {
        $this->showDialog = true;
        $this->popUp_id = $id;
    }

    public function closePopup()
    {
        $this->showDialog = false;
    }

    public function increment($order_detail_id)
    {
        $this->quantity[$order_detail_id] += 1;
        $this->dispatch('getPesananCashier');
    }

    public function decrement($order_detail_id)
    {
        if ($this->quantity[$order_detail_id] > 1) {
            $this->quantity[$order_detail_id] -= 1;
        }
        $this->dispatch('getPesananCashier');
    }

    public function input_meja()
    {
        $this->nomor_meja = $this->input_nomor_meja;
    }

    public function editPesanan($id)
    {
        sleep(2);

        if (
            $this->input_nomor_meja != null && $this->input_service == "Dine In" && order::where('table_number', $this->input_nomor_meja)->where('order_type', 'Dine In')
                ->where('order_id', '!=', $this->pesanan->order_id)->exists()
        ) {
            request()->session()->flash('notif_gagal', 'Nomor Meja Sudah Ada');
            $this->dispatch('refresh_notif_edit');
            return;
        }

        DB::beginTransaction();

        try {
            order::where('order_id', $this->pesanan->order_id)->update([
                'table_number' => $this->input_nomor_meja ? $this->input_nomor_meja : '',
                'order_status' => 'masak',
            ]);

            foreach ($this->pesanan->orderDetail as $cart) {
                orderDetail::where('order_detail_id', $cart->order_detail_id)->update([
                    'status' => 'baru',
                ]);

                if ($cart->notes != $this->notes[$cart->order_detail_id] || $this->quantity[$cart->order_detail_id] != $cart->quantity) {
                    orderDetail::where('order_detail_id', $cart->order_detail_id)->update([
                        'status'      => 'tambahan',
                        'menu_status' => 'masak',
                    ]);
                }

                orderDetail::where('order_detail_id', $cart->order_detail_id)->update([
                    'quantity' => $this->quantity[$cart->order_detail_id],
                ]);

                if (isset($this->notes[$cart->order_detail_id])) {
                    orderDetail::where('order_detail_id', $cart->order_detail_id)->update([
                        'notes' => $this->notes[$cart->order_detail_id],
                    ]);
                }
            }

            foreach ($this->pesananBaru as $pesanan) {
                orderDetail::create([
                    'order_detail_id' => $pesanan['order_detail_id'],
                    'menu_date'       => NOW(),
                    'order_id'        => $pesanan['order_id'],
                    'menu_id'         => $pesanan['menu_id'],
                    'quantity'        => $this->quantity[$pesanan['order_detail_id']],
                    'status'          => 'tambahan',
                    'menu_status'     => 'masak'
                ]);

                if (isset($this->notes[$pesanan['order_detail_id']])) {
                    orderDetail::where('order_detail_id', $pesanan['order_detail_id'])->update([
                        'notes' => $this->notes[$pesanan['order_detail_id']]
                    ]);
                }
            }

            request()->session()->flash('notif_berhasil', 'Pesanan Berhasil Dibuat');
            DB::commit();
        } catch (\Exception $e) {
            request()->session()->flash('notif_gagal', 'Pesanan Gagal Dibuat');
            // DB::rollBack();
            throw $e;
        }

        $this->dispatch('refresh_notif_edit');
        return redirect('/cashier/pesanan');
    }

    public function render()
    {
        return view('livewire.cashier.component.edit-sidebar-kanan');
    }
}
