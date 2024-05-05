<div class="md:mt-7 me-10">
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
                {{-- Akhir Menu 1 --}}
                {{-- Menu 2 --}}
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
                {{-- Akhir Menu 2 --}}
                {{-- Menu 3 --}}
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
                {{-- Akhir Menu 3 --}}
                {{-- Menu 4 --}}
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
                {{-- Akhir Menu 4 --}}
                {{-- Menu 5 --}}
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
                {{-- Akhir Menu 5 --}}
                {{-- Menu 6 --}}
                <div class="hidden xl:flex flex-col gap-1 items-center">
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
                {{-- Akhir Menu 6 --}}
            </div>
            {{-- Akhir Menu --}}
            <div class="flex mt-4 items-center justify-between w-full px-6">
                <p class="font-bold">Catatan: Ada</p>
                <a href="/cashier/pesanan/1" wire:navigate class="px-7 py-2 bg-white rounded-lg font-bold">Lihat</a>
            </div>
        </div>
        {{-- Akhir Pesanan 1 --}}
        {{-- Pesanan 2 --}}
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
                {{-- Akhir Menu 1 --}}
                {{-- Menu 2 --}}
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
                {{-- Akhir Menu 2 --}}
                {{-- Menu 3 --}}
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
                {{-- Akhir Menu 3 --}}
                {{-- Menu 4 --}}
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
                {{-- Akhir Menu 4 --}}
                {{-- Menu 5 --}}
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
                {{-- Akhir Menu 5 --}}
                {{-- Menu 6 --}}
                <div class="hidden xl:flex flex-col gap-1 items-center">
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
                {{-- Akhir Menu 6 --}}
            </div>
            {{-- Akhir Menu --}}
            <div class="flex mt-4 items-center justify-between w-full px-6">
                <p class="font-bold">Catatan: Ada</p>
                <a href="/cashier/pesanan/1" wire:navigate class="px-7 py-2 bg-white rounded-lg font-bold">Lihat</a>
            </div>
        </div>
        {{-- Akhir Pesanan 2 --}}
        {{-- Pesanan 3 --}}
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
                {{-- Akhir Menu 1 --}}
                {{-- Menu 2 --}}
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
                {{-- Akhir Menu 2 --}}
                {{-- Menu 3 --}}
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
                {{-- Akhir Menu 3 --}}
                {{-- Menu 4 --}}
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
                {{-- Akhir Menu 4 --}}
                {{-- Menu 5 --}}
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
                {{-- Akhir Menu 5 --}}
                {{-- Menu 6 --}}
                <div class="hidden xl:flex flex-col gap-1 items-center">
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
                {{-- Akhir Menu 6 --}}
            </div>
            {{-- Akhir Menu --}}
            <div class="flex mt-4 items-center justify-between w-full px-6">
                <p class="font-bold">Catatan: Ada</p>
                <a href="/cashier/pesanan/1" wire:navigate class="px-7 py-2 bg-white rounded-lg font-bold">Lihat</a>
            </div>
        </div>
        {{-- Akhir Pesanan 3 --}}
    </div>
    {{-- Akhir Pesanan --}}
</div>