<div class="
@if(auth()->user()->userDetail->custom == 'kecil')
text-sm mt-20
@elseif(auth()->user()->userDetail->custom == 'normal')
text-base mt-16
@elseif(auth()->user()->userDetail->custom == 'besar')
text-lg mt-10
@endif
">
    {{-- Kembali --}}
    <a href="/cashier/riwayat" wire:navigate class="flex items-center gap-2 font-bold">
        <ion-icon name="arrow-back-outline"></ion-icon>
        <p>Kembali</p>
    </a>
    {{-- Akhir Kembali --}}

    {{-- Detail Pesanan --}}
    <div class="my-2">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-5">
                <p class="text-3xl font-bold">Detail Riwayat</p>
                <p class="py-1 px-3 rounded-lg border-2 bg-white border-pink-500 text-pink-500 font-bold">{{
                    $history->order_type }}</p>
                <p
                    class="py-1 px-3 rounded-lg border-2 bg-white @if($history->order_status == 'batal') border-pink-500 text-pink-500 @else border-green-500 text-green-500 @endif font-bold">
                    {{
                    Str::upper($history->order_status) }}</p>
            </div>

            <div class="me-16">
                <div class="flex justify-between gap-10">
                    <p class="font-bold">Kasir: </p>
                    <p class="font-bold">{{ $history->cashier_name }}</p>
                </div>
                <div class="flex justify-between gap-10">
                    <p class="font-bold">Pelayan: </p>
                    <p class="font-bold">{{ $history->waiter_name }}</p>
                </div>
            </div>
        </div>
        <div class="divider"></div>
        <div class="flex xl:flex-row flex-col-reverse gap-10">
            {{-- Bagian Kiri Detail Menu --}}
            <div class="flex flex-col gap-5 xl:w-5/12 xl:mx-0 w-11/12 mx-auto px-5 max-h-[20rem] overflow-y-scroll">
                {{-- Menu --}}
                @php
                $total_price = 0
                @endphp
                @foreach ($history->historyDetail as $menu)
                <div class="flex items-center gap-4 ">
                    <div class="flex justify-between w-full items-center">
                        <div class="">
                            <p class="font-bold
                            @if(auth()->user()->userDetail->custom == 'kecil')
                            text-xs
                            @elseif(auth()->user()->userDetail->custom == 'normal')
                            text-sm
                            @elseif(auth()->user()->userDetail->custom == 'besar')
                            text-md
                            @endif
                            ">{{ $menu->menu_name }}</p>
                            <div class="flex justify-between w-48">
                                <p class="font-bold
                                @if(auth()->user()->userDetail->custom == 'kecil')
                            text-xs
                            @elseif(auth()->user()->userDetail->custom == 'normal')
                            text-sm
                            @elseif(auth()->user()->userDetail->custom == 'besar')
                            text-md
                            @endif
                                ">Rp {{ number_format($menu->price, 0, ',', '.')
                                    }}</p>
                                <p class="font-bold
                                @if(auth()->user()->userDetail->custom == 'kecil')
                            text-xs
                            @elseif(auth()->user()->userDetail->custom == 'normal')
                            text-sm
                            @elseif(auth()->user()->userDetail->custom == 'besar')
                            text-md
                            @endif
                                pe-14">x{{ $menu->quantity }}</p>
                            </div>
                            <p class="font-bold
                            @if(auth()->user()->userDetail->custom == 'kecil')
                            text-xs
                            @elseif(auth()->user()->userDetail->custom == 'normal')
                            text-sm
                            @elseif(auth()->user()->userDetail->custom == 'besar')
                            text-md
                            @endif
                            ">Catatan: <span
                                    class="@if($menu->status == 'baru')text-green-700 @elseif($menu->status == 'tambahan') text-red-500 @endif">{{
                                    $menu->menu_notes }}</span>
                            </p>
                        </div>
                        <p class="text-nowrap font-bold 
                        @if(auth()->user()->userDetail->custom == 'kecil')
                            text-xs
                            @elseif(auth()->user()->userDetail->custom == 'normal')
                            text-sm
                            @elseif(auth()->user()->userDetail->custom == 'besar')
                            text-md
                            @endif
                        ">Rp {{ number_format($menu->price *
                            $menu->quantity, 0, ',', '.') }}</p>
                    </div>
                </div>
                @php
                $total_price += $menu->price * $menu->quantity
                @endphp
                @endforeach
                {{-- Akhir Menu --}}
            </div>
            {{-- Akhir Bagian Kiri Detail Menu --}}
            {{-- Bagian Kanan Bill --}}
            <div class="bg-secondaryColor shadow-xl rounded-lg p-5 mx-auto xl:w-5/12 w-1/2 text-center">
                <p class="font-bold
                @if(auth()->user()->userDetail->custom == 'kecil')
                text-lg
                @elseif(auth()->user()->userDetail->custom == 'normal')
                text-xl
                @elseif(auth()->user()->userDetail->custom == 'besar')
                text-2xl
                @endif
                mb-3">#{{ strtoupper(substr($history->history_id, 0, 8)) }}</p>
                <div class="flex justify-between mb-2 
                @if(auth()->user()->userDetail->custom == 'kecil')
                text-xs
                @elseif(auth()->user()->userDetail->custom == 'normal')
                text-sm
                @elseif(auth()->user()->userDetail->custom == 'besar')
                text-sm
                @endif
                ">
                    <p class="font-bold">Meja</p>
                    <p class="font-bold">{{ $history->table_number }}</p>
                </div>
                <div class="flex justify-between mb-2 
                @if(auth()->user()->userDetail->custom == 'kecil')
                text-xs
                @elseif(auth()->user()->userDetail->custom == 'normal')
                text-sm
                @elseif(auth()->user()->userDetail->custom == 'besar')
                text-sm
                @endif
                ">
                    <p class="font-bold">Tanggal</p>
                    <p class="font-bold">{{ date('d F Y, H:i', strtotime($history->payment_date)) }}</p>
                </div>
                <div class="flex justify-between mb-2 
                @if(auth()->user()->userDetail->custom == 'kecil')
                text-xs
                @elseif(auth()->user()->userDetail->custom == 'normal')
                text-sm
                @elseif(auth()->user()->userDetail->custom == 'besar')
                text-sm
                @endif
                ">
                    <p class="font-bold">Payment Method</p>
                    <p class="font-bold">{{ $history->payment_method }}</p>
                </div>
                <div class="flex justify-between mb-2 
                @if(auth()->user()->userDetail->custom == 'kecil')
                text-xs
                @elseif(auth()->user()->userDetail->custom == 'normal')
                text-sm
                @elseif(auth()->user()->userDetail->custom == 'besar')
                text-sm
                @endif
                ">
                    <p class="font-bold">Subtotal</p>
                    <p class="font-bold">Rp {{ number_format($total_price, 0, ',', '.') }}</p>
                </div>
                <div class="flex justify-between mb-2 
                @if(auth()->user()->userDetail->custom == 'kecil')
                text-xs
                @elseif(auth()->user()->userDetail->custom == 'normal')
                text-sm
                @elseif(auth()->user()->userDetail->custom == 'besar')
                text-sm
                @endif
                ">
                    <p class="font-bold">Pajak (10%)</p>
                    <p class="font-bold">Rp {{ number_format($total_price * 0.1, 0, ',', '.') }}</p>
                </div>
                <div class="flex justify-between mb-2 
                @if(auth()->user()->userDetail->custom == 'kecil')
                text-xs
                @elseif(auth()->user()->userDetail->custom == 'normal')
                text-sm
                @elseif(auth()->user()->userDetail->custom == 'besar')
                text-sm
                @endif
                ">
                    <p class="font-bold">Pajak Pembayaran ({{ $history->taxes * 100 }}%)</p>
                    <p class="font-bold">Rp {{ number_format($total_price * $history->taxes, 0, ',', '.') }}</p>
                </div>
                <div class="flex justify-between mb-2 
                @if(auth()->user()->userDetail->custom == 'kecil')
                text-xs
                @elseif(auth()->user()->userDetail->custom == 'normal')
                text-sm
                @elseif(auth()->user()->userDetail->custom == 'besar')
                text-sm
                @endif
                ">
                    <p class="font-bold">Discount ({{ $history->discount * 100 }}%)</p>
                    <p class="font-bold">Rp {{ number_format($total_price * $history->discount, 0, ',', '.') }}
                    </p>
                </div>
                <div class="divider m-1"></div>
                <div class="flex justify-between">
                    <p class="font-bold">Total Harga</p>
                    <p class="font-bold">Rp {{ number_format($total_price + ($total_price * 0.1) + ($total_price *
                        $history->taxes) - ($total_price * $history->discount), 0, ',', '.')
                        }}
                    </p>
                </div>
            </div>
            {{-- Akhir Bagian Kanan Bill --}}
        </div>
        <div class="divider"></div>
        {{-- bagian bawah --}}
        <div class="mb-10 flex gap-5 justify-end w-11/12">
            {{-- button print --}}
            @if ($history->status == 'selesai')
            <button
                class="w-24 py-2 rounded-lg bg-white hover:bg-slate-200 text-black border-2 border-black transition-all duration-300 font-bold"
                onclick="StrukButton.showModal()">Struk</button>
            @endif
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
                        <p class="font-bold">{{ date('d/m/Y, H:i:s', strtotime($history->payment_date)) }}</p>
                        <p class="font-bold">#{{ strtoupper(substr($history->history_id, 0, 8)) }}</p>
                    </div>
                    <div class="flex justify-between mt-5">
                        <p class="font-bold text-pink-500">{{ $history->order_type }}</p>
                        <p class="font-bold">Kasir: {{ $history->waiter_name }}</p>
                    </div>
                    <div class="divider mt-0"></div>
                    {{-- menu --}}
                    <div class="flex flex-col gap-5 w-full">
                        @php
                        $total_harga = 0
                        @endphp
                        @foreach ($history->historyDetail as $menu)
                        <div class="flex justify-between items-center">
                            <div class="w-[60%]">
                                <p class="text-sm font-bold">{{ $menu->menu_name }}</p>
                                <p class="text-sm"><span class="font-bold">Catatan:</span> {{ $menu->menu_notes }}</p>
                            </div>
                            <div class="flex w-[40%] justify-between">
                                <p class="text-sm font-semibold">Rp {{ number_format($menu->price, 0, ',',
                                    '.')
                                    }}
                                </p>
                                <p class="text-sm font-bold">x{{ $menu->quantity }}</p>
                                <p class="text-sm font-bold">Rp {{ number_format($menu->price *
                                    $menu->quantity,
                                    0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                        @php
                        $total_harga += $menu->price * $menu->quantity
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
                            <p class="text-sm font-bold">Pajak Pembayaran ({{ $history->taxes * 100 }}%)</p>
                            <p class="text-sm font-bold">Rp {{ number_format($total_harga * $history->taxes, 0, ',',
                                '.')
                                }}</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="text-sm font-bold">Total Discount ({{ $history->discount * 100 }}%)</p>
                            <p class="text-sm font-bold">-Rp {{ number_format($total_harga * $history->discount, 0, ',',
                                '.') }}
                            </p>
                        </div>
                        <div class="divider"></div>
                        <div class="flex justify-between">
                            <p class="text-sm font-bold">Total Harga</p>
                            <p class="text-sm font-bold">Rp {{ number_format($total_harga + ($total_harga * 0.1) -
                                ($total_harga
                                * $history->discount) + ($total_harga * $history->taxes), 0,
                                ',', '.') }}</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="text-sm font-bold">Nominal Pembayaran</p>
                            <p class="text-sm font-bold">Rp {{ number_format($history->total_payment, 0, ',', '.') }}
                            </p>
                        </div>
                        <div class="flex justify-between">
                            <p class="text-sm font-bold">Kembalian</p>
                            <p class="text-sm font-bold">Rp {{ number_format($history->total_payment - ($total_harga +
                                ($total_harga * 0.1) -
                                ($total_harga
                                * $history->discount) + ($total_harga * $history->taxes)), 0, ',', '.') }}</p>
                        </div>
                    </div>
                    {{-- akhir bagian total harga --}}
                    <div class="divider"></div>
                    <div class="flex justify-center mt-7 noprint">
                        <button onclick="printStruks()"
                            class="w-32 font-bold bg-green-600 hover:bg-green-700 transition-all duration-300 rounded-lg py-3 text-white">Cetak
                            Struk</button>
                    </div>
                </div>
                <form method="dialog" class="modal-backdrop">
                    <button>close</button>
                </form>
            </dialog>
            {{-- akhir button print --}}
        </div>
        {{-- akhir bagian bawah --}}
    </div>
    {{-- Akhir Detail Pesanan --}}

    {{-- loading --}}
    <dialog wire:loading wire:target="deleteOrder" wire:loading.attr="open" class="modal bg-black/30 z-50">
        <span
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 loading loading-spinner loading-lg"></span>
    </dialog>
    {{-- akhir loading --}}

    <script>
        var modal = document.getElementById('StrukButton');
        function printStruks() {
        modal.scrollTo(0,0);
        window.print();
        }
    </script>
</div>