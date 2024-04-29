<div>
    <div class="flex justify-start mx-4 mb-4">
        <a wire:navigate href="/kitchen" class="font-medium bg-white border-2 bg-slate-200 rounded-md px-4 py-2">kembali</a>
    </div>
    <div class="pe-24 flex justify-center">
        <div class="flex justify-center w-4/5 h-full flex flex-col bg-white  border border-4 border-tertiaryColor shadow-[0_0_15px_2px_rgba(0,0,0,0.1)] rounded-3xl p-4">
            <div class="flex flex-col items-center gap-2">
                <p class="font-semibold">#123456</p>
                <p class="text-purpleRed font-semibold text-xl">Dine-In/Take Away</p>
                <p class="text-purpleRed font-semibold text-lg">Meja 02</p>
            </div>
            <hr class="my-4">

            <div class="h-[320px] overflow-y-auto ">
                {{-- Pesanan Start --}}
                @for($i=0; $i<3 ;$i++ )
                <div class="flex flex-row  mr-4 mb-2 w-full">
                    <div class="flex flex-col mx-4 font-semibold items-start justify-center w-2/3">
                        <div class="flex flex-row gap-4">
                            <p>x2</p>
                            <p>Nasi Goreng Telur Putih</p>
                        </div>
                        @if(1==1)
                        {{-- KONDISI CATATAN MENU --}}
                        <div class="line-clamp-2">
                            <i class=" text-red-500 text-sm ml-12 font-medium line-clamp-2">Notes: {{ 'Ini Adalah Pesan Panjang Yang harus dilihat lalalllaa' }}</i>
                        </div>
                        @endif
                    </div>
                        
                    <div class="flex flex-row gap-2 items-center justify-center w-1/3">
                        {{-- Jikas pesanan ada ubah atribut class agar menyesuaikan --}}
                        <button wire:click="toggleKosongButton" wire:loading.attr="disabled" class="rounded-md py-2  bg-purpleRed"
                                @if($buttonClicked) style="display:none" @endif>
                            <svg class="w-6 mx-5 text-center text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                <path fill="currentColor" d="m203.63 62.65l13.25-14.58a12 12 0 0 0-17.76-16.14l-13.24 14.56A100 100 0 0 0 52.37 193.35l-13.25 14.58a12 12 0 1 0 17.76 16.14l13.24-14.56A100 100 0 0 0 203.63 62.65M52 128a75.94 75.94 0 0 1 117.58-63.57l-100.91 111A75.6 75.6 0 0 1 52 128m76 76a75.52 75.52 0 0 1-41.58-12.43l100.91-111A75.94 75.94 0 0 1 128 204" />
                            </svg>
                        </button>
                        @if($showKosongButton)
                        <div class="rounded-md py-1 w-full bg-white border-2 border-slate-200 ">
                            <p class="text-purpleRed font-semibold text-center">Kosong</p>
                        </div>
                        @endif

                        <button wire:click="toggleSelesaiButton" wire:loading.attr="disabled" class="rounded-md py-1 bg-greenConfirm"
                                @if($buttonClicked) style="display:none" @endif>
                            <svg class="w-8 mx-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                <path fill="#ccff90" d="M34.6 14.6L21 28.2l-5.6-5.6l-2.8 2.8l8.4 8.4l16.4-16.4z" />
                            </svg>
                        </button>

                        @if($showSelesaiButton)
                        <div class="rounded-md py-1  w-full bg-white border-2 border-slate-200">
                            <p class="text-greenConfirm font-semibold text-center">
                                Selesai
                            </p>
                        </div>
                        @endif
                    </div>
                </div>
                @endfor
                @for($i=0; $i<2; $i++)
                <div class="flex flex-row mr-4 mb-2 w-full">
                    <div class="flex flex-col mx-4 font-semibold items-start justify-center w-2/3">
                        <div class="flex flex-row gap-4">
                            <p>x2</p>
                            <p>Nasi Goreng Telur Putih</p>
                        </div>
                        @if(1==1)
                        {{-- KONDISI CATATAN MENU --}}
                        {{-- <div class="line-clamp-2">
                            <i class=" text-sm ml-12 max-w-[80%] font-medium line-clamp-2">Notes: Ini Adalah Pesan Panjang Yang harus dilihat lalalllaa</i>
                        </div> --}}
                        @endif
                    </div>
                        
                    <div class="flex flex-row gap-2 items-center justify-center w-1/3">
                        {{-- Jikas pesanan ada ubah atribut class agar menyesuaikan --}}
                        <button class="rounded-md py-1 w-full  bg-white border-2 border-slate-200">
                            <p class="text-greenConfirm font-semibold">
                                Selesai
                            </p>
                        </button>
                    </div>
                </div>
                <div class="flex flex-row mr-4 mb-2 w-full">
                    <div class="flex flex-col mx-4 font-semibold items-start justify-center w-2/3">
                        <div class="flex flex-row gap-4">
                            <p>x2</p>
                            <p>Nasi Goreng Telur Putih</p>
                        </div>
                        @if(1==1)
                        {{-- KONDISI CATATAN MENU --}}
                        <div class="line-clamp-2">
                            <i class=" text-sm ml-12 max-w-[80%] font-medium w-max-[20%] line-clamp-2">Notes: {{ 'Ini Adalah Pesan Panjang Yang harus dilihat lalalllaa' }}</i>
                        </div>
                        @endif
                    </div>
                        
                    <div class="flex flex-row gap-2 items-center justify-center w-1/3 ">
                        {{-- Jikas pesanan ada ubah atribut class agar menyesuaikan --}}
                        <button class="rounded-md py-1 w-full bg-white border-2 border- ">
                            <p class="text-purpleRed font-semibold">Kosong</p>
                        </button>
                    </div>
                </div>
                @endfor
            </div>

            <hr class='my-4'>

            <div class="flex flex-row justify-between">
                <div class="flex flex-col text-center">
                    <p class="font-semibold">Waiter/Kasir</p>
                    <p class="font-medium text-purpleRed">Tatang Subarjo</p>
                </div>
                <div class="flex flex-col text-center">
                    <p class="font-semibold">Waktu</p>
                    <p class="font-medium text-purpleRed">10 Februari 2024, 19.01</p>
                </div>
                <div class="flex flex-col text-center">
                    <p class="font-semibold">Progress Pesanan</p>
                    <p class="font-medium text-purpleRed">3/6 Menu(6 Item)</p>
                </div>
            </div>
        </div>
    </div>
</div>
