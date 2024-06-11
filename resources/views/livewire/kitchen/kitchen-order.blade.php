<div class="md:mt-7 pe-10 mb-[1.654rem]" wire:poll.3s>
    {{-- search --}}
    @livewire('kitchen.component.search-pesanan', ['status' => $status, 'type' => $type])
    {{-- akhir search --}}

    {{-- notif --}}
    @if (session()->has('notif_berhasil'))
    <audio autoplay>
        <source src="{{ asset('audio/notif.wav') }}" type="audio/mpeg">
    </audio>
    <div role="alert"
        class="alert alert-success rounded-lg absolute top-10 w-auto left-1/2 -translate-x-1/2 opacity-0 animate-notifKitchen unselectable">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('notif_berhasil') }}</span>
    </div>
    @endif
    {{-- akhir notif --}}

    {{-- Status Menunggu/Selesai --}}
    <div class="flex gap-5">
        <button wire:click="getPesanansKitchen('Menunggu', '{{ $type }}')" data-tip="Pesanan Baru"
            class="tooltip font-semibold flex gap-1 justify-center items-center @if($status == 'Menunggu') text-mainColor @endif">
            <p>Menunggu</p>
            <p class="bg-red-500 rounded-full w-5 h-5 text-center font-semibold text-white text-sm">
                {{$pesanans->where('order_status', 'masak')->count() }}
            </p>
        </button>
        {{-- <button wire:click="getPesanansKitchen('Selesai', '{{ $type }}')"
            class="font-semibold flex gap-1 justify-center items-center @if($status == 'Selesai') text-mainColor @endif">
            <p>Selesai</p>
            <p class="bg-red-500 rounded-full w-5 h-5 text-center font-semibold text-white text-sm">
                {{$pesanans->where('order_status', 'selesai')->count() }}
            </p>
        </button> --}}
        <button wire:click="getPesanansKitchen('Selesai', '{{ $type }}')" data-tip="Pesanan Selesai"
            class="tooltip font-semibold flex gap-1 justify-center items-center @if($status == 'Selesai') text-mainColor @endif">
            <p>Selesai</p>
            <p class="bg-red-500 rounded-full w-5 h-5 text-center font-semibold text-white text-sm">
                {{$pesanans->where('order_status', 'selesai')->count() }}
            </p>
        </button>
    </div>
    {{-- Akhir Status Menunggu/Selesai --}}

    {{-- Status Take Away/Dine-In --}}
    <div class="flex gap-5 w-full justify-center items-center">
        <button wire:click="getPesanansKitchen('{{ $status }}','Dine In')" data-tip="Makan di tempat"
            class="tooltip flex gap-1 items-center">
            <p class="font-semibold @if($type == 'Dine In') text-mainColor @endif">Dine-In</p>
            <p class="bg-red-500 rounded-full w-5 h-5 text-center font-semibold text-white text-sm">
                @if ($status == 'Menunggu')
                {{$pesanans->where('order_type', 'Dine In')->where('order_status', 'masak')->count() }}
                @elseif($status == 'Selesai')
                {{$pesanans->where('order_type', 'Dine In')->where('order_status', 'selesai')->count() }}
                @elseif($status == 'Saji')
                {{$pesanans->where('order_type', 'Dine In')->where('order_status', 'saji')->count() }}
                @endif
            </p>
        </button>
        <button wire:click="getPesanansKitchen('{{ $status }}','Take Away')" data-tip="Pesanan Bungkus"
            class="tooltip flex gap-1 items-center">
            <p class="font-semibold @if($type == 'Take Away') text-mainColor @endif">Take Away</p>
            <p class="bg-red-500 rounded-full w-5 h-5 text-center font-semibold text-white text-sm">
                @if ($status == 'Menunggu')
                {{$pesanans->where('order_type', 'Take Away')->where('order_status', 'masak')->count() }}
                @elseif($status == 'Selesai')
                {{$pesanans->where('order_type', 'Take Away')->where('order_status', 'selesai')->count() }}
                @elseif($status == 'Saji')
                {{$pesanans->where('order_type', 'Take Away')->where('order_status', 'saji')->count() }}
                @endif
            </p>
        </button>
    </div>
    {{-- Akhir Status Take Away/Dine-In --}}

    {{-- Pesanan --}}
    @livewire('kitchen.component.pesanan')
    {{-- Akhir Pesanan --}}

    {{-- loading --}}
    <dialog wire:loading.delay.longer wire:loading.attr="open" class="modal bg-black/30">
        <span
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 loading loading-spinner loading-lg"></span>
    </dialog>
    {{-- akhir loading --}}

</div>