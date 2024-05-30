<div class="xl:mt-6 mt-8 w-[95%] xl:w-full mb-10">
    <p class="font-bold text-3xl">Halaman Pembayaran</p>

    <div class="flex justify-between mt-5 xl:w-1/2 mx-auto mt-5 w-full">
        <p class="font-bold text-pink-500">{{ $pesanan->order_type }}</p>
        <p class="font-bold">Kasir: {{ $pesanan->user->userDetail->name }}</p>
    </div>

    <div class="flex flex-col gap-5 xl:w-1/2 mx-auto mt-5 w-full h-[45vh] overflow-y-scroll scrollbar-hidden">
        @php
        $total_harga = 0
        @endphp
        @foreach ($pesanan->orderDetail as $menu)
        <div class="flex justify-between items-center bg-white rounded-lg shadow-lg py-2 px-5">
            <div class="w-[60%]">
                <p class="text-sm font-bold">{{ $menu->menu->menu_name }}</p>
                <p class="text-sm"><span class="font-bold">Catatan:</span> {{ $menu->notes }}</p>
            </div>
            <div class="flex w-[40%] justify-between">
                <p class="text-sm font-semibold">Rp {{ number_format($menu->menu->menu_price, 0, ',',
                    '.')
                    }}
                </p>
                <p class="text-sm font-bold">x{{ $menu->quantity }}</p>
                <p class="text-sm font-bold">Rp {{ number_format($menu->menu->menu_price *
                    $menu->quantity,
                    0, ',', '.') }}
                </p>
            </div>
        </div>
        @php
        $total_harga += $menu->menu->menu_price * $menu->quantity
        @endphp
        @endforeach
    </div>

    <div class="flex flex-col mx-auto gap-y-2 mt-3">
        <div class="flex justify-between">
            <p class="font-semibold text-xl">Total Harga</p>
            <p class="font-semibold text-xl">Rp {{ number_format($total_harga + ($total_harga * 0.1), 0, ',', '.') }}
            </p>
        </div>
        <div class="flex justify-between">
            <p class="font-semibold text-xl">Pajak Pembayaran</p>
            <p class="font-semibold text-xl">Rp {{ number_format(($total_harga * $pajak), 0, ',', '.') }}</p>
        </div>
        <div class="flex justify-between">
            <p class="font-semibold text-xl">Total Discount</p>
            <p class="font-semibold text-xl">- Rp {{ number_format(($total_harga *
                $discount), 0, ',', '.') }}</p>
        </div>
        <div class="divider"></div>
        <div class="flex justify-between">
            <p class="font-semibold text-xl">Total Pembayaran</p>
            <p class="font-semibold text-xl">Rp {{ number_format($total_harga + ($total_harga * 0.1) - ($total_harga *
                $discount) + ($total_harga * $pajak), 0, ',', '.') }}</p>
        </div>
        <div class="flex justify-between items-center">
            <p class="font-semibold text-xl">Nominal Pembayaran</p>
            <input wire:keyup="hitungKembalian" wire:model="input_nominal" type="number"
                placeholder="Nominal Pembayaran" class="input input-bordered input-warning font-semibold text-end"
                min="0" />
        </div>
        <div class="flex justify-between">
            <p class="font-semibold text-xl">Kembalian</p>
            <p class="font-semibold text-xl">
                @if($nominal_pembayaran < ($total_harga + ($total_harga * 0.1) - ($total_harga * $discount) +
                    ($total_harga * $pajak))) Rp 0 @else Rp {{ number_format($nominal_pembayaran - ($total_harga +
                    ($total_harga * 0.1) - ($total_harga * $discount) + ($total_harga * $pajak)),0,',','.') }}</p>
                    @endif
        </div>
    </div>
    <div class="w-full  flex">
        <button onclick="StrukButton.showModal()" class=" btn btn-primary mx-auto w-1/2 mt-10" @if($nominal_pembayaran <
            ($total_harga + ($total_harga * 0.1) - ($total_harga * $discount) + ($total_harga * $pajak))) disabled
            @endif>
            Bayar
        </button>
    </div>

    {{-- button print --}}
    <dialog id="StrukButton" class="modal print">
        <div class="modal-box py-10 px-10 xl:max-w-xl max-w-2xl scrollbar-hidden">
            <form method="dialog" class="noprint">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <p class="text-center font-bold text-xl">Potret Edupark</p>
            <p class="text-center">Potret, Salam Tani, Kec. Pancur Batu, Kabupaten Deli Serdang, Sumatera Utara,
                Medan, Indonesia
                20353.</p>
            <div class="flex justify-between mt-5">
                <p class="font-bold">{{ date_format(NOW(), 'd/m/Y, H:i:s') }}</p>
                <p class="font-bold">#{{ strtoupper(substr($pesanan->order_id, 0, 8)) }}</p>
            </div>
            <div class="flex justify-between mt-5">
                <p class="font-bold text-pink-500">{{ $pesanan->order_type }}</p>
                <p class="font-bold">Kasir: {{ $pesanan->user->userDetail->name }}</p>
            </div>
            <div class="divider mt-0"></div>
            {{-- menu --}}
            <div class="flex flex-col gap-5 w-full">
                @php
                $total_harga = 0
                @endphp
                @foreach ($pesanan->orderDetail as $menu)
                <div class="flex justify-between items-center">
                    <div class="w-[60%]">
                        <p class="text-sm font-bold">{{ $menu->menu->menu_name }}</p>
                        <p class="text-sm"><span class="font-bold">Catatan:</span> {{ $menu->notes }}</p>
                    </div>
                    <div class="flex w-[40%] justify-between">
                        <p class="text-sm font-semibold">Rp {{ number_format($menu->menu->menu_price, 0, ',',
                            '.')
                            }}
                        </p>
                        <p class="text-sm font-bold">x{{ $menu->quantity }}</p>
                        <p class="text-sm font-bold">Rp {{ number_format($menu->menu->menu_price *
                            $menu->quantity,
                            0, ',', '.') }}
                        </p>
                    </div>
                </div>
                @php
                $total_harga += $menu->menu->menu_price * $menu->quantity
                @endphp
                @endforeach
            </div>
            {{-- akhir menu --}}
            <div class="divider"></div>
            {{-- bagian total harga --}}
            <div class="flex flex-col gap-4">
                <div class="flex justify-between">
                    <p class="text-sm font-bold">Subtotal</p>
                    <p class="text-sm font-bold">Rp {{ number_format($total_harga, 0, ',', '.') }}</p>
                </div>
                <div class="flex justify-between">
                    <p class="text-sm font-bold">Pajak (10%)</p>
                    <p class="text-sm font-bold">Rp {{ number_format($total_harga * 0.1, 0, ',', '.') }}</p>
                </div>
                <div class="flex justify-between">
                    <p class="text-sm font-bold">Pajak Pembayaran ({{ $pajak * 100 }}%)</p>
                    <p class="text-sm font-bold">Rp {{ number_format($total_harga * $pajak, 0, ',', '.') }}</p>
                </div>
                <div class="flex justify-between">
                    <p class="text-sm font-bold">Total Discount ({{ $discount * 100 }}%)</p>
                    <p class="text-sm font-bold">-Rp {{ number_format($total_harga * $discount, 0, ',', '.') }}</p>
                </div>
                <div class="divider"></div>
                <div class="flex justify-between">
                    <p class="text-sm font-bold">Total Harga</p>
                    <p class="text-sm font-bold">Rp {{ number_format($total_harga + ($total_harga * 0.1) - ($total_harga
                        * $discount) + ($total_harga * $pajak), 0,
                        ',', '.') }}</p>
                </div>
                <div class="flex justify-between">
                    <p class="text-sm font-bold">Nominal Pembayaran</p>
                    <p class="text-sm font-bold">
                        @if($nominal_pembayaran < ($total_harga + ($total_harga * 0.1) - ($total_harga * $discount) +
                            ($total_harga * $pajak))) Rp 0 @else Rp {{ number_format($nominal_pembayaran, 0, ',' , '.' )
                            }} @endif</p>
                </div>
                <div class="flex justify-between">
                    <p class="text-sm font-bold">Kembalian</p>
                    <p class="text-sm font-bold">@if($nominal_pembayaran < ($total_harga + ($total_harga * 0.1) -
                            ($total_harga * $discount) + ($total_harga * $pajak))) Rp 0 @else Rp {{
                            number_format($nominal_pembayaran - ($total_harga + ($total_harga * 0.1) - ($total_harga *
                            $discount) + ($total_harga * $pajak)),0,',','.') }} @endif</p>
                </div>
            </div>
            {{-- akhir bagian total harga --}}
            <div class="divider"></div>
            <div class="flex justify-center mt-7 noprint">
                <button wire:click="bayar('{{ $pesanan->order_id }}')" onclick="printStruks()"
                    class="w-32 font-bold bg-green-600 hover:bg-green-700 transition-all duration-300 rounded-lg py-3 text-white">Bayar</button>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    {{-- akhir button print --}}
    <script>
        var modal = document.getElementById('StrukButton');
        function printStruks() {
        modal.scrollTo(0,0);
        window.print();
        }
    </script>
</div>