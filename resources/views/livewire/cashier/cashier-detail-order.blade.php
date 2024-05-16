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
    <a href="/cashier/pesanan" wire:navigate class="flex items-center gap-2 font-bold">
        <ion-icon name="arrow-back-outline"></ion-icon>
        <p>Kembali</p>
    </a>
    {{-- Akhir Kembali --}}

    {{-- Detail Pesanan --}}
    <div class="my-2">
        <div class="flex items-center gap-5">
            <p class="text-3xl font-bold">Detail Pesanan</p>
            <p class="py-1 px-3 rounded-lg border-2 bg-white border-pink-500 text-pink-500 font-bold">{{
                $pesanan->order_type }}</p>
        </div>
        <div class="divider"></div>
        <div class="flex xl:flex-row flex-col-reverse gap-10">
            {{-- Bagian Kiri Detail Menu --}}
            <div class="flex flex-col gap-5 xl:w-1/2 xl:mx-0 w-11/12 mx-auto px-5 max-h-[20rem] overflow-y-scroll">
                {{-- Menu --}}
                @php
                $total_price = 0
                @endphp
                @foreach ($pesanan->orderDetail as $menu)
                <div class="flex items-center gap-4 ">
                    @if($menu->menu_status == 'selesai')
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="25px"
                        class="
                        @if(auth()->user()->userDetail->custom == 'kecil')
                        text-4xl
                        @elseif(auth()->user()->userDetail->custom == 'normal')
                        text-5xl
                        @elseif(auth()->user()->userDetail->custom == 'besar')
                        text-6xl
                        @endif
                        text-green-600" width="25px" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                        </path>
                    </svg>
                    @elseif($menu->menu_status == 'kosong')
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 352 512" height="25px"
                        class="
                        @if(auth()->user()->userDetail->custom == 'kecil')
                        text-4xl
                        @elseif(auth()->user()->userDetail->custom == 'normal')
                        text-5xl
                        @elseif(auth()->user()->userDetail->custom == 'besar')
                        text-6xl
                        @endif
                        text-red-500" width="25px" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z">
                        </path>
                    </svg>
                    @else
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="25px"
                        class="
                        @if(auth()->user()->userDetail->custom == 'kecil')
                        text-4xl
                        @elseif(auth()->user()->userDetail->custom == 'normal')
                        text-5xl
                        @elseif(auth()->user()->userDetail->custom == 'besar')
                        text-6xl
                        @endif
                        text-yellow-500" width="25px" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M414.9 161.5C340.2 29 121.1 0 121.1 0S222.2 110.4 93 197.7C11.3 252.8-21 324.4 14 402.6c26.8 59.9 83.5 84.3 144.6 93.4-29.2-55.1-6.6-122.4-4.1-129.6 57.1 86.4 165 0 110.8-93.9 71 15.4 81.6 138.6 27.1 215.5 80.5-25.3 134.1-88.9 148.8-145.6 15.5-59.3 3.7-127.9-26.3-180.9z">
                        </path>
                    </svg>
                    @endif
                    <img class="mask mask-squircle w-14" src="{{ asset('img/' . $menu->menu->menu_image) }}" />
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
                            ">{{ $menu->menu->menu_name }}</p>
                            <div class="flex justify-between w-48">
                                <p class="font-bold
                                @if(auth()->user()->userDetail->custom == 'kecil')
                            text-xs
                            @elseif(auth()->user()->userDetail->custom == 'normal')
                            text-sm
                            @elseif(auth()->user()->userDetail->custom == 'besar')
                            text-md
                            @endif
                                ">Rp {{ number_format($menu->menu->menu_price, 0, ',', '.')
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
                                    $menu->notes }}</span>
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
                        ">Rp {{ number_format($menu->menu->menu_price *
                            $menu->quantity, 0, ',', '.') }}</p>
                    </div>
                </div>
                @php
                $total_price += $menu->menu->menu_price * $menu->quantity
                @endphp
                @endforeach
                {{-- Akhir Menu --}}
            </div>
            {{-- Akhir Bagian Kiri Detail Menu --}}
            {{-- Bagian Kanan Bill --}}
            <div class="bg-secondaryColor shadow-xl rounded-lg p-5 mx-auto xl:w-1/3 w-1/2 text-center">
                <p class="font-bold
                @if(auth()->user()->userDetail->custom == 'kecil')
                text-lg
                @elseif(auth()->user()->userDetail->custom == 'normal')
                text-xl
                @elseif(auth()->user()->userDetail->custom == 'besar')
                text-2xl
                @endif
                mb-3">#{{ strtoupper(substr($pesanan->order_id, 0, 8)) }}</p>
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
                    <p class="font-bold">{{ $pesanan->table_number }}</p>
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
                    <p class="font-bold">{{ date('d F Y, H:i', strtotime($pesanan->date)) }}</p>
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
                    <p class="font-bold">Jumlah</p>
                    <p class="font-bold">{{ $pesanan->orderDetail->sum('quantity') }} ({{
                        $pesanan->orderDetail->count() }} item)</p>
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
                <div class="divider m-1"></div>
                <div class="flex justify-between">
                    <p class="font-bold">Total Harga</p>
                    <p class="font-bold">Rp {{ number_format($total_price + ($total_price * 0.1), 0, ',', '.')
                        }}
                    </p>
                </div>
                <div class="divider m-1"></div>
                <div class="flex justify-between">
                    <p class="font-bold">Pelayan</p>
                    <p class="font-bold">{{ $pesanan->user->username }}</p>
                </div>
            </div>
            {{-- Akhir Bagian Kanan Bill --}}
        </div>
        <div class="divider"></div>
        {{-- bagian bawah --}}
        <div class="mb-10 flex gap-5 justify-end w-11/12">
            {{-- button print --}}
            <button
                class="w-24 py-2 rounded-lg bg-white hover:bg-slate-200 text-black border-2 border-black transition-all duration-300 font-bold"
                onclick="StrukButton.showModal()">Struk</button>
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
                        <p class="font-bold text-pink-500">Take Away</p>
                        <p class="font-bold">Kasir: Lee Haechan</p>
                    </div>
                    <div class="divider mt-0"></div>
                    {{-- menu --}}
                    <div class="flex flex-col gap-5">
                        <div class="flex justify-evenly items-center">
                            <div class="">
                                <p class="text-sm font-bold">Nasi Goreng Telur Putih</p>
                                <p class="text-sm">Catatan: Tidak Pedas, Berkuah</p>
                            </div>
                            <p class="text-sm font-bold">Rp 20.000</p>
                            <p class="text-sm font-bold">x3</p>
                            <p class="text-sm font-bold">Rp 60.000</p>
                        </div>
                        <div class="flex justify-evenly items-center">
                            <div class="">
                                <p class="text-sm font-bold">Nasi Goreng Telur Putih</p>
                                <p class="text-sm">Catatan: Tidak Pedas, Berkuah</p>
                            </div>
                            <p class="text-sm font-bold">Rp 20.000</p>
                            <p class="text-sm font-bold">x3</p>
                            <p class="text-sm font-bold">Rp 60.000</p>
                        </div>
                        <div class="flex justify-evenly items-center">
                            <div class="">
                                <p class="text-sm font-bold">Nasi Goreng Telur Putih</p>
                                <p class="text-sm">Catatan: Tidak Pedas, Berkuah</p>
                            </div>
                            <p class="text-sm font-bold">Rp 20.000</p>
                            <p class="text-sm font-bold">x3</p>
                            <p class="text-sm font-bold">Rp 60.000</p>
                        </div>
                        <div class="flex justify-evenly items-center">
                            <div class="">
                                <p class="text-sm font-bold">Nasi Goreng Telur Putih</p>
                                <p class="text-sm">Catatan: Tidak Pedas, Berkuah</p>
                            </div>
                            <p class="text-sm font-bold">Rp 20.000</p>
                            <p class="text-sm font-bold">x3</p>
                            <p class="text-sm font-bold">Rp 60.000</p>
                        </div>
                        <div class="flex justify-evenly items-center">
                            <div class="">
                                <p class="text-sm font-bold">Nasi Goreng Telur Putih</p>
                                <p class="text-sm">Catatan: Tidak Pedas, Berkuah</p>
                            </div>
                            <p class="text-sm font-bold">Rp 20.000</p>
                            <p class="text-sm font-bold">x3</p>
                            <p class="text-sm font-bold">Rp 60.000</p>
                        </div>
                        <div class="flex justify-evenly items-center">
                            <div class="">
                                <p class="text-sm font-bold">Nasi Goreng Telur Putih</p>
                                <p class="text-sm">Catatan: Tidak Pedas, Berkuah</p>
                            </div>
                            <p class="text-sm font-bold">Rp 20.000</p>
                            <p class="text-sm font-bold">x3</p>
                            <p class="text-sm font-bold">Rp 60.000</p>
                        </div>
                        <div class="flex justify-evenly items-center">
                            <div class="">
                                <p class="text-sm font-bold">Nasi Goreng Telur Putih</p>
                                <p class="text-sm">Catatan: Tidak Pedas, Berkuah</p>
                            </div>
                            <p class="text-sm font-bold">Rp 20.000</p>
                            <p class="text-sm font-bold">x3</p>
                            <p class="text-sm font-bold">Rp 60.000</p>
                        </div>
                        <div class="flex justify-evenly items-center">
                            <div class="">
                                <p class="text-sm font-bold">Nasi Goreng Telur Putih</p>
                                <p class="text-sm">Catatan: Tidak Pedas, Berkuah</p>
                            </div>
                            <p class="text-sm font-bold">Rp 20.000</p>
                            <p class="text-sm font-bold">x3</p>
                            <p class="text-sm font-bold">Rp 60.000</p>
                        </div>
                        <div class="flex justify-evenly items-center">
                            <div class="">
                                <p class="text-sm font-bold">Nasi Goreng Telur Putih</p>
                                <p class="text-sm">Catatan: Tidak Pedas, Berkuah</p>
                            </div>
                            <p class="text-sm font-bold">Rp 20.000</p>
                            <p class="text-sm font-bold">x3</p>
                            <p class="text-sm font-bold">Rp 60.000</p>
                        </div>
                        <div class="flex justify-evenly items-center">
                            <div class="">
                                <p class="text-sm font-bold">Nasi Goreng Telur Putih</p>
                                <p class="text-sm">Catatan: Tidak Pedas, Berkuah</p>
                            </div>
                            <p class="text-sm font-bold">Rp 20.000</p>
                            <p class="text-sm font-bold">x3</p>
                            <p class="text-sm font-bold">Rp 60.000</p>
                        </div>
                        <div class="flex justify-evenly items-center">
                            <div class="">
                                <p class="text-sm font-bold">Nasi Goreng Telur Putih</p>
                                <p class="text-sm">Catatan: Tidak Pedas, Berkuah</p>
                            </div>
                            <p class="text-sm font-bold">Rp 20.000</p>
                            <p class="text-sm font-bold">x3</p>
                            <p class="text-sm font-bold">Rp 60.000</p>
                        </div>
                        <div class="flex justify-evenly items-center">
                            <div class="">
                                <p class="text-sm font-bold">Nasi Goreng Telur Putih</p>
                                <p class="text-sm">Catatan: Tidak Pedas, Berkuah</p>
                            </div>
                            <p class="text-sm font-bold">Rp 20.000</p>
                            <p class="text-sm font-bold">x3</p>
                            <p class="text-sm font-bold">Rp 60.000</p>
                        </div>
                        <div class="flex justify-evenly items-center">
                            <div class="">
                                <p class="text-sm font-bold">Nasi Goreng Telur Putih</p>
                                <p class="text-sm">Catatan: Tidak Pedas, Berkuah</p>
                            </div>
                            <p class="text-sm font-bold">Rp 20.000</p>
                            <p class="text-sm font-bold">x3</p>
                            <p class="text-sm font-bold">Rp 60.000</p>
                        </div>
                        <div class="flex justify-evenly items-center">
                            <div class="">
                                <p class="text-sm font-bold">Nasi Goreng Telur Putih</p>
                                <p class="text-sm">Catatan: Tidak Pedas, Berkuah</p>
                            </div>
                            <p class="text-sm font-bold">Rp 20.000</p>
                            <p class="text-sm font-bold">x3</p>
                            <p class="text-sm font-bold">Rp 60.000</p>
                        </div>
                        <div class="flex justify-evenly items-center">
                            <div class="">
                                <p class="text-sm font-bold">Nasi Goreng Telur Putih</p>
                                <p class="text-sm">Catatan: Tidak Pedas, Berkuah</p>
                            </div>
                            <p class="text-sm font-bold">Rp 20.000</p>
                            <p class="text-sm font-bold">x3</p>
                            <p class="text-sm font-bold">Rp 60.000</p>
                        </div>
                    </div>
                    {{-- akhir menu --}}
                    <div class="divider"></div>
                    {{-- bagian total harga --}}
                    <div class="flex flex-col gap-4">
                        <div class="flex justify-between">
                            <p class="text-sm font-bold">Subtotal</p>
                            <p class="text-sm font-bold">Rp 360.000</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="text-sm font-bold">Pajak (10%)</p>
                            <p class="text-sm font-bold">Rp 36.000</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="text-sm font-bold">Total Harga</p>
                            <p class="text-sm font-bold">Rp 396.000</p>
                        </div>
                    </div>
                    {{-- akhir bagian total harga --}}
                    <div class="divider"></div>
                    {{-- bagian pembayaran --}}
                    <div class="flex flex-col gap-4">
                        <div class="flex justify-between">
                            <p class="text-sm font-bold">Nominal Pembayaran</p>
                            <p class="text-sm font-bold">Rp 400.000</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="text-sm font-bold">Kembalian</p>
                            <p class="text-sm font-bold">Rp 4.000</p>
                        </div>
                    </div>
                    {{-- akhir bagian pembayaran --}}
                    <div class="flex justify-center mt-7 noprint">
                        <button onclick="printStruk()"
                            class="w-32 font-bold bg-green-600 hover:bg-green-700 transition-all duration-300 rounded-lg py-3 text-white">Cetak
                            Resi</button>
                    </div>
                </div>
                <form method="dialog" class="modal-backdrop">
                    <button>close</button>
                </form>
            </dialog>
            {{-- akhir button print --}}
            {{-- button edit --}}
            <button
                class="w-24 py-2 rounded-lg bg-white hover:bg-slate-200 text-mainColor border-2 border-mainColor transition-all duration-300 font-bold"
                onclick="EditButton.showModal()">Edit</button>
            <dialog id="EditButton" class="modal">
                <div class="modal-box py-10 border-[4px] border-mainColor">
                    <p class="text-center font-bold
                    @if(auth()->user()->userDetail->custom == 'kecil')
                    text-lg
                    @elseif(auth()->user()->userDetail->custom == 'normal')
                    text-xl
                    @elseif(auth()->user()->userDetail->custom == 'besar')
                    text-2xl
                    @endif
                    ">Apakah Anda Ingin Mengedit Pesanan?</p>
                    <div class="flex justify-evenly mt-10">
                        <form method="dialog">
                            <button
                                class="w-24 font-bold bg-red-500 hover:bg-red-600 transition-all duration-300 rounded-lg py-3 text-white">Tidak</button>
                        </form>
                        <a href="/cashier/pesanan/edit/{{ $pesanan->order_id }}" wire:navigate
                            class="text-center w-24 font-bold bg-green-600 hover:bg-green-700 transition-all duration-300 rounded-lg py-3 text-white">Ya</a>
                    </div>
                </div>
                <form method="dialog" class="modal-backdrop">
                    <button>close</button>
                </form>
            </dialog>
            {{-- akhir button edit --}}
            {{-- button batal --}}
            <button
                class="w-24 py-2 rounded-lg bg-white hover:bg-slate-200 text-red-500 transition-all duration-300 border-2 border-red-500 font-bold"
                onclick="BatalButton.showModal()">Batal</button>
            <dialog id="BatalButton" class="modal">
                <div class="modal-box py-10 border-[4px] border-red-500">
                    <p class="text-center font-bold text-xl">Apakah Anda Ingin Menghapus Pesanan?</p>
                    <div class="flex justify-evenly mt-10">
                        <form method="dialog">
                            <button
                                class="w-24 font-bold bg-red-500 hover:bg-red-600 transition-all duration-300 rounded-lg py-3 text-white">Tidak</button>
                        </form>
                        <button
                            class="w-24 font-bold bg-green-600 hover:bg-green-700 transition-all duration-300 rounded-lg py-3 text-white">Ya</button>
                    </div>
                </div>
                <form method="dialog" class="modal-backdrop">
                    <button>close</button>
                </form>
            </dialog>
            {{-- akhir button batal --}}
            {{-- button bayar --}}
            <button
                class="w-24 py-2 rounded-lg bg-white hover:bg-slate-200 text-green-600 border-2 border-green-600 transition-all duration-300 font-bold"
                onclick="BayarButton.showModal()">Bayar</button>
            <dialog id="BayarButton" class="modal">
                <div class="modal-box py-10 border-[4px] border-green-600 max-w-3xl">
                    <div class="flex w-full px-5 justify-between bg-green-600 absolute top-0 left-0 py-3">
                        <p class="font-semibold text-lg text-white">Total Pembayaran</p>
                        <p class="font-semibold text-lg text-white">Rp 400.000</p>
                    </div>
                    <p class="text-center font-bold text-xl my-6">Pilih Metode Pembayaran</p>
                    <div class="flex flex-wrap gap-y-5">
                        <div class="flex gap-3 items-center w-1/4 justify-center">
                            <input type="radio" id="radio-6" name="radio-6" class="radio radio-warning" />
                            <label for="radio-6" class="font-bold text-xl">BCA</label>
                        </div>
                        <div class="flex gap-3 items-center w-1/4 justify-center">
                            <input type="radio" id="radio-7" name="radio-6" class="radio radio-warning" />
                            <label for="radio-7" class="font-bold text-xl">Mandiri</label>
                        </div>
                        <div class="flex gap-3 items-center w-1/4 justify-center">
                            <input type="radio" id="radio-8" name="radio-6" class="radio radio-warning" />
                            <label for="radio-8" class="font-bold text-xl">BRI</label>
                        </div>
                        <div class="flex gap-3 items-center w-1/4 justify-center">
                            <input type="radio" id="radio-9" name="radio-6" class="radio radio-warning" checked />
                            <label for="radio-9" class="font-bold text-xl">QRIS</label>
                        </div>
                        <div class="flex gap-3 items-center w-1/4 justify-center">
                            <input type="radio" id="radio-1" name="radio-6" class="radio radio-warning" />
                            <label for="radio-1" class="font-bold text-xl">Cash</label>
                        </div>
                    </div>
                    <div class="flex justify-evenly mt-10">
                        <button
                            class="w-24 font-bold bg-green-600 hover:bg-green-700 transition-all duration-300 rounded-lg py-3 text-white"
                            onclick="KonfirmasiBayar.showModal()">Bayar</button>
                    </div>
                </div>
                <form method="dialog" class="modal-backdrop">
                    <button>close</button>
                </form>
            </dialog>
            {{-- modal konfirmasi bayar --}}
            <dialog id="KonfirmasiBayar" class="modal">
                <div class="modal-box py-10 border-[4px] border-green-600 max-w-3xl">
                    <div class="flex w-full px-5 justify-between bg-green-600 absolute top-0 left-0 py-3">
                        <p class="font-semibold text-lg text-white">Metode Pembayaran</p>
                        <p class="font-semibold text-lg text-white">Cash</p>
                    </div>
                    <p class="text-center font-bold text-xl my-6">Pilih Metode Pembayaran</p>
                    <div class="flex flex-col w-4/5 mx-auto gap-y-5">
                        <div class="flex justify-between">
                            <p class="font-semibold text-xl">Total Pembayaran</p>
                            <p class="font-semibold text-xl">Rp 400.000</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="font-semibold text-xl">Nominal Pembayaran</p>
                            <input type="number" placeholder="Nominal Pembayaran"
                                class="input input-bordered input-warning text-sm w-32 font-semibold h-8 text-end" />
                        </div>
                        <div class="flex justify-between">
                            <p class="font-semibold text-xl">Kembalian</p>
                            <p class="font-semibold text-xl">Rp 0</p>
                        </div>
                    </div>
                    <div class="flex justify-evenly mt-10">
                        <button
                            class="w-24 font-bold bg-green-600 hover:bg-green-700 transition-all duration-300 rounded-lg py-3 text-white"
                            onclick="KonfirmasiBayar.showModal()">Bayar</button>
                    </div>
                </div>
                <form method="dialog" class="modal-backdrop">
                    <button>close</button>
                </form>
            </dialog>
            {{-- akhir modal konfirmasi bayar --}}
            {{-- akhir button bayar --}}
        </div>
        {{-- akhir bagian bawah --}}
    </div>
    {{-- Akhir Detail Pesanan --}}
</div>