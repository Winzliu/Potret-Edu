<div class="flex flex-wrap gap-4 justify-start overflow-y-scroll h-[75vh] scrollbar-hidden">
    {{-- notif --}}
    @if (session()->has('notif_gagal'))
    <div role="alert"
        class="alert alert-error rounded-lg absolute top-10 w-auto left-1/2 -translate-x-1/2 opacity-0 animate-notif unselectable">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('notif_gagal') }}</span>
    </div>
    @elseif (session()->has('notif_berhasil'))
    <div role="alert"
        class="alert alert-success rounded-lg absolute top-10 w-auto left-1/2 -translate-x-1/2 opacity-0 animate-notif unselectable">
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
            <img src="{{ asset('img/makanan.jpg') }}" alt="Shoes" class="rounded-xl h-36 w-full object-cover" />
        </figure>
        <div class="items-center text-left">
            <h2 class="text-lg font-bold">{{ $menu->menu_name }}</h2>
            <div class="flex items-end justify-between mt-2">
                <div class="">
                    <p class="text-xs w-32">{{ Str::limit($menu->menu_description, 15) }}</p>
                    <p class="font-semibold">Rp. {{ number_format($menu->menu_price,0, ',', '.') }}</p>
                </div>
                <button wire:click="addToCart('{{ $menu->menu_id }}')"
                    class="bg-mainColor w-10 h-10 rounded-full font-bold text-2xl">
                    +
                </button>
            </div>
        </div>
    </div>
    {{-- modal 1 --}}
    <dialog id="my_modal_{{ $i }}" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-2xl text-center">{{ $menu->menu_name }}</h3>
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
                }, 1500);
            });
        });
    </script>
</div>