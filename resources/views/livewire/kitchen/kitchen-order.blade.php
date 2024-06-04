<div class="md:mt-7 me-10">
    {{-- search --}}
    @livewire('kitchen.component.search-pesanan', ['status' => $status, 'type' => $type])
    {{-- akhir search --}}

     {{-- Status Menunggu/Selesai --}}
     <div class="flex gap-5">
        <button wire:click="getPesanansKitchen('Menunggu', '{{ $type }}')"
            data-tip="Pesanan Baru"
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
        <button wire:click="getPesanansKitchen('Saji', '{{ $type }}')"
            data-tip="Pesanan Selesai"
            class="tooltip font-semibold flex gap-1 justify-center items-center @if($status == 'Saji') text-mainColor @endif">
            <p>Selesai</p>
            <p class="bg-red-500 rounded-full w-5 h-5 text-center font-semibold text-white text-sm">
                {{$pesanans->where('order_status', 'selesai')->count() }}
            </p>
        </button>
    </div>
    {{-- Akhir Status Menunggu/Selesai --}}

    {{-- Status Take Away/Dine-In --}}
    <div class="flex gap-5 w-full justify-center items-center">
        <button wire:click="getPesanansKitchen('{{ $status }}','Dine In')" 
        data-tip="Makan di tempat"
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
        <button wire:click="getPesanansKitchen('{{ $status }}','Take Away')" 
        data-tip="Pesanan Bungkus"
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
        <dialog wire:loading wire:loading.attr="open" class="modal bg-black/30">
            <span
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 loading loading-spinner loading-lg"></span>
        </dialog>
        {{-- akhir loading --}}

</div>