<div class="mt-9 @if(auth()->user()->userDetail->custom == 'kecil')
    text-sm
    @elseif(auth()->user()->userDetail->custom == 'normal')
    text-base
    @elseif(auth()->user()->userDetail->custom == 'besar')
    text-lg
    @endif">
    <a href="/kitchen" wire:navigate class="flex items-center gap-2 font-bold">
        <svg class="
            @if(auth()->user()->userDetail->custom == 'kecil')
                w-4
            @elseif(auth()->user()->userDetail->custom == 'normal')
                w-6
            @elseif(auth()->user()->userDetail->custom == 'besar')
                w-8
            @endif"
        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
        </svg>        
        <p>Kembali</p>
    </a>

    {{-- notif --}}
    @if (session()->has('notif_gagal'))
    <div role="alert"
        class="alert alert-error rounded-lg absolute z-50 top-10 w-auto left-1/2 -translate-x-1/2 opacity-0 animate-notif unselectable">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('notif_gagal') }}</span>
    </div>
    @elseif (session()->has('notif_berhasil'))
    <div role="alert"
        class=" text-white font-semibold alert alert-success rounded-lg absolute z-50 top-10 w-auto left-1/2 -translate-x-1/2 opacity-0 animate-notif unselectable">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('notif_berhasil') }}</span>
    </div>
    @endif
    {{-- akhir notif --}}

    <!-- Profil -->
    <div class="">
        <div class="flex items-center gap-5 mt-4">
            <p class="text-3xl font-bold">Profile</p>
        </div>
        <div class="divider"></div>
        <div class="flex items-center">
            <div class="flex justify-center w-1/3">
                <img src="{{ asset('img/Makanan.jpg') }}" alt="" class="rounded-lg w-52">
            </div>
            <div class="flex flex-col w-2/3 font-medium gap-6 mx-12">
                <div class="flex gap-2 font-medium">
                    <p class="font-semibold">Nama:</p>
                    <p>{{ auth()->user()->userDetail->name }}</p>
                </div>
                <div class="flex gap-2">
                    <p class="font-semibold">Alamat: </p>
                    <p>{{ auth()->user()->userDetail->address }}</p>
                </div>
                <div class="flex gap-2">
                    <p class="font-semibold">Posisi: </p>
                    <p>{{ auth()->user()->role }}</p>
                </div>
                <div class="flex flex-col max-w-[90%]">
                    <p class="font-semibold">Deskripsi: </p>
                    <p class="text-justify overflow-ellipsis line-clamp-3">
                        {{ auth()->user()->userDetail->description }}
                    </p>
                </div>
            </div>
        </div>
        <div class="flex items-center gap-5 mt-12">
            <p class="text-3xl font-bold">Pengaturan Font</p>
        </div>
        <div class="divider"></div>
        <div class="mx-2">
            <div class="w-full flex justify-between px-2 font-medium">
                <span class="text-base ml-4">Kecil</span>
                <span class="text-xl ml-4">Sedang</span>
                <span class="text-2xl">Besar</span>
            </div>
        </div>
        <div class="mx-10">
            <label for="labels-range-input" class="sr-only">Labels range</label>
            <input wire:click="changeFont" wire:model="font" id="labels-range-input" type="range" step="1" min="1"
                max="3" value="2"
                class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
            <div class="w-full flex justify-between text-xs px-2">
                <span>|</span>
                <span>|</span>
                <span>|</span>
            </div>
        </div>
    </div>
    {{-- akhir profile --}}
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