<div class="flex flex-wrap gap-4 justify-start overflow-y-scroll h-[75vh] scrollbar-hidden">
    {{-- notif --}}
    @if (session()->has('notif_gagal'))
    <div role="alert"
        class="text-white font-medium alert alert-error rounded-lg absolute top-10 w-auto left-1/2 -translate-x-1/2 opacity-0 animate-notif unselectable">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('notif_gagal') }}</span>
    </div>
    @elseif (session()->has('notif_berhasil'))
    <div role="alert"
        class="text-white font-medium alert alert-success rounded-lg absolute top-10 w-auto left-1/2 -translate-x-1/2 opacity-0 animate-notif unselectable">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('notif_berhasil') }}</span>
    </div>
    @endif
    {{-- akhir notif --}}
    @php
    $i = 1;
    @endphp
    @foreach ($menus as $menu)
    {{-- card 1 --}}
    <div
        class="card min-w-1/4 w-[15.5rem] h-[17rem] px-4 py-4 bg-base-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl">
        <figure class="mb-3 cursor-pointer" onclick="my_modal_{{ $i }}.showModal()">
            <img src="{{ asset('img/makanan.jpg') }}" alt="Shoes"
                class="rounded-xl h-36 w-full object-cover @if($menu->menu_state == 'tidak_aktif') filter grayscale @endif"
                onclick="my_modal_{{ $i }}.showModal()" />
        </figure>
        <div class="items-center text-left">
            <h2 class="
            @if(auth()->user()->userDetail->custom == 'kecil')
            text-base
            @elseif(auth()->user()->userDetail->custom == 'normal')
            text-lg
            @elseif(auth()->user()->userDetail->custom == 'besar')
            text-xl
            @endif
            font-bold">{{ $menu->menu_name }}</h2>
            <div class="flex items-end justify-between mt-2">
                <div class="">
                    <p class="
                    @if(auth()->user()->userDetail->custom == 'kecil')
                    text-xs
                    @elseif(auth()->user()->userDetail->custom == 'normal')
                    text-xs
                    @elseif(auth()->user()->userDetail->custom == 'besar')
                    text-sm
                    @endif
                    w-32">{{ Str::limit($menu->menu_description, 15) }}</p>
                    <p class="font-semibold">Rp. {{ number_format($menu->menu_price,0, ',', '.') }}</p>
                </div>
                <button @if($pesanan_id) wire:click="addToPesanan('{{ $menu->menu_id }}')" @else
                    wire:click="addToCart('{{ $menu->menu_id }}')" @endif class="bg-mainColor w-10 h-10 rounded-full font-bold
                    @if(auth()->user()->userDetail->custom == 'kecil')
                    text-xl
                    @elseif(auth()->user()->userDetail->custom == 'normal')
                    text-2xl
                    @elseif(auth()->user()->userDetail->custom == 'besar')
                    text-3xl
                    @endif
                    @if($menu->menu_state == 'tidak_aktif') filter grayscale cursor-not-allowed @endif
                    " @if($menu->menu_state == 'tidak_aktif') disabled @endif>
                    +
                </button>
            </div>
        </div>
        {{-- loading --}}
        <dialog wire:loading wire:target="addToCart" wire:loading.attr="open" class="modal">
            <span
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 loading loading-spinner loading-lg bg-mainColor"></span>
        </dialog>
        {{-- akhir loading --}}
        {{-- loading --}}
        <dialog wire:loading wire:target="addToPesanan" wire:loading.attr="open" class="modal">
            <span
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 loading loading-spinner loading-lg bg-mainColor"></span>
        </dialog>
        {{-- akhir loading --}}
    </div>
    {{-- modal 1 --}}
    <dialog id="my_modal_{{ $i }}" class="modal">
        <div class="modal-box">
            <h3 class="font-bold 
            @if(auth()->user()->userDetail->custom == 'kecil')
            text-xl
            @elseif(auth()->user()->userDetail->custom == 'normal')
            text-2xl
            @elseif(auth()->user()->userDetail->custom == 'besar')
            text-3xl
            @endif
            text-center">{{ $menu->menu_name }}</h3>
            <div class="flex justify-evenly">
                <div class="w-32">
                    <p class="pt-4 font-semibold">Bahan :</p>
                    @php
                    $menuDescriptions = explode(',', $menu->menu_description);
                    @endphp
                    <ul class="list-disc text-wrap">
                        @foreach($menuDescriptions as $description)
                        <li>{{ trim($description) }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="w-32 ">
                    <p class="pt-4 font-semibold">Alergi :</p>
                    @php
                    $menuAllergens = explode(',', $menu->menu_allergen);
                    @endphp
                    <ul class="list-disc text-wrap">
                        @foreach($menuAllergens as $allergen)
                        <li>{{ trim($allergen) }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    {{-- akhir modal 1 --}}
    {{-- akhir card 1 --}}

    @php
    $i++;
    @endphp
    @endforeach
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('refresh_notif', (event) => {
                setTimeout(() => {
                    Livewire.dispatch('refresh');
                }, 750);
            });
        });
    </script>
</div>