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
            <p class="font-medium text-purpleRed">Tanggal, Waktu: &nbsp;</p>
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
                        {{-- Jikas pesanan ada ubah atribut class agar menyesuaikan --}}
                        <button wire:click="toggleKosongButton" wire:loading.attr="disabled"
                            class="w-1/2 flex items-center justify-center rounded-md py-2 bg-purpleRed" @if($buttonClicked) style="display:none" @endif>
                            <span class="icon-[ph--empty-bold] text-2xl  mx-5 text-white"></span>
                        </button>
                        @if($showKosongButton)
                        <div class="mr-4 rounded-md py-1 w-full bg-white border-2 border-purpleRed">
                            <p class="text-purpleRed font-semibold text-center">Kosong</p>
                        </div>
                        @endif

                        <button wire:click="toggleSelesaiButton" wire:loading.attr="disabled"
                            class="w-1/2 flex justify-center items-center rounded-md py-3 bg-greenConfirm" @if($buttonClicked) style="display:none" @endif>
                            <span class="icon-[el--ok] mx-5 text-white"></span>                        
                        </button>

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
</div>
<div class="divider"></div>