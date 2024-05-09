<div class="md:mt-7 me-10">
    {{-- Search Bar --}}
        <div class="my-6 w-96 h-10">
            <form action="">
              <label class=" input input-bordered flex items-center gap-2 rounded-lg h-9 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">
                <input type="text" class="grow text-xs border-0 input" placeholder="Cari Menu" />
                <button>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                    <path fill-rule="evenodd"
                      d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                      clip-rule="evenodd" />
                  </svg>
                </button>
              </label>
            </form>
        </div>
    {{-- Akhir Search Bar --}}

    {{-- Status Menunggu/Selesai --}}
    <div class="flex gap-5">
        <button class="font-semibold text-mainColor">Menunggu</button>
        <button class="font-semibold">Selesai</button>
    </div>
    {{-- Akhir Status Menunggu/Selesai --}}

    {{-- Status Take Away/Dine-In --}}
    <div class="flex gap-5 w-full justify-center items-center">
        <button class="flex gap-1 items-center">
            <p class="font-semibold text-mainColor">Take Away</p>
            <p class="bg-red-500 rounded-full w-5 h-5 text-center font-semibold text-white text-sm">3</p>
        </button>
        <button class="flex gap-1 items-center">
            <p class="font-semibold">Dine-In</p>
            <p class="bg-red-500 rounded-full w-5 h-5 text-center font-semibold text-white text-sm">2</p>
        </button>
    </div>
    {{-- Akhir Status Take Away/Dine-In --}}

    {{-- Pesanan --}}
    <div class="mt-5 text-sm flex flex-col gap-7 md:h-[75vh] xl:h-[73vh] overflow-y-scroll scrollbar-hidden rounded-lg">
        @for($j = 0; $j < 5; $j++)
        {{-- Pesanan 1 --}}
        <div
            class="bg-secondaryColor rounded-lg flex flex-col items-center py-3 px-8 shadow-[0_0_20px_0_rgba(0,0,0,0.1)]">
            <p class="font-bold">ID Pesanan: #12345678</p>
            <div class="flex justify-between w-full items-center">
                <div class="">
                    <p class="font-semibold leading-5">Nomor Meja: 02</p>
                    <p class="font-semibold leading-5">Pesanan Selesai: 3/6</p>
                </div>
                <p class="font-semibold">Waiter: Tatang Subarjo</p>
            </div>
            {{-- Menu --}}
            <div class="flex justify-around w-full mt-4">
                {{-- Menu 1 --}}
                @for($i=0; $i<6 ;$i++)
                <div class="flex flex-col gap-1 items-center">
                    <div class="relative">
                        <img class="mask mask-squircle w-20 h-20" src="{{ asset('img/Makanan.jpg') }}" />
                        <ion-icon name="checkmark"
                            class="absolute -right-1 -top-1 bg-green-600 text-white rounded-full p-1 ">
                        </ion-icon>
                    </div>
                    <div class="text-center">
                        <p class="font-semibold text-xs text-wrap w-24 xl:w-28">Nasi Goreng Telur Putih</p>
                        <p>x3</p>
                    </div>
                </div>
                @endfor
                {{-- Akhir Menu 1 --}}
            </div>
            {{-- Akhir Menu --}}
            <div class="flex mt-4 items-center justify-between w-full px-6">
                <p class="font-bold">Catatan: Ada</p>
                    <a href="/kitchen-order-detail/1" wire:navigate class="px-7 py-2 bg-white rounded-lg font-bold">Lihat</a>
            </div>
        </div>
        @endfor
        {{-- Akhir Pesanan 1 --}}

    </div>
    {{-- Akhir Pesanan --}}
</div>