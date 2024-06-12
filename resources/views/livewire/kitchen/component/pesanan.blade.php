<div class="mt-5 
@if(auth()->user()->userDetail->custom == 'kecil')
text-xs
@elseif(auth()->user()->userDetail->custom == 'normal')
text-sm
@elseif(auth()->user()->userDetail->custom == 'besar')
text-base
@endif
flex flex-col gap-7 md:h-[75vh] xl:h-[70vh] overflow-y-scroll overflow-x-hidden scrollbar-hidden rounded-lg">

    {{-- notif --}}
    @if (session()->has('notif_gagal'))
    <div role="alert"
        class="text-white  font-semibold alert alert-error rounded-lg absolute z-50 top-10 w-auto left-1/2 -translate-x-1/2 opacity-0 animate-notif unselectable">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('notif_gagal') }}</span>
    </div>
    @elseif (session()->has('notif_berhasil'))
    <div role="alert"
        class="text-white font-semibold alert alert-success rounded-lg absolute z-50 top-10 w-auto left-1/2 -translate-x-1/2 opacity-0 animate-notif unselectable">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('notif_berhasil') }}</span>
    </div>
    @endif
    {{-- akhir notif --}}
    @if($pesanans->count() > 0)
    @php
    $j=0;
    @endphp
    @foreach ($pesanans as $pesanan)
    {{-- Pesanan 1 --}}
    <div class="bg-secondaryColor rounded-lg flex flex-col items-center py-3 px-8 shadow-[0_0_20px_0_rgba(0,0,0,0.1)]">
        <p class="font-bold">ID Pesanan: #{{ strtoupper(substr($pesanan->order_id, 0, 8)) }}</p>
        <div class="flex justify-between w-full items-center">
            <div class="">
                <p class="font-semibold leading-5">Nomor Meja: {{ $pesanan->table_number }}</p>
                <p class="font-semibold leading-5">Pesanan Selesai: {{ $pesanan->orderDetail->where('menu_status',
                    'selesai')->count() }}/{{ $pesanan->orderDetail->count() }}</p>
            </div>
            <p class="font-semibold">Waiter: {{ $pesanan->user->userDetail->name }}</p>
        </div>
        {{-- Menu --}}
        <div class="flex justify-left gap-10 overflow-x-scroll scrollbar-hidden pt-4 w-full mt-4">
            @php
            $notes = 'Tidak Ada';
            @endphp
            @foreach ($pesanan->orderDetail as $menu)
            {{-- Menu 1 --}}
            <div class="flex flex-col gap-1 items-center">
                <div class="relative">
                    <img class="mask mask-squircle w-20 h-20 object-cover"
                        src="{{ asset('storage/menu-images/' . $menu->menu->menu_image) }}" />
                    @if($menu->menu_status == 'selesai')
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="25px"
                        class="absolute -right-1 -top-1 bg-green-600 text-white rounded-full p-1" width="25px"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                        </path>
                    </svg>
                    @elseif($menu->menu_status == 'kosong')
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 352 512" height="25px"
                        class="absolute -right-1 -top-1 bg-red-500 text-white rounded-full p-1" width="25px"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z">
                        </path>
                    </svg>
                    @else
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="25px"
                        class="absolute -right-1 -top-1 bg-yellow-500 text-white rounded-full p-1" width="25px"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M414.9 161.5C340.2 29 121.1 0 121.1 0S222.2 110.4 93 197.7C11.3 252.8-21 324.4 14 402.6c26.8 59.9 83.5 84.3 144.6 93.4-29.2-55.1-6.6-122.4-4.1-129.6 57.1 86.4 165 0 110.8-93.9 71 15.4 81.6 138.6 27.1 215.5 80.5-25.3 134.1-88.9 148.8-145.6 15.5-59.3 3.7-127.9-26.3-180.9z">
                        </path>
                    </svg>
                    @endif
                </div>
                <div class="text-center">
                    <p class="font-semibold 
                    @if(auth()->user()->userDetail->custom == 'kecil')
                    text-xs
                    @elseif(auth()->user()->userDetail->custom == 'normal')
                    text-xs
                    @elseif(auth()->user()->userDetail->custom == 'besar')
                    text-sm
                    @endif
                    text-wrap w-24 xl:w-28">{{ $menu->menu->menu_name }}</p>
                    <p>x{{ $menu->quantity }}</p>
                </div>
            </div>
            @if ($menu->notes != null)
            @php
            $notes = 'Ada';
            @endphp
            @endif
            {{-- Akhir Menu 1 --}}
            @endforeach
        </div>
        {{-- Akhir Menu --}}
        <div class="flex mt-4 items-center justify-between w-full px-6">
            <p class="font-bold">Catatan: {{ $notes }}</p>
            <div class="flex gap-x-5">
                <a href="/kitchen-pesanan/{{ $pesanan->order_id }}" wire:navigate data-tip="Lihat detail pesanan"
                    class="tooltip px-7 py-2 bg-white hover:bg-gray-300 transition-all duration-300 rounded-lg font-bold">Lihat</a>

                {{-- Logika Hitung Menu Sedang Dimasak --}}
                @php
                $count = 0;
                @endphp
                @foreach ($pesanan->orderDetail as $menu)
                @if ($menu->menu_status == 'masak' || $menu->menu_status == 'kosong')
                @php
                $count++;
                @endphp
                @endif
                @endforeach
                {{-- Akhir Logika Hitung Menu Sedang Dimasak --}}

                @if ($pesanan->order_status == 'masak')
                @if ($count > 0)
                {{-- Pesanan belum siap --}}
                <button data-tip="Semua menu belum selesai/kosong" class="tooltip px-7 py-2 text-white bg-slate-400 hover:bg-slate-500 
                        transition-all duration-300 rounded-lg font-bold">Selesai
                </button>
                @endif
                @if ($count == 0)
                {{-- Pesanan semua sudah dimasak --}}
                <button data-tip="Selesaikan Pesanan" onclick="selesai_{{ $j }}.showModal()" class="tooltip px-7 py-2 bg-green-600 text-white hover:bg-green-800 
                        transition-all duration-300 rounded-lg font-bold">Selesai
                </button>

                <dialog id="selesai_{{ $j }}" class="modal">
                    <div
                        class="modal-box flex flex-col w-full justify-center items-center border-4 border-green-500 font-semibold">
                        <p>Apakah Anda yakin ingin menyelesaikan pesanan ini?</p>
                        <div class="mt-4 flex flex-row justify-center gap-8 font-medium">
                            <form method="dialog">
                                <button id="selesai{{ $j }}" class="bg-red-500 px-8 py-2 text-white rounded-md">
                                    Tidak
                                </button>
                            </form>
                            <button wire:click="saji('{{ $pesanan->order_id }}')"
                                class="bg-greenConfirm text-white px-12 py-2 rounded-md mr-2">Ya</button>
                        </div>
                    </div>
                    <form method="dialog" class="modal-backdrop">
                        <button>close</button>
                    </form>
                </dialog>
                @endif
                @endif
            </div>
        </div>
    </div>
    @php
    $j++;
    @endphp
    {{-- Akhir Pesanan 1 --}}
    @endforeach
    @else
    <p class="text-center font-bold
        @if(auth()->user()->userDetail->custom == 'kecil')
        text-lg
        @elseif(auth()->user()->userDetail->custom == 'normal')
        text-xl
        @elseif(auth()->user()->userDetail->custom == 'besar')
        text-2xl
        @endif
        mt-10">Tidak ada pesanan</p>
    @endif
</div>