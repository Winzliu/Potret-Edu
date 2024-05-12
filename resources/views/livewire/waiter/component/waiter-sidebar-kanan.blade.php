<div class="drawer drawer-end">
    <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content fixed end-7 bottom-1/2 ">
        <!-- Page content here -->
        <label wire:click="getCart" for="my-drawer-4" class="drawer-button rounded-full">
            <div class="fixed end-0 top-0 h-screen w-14 bg-white shadow-[0_0_65px_3px_rgba(0,0,0,0.2)]"></div>
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 192 512"
                class="text-3xl absolute -end-3 pe-4 py-4 bottom-1/2 translate-y-1/2 bg-white rounded-full" width="80px"
                height="80px" xmlns="http://www.w3.org/2000/svg">
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
                <p class="xl:text-3xl text-2xl font-bold">Detail Pesanan</p>
                <p class="xl:text-base text-sm font-semibold">Total Menu: {{ $cart_total }}</p>
            </div>
            {{-- kumpulan card --}}
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
            <div class="overflow-y-scroll h-3/5 fixed w-full left-0 top-14 px-10 py-5">
                {{-- card --}}
                @php
                $total_harga = 0;
                @endphp
                @foreach ($carts as $cart)
                <div class="card card-side px-5 py-5 bg-secondaryColor shadow-xl flex-col mb-5">
                    <div class="flex">
                        <div class="w-10/12">
                            <div class="flex">
                                <figure><img src="img/makanan.jpg" class="mask mask-squircle w-14 me-4" alt="Movie" />
                                </figure>
                                <div class="self-center w-10/12">
                                    <p class="font-semibold mb-2">{{ $cart->menu->menu_name }}</p>
                                    <div class="flex me-2 h-7 justify-between">
                                        <div class="h-5">
                                            <button wire:click="decrement('{{ $cart->cart_id }}')"
                                                class="bg-red-500 rounded-full w-7 h-7 font-bold text-lg disabled:opacity-70"
                                                @if($cart->quantity <= 1) disabled @endif>-</button>
                                            <input type="text" name="" id=""
                                                class="mx-1 w-5 h-7 text-center p-0 border-0 bg-transparent"
                                                value="{{ $cart->quantity }}" disabled>
                                            <button wire:click="increment('{{ $cart->cart_id }}')"
                                                class="bg-green-600 rounded-full w-7 h-7 font-bold text-lg">+</button>
                                        </div>
                                        <p class="self-center font-semibold text-nowrap">Rp {{
                                            number_format($cart->menu->menu_price * $cart->quantity, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <input onkeyup="saveText('{{ $cart->cart_id }}')" wire:model="n.{{ $cart->cart_id }}"
                                    type="text" placeholder="Isi Catatan Menu" name="notes[{{ $cart->cart_id }}]"
                                    id="notes{{ $cart->cart_id }}"
                                    class="input input-bordered input-primary w-full mb-0 h-8 text-sm mt-3 rounded-lg"
                                    autocomplete="off" />
                            </div>
                        </div>
                        <button onclick="deleteSaveText('{{ $cart->cart_id }}')"
                            wire:click="deleteCart('{{ $cart->cart_id }}')" class="w-1/12 h-12 self-center ms-5">
                            <svg stroke="currentColor" class="text-red-500 ps-2" fill="currentColor" stroke-width="0"
                                viewBox="0 0 448 512" height="35px" width="35px" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z">
                                </path>
                            </svg>
                        </button>
                        </ion-icon>
                    </div>
                </div>
                @php
                $total_harga += $cart->menu->menu_price * $cart->quantity;
                @endphp
                @endforeach
                {{-- akhir card --}}
            </div>
            {{-- akhir kumpulan card --}}

            {{-- Buat Pesanan --}}
            <div class="bg-base-200 border-t-2 fixed bottom-0 w-full h-1/3 left-0 px-10 py-3">
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text opacity-50">Nomor Meja</span>
                        <span class="label-text font-semibold">Total Harga: {{ number_format($total_harga, 0, ',', '.')
                            }}</span>
                    </div>
                    <input wire:keydown="input_meja" wire:model.live.debounce.300ms="input_nomor_meja" id="nomor_meja"
                        type="number" makslength="2" placeholder="Nomor Meja"
                        class="input input-bordered w-full h-8 text-xs border-black outline-black" />
                    @error('input_nomor_meja')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                    <div class="label">
                    </div>
                </label>
                <div class="flex justify-between mb-5">
                    <input wire:change="changeService" wire:model="input_service" type="radio" name="service"
                        id="DineIn" value="Dine In" class="peer/DineIn hidden">
                    <label for="DineIn"
                        class="text-center py-2 hover:bg-slate-300 rounded-lg bg-base-300 w-[48%] shadow-xl  peer-checked/DineIn:bg-mainColor">Dine
                        In</label>
                    <input wire:change="changeService" wire:model="input_service" type="radio" name="service"
                        id="TakeAway" value="Take Away" class="peer/TakeAway hidden">
                    <label for="TakeAway"
                        class="text-center py-2 hover:bg-slate-300 transition-all duration-300 rounded-lg bg-base-300 w-[48%] shadow-xl peer-checked/TakeAway:bg-mainColor">Take
                        Away</label>
                </div>
                <button wire:click="createOrder" wire:loading.attr="disabled"
                    class="py-3 rounded-lg bg-mainColor hover:bg-amber-500 w-full shadow-xl disabled:cursor-not-allowed disabled:bg-gray-300 disabled:hover:bg-gray-300"
                    @if($input_service=="Dine In" ) @if($carts->count() == 0 || $input_nomor_meja == null)
                    disabled
                    @endif
                    @elseif($carts->count() == 0) disabled
                    @endif
                    @error('input_nomor_meja') disabled @enderror
                    >Buat
                    pesanan</button>
            </div>
            {{-- Akhir buat pesanan --}}
        </div>
        {{-- akhir isi konten --}}
    </div>
    {{-- akhir sidebar kanan --}}

    {{-- loading --}}
    <dialog wire:loading wire:target="createOrder" wire:loading.attr="open" class="modal bg-black/30">
        <span
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 loading loading-spinner loading-lg"></span>
    </dialog>
    {{-- akhir loading --}}

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('refresh_notif', (event) => {
                setTimeout(() => {
                    Livewire.dispatch('refresh');
                }, 1000);
            });
        });

        
        // Fungsi untuk menyimpan teks pada localStorage
        let id_text = JSON.parse(localStorage.getItem("id_text")) ? JSON.parse(localStorage.getItem("id_text")) : [];

        function deleteSaveText(id) {
            localStorage.removeItem("savedText" + id);

            // Mendapatkan array dari local storage
            let savedArray = JSON.parse(localStorage.getItem('id_text'));

            // Mencari indeks elemen yang memiliki nilai yang sama dengan variabel id
            const indexToRemove = savedArray.indexOf(id);
            console.log(indexToRemove);

            // Hapus elemen dari array jika ditemukan
            if (indexToRemove !== -1) {
                savedArray.splice(indexToRemove, 1);
            }

            // Menyimpan kembali array yang sudah diubah ke local storage
            localStorage.setItem('id_text', JSON.stringify(savedArray));
        }

        function saveText(id) {
            // Mendapatkan id dari input teks
            if (!id_text.includes(id)){
                id_text.push(id);
            }
        // Mendapatkan nilai dari input teks
            const textValue = document.getElementById("notes" + id).value;
    
        // Menyimpan nilai pada localStorage dengan kunci "savedText"
            localStorage.setItem("savedText" + id, textValue);
            localStorage.setItem("id_text", JSON.stringify(id_text));
        }
    
        // Ketika halaman dimuat, cek apakah ada teks yang disimpan dan memuatnya ke dalam input
        window.onload = function() {
            for (let i = 0; i < id_text.length; i++) {
                console.log("savedText" + id_text[i]);
                // Mendapatkan nilai yang disimpan pada localStorage dengan kunci "savedText"
                savedText = localStorage.getItem("savedText" + id_text[i]);
            
                // Memeriksa apakah ada nilai yang disimpan
                if(savedText !== null) {
                    // Jika ada, memuat nilai tersebut ke dalam input
                    document.getElementById("notes" + id_text[i]).value = savedText;
                }
        }
    }
    </script>
</div>