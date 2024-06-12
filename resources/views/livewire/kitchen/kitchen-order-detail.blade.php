<div class="mt-7
@if(auth()->user()->userDetail->custom == 'kecil')
text-sm mt-20
@elseif(auth()->user()->userDetail->custom == 'normal')
text-base mt-16
@elseif(auth()->user()->userDetail->custom == 'besar')
text-lg mt-10
@endif
">
    @if (session()->has('kosong_gagal'))
    <div role="alert"
        class="text-white font-semibold alert alert-error rounded-lg absolute z-50 top-10 w-auto left-1/2 -translate-x-1/2 opacity-0 animate-notif unselectable">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('kosong_gagal') }}</span>
    </div>
    @elseif (session()->has('kosong_berhasil'))
    <div role="alert"
        class="text-white font-semibold alert alert-success rounded-lg absolute z-50 top-10 w-auto left-1/2 -translate-x-1/2 opacity-0 animate-notif unselectable">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('kosong_berhasil') }}</span>
    </div>
    @endif
    @if (session()->has('selesai_gagal'))
    <div role="alert"
        class="text-white font-semibold alert alert-error rounded-lg absolute z-50 top-10 w-auto left-1/2 -translate-x-1/2 opacity-0 animate-notif unselectable">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('selesai_gagal') }}</span>
    </div>
    @elseif (session()->has('selesai_berhasil'))
    <div role="alert"
        class="text-white font-semibold alert alert-success rounded-lg absolute z-50 top-10 w-auto left-1/2 -translate-x-1/2 opacity-0 animate-notif unselectable">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('selesai_berhasil') }}</span>
    </div>
    @endif

    <a href="/kitchen" wire:navigate class="flex items-center gap-2 font-bold">
        <svg class="
            @if(auth()->user()->userDetail->custom == 'kecil')
                w-4
            @elseif(auth()->user()->userDetail->custom == 'normal')
                w-6
            @elseif(auth()->user()->userDetail->custom == 'besar')
                w-8
            @endif" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48"
                d="M244 400L100 256l144-144M120 256h292" />
        </svg>
        <p>Kembali</p>
    </a>

    {{-- Pesanan --}}
    <div class="flex items-center gap-5 my-2">
        <p class="text-3xl font-bold">Detail Pesanan</p>
        <div
            class="flex py-1 px-3 justify-center rounded-lg border-2 gap-4 bg-white border-purpleRed text-purpleRed font-semibold">
            <p class="ms-2">{{ $pesanan->order_type }}</p>
            <span class="border-r-2 rounded-md border-purpleRed"></span>
            <p class="">Meja: {{ $pesanan->table_number }}</p>
            <span class="border-r-2 rounded-md border-purpleRed"></span>
            <p class="me-2">ID: #{{ strtoupper(substr($pesanan->order_id, 0, 8)) }}</p>
        </div>
    </div>
    {{-- <div class="flex flex-col gap-2">
        <p class="font-semibold">#123456</p>
    </div> --}}
    <div class="flex flex-col justify-center gap-4">
        <div class="flex text-center">
            <p class="font-semibold text-purpleRed">Waiter: &nbsp;</p>
            <p class="font-medium">{{ $pesanan->user->userDetail->name }}</p>
        </div>
        <div class="flex text-center">
            <p class="font-semibold text-purpleRed">Progress Pesanan:&nbsp;</p>
            @php
            $qty=0;
            @endphp
            @foreach ($pesanan->orderDetail as $menu)
            @php
            $qty+=$menu->quantity;
            @endphp
            @endforeach
            <p class="font-medium">{{ $pesanan->orderDetail->where('menu_status',
                'selesai')->count() }}/{{ $pesanan->orderDetail->count() }} Menu ({{ $qty }} Item)</p>
        </div>
        <div class="flex text-center">
            <p class="font-semibold text-purpleRed">Tanggal, Waktu: &nbsp;</p>
            <p class="font-medium">{{ date('d F Y, H.i.s', strtotime($pesanan->date)) }}</p>
        </div>
    </div>
    <div class="divider"></div>

    <div class="flex my-2">
        <div class="w-full">
            <div class="max-h-[20rem] max-w-full  overflow-x-hidden mx-4 overflow-y-scroll">
                @php
                $i=0;
                @endphp
                {{-- Pesanan Start --}}
                @foreach($orderDetails as $menu )
                @php
                $i++;
                @endphp
                <div class="flex mr-4 mb-2 w-full">
                    <div class="flex items-center me-4 font-medium">
                        <p>{{ $i }}</p>
                    </div>
                    <div class="flex z-0">
                        <img class="mask mask-squircle w-14 h-14 object-cover"
                            src="{{ asset('storage/menu-images/' . $menu->menu->menu_image) }}" />
                    </div>
                    <div class="flex flex-col mx-4 font-semibold items-start justify-center w-2/3">
                        <div class="flex gap-4 justify-center">
                            <p class="font-semibold">x {{ $menu->quantity }}</p>
                            <p>{{ $menu->menu->menu_name }}</p>
                        </div>
                        @if(1==1)
                        {{-- KONDISI CATATAN MENU --}}
                        <div class="line-clamp-2">
                            @if($menu->menu_status == 'masak' && $menu->status == 'baru')
                            <i class="text-purpleRed text-sm ml-12 font-medium line-clamp-2">Catatan: {{ $menu->notes
                                }}</i>
                            @elseif($menu->menu_status == 'masak' && $menu->status == 'tambahan')
                            <i class="text-purpleRed text-sm ml-12 font-medium line-clamp-2"><span
                                    class="text-green-500">Catatan: </span>{{ $menu->notes }}</i>
                            @else
                            <i class="text-gray-500 text-sm ml-12 font-normal line-clamp-2">Catatan: {{ $menu->notes
                                }}</i>
                            @endif
                        </div>
                        @endif
                    </div>

                    <div class="flex flex-row gap-2 items-center w-1/3 mr-4">
                        @if($menu->menu_status == 'masak')
                        {{-- BUTTON KOSONG --}}
                        <button wire:click="modal_kosong('{{ $menu->order_detail_id }}')"
                            class="w-1/2 flex items-center justify-center rounded-md py-2 bg-purpleRed">
                            <span class="icon-[ph--empty-bold] text-2xl  mx-5 text-white"></span>
                        </button>

                        {{-- MODAL POPUP KOSONG --}}
                        @if($modalKosong)
                        <div
                            class="fixed z-50 top-0 left-0 w-full h-full bg-gray-900 bg-opacity-10 flex justify-center items-center">
                            <div
                                class="bg-white px-12 py-10 rounded-xl shadow-lg text-center border-4 border-purpleRed font-semibold">
                                <p>Apakah Anda yakin ingin menu ini kosong?</p>
                                <div class="mt-4 flex flex-row justify-center gap-8 font-medium">
                                    <button wire:click="$set('modalKosong', false)"
                                        class="bg-red-500 px-8 py-2 text-white rounded-md">Tidak</button>
                                    <button wire:click="switchKosong"
                                        class="bg-green-500 text-white px-10 py-2 rounded-md mr-2">Ya</button>
                                </div>
                            </div>
                        </div>
                        @endif
                        {{-- AKHIR MODAL POPUP KOSONG --}}

                        {{-- BUTTON SELESAI --}}
                        <button wire:click="modal_selesai('{{ $menu->order_detail_id }}')"
                            class="w-1/2 flex justify-center items-center rounded-md py-3 bg-green-500">
                            <span class="icon-[el--ok] mx-5 text-white"></span>
                        </button>

                        {{-- MODAL POPUP SELESAI --}}
                        @if($modalSelesai)
                        <div
                            class="fixed z-50 top-0 left-0 w-full h-full bg-gray-900 bg-opacity-10 flex justify-center items-center">
                            <div
                                class="bg-white p-6 py-10 rounded-xl shadow-lg text-center border-4 border-green-500 font-semibold">
                                <p>Apakah Anda yakin ingin menyelesaikan menu ini?</p>
                                <div class="mt-4 flex flex-row justify-center gap-8 font-medium">
                                    <button wire:click="$set('modalSelesai', false)"
                                        class="bg-red-500 px-8 py-2 text-white rounded-md">Tidak</button>
                                    <button wire:click="switchSelesai"
                                        class="bg-green-500 text-white px-10 py-2 rounded-md mr-2">Ya</button>
                                </div>
                            </div>
                        </div>
                        @endif
                        {{-- AKHIR MODAL POPUP SELESAI --}}

                        {{-- DIALOG SELESAI --}}
                        {{-- <dialog id="selesai_{{ $i }}" class="modal">
                            <div
                                class="modal-box flex flex-col w-full justify-center items-center border-4 border-green-500 font-semibold">
                                <p>Apakah Anda yakin ingin menyelesaikan menu ini?</p>
                                <div class="mt-4 flex flex-row justify-center gap-8 font-medium">
                                    <form method="dialog">
                                        <button id="selesai{{ $i }}" class="bg-red-500 px-8 py-2 text-white rounded-md">
                                            Tidak
                                        </button>
                                    </form>
                                    <button wire:click="switchSelesai('{{ $menu->order_detail_id }}')"
                                        class="bg-green-500 text-white px-12 py-2 rounded-md mr-2">Ya</button>
                                </div>
                            </div>
                            <form method="dialog" class="modal-backdrop">
                                <button>close</button>
                            </form>
                        </dialog> --}}

                        {{-- DIALOG KOSONG --}}
                        {{-- <dialog id="kosong_{{ $i }}" class="modal">
                            <div
                                class="modal-box flex flex-col w-full justify-center items-center border-4 border-red-500 font-semibold">
                                <p>Apakah Anda yakin menu ini Kosong?</p>
                                <div class="mt-4 flex flex-row justify-center gap-8 font-medium">
                                    <form method="dialog">
                                        <button id="kosong{{ $i }}" class="bg-red-500 px-8 py-2 text-white rounded-md">
                                            Tidak
                                        </button>
                                    </form>
                                    <button wire:click="switchKosong('{{ $menu->order_detail_id }}')"
                                        class="bg-green-500 text-white px-12 py-2 rounded-md mr-2">Ya</button>
                                </div>
                            </div>
                            <form method="dialog" class="modal-backdrop">
                                <button>close</button>
                            </form>
                        </dialog> --}}

                        @elseif($menu->menu_status == 'kosong')
                        <div class="rounded-md py-1 w-full bg-white border-2 border-purpleRed">
                            <p class="text-purpleRed font-semibold text-center">Kosong</p>
                        </div>

                        @elseif($menu->menu_status == 'selesai')
                        <div class="rounded-md py-1  w-full bg-white border-2 border-green-500">
                            <p class="text-green-500 font-semibold text-center">
                                Selesai
                            </p>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        {{-- Akhir Pesanan --}}
        {{-- <script>
            document.addEventListener('livewire:init', () => {
            Livewire.on('refresh_notif', (event) => {
                setTimeout(() => {
                    Livewire.dispatch('refresh');
                }, 750);
            });
        });
        </script> --}}
    </div>
    <div class="divider"></div>