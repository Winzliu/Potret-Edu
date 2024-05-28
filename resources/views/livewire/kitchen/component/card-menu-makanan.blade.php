<div class="flex flex-wrap gap-4 justify-start overflow-y-scroll md:h-[75vh] xl:h-[75vh] scrollbar-hidden">
    {{-- notif --}}
    @if (session()->has('aktif_gagal'))
    <div role="alert"
        class="text-white font-semibold alert alert-error rounded-lg absolute top-10 w-auto left-1/2 -translate-x-1/2 opacity-0 animate-notif unselectable">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('aktif_gagal') }}</span>
    </div>
    @elseif (session()->has('aktif_berhasil'))
    <div role="alert"
        class="text-white font-semibold alert alert-success rounded-lg absolute top-10 w-auto left-1/2 -translate-x-1/2 opacity-0 animate-notif unselectable">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('aktif_berhasil') }}</span>
    </div>
    @elseif (session()->has('nonaktif_gagal'))
    <div role="alert"
        class="text-white font-semibold alert alert-success rounded-lg absolute top-10 w-auto left-1/2 -translate-x-1/2 opacity-0 animate-notif unselectable">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('nonaktif_gagal') }}</span>
    </div>
    @elseif (session()->has('nonaktif_berhasil'))
    <div role="alert"
        class="text-white font-semibold alert alert-success rounded-lg absolute top-10 w-auto left-1/2 -translate-x-1/2 opacity-0 animate-notif unselectable">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('nonaktif_berhasil') }}</span>
    </div>
    @endif
    {{-- akhir notif --}}
    @php
    $i = 1; $j = 0;
    @endphp
    @foreach ($menus as $menu)
    {{-- card 1 --}}
    <div
        class="card min-w-1/4 w-[15.5rem] h-[17rem] px-4 py-4 bg-base-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl">
        <figure class="mb-3 cursor-pointer filter-grayscale" onclick="my_modal_{{ $i }}.showModal()">
            <img src="{{ asset('img/makanan.jpg') }}" alt="Shoes"
                @if($menu->menu_state == 'aktif')
                    class="rounded-xl h-36 w-full object-cover" 
                @elseif($menu->menu_state == 'tidak_aktif') 
                    class="filter grayscale rounded-xl h-36 w-full object-cover" 
                @endif
                />
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
                @if($menu->menu_state == 'tidak_aktif')
                    <button  wire:click="modal_aktif('{{ $menu->menu_id }}')"
                    data-tip="Aktifkan"
                    class="tooltip bg-white hover:bg-greenConfirm text-greenConfirm hover:text-white 
                    border-2  text-sm border-secondaryColor w-10 h-10 rounded-full font-bold">
                        On
                    </button>
                @elseif($menu->menu_state == 'aktif')
                    <button  wire:click="modal_nonaktif('{{ $menu->menu_id }}')"
                    data-tip="Nonaktifkan"
                    class="tooltip bg-white hover:bg-purpleRed text-purpleRed hover:text-white
                    border-2  text-sm border-secondaryColor w-10 h-10 rounded-full font-bold">
                        Off
                    </button>
                @endif
            </div>
        </div>
    </div>
      {{-- MODAL POPUP NONAKTIF --}}
      @if($modalNonaktif)
        <div class="fixed top-0 left-0 w-full z-10 h-full bg-gray-900 bg-opacity-10 flex justify-center items-center">
            <div class="bg-white p-6 py-10 rounded-xl text-center border-4 border-purpleRed font-semibold">
                <p 
                    @if(auth()->user()->userDetail->custom == 'kecil')
                    text-xs
                    @elseif(auth()->user()->userDetail->custom == 'normal')
                    text-xs
                    @elseif(auth()->user()->userDetail->custom == 'besar')
                    text-sm
                    @endif
                >Apakah Anda yakin ingin menonaktifkan menu ini?</p>
                <div class="mt-4 flex flex-row justify-center gap-8 font-medium">
                    <button wire:click="$set('modalNonaktif', false)"
                        class="bg-red-500 px-8 py-2 text-white rounded-md">Tidak</button>
                    <button wire:click="nonaktif" class="bg-green-500 text-white px-10 py-2 rounded-md mr-2">Ya</button>
                </div>
            </div>
        </div>
      @endif
      {{-- MODAL POPUP AKTIF --}}
      @if($modalAktif)
        <div class="fixed top-0 left-0 w-full z-10 h-full bg-gray-900 bg-opacity-10 flex justify-center items-center">
            <div class="bg-white p-6 py-10 rounded-xl text-center border-4 border-green-500 font-semibold">
                <p 
                    @if(auth()->user()->userDetail->custom == 'kecil')
                    text-xs
                    @elseif(auth()->user()->userDetail->custom == 'normal')
                    text-xs
                    @elseif(auth()->user()->userDetail->custom == 'besar')
                    text-sm
                    @endif
                >Apakah Anda yakin ingin mengaktifkan menu ini?</p>
                <div class="mt-4 flex flex-row justify-center gap-8 font-medium">
                    <button wire:click="$set('modalAktif', false)"
                        class="bg-red-500 px-8 py-2 text-white rounded-md">Tidak</button>
                    <button wire:click="aktif" class="bg-green-500 text-white px-10 py-2 rounded-md mr-2">Ya</button>
                </div>
            </div>
        </div>
      @endif
      {{-- AKHIR MODAL POPUP AKTIF --}}


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
    @php
        $i++; $j++;
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