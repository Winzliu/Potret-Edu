<div class="drawer drawer-end
@if(auth()->user()->userDetail->custom == 'kecil')
text-sm
@elseif(auth()->user()->userDetail->custom == 'normal')
text-base
@elseif(auth()->user()->userDetail->custom == 'besar')
text-lg
@endif
">
    <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content fixed end-7 bottom-1/2 ">
        <!-- Page content here -->
        <label for="my-drawer-4" class="drawer-button rounded-full">
            <div class="fixed end-0 top-0 h-screen w-14 bg-white shadow-[0_0_65px_3px_rgba(0,0,0,0.2)]"></div>
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 192 512" class="
                @if(auth()->user()->userDetail->custom == 'kecil')
                text-2xl
                @elseif(auth()->user()->userDetail->custom == 'normal')
                text-3xl
                @elseif(auth()->user()->userDetail->custom == 'besar')
                text-4xl
                @endif
                absolute -end-3 pe-4 py-4 bottom-1/2 translate-y-1/2 bg-white rounded-full" width="80px" height="80px"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M192 127.338v257.324c0 17.818-21.543 26.741-34.142 14.142L29.196 270.142c-7.81-7.81-7.81-20.474 0-28.284l128.662-128.662c12.599-12.6 34.142-3.676 34.142 14.142z">
                </path>
            </svg>
        </label>
    </div>

    <div class="drawer-side">
        <label for="my-drawer-4" aria-label="close sidebar" class="drawer-overlay"></label>
        {{-- isi konten --}}
        <div class="menu px-10 py-5 xl:w-5/12 w-1/2 min-h-full bg-base-200 text-base-content ">
            <div class="flex justify-between items-center mb-5 pe-5">
                <p class="
                @if(auth()->user()->userDetail->custom == 'kecil')
                xl:text-2xl text-xl
                @elseif(auth()->user()->userDetail->custom == 'normal')
                xl:text-3xl text-2xl
                @elseif(auth()->user()->userDetail->custom == 'besar')
                xl:text-4xl text-3xl
                @endif
                font-bold">Detail Pesanan</p>
                <p class="
                @if(auth()->user()->userDetail->custom == 'kecil')
                xl:text-sm text-xs
                @elseif(auth()->user()->userDetail->custom == 'normal')
                xl:text-base text-sm
                @elseif(auth()->user()->userDetail->custom == 'besar')
                xl:text-lg text-base
                @endif
                font-semibold">Total Menu: {{ $pesanan_total }}</p>
            </div>
            {{-- notif --}}
            @if (session()->has('notif_gagal'))
            <div role="alert"
                class="alert alert-error rounded-lg absolute z-50 top-10 w-auto left-1/2 -translate-x-1/2 opacity-0 animate-notif unselectable">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('notif_gagal') }}</span>
            </div>
            @elseif (session()->has('notif_berhasil'))
            <div role="alert"
                class="alert alert-success rounded-lg absolute z-50 top-10 w-auto left-1/2 -translate-x-1/2 opacity-0 animate-notif unselectable">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('notif_berhasil') }}</span>
            </div>
            @endif
            {{-- akhir notif --}}
            @php
            $total_harga = 0;
            @endphp
            @if ($pesanan->orderDetail->count() > 0 || !empty($pesananBaru))
            {{-- kumpulan card --}}
            <div class="overflow-y-scroll h-3/5 fixed w-full left-0 top-14 px-10 py-5">
                {{-- card --}}
                @foreach ($pesanan->orderDetail as $cart)
                <div class="card card-side px-5 py-5 bg-secondaryColor shadow-xl flex-col mb-5">
                    <div class="flex">
                        <div class="w-full @if ($cart->menu_status == 'kosong') w-10/12 @endif">
                            <div class="flex">
                                <figure><img src="{{ asset('storage/menu-images/' . $cart->menu->menu_image) }}"
                                        class="mask mask-squircle w-14 h-14 object-cover me-4" alt="Movie" />
                                </figure>
                                <div class="self-center w-10/12">
                                    <p class="font-semibold
                                    @if(auth()->user()->userDetail->custom == 'kecil')
                                    text-sm
                                    @elseif(auth()->user()->userDetail->custom == 'normal')
                                    text-base
                                    @elseif(auth()->user()->userDetail->custom == 'besar')
                                    text-lg
                                    @endif
                                    mb-2">{{ $cart->menu->menu_name }}</p>
                                    <div class="flex me-2 h-7 justify-between">
                                        <div class="h-5">
                                            <div class="tooltip" data-tip="Kurang">
                                                <button wire:click="decrement('{{ $cart->order_detail_id }}')" class="bg-red-500 rounded-full w-7 h-7 font-bold 
                                                    @if(auth()->user()->userDetail->custom == 'kecil')
                                                    text-base
                                                    @elseif(auth()->user()->userDetail->custom == 'normal')
                                                    text-lg
                                                    @elseif(auth()->user()->userDetail->custom == 'besar')
                                                    text-xl
                                                    @endif
                                                    disabled:opacity-70" @if($quantity[$cart->order_detail_id] <= 1)
                                                        disabled @endif>-</button>
                                            </div>
                                            <input wire:model="quantity.{{ $cart->order_detail_id }}" type="text"
                                                name="" id=""
                                                class="mx-1 w-5 h-7 text-center p-0 border-0 bg-transparent" disabled>
                                            <div class="tooltip" data-tip="Tambah">
                                                <button wire:click="increment('{{ $cart->order_detail_id }}')" class="bg-green-600 rounded-full w-7 h-7 font-bold 
                                                        @if(auth()->user()->userDetail->custom == 'kecil')
                                                        text-base
                                                        @elseif(auth()->user()->userDetail->custom == 'normal')
                                                        text-lg
                                                        @elseif(auth()->user()->userDetail->custom == 'besar')
                                                        text-xl
                                                        @endif
                                                        ">+</button>
                                            </div>
                                        </div>
                                        <p class="self-center font-semibold text-nowrap">Rp {{
                                            number_format($cart->menu->menu_price * $quantity[$cart->order_detail_id],
                                            0, ',', '.') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <input wire:model="notes.{{ $cart->order_detail_id }}" type="text"
                                    placeholder="Isi Catatan Menu" name="notes[{{ $cart->order_detail_id }}]"
                                    id="notes{{ $cart->order_detail_id }}" class="input input-bordered input-primary w-full mb-0 h-8 
                                    @if(auth()->user()->userDetail->custom == 'kecil')
                                    text-xs
                                    @elseif(auth()->user()->userDetail->custom == 'normal')
                                    text-sm
                                    @elseif(auth()->user()->userDetail->custom == 'besar')
                                    text-md
                                    @endif
                                    mt-3 rounded-lg" autocomplete="off" />
                            </div>
                        </div>
                        @if ($cart->menu_status == 'kosong')
                        <button wire:click="deletePopup('{{ $cart->order_detail_id }}')"
                            class="w-1/12 h-12 self-center ms-5 tooltip" data-tip="Hapus">
                            <svg stroke="currentColor" class="text-red-500 ps-2" fill="currentColor" stroke-width="0"
                                viewBox="0 0 448 512" height="35px" width="35px" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z">
                                </path>
                            </svg>
                        </button>
                        @if ($showDialog && $popUp_id == $cart->order_detail_id)
                        <dialog open class="modal mx-auto top-0 h-40 w-10/12 bg-none shadow-none">
                            <div class="modal-box">
                                <form method="dialog">
                                    <button wire:click="closePopup"
                                        class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                </form>
                                <h3 class="font-bold text-center
                            @if(auth()->user()->userDetail->custom == 'kecil')
                            text-md
                            @elseif(auth()->user()->userDetail->custom == 'normal')
                            text-lg
                            @elseif(auth()->user()->userDetail->custom == 'besar')
                            text-xl
                            @endif
                            ">Yakin Ingin Menghapus Menu?</h3>
                                <div class="flex justify-evenly mt-2">
                                    <button wire:click="deleteOrder('{{ $cart->order_detail_id }}')" class="w-24 font-bold py-3 bg-red-500 hover:bg-red-600 transition-all duration-300 rounded-lg
                                    @if(auth()->user()->userDetail->custom == 'kecil')
                                    text-sm
                                    @elseif(auth()->user()->userDetail->custom == 'normal')
                                    text-base
                                    @elseif(auth()->user()->userDetail->custom == 'besar')
                                    text-lg
                                    @endif
                                    text-white">Ya</button>
                                </div>
                            </div>
                        </dialog>
                        @endif
                        @endif
                    </div>
                </div>
                @php
                $total_harga += $cart->menu->menu_price * $quantity[$cart->order_detail_id];
                @endphp
                @endforeach
                {{-- akhir card --}}
                {{-- card tambahan --}}
                @if (!empty($pesananBaru) && count($pesananBaru) > 0)
                @foreach ($pesananBaru as $pBaru)
                <div class="card card-side px-5 py-5 bg-secondaryColor shadow-xl flex-col mb-5">
                    <div class="flex">
                        <div class="w-10/12">
                            <div class="flex">
                                <figure><img src="{{ asset('storage/menu-images/' . $pBaru['menu_image']) }}"
                                        class="mask mask-squircle w-14 h-14 object-cover me-4" alt="Movie" />
                                </figure>
                                <div class="self-center w-10/12">
                                    <p class="font-semibold
                                    @if(auth()->user()->userDetail->custom == 'kecil')
                                    text-sm
                                    @elseif(auth()->user()->userDetail->custom == 'normal')
                                    text-base
                                    @elseif(auth()->user()->userDetail->custom == 'besar')
                                    text-lg
                                    @endif
                                    mb-2">{{ $pBaru['menu_name'] }}</p>
                                    <div class="flex me-2 h-7 justify-between">
                                        <div class="h-5">
                                            <div class="tooltip" data-tip="Kurang">
                                                <button wire:click="decrement('{{ $pBaru['order_detail_id'] }}')" class="bg-red-500 rounded-full w-7 h-7 font-bold
                                                    @if(auth()->user()->userDetail->custom == 'kecil')
                                                    text-md
                                                    @elseif(auth()->user()->userDetail->custom == 'normal')
                                                    text-lg
                                                    @elseif(auth()->user()->userDetail->custom == 'besar')
                                                    text-xl
                                                    @endif
                                                    disabled:opacity-70" @if($quantity[$pBaru['order_detail_id']] <=1)
                                                    disabled @endif>-</button>
                                            </div>
                                            <input wire:model="quantity.{{ $pBaru['order_detail_id'] }}" type="text"
                                                name="" id=""
                                                class="mx-1 w-5 h-7 text-center p-0 border-0 bg-transparent" disabled>
                                            <div class="tooltip" data-tip='Tambah'>
                                                <button wire:click="increment('{{ $pBaru['order_detail_id'] }}')" class="bg-green-600 rounded-full w-7 h-7 font-bold 
                                                        @if(auth()->user()->userDetail->custom == 'kecil')
                                                        text-md
                                                        @elseif(auth()->user()->userDetail->custom == 'normal')
                                                        text-lg
                                                        @elseif(auth()->user()->userDetail->custom == 'besar')
                                                        text-xl
                                                        @endif
                                                        ">+</button>
                                            </div>
                                        </div>
                                        <p class="self-center font-semibold text-nowrap
                                        @if(auth()->user()->userDetail->custom == 'kecil')
                                        text-md
                                        @elseif(auth()->user()->userDetail->custom == 'normal')
                                        text-base
                                        @elseif(auth()->user()->userDetail->custom == 'besar')
                                        text-lg
                                        @endif
                                        ">Rp {{
                                            number_format($pBaru['menu_price'] * $quantity[$pBaru['order_detail_id']],
                                            0, ',', '.') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <input wire:model="notes.{{ $pBaru['order_detail_id'] }}" type="text"
                                    placeholder="Isi Catatan Menu" name="notes[{{ $pBaru['order_detail_id'] }}]"
                                    id="notes{{ $pBaru['order_detail_id'] }}" class="input input-bordered input-primary w-full mb-0 h-8 
                                    @if(auth()->user()->userDetail->custom == 'kecil')
                                    text-xs
                                    @elseif(auth()->user()->userDetail->custom == 'normal')
                                    text-sm
                                    @elseif(auth()->user()->userDetail->custom == 'besar')
                                    text-base
                                    @endif
                                    mt-3 rounded-lg" autocomplete="off" />
                            </div>
                        </div>
                        <button wire:click="deletePopup('{{ $pBaru['order_detail_id'] }}')"
                            class="w-1/12 h-12 self-center ms-5 tooltip" data-tip='Hapus'>
                            <svg stroke="currentColor" class="text-red-500 ps-2" fill="currentColor" stroke-width="0"
                                viewBox="0 0 448 512" height="35px" width="35px" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z">
                                </path>
                            </svg>
                        </button>
                        @if ($showDialog && $popUp_id == $pBaru['order_detail_id'])
                        <dialog open class="modal mx-auto top-0 h-40 w-10/12 bg-none shadow-none">
                            <div class="modal-box">
                                <form method="dialog">
                                    <button wire:click="closePopup"
                                        class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                </form>
                                <h3 class="font-bold text-center
                                @if(auth()->user()->userDetail->custom == 'kecil')
                                text-md
                                @elseif(auth()->user()->userDetail->custom == 'normal')
                                text-lg
                                @elseif(auth()->user()->userDetail->custom == 'besar')
                                text-xl
                                @endif
                                ">Yakin Ingin Menghapus Menu?</h3>
                                <div class="flex justify-evenly mt-2">
                                    <button wire:click="deletePesanan('{{ $pBaru['order_detail_id'] }}')" class="w-24 font-bold py-3 bg-red-500 hover:bg-red-600 transition-all duration-300 rounded-lg
                                        @if(auth()->user()->userDetail->custom == 'kecil')
                                        text-sm
                                        @elseif(auth()->user()->userDetail->custom == 'normal')
                                        text-base
                                        @elseif(auth()->user()->userDetail->custom == 'besar')
                                        text-lg
                                        @endif
                                        text-white">Ya</button>
                                </div>
                            </div>
                        </dialog>
                        @endif
                    </div>
                </div>
                @php
                $total_harga += $pBaru['menu_price'] * $quantity[$pBaru['order_detail_id']];
                @endphp
                @endforeach
                @endif
                {{-- akhir card tambahan --}}
            </div>
            @else
            <p class="text-center font-bold 
            @if(auth()->user()->userDetail->custom == 'kecil')
            text-lg
            @elseif(auth()->user()->userDetail->custom == 'normal')
            text-xl
            @elseif(auth()->user()->userDetail->custom == 'besar')
            text-2xl
            @endif
            mt-10">Belum Ada Pesanan</p>
            @endif
            {{-- akhir kumpulan card --}}

            {{-- Buat Pesanan --}}
            <div class="bg-base-200 border-t-2 fixed bottom-0 w-full h-1/3 left-0 px-10 py-3
                @if(auth()->user()->userDetail->custom == 'kecil')
                text-sm
                @elseif(auth()->user()->userDetail->custom == 'normal')
                text-base
                @elseif(auth()->user()->userDetail->custom == 'besar')
                text-lg
                @endif
            ">
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text opacity-50">Nomor Meja</span>
                        <span class="label-text font-semibold">Total Harga: {{ number_format($total_harga, 0, ',', '.')
                            }}</span>
                    </div>
                    <input wire:keydown="input_meja" wire:model.live.debounce.300ms="input_nomor_meja" id="nomor_meja"
                        type="number" makslength="2" placeholder="Nomor Meja" class="input input-bordered w-full h-8 
                        @if(auth()->user()->userDetail->custom == 'kecil')
                        text-xs
                        @elseif(auth()->user()->userDetail->custom == 'normal')
                        text-xs
                        @elseif(auth()->user()->userDetail->custom == 'besar')
                        text-sm
                        @endif
                        border-black outline-black" />
                    @error('input_nomor_meja')
                    <p class="
                    @if(auth()->user()->userDetail->custom == 'kecil')
                    text-xs
                    @elseif(auth()->user()->userDetail->custom == 'normal')
                    text-xs
                    @elseif(auth()->user()->userDetail->custom == 'besar')
                    text-sm
                    @endif
                    text-red-500">{{ $message }}</p>
                    @enderror
                    <div class="label">
                    </div>
                </label>
                <div class="flex justify-between mb-5">
                    <label for="DineIn" class="text-center py-2 rounded-lg bg-base-300 w-[48%] shadow-xl cursor-not-allowed 
                        @if ($input_service == 'Dine In') bg-mainColor @endif">Dine
                        In</label>
                    <label for="TakeAway"
                        class="text-center py-2 transition-all duration-300 rounded-lg bg-base-300 w-[48%] shadow-xl cursor-not-allowed @if ($input_service == 'Take Away') bg-mainColor @endif">Take
                        Away</label>
                </div>
                <button wire:click="editPesanan('{{ $pesanan->order_id }}')" wire:loading.attr="disabled"
                    class="py-3 rounded-lg bg-mainColor hover:bg-amber-500 w-full shadow-xl disabled:cursor-not-allowed disabled:bg-gray-300 disabled:hover:bg-gray-300"
                    @if($input_service=="Dine In" ) @if($pesanan->orderDetail->count() == 0 || $input_nomor_meja ==
                    null)
                    disabled
                    @endif
                    @elseif($pesanan->count() == 0) disabled
                    @endif
                    @error('input_nomor_meja') disabled @enderror
                    >Edit Pesanan</button>
            </div>
            {{-- Akhir buat pesanan --}}
        </div>
        {{-- akhir isi konten --}}
    </div>

    {{-- akhir sidebar kanan --}}

    {{-- loading --}}
    <dialog wire:loading wire:target="editPesanan('{{ $pesanan->order_id }}')" wire:loading.attr="open"
        class="modal bg-black/30">
        <span
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 loading loading-spinner loading-lg"></span>
    </dialog>
    {{-- akhir loading --}}

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('refresh_notif_edit', (event) => {
                setTimeout(() => {
                    Livewire.dispatch('refresh_edit');
                }, 750);
            });
        });
    </script>
</div>