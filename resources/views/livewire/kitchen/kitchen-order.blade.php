<div class="pe-24">
    {{-- section wait-done menu --}}
    <div class="gap-5 flex flex-row">
       <a wire:navigate href="" class="text-secondaryColor font-bold flex flex-row gap-2">
            Menunggu
            <p class="bg-red-500 w-6 rounded-full text-white text-center font-medium">5</p>
        </button>
       <a wire:navigate href="/kitchen-selesai" class="text-black font-bold flex flex-row gap-2">
            Selesai
            <p class="bg-red-500 w-6 rounded-full text-white text-center font-medium">2</p>
       </a>
    </div>
    {{-- akhir wait-done menu --}}

    {{-- section dine-in / takeaway menu --}}
    <div class="flex justify-center mt-4 gap-5 flex flex-row">
       <a wire:navigate href="" class="text-secondaryColor font-bold flex flex-row gap-2">
            Dine-In
            <p class="bg-red-500 w-6 rounded-full text-white text-center font-medium">3</p>
        </a>
       <a wire:navigate href="" class="text-black font-bold flex flex-row gap-2">
            Takeaway
            <p class="bg-red-500 w-6 rounded-full text-white text-center font-medium">2</p>
        </a>
    </div>
    {{-- akhir dine-in / takeaway menu --}}

    {{-- Card Menu --}}
    <div class="w-full mt-4 pb-6">
        <div class="flex flex-col justify-center space-y-4">
            <div class="bg-secondaryColor rounded-xl py-4 px-8">
                    <p class="text-center font-semibold">ID Pesanan: #1234567</p>
                    <div class="flex flex-row justify-between">
                        <div class="flex flex-col font-semibold">
                            <p>Nomor Meja : 02</p>
                            <p>Pesanan Selesai : 3 / 6</p>
                        </div>
                        <div class="flex items-center">
                            <p class="font-semibold">Waiter : Tatang Subarjo</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap justify-around p-2 mt-2 ">
                        <div class="flex flex-col items-center flex-shrink-0">
                            <figure class="relative">
                                <svg class="absolute top-2 right-3 transform translate-x-2/3 -translate-y-2/3 w-7 text-white rounded-full bg-[#4DAC3F]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill="white" d="m14.83 4.89l1.34.94l-5.81 8.38H9.02L5.78 9.67l1.34-1.25l2.57 2.4z" />
                                </svg>
                                <img src="{{ asset('img/Makanan.jpg') }}"
                                class="rounded-lg object-cover w-24 h-16" alt="">
                            </figure>
                            <div class="mt-2 text-center">
                                <p class="font-medium max-w-32 max-h-18 line-clamp-2">
                                    Nasi Goreng Telur Putih Rasanya enak sekali</p>
                            </div>
                            <div>
                                <p class="font-medium">x5</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-center">
                            <figure class="relative">
                                <svg class="absolute top-2 right-3 transform translate-x-2/3 -translate-y-2/3 w-7 text-white rounded-full bg-[#4DAC3F]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill="white" d="m14.83 4.89l1.34.94l-5.81 8.38H9.02L5.78 9.67l1.34-1.25l2.57 2.4z" />
                                </svg>
                                <img src="{{ asset('img/Makanan.jpg') }}"
                                class="rounded-lg object-cover w-24 h-16" alt="">
                            </figure>
                            <div class="mt-2 text-center">
                                <p class="font-medium max-w-32 max-h-18 line-clamp-2">
                                    Nasi Goreng Telur Putih Rasanya enak sekali</p>
                            </div>
                            <div>
                                <p class="font-medium">x5</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-center">
                            <figure class="relative">
                                <svg class="absolute top-2 right-3 transform translate-x-2/3 -translate-y-2/3 w-7 text-white rounded-full bg-[#4DAC3F]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill="white" d="m14.83 4.89l1.34.94l-5.81 8.38H9.02L5.78 9.67l1.34-1.25l2.57 2.4z" />
                                </svg>
                                <img src="{{ asset('img/Makanan.jpg') }}"
                                class="rounded-lg object-cover w-24 h-16" alt="">
                            </figure>
                            <div class="mt-2 text-center">
                                <p class="font-medium max-w-32 max-h-18 line-clamp-2">
                                    Nasi Goreng Telur Putih Rasanya enak sekali</p>
                            </div>
                            <div>
                                <p class="font-medium">x5</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-center">
                            <figure class="relative">
                                <svg  class="absolute z-10 top-2 right-3 transform translate-x-2/3 -translate-y-2/3 w-7 text-white rounded-full bg-purpleRed" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                    <path fill="white" d="m203.63 62.65l13.25-14.58a12 12 0 0 0-17.76-16.14l-13.24 14.56A100 100 0 0 0 52.37 193.35l-13.25 14.58a12 12 0 1 0 17.76 16.14l13.24-14.56A100 100 0 0 0 203.63 62.65M52 128a75.94 75.94 0 0 1 117.58-63.57l-100.91 111A75.6 75.6 0 0 1 52 128m76 76a75.52 75.52 0 0 1-41.58-12.43l100.91-111A75.94 75.94 0 0 1 128 204" />
                                </svg>
                                <img src="{{ asset('img/Makanan.jpg') }}"~
                                class="rounded-lg object-cover w-24 h-16 filter brightness-75% grayscale" alt="">
                            </figure>
                            <div class="mt-2 text-center">
                                <p class="font-medium max-w-32 max-h-18 line-clamp-2">
                                    Nasi Goreng Telur Putih Rasanya enak sekali</p>
                            </div>
                            <div>
                                <p class="font-medium">x5</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-center">
                            <figure class="relative">
                                <img src="{{ asset('img/Makanan.jpg') }}"
                                class="rounded-lg object-cover w-24 h-16" alt="">
                            </figure>
                            <div class="mt-2 text-center">
                                <p class="font-medium max-w-32 max-h-18 line-clamp-2">
                                    Nasi Goreng Telur Putih Rasanya enak sekali</p>
                            </div>
                            <div>
                                <p class="font-medium">x5</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 flex flex-row items-center justify-between">
                        <div>
                            <p class="font-medium">Catatan : Ada</p>
                        </div>
                        <div>
                            <a wire:navigate href="/kitchen-order-detail" class="bg-white rounded-lg border px-6 py-1 font-semibold">Lihat</a>
                        </div>
                    </div>
            </div>
            <div class="bg-secondaryColor rounded-xl py-4 px-8">
                    <p class="text-center font-semibold">ID Pesanan: #1234567</p>
                    <div class="flex flex-row justify-between">
                        <div class="flex flex-col font-semibold">
                            <p>Nomor Meja : 02</p>
                            <p>Pesanan Selesai : 3 / 6</p>
                        </div>
                        <div class="flex items-center">
                            <p class="font-semibold">Waiter : Tatang Subarjo</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap justify-around p-2 mt-2 ">
                        <div class="flex flex-col items-center flex-shrink-0">
                            <figure class="relative">
                                <svg class="absolute top-2 right-3 transform translate-x-2/3 -translate-y-2/3 w-7 text-white rounded-full bg-[#4DAC3F]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill="white" d="m14.83 4.89l1.34.94l-5.81 8.38H9.02L5.78 9.67l1.34-1.25l2.57 2.4z" />
                                </svg>
                                <img src="{{ asset('img/Makanan.jpg') }}"
                                class="rounded-lg object-cover w-24 h-16" alt="">
                            </figure>
                            <div class="mt-2 text-center">
                                <p class="font-medium max-w-32 max-h-18 line-clamp-2">
                                    Nasi Goreng Telur Putih Rasanya enak sekali</p>
                            </div>
                            <div>
                                <p class="font-medium">x5</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-center">
                            <figure class="relative">
                                <svg class="absolute top-2 right-3 transform translate-x-2/3 -translate-y-2/3 w-7 text-white rounded-full bg-[#4DAC3F]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill="white" d="m14.83 4.89l1.34.94l-5.81 8.38H9.02L5.78 9.67l1.34-1.25l2.57 2.4z" />
                                </svg>
                                <img src="{{ asset('img/Makanan.jpg') }}"
                                class="rounded-lg object-cover w-24 h-16" alt="">
                            </figure>
                            <div class="mt-2 text-center">
                                <p class="font-medium max-w-32 max-h-18 line-clamp-2">
                                    Nasi Goreng Telur Putih Rasanya enak sekali</p>
                            </div>
                            <div>
                                <p class="font-medium">x5</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-center">
                            <figure class="relative">
                                <svg class="absolute top-2 right-3 transform translate-x-2/3 -translate-y-2/3 w-7 text-white rounded-full bg-[#4DAC3F]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill="white" d="m14.83 4.89l1.34.94l-5.81 8.38H9.02L5.78 9.67l1.34-1.25l2.57 2.4z" />
                                </svg>
                                <img src="{{ asset('img/Makanan.jpg') }}"
                                class="rounded-lg object-cover w-24 h-16" alt="">
                            </figure>
                            <div class="mt-2 text-center">
                                <p class="font-medium max-w-32 max-h-18 line-clamp-2">
                                    Nasi Goreng Telur Putih Rasanya enak sekali</p>
                            </div>
                            <div>
                                <p class="font-medium">x5</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-center">
                            <figure class="relative">
                                <svg  class="absolute z-10 top-2 right-3 transform translate-x-2/3 -translate-y-2/3 w-7 text-white rounded-full bg-purpleRed" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                    <path fill="white" d="m203.63 62.65l13.25-14.58a12 12 0 0 0-17.76-16.14l-13.24 14.56A100 100 0 0 0 52.37 193.35l-13.25 14.58a12 12 0 1 0 17.76 16.14l13.24-14.56A100 100 0 0 0 203.63 62.65M52 128a75.94 75.94 0 0 1 117.58-63.57l-100.91 111A75.6 75.6 0 0 1 52 128m76 76a75.52 75.52 0 0 1-41.58-12.43l100.91-111A75.94 75.94 0 0 1 128 204" />
                                </svg>
                                <img src="{{ asset('img/Makanan.jpg') }}"~
                                class="rounded-lg object-cover w-24 h-16 filter brightness-75% grayscale" alt="">
                            </figure>
                            <div class="mt-2 text-center">
                                <p class="font-medium max-w-32 max-h-18 line-clamp-2">
                                    Nasi Goreng Telur Putih Rasanya enak sekali</p>
                            </div>
                            <div>
                                <p class="font-medium">x5</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-center">
                            <figure class="relative">
                                <img src="{{ asset('img/Makanan.jpg') }}"
                                class="rounded-lg object-cover w-24 h-16" alt="">
                            </figure>
                            <div class="mt-2 text-center">
                                <p class="font-medium max-w-32 max-h-18 line-clamp-2">
                                    Nasi Goreng Telur Putih Rasanya enak sekali</p>
                            </div>
                            <div>
                                <p class="font-medium">x5</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 flex flex-row items-center justify-between">
                        <div>
                            <p class="font-medium">Catatan : Ada</p>
                        </div>
                        <div>
                            <a wire:navigate href="" class="bg-white rounded-lg border px-6 py-1 font-semibold">Lihat</a>
                        </div>
                    </div>
            </div>
            <div class="bg-secondaryColor rounded-xl py-4 px-8">
                    <p class="text-center font-semibold">ID Pesanan: #1234567</p>
                    <div class="flex flex-row justify-between">
                        <div class="flex flex-col font-semibold">
                            <p>Nomor Meja : 02</p>
                            <p>Pesanan Selesai : 3 / 6</p>
                        </div>
                        <div class="flex items-center">
                            <p class="font-semibold">Waiter : Tatang Subarjo</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap justify-around p-2 mt-2 ">
                        <div class="flex flex-col items-center flex-shrink-0">
                            <figure class="relative">
                                <svg class="absolute top-2 right-3 transform translate-x-2/3 -translate-y-2/3 w-7 text-white rounded-full bg-[#4DAC3F]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill="white" d="m14.83 4.89l1.34.94l-5.81 8.38H9.02L5.78 9.67l1.34-1.25l2.57 2.4z" />
                                </svg>
                                <img src="{{ asset('img/Makanan.jpg') }}"
                                class="rounded-lg object-cover w-24 h-16" alt="">
                            </figure>
                            <div class="mt-2 text-center">
                                <p class="font-medium max-w-32 max-h-18 line-clamp-2">
                                    Nasi Goreng Telur Putih Rasanya enak sekali</p>
                            </div>
                            <div>
                                <p class="font-medium">x5</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-center">
                            <figure class="relative">
                                <svg class="absolute top-2 right-3 transform translate-x-2/3 -translate-y-2/3 w-7 text-white rounded-full bg-[#4DAC3F]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill="white" d="m14.83 4.89l1.34.94l-5.81 8.38H9.02L5.78 9.67l1.34-1.25l2.57 2.4z" />
                                </svg>
                                <img src="{{ asset('img/Makanan.jpg') }}"
                                class="rounded-lg object-cover w-24 h-16" alt="">
                            </figure>
                            <div class="mt-2 text-center">
                                <p class="font-medium max-w-32 max-h-18 line-clamp-2">
                                    Nasi Goreng Telur Putih Rasanya enak sekali</p>
                            </div>
                            <div>
                                <p class="font-medium">x5</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-center">
                            <figure class="relative">
                                <svg class="absolute top-2 right-3 transform translate-x-2/3 -translate-y-2/3 w-7 text-white rounded-full bg-[#4DAC3F]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill="white" d="m14.83 4.89l1.34.94l-5.81 8.38H9.02L5.78 9.67l1.34-1.25l2.57 2.4z" />
                                </svg>
                                <img src="{{ asset('img/Makanan.jpg') }}"
                                class="rounded-lg object-cover w-24 h-16" alt="">
                            </figure>
                            <div class="mt-2 text-center">
                                <p class="font-medium max-w-32 max-h-18 line-clamp-2">
                                    Nasi Goreng Telur Putih Rasanya enak sekali</p>
                            </div>
                            <div>
                                <p class="font-medium">x5</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-center">
                            <figure class="relative">
                                <svg  class="absolute z-10 top-2 right-3 transform translate-x-2/3 -translate-y-2/3 w-7 text-white rounded-full bg-purpleRed" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                    <path fill="white" d="m203.63 62.65l13.25-14.58a12 12 0 0 0-17.76-16.14l-13.24 14.56A100 100 0 0 0 52.37 193.35l-13.25 14.58a12 12 0 1 0 17.76 16.14l13.24-14.56A100 100 0 0 0 203.63 62.65M52 128a75.94 75.94 0 0 1 117.58-63.57l-100.91 111A75.6 75.6 0 0 1 52 128m76 76a75.52 75.52 0 0 1-41.58-12.43l100.91-111A75.94 75.94 0 0 1 128 204" />
                                </svg>
                                <img src="{{ asset('img/Makanan.jpg') }}"~
                                class="rounded-lg object-cover w-24 h-16 filter brightness-75% grayscale" alt="">
                            </figure>
                            <div class="mt-2 text-center">
                                <p class="font-medium max-w-32 max-h-18 line-clamp-2">
                                    Nasi Goreng Telur Putih Rasanya enak sekali</p>
                            </div>
                            <div>
                                <p class="font-medium">x5</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-center">
                            <figure class="relative">
                                <img src="{{ asset('img/Makanan.jpg') }}"
                                class="rounded-lg object-cover w-24 h-16" alt="">
                            </figure>
                            <div class="mt-2 text-center">
                                <p class="font-medium max-w-32 max-h-18 line-clamp-2">
                                    Nasi Goreng Telur Putih Rasanya enak sekali</p>
                            </div>
                            <div>
                                <p class="font-medium">x5</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 flex flex-row items-center justify-between">
                        <div>
                            <p class="font-medium">Catatan : Ada</p>
                        </div>
                        <div>
                            <a wire:navigate href="" class="bg-white rounded-lg border px-6 py-1 font-semibold">Lihat</a>
                        </div>
                    </div>
            </div>
            <div class="bg-secondaryColor rounded-xl py-4 px-8">
                    <p class="text-center font-semibold">ID Pesanan: #1234567</p>
                    <div class="flex flex-row justify-between">
                        <div class="flex flex-col font-semibold">
                            <p>Nomor Meja : 02</p>
                            <p>Pesanan Selesai : 3 / 6</p>
                        </div>
                        <div class="flex items-center">
                            <p class="font-semibold">Waiter : Tatang Subarjo</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap justify-around p-2 mt-2 ">
                        <div class="flex flex-col items-center flex-shrink-0">
                            <figure class="relative">
                                <svg class="absolute top-2 right-3 transform translate-x-2/3 -translate-y-2/3 w-7 text-white rounded-full bg-[#4DAC3F]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill="white" d="m14.83 4.89l1.34.94l-5.81 8.38H9.02L5.78 9.67l1.34-1.25l2.57 2.4z" />
                                </svg>
                                <img src="{{ asset('img/Makanan.jpg') }}"
                                class="rounded-lg object-cover w-24 h-16" alt="">
                            </figure>
                            <div class="mt-2 text-center">
                                <p class="font-medium max-w-32 max-h-18 line-clamp-2">
                                    Nasi Goreng Telur Putih Rasanya enak sekali</p>
                            </div>
                            <div>
                                <p class="font-medium">x5</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-center">
                            <figure class="relative">
                                <svg class="absolute top-2 right-3 transform translate-x-2/3 -translate-y-2/3 w-7 text-white rounded-full bg-[#4DAC3F]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill="white" d="m14.83 4.89l1.34.94l-5.81 8.38H9.02L5.78 9.67l1.34-1.25l2.57 2.4z" />
                                </svg>
                                <img src="{{ asset('img/Makanan.jpg') }}"
                                class="rounded-lg object-cover w-24 h-16" alt="">
                            </figure>
                            <div class="mt-2 text-center">
                                <p class="font-medium max-w-32 max-h-18 line-clamp-2">
                                    Nasi Goreng Telur Putih Rasanya enak sekali</p>
                            </div>
                            <div>
                                <p class="font-medium">x5</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-center">
                            <figure class="relative">
                                <svg class="absolute top-2 right-3 transform translate-x-2/3 -translate-y-2/3 w-7 text-white rounded-full bg-[#4DAC3F]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill="white" d="m14.83 4.89l1.34.94l-5.81 8.38H9.02L5.78 9.67l1.34-1.25l2.57 2.4z" />
                                </svg>
                                <img src="{{ asset('img/Makanan.jpg') }}"
                                class="rounded-lg object-cover w-24 h-16" alt="">
                            </figure>
                            <div class="mt-2 text-center">
                                <p class="font-medium max-w-32 max-h-18 line-clamp-2">
                                    Nasi Goreng Telur Putih Rasanya enak sekali</p>
                            </div>
                            <div>
                                <p class="font-medium">x5</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-center">
                            <figure class="relative">
                                <svg  class="absolute z-10 top-2 right-3 transform translate-x-2/3 -translate-y-2/3 w-7 text-white rounded-full bg-purpleRed" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                    <path fill="white" d="m203.63 62.65l13.25-14.58a12 12 0 0 0-17.76-16.14l-13.24 14.56A100 100 0 0 0 52.37 193.35l-13.25 14.58a12 12 0 1 0 17.76 16.14l13.24-14.56A100 100 0 0 0 203.63 62.65M52 128a75.94 75.94 0 0 1 117.58-63.57l-100.91 111A75.6 75.6 0 0 1 52 128m76 76a75.52 75.52 0 0 1-41.58-12.43l100.91-111A75.94 75.94 0 0 1 128 204" />
                                </svg>
                                <img src="{{ asset('img/Makanan.jpg') }}"~
                                class="rounded-lg object-cover w-24 h-16 filter brightness-75% grayscale" alt="">
                            </figure>
                            <div class="mt-2 text-center">
                                <p class="font-medium max-w-32 max-h-18 line-clamp-2">
                                    Nasi Goreng Telur Putih Rasanya enak sekali</p>
                            </div>
                            <div>
                                <p class="font-medium">x5</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-center">
                            <figure class="relative">
                                <img src="{{ asset('img/Makanan.jpg') }}"
                                class="rounded-lg object-cover w-24 h-16" alt="">
                            </figure>
                            <div class="mt-2 text-center">
                                <p class="font-medium max-w-32 max-h-18 line-clamp-2">
                                    Nasi Goreng Telur Putih Rasanya enak sekali</p>
                            </div>
                            <div>
                                <p class="font-medium">x5</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 flex flex-row items-center justify-between">
                        <div>
                            <p class="font-medium">Catatan : Ada</p>
                        </div>
                        <div>
                            <a wire:navigate href="" class="bg-white rounded-lg border px-6 py-1 font-semibold">Lihat</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>