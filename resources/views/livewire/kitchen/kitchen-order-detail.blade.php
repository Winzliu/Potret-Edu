<div class="mt-7">
    <a href="/kitchen" wire:navigate class="flex items-center gap-2 font-bold">
        <ion-icon name="arrow-back-outline"></ion-icon>
        <p>Kembali</p>
    </a>
    <div class="flex items-center gap-5 my-2">
        <p class="text-3xl font-bold">Detail Pesanan</p>
        <p class="py-1 px-3 rounded-lg border-2 bg-white border-purpleRed text-purpleRed font-bold">Take Away</p>
        <p class="py-1 px-3 rounded-lg border-2 bg-white border-purpleRed text-purpleRed font-bold">Meja: 02</p>
    </div>
    {{-- <div class="flex flex-col gap-2">
        <p class="font-semibold">#123456</p>
        <p class="text-purpleRed font-semibold text-lg">Meja 02</p>
    </div> --}}
    <div class="flex flex-col justify-center gap-4">
        <div class="flex text-center">
            <p class="font-semibold text-purpleRed">Kasir: &nbsp;</p>
            <p class="font-medium">Tatang Subarjo</p>
        </div>
        <div class="flex text-center">
            <p class="font-semibold text-purpleRed">Progress Pesanan:&nbsp;</p>
            <p class="font-medium">3/6 Menu (12 Item)</p>
        </div>
        <div class="flex text-center">
            <p class="font-semibold text-purpleRed">Tanggal, Waktu: &nbsp;</p>
            <p class="font-medium">10 Februari 2024, 19.01</p>
        </div>
    </div>
    <div class="divider"></div>
    
    <div class="flex my-2">
        <div class="w-full">
            <div class="max-h-[20rem] max-w-full overflow-y-scroll overflow-x-hidden mx-4">
                {{-- Pesanan Start --}}
                @for($i=0; $i<8 ;$i++ ) 
                <div class="flex mr-4 mb-2 w-full mb-4">
                    <div class="flex">
                        <img class="mask mask-squircle w-14" src="{{ asset('img/Makanan.jpg') }}" />
                    </div>
                    <div class="flex flex-col mx-4 font-semibold items-start justify-center w-2/3">
                        <div class="flex flex-row gap-4">
                            <p class="font-bold">x2</p>
                            <p>Nasi Goreng Telur Putih</p>
                        </div>
                        @if(1==1)
                        {{-- KONDISI CATATAN MENU --}}
                        <div class="line-clamp-2">
                            <i class=" text-red-500 text-sm ml-12 font-medium line-clamp-2">Notes: {{ 'Ini Adalah Pesan
                                Panjang Yang harus dilihat lalalllaa' }}</i>
                        </div>
                        @endif
                    </div>

                    <div class="flex flex-row gap-2 items-center  mr-4 w-1/3">
                        {{-- BUTTON KOSONG --}}
                        <button onclick="kosong_{{ $i }}.showModal()"
                            class="w-1/2 flex items-center justify-center rounded-md py-2 bg-purpleRed" >
                            <span class="icon-[ph--empty-bold] text-2xl  mx-5 text-white"></span>
                        </button>

                        {{-- BUTTON SELESAI --}}
                        <button onclick="selesai_{{ $i }}.showModal()"
                            class="w-1/2 flex justify-center items-center rounded-md py-3 bg-greenConfirm">
                            <span class="icon-[el--ok] mx-5 text-white"></span>                        
                        </button>

                        <dialog id="selesai_{{ $i }}" class="modal">
                            <div class="modal-box flex flex-col w-full justify-center items-center border-4 border-green-500 font-semibold">
                                <p>Apakah Anda yakin  menu ini Kosong?</p>
                                <div class="mt-4 flex flex-row justify-center gap-8 font-medium">
                                        <form method="dialog">
                                            <button id="selesai{{ $i }}"
                                                class="bg-red-500 px-8 py-2 text-white rounded-md">
                                                Tidak
                                            </button>
                                          </form>
                                        <button class="bg-greenConfirm text-white px-12 py-2 rounded-md mr-2">Ya</button>
                                    </div>
                            </div>
                            <form method="dialog" class="modal-backdrop">
                                <button>close</button>
                            </form>
                        </dialog>

                        <dialog id="kosong_{{ $i }}" class="modal">
                            <div class="modal-box flex flex-col w-full justify-center items-center border-4 border-red-500 font-semibold">
                                <p>Apakah Anda yakin  menu ini Kosong?</p>
                                <div class="mt-4 flex flex-row justify-center gap-8 font-medium">
                                        <form method="dialog">
                                            <button id="kosong{{ $i }}"
                                                class="bg-red-500 px-8 py-2 text-white rounded-md">
                                                Tidak
                                            </button>
                                          </form>
                                        <button class="bg-greenConfirm text-white px-12 py-2 rounded-md mr-2">Ya</button>
                                    </div>
                            </div>
                            <form method="dialog" class="modal-backdrop">
                                <button>close</button>
                            </form>
                        </dialog>

                        @if($showKosongButton)
                        <div class="mr-4 rounded-md py-1 w-full bg-white border-2 border-purpleRed">
                            <p class="text-purpleRed font-semibold text-center">Kosong</p>
                        </div>
                        @endif
                        
                        @if($showSelesaiButton)
                        <div class="mr-4 rounded-md py-1  w-full bg-white border-2 border-greenConfirm">
                            <p class="text-greenConfirm font-semibold text-center">
                                Selesai
                            </p>
                        </div>
                        @endif
                    </div>
            </div>
            @endfor
        </div>
    </div>
    {{-- MODAL POPUP SELESAI KOSONG --}}
    {{-- @if($confirmingToggle)
    <div class="fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 py-10 rounded-xl shadow-lg text-center border-4 border-mainColor font-semibold">
            <p>Apakah Anda yakin ingin {{ $isOn ? 'Menonaktifkan' : 'Mengaktifkan' }} menu ini?</p>
            <div class="mt-4 flex flex-row justify-center gap-8 font-medium">
                <button wire:click="$set('confirmingToggle', false)"
                    class="bg-red-500 px-8 py-2 text-white rounded-md">Tidak</button>
                <button wire:click="toggle" class="bg-green-500 text-white px-10 py-2 rounded-md mr-2">Ya</button>
            </div>
        </div>
    </div>
    @endif --}}
    {{-- MODAL POPUP SELESAI KOSONG --}}
</div>
<div class="divider"></div>
