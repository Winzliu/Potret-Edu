<div class="">
    {{-- katergori makanan --}}
    <div class="flex gap-5 my-5 flex-wrap">
        <button class="rounded-lg min-w-24 shadow-md bg-mainColor px-3 py-1 font-semibold text-lg">Nasi</button>
        <button
            class="rounded-lg min-w-24 hover:bg-gray-200 bg-white px-3 py-1 font-semibold text-lg text-mainColor shadow-md">Mie</button>
        <button
            class="rounded-lg min-w-24 hover:bg-gray-200 bg-white px-3 py-1 font-semibold text-lg text-mainColor shadow-md">Cemilan</button>
        <button
            class="rounded-lg min-w-24 hover:bg-gray-200 bg-white px-3 py-1 font-semibold text-lg text-mainColor shadow-md">Penutup</button>
        <button
            class="rounded-lg min-w-24 hover:bg-gray-200 bg-white px-3 py-1 font-semibold text-lg text-mainColor shadow-md">Minuman</button>
        <button
            class="rounded-lg min-w-24 hover:bg-gray-200 bg-white px-3 py-1 font-semibold text-lg text-mainColor shadow-md">Paket</button>
        <button>
    </div>
    {{-- akhir kategori makanan --}}

    {{-- card makanan --}}
    <div class="flex flex-wrap gap-4 justify-start">
        {{-- card 1 --}}
        <div class="card min-w-1/4 px-4 py-4 bg-base-100 shadow-[0_0_15px_2px_rgba(0,0,0,0.1)]">
            <figure class="mb-3 cursor-pointer" onclick="my_modal_1.showModal()">
                <img src="{{ asset('img/makanan.jpg') }}" alt="Shoes" class="rounded-xl h-36 w-full object-cover" />
            </figure>
            <div class="items-center text-left">
                <h2 class="text-lg font-bold">Nasi Goreng Telur Putih</h2>
                <div class="flex items-end justify-between mt-2">
                    <p class="text-xs w-32">Nasi, Telur, Kerupuk, Timun , dkk</p>
                    <button class="bg-mainColor w-10 h-10 rounded-full font-bold text-2xl">
                        +
                    </button>
                </div>
            </div>
        </div>
        {{-- modal 1 --}}
        <dialog id="my_modal_1" class="modal">
            <div class="modal-box">
                <h3 class="font-bold text-2xl text-center">Nasi Goreng Telur Putih</h3>
                <div class="flex justify-evenly">
                    <div class="w-32">
                        <p class="pt-4 font-semibold">Bahan :</p>
                        <ul class="list-disc text-wrap">
                            <li>Nasi</li>
                            <li>Telur</li>
                            <li>Kerupuk</li>
                            <li>Timun</li>
                            <li>Dan lain-lainasdfsadfsadfsa fsdafasdfasdfsafsaf</li>
                        </ul>
                    </div>
                    <div class="w-32 ">
                        <p class="pt-4 font-semibold">Alergi :</p>
                        <ul class="list-disc text-wrap">
                            <li>Telur</li>
                            <li>Bawang</li>
                        </ul>
                    </div>
                </div>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>
        {{-- akhir modal 1 --}}
        {{-- akhir card 1 --}}
        {{-- card 2 --}}
        <div class="card min-w-1/4 px-4 py-4 bg-base-100 shadow-[0_0_15px_3px_rgba(0,0,0,0.02)]">
            <figure class="mb-3">
                <img src="{{ asset('img/makanan.jpg') }}" alt="Shoes" class="rounded-xl h-36 w-full object-cover" />
            </figure>
            <div class="items-center text-left">
                <h2 class="text-lg font-bold">Nasi Goreng Telur Putih</h2>
                <div class="flex items-end justify-between mt-2">
                    <p class="text-xs w-32">Nasi, Telur, Kerupuk, Timun , dkk</p>
                    <button class="bg-mainColor w-10 h-10 rounded-full font-bold text-2xl">
                        +
                    </button>
                </div>
            </div>
        </div>
        {{-- akhir card 2 --}}
        {{-- card 3 --}}
        <div class="card min-w-1/4 px-4 py-4 bg-base-100 shadow-[0_0_15px_2px_rgba(0,0,0,0.1)]">
            <figure class="mb-3">
                <img src="{{ asset('img/makanan.jpg') }}" alt="Shoes" class="rounded-xl h-36 w-full object-cover" />
            </figure>
            <div class="items-center text-left">
                <h2 class="text-lg font-bold">Nasi Goreng Telur Putih</h2>
                <div class="flex items-end justify-between mt-2">
                    <p class="text-xs w-32">Nasi, Telur, Kerupuk, Timun , dkk</p>
                    <button class="bg-mainColor w-10 h-10 rounded-full font-bold text-2xl">
                        +
                    </button>
                </div>
            </div>
        </div>
        {{-- akhir card 3 --}}
        {{-- card 4 --}}
        <div class="card min-w-1/4 px-4 py-4 bg-base-100 shadow-[0_0_15px_2px_rgba(0,0,0,0.1)]">
            <figure class="mb-3">
                <img src="{{ asset('img/makanan.jpg') }}" alt="Shoes" class="rounded-xl h-36 w-full object-cover" />
            </figure>
            <div class="items-center text-left">
                <h2 class="text-lg font-bold">Nasi Goreng Telur Putih</h2>
                <div class="flex items-end justify-between mt-2">
                    <p class="text-xs w-32">Nasi, Telur, Kerupuk, Timun , dkk</p>
                    <button class="bg-mainColor w-10 h-10 rounded-full font-bold text-2xl">
                        +
                    </button>
                </div>
            </div>
        </div>
        {{-- akhir card 4 --}}
        {{-- card 5 --}}
        <div class="card min-w-1/4 px-4 py-4 bg-base-100 shadow-[0_0_15px_2px_rgba(0,0,0,0.1)]">
            <figure class="mb-3">
                <img src="{{ asset('img/makanan.jpg') }}" alt="Shoes" class="rounded-xl h-36 w-full object-cover" />
            </figure>
            <div class="items-center text-left">
                <h2 class="text-lg font-bold">Nasi Goreng Telur Putih</h2>
                <div class="flex items-end justify-between mt-2">
                    <p class="text-xs w-32">Nasi, Telur, Kerupuk, Timun , dkk</p>
                    <button class="bg-mainColor w-10 h-10 rounded-full font-bold text-2xl">
                        +
                    </button>
                </div>
            </div>
        </div>
        {{-- akhir card 5 --}}
    </div>
    {{-- akhir card makanan --}}

    {{-- sidebar kanan --}}
    <div class="drawer drawer-end">
        <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content fixed end-7 bottom-1/2 ">
            <!-- Page content here -->
            <label for="my-drawer-4" class="drawer-button rounded-full">
                <div class="fixed end-0 top-0 h-screen w-14 bg-white shadow-[0_0_65px_3px_rgba(0,0,0,0.2)]"></div>
                <ion-icon name="caret-back" class="text-3xl absolute -end-2 bottom-1/2 bg-white rounded-full p-5 ">
                </ion-icon>
            </label>
        </div>
        <div class="drawer-side">
            <label for="my-drawer-4" aria-label="close sidebar" class="drawer-overlay"></label>
            {{-- isi konten --}}
            <div class="menu px-10 py-5 xl:w-5/12 w-1/2 min-h-full bg-base-200 text-base-content ">
                <p class="xl:text-3xl text-2xl font-bold mb-5">Detail Pesanan</p>
                {{-- kumpulan card --}}
                <div class="overflow-y-scroll h-3/5 fixed w-full left-0 top-14 px-10 py-5">
                    {{-- card --}}
                    <div class="card card-side px-5 py-5 bg-tertiaryColor shadow-xl flex-col mb-5">
                        <div class="flex">
                            <div class="w-10/12">
                                <div class="flex">
                                    <figure><img src="img/makanan.jpg" class="mask mask-squircle w-14 me-4"
                                            alt="Movie" />
                                    </figure>
                                    <div class="self-center w-10/12">
                                        <p class="font-semibold mb-2">Nasi Goreng Telur Putih</p>
                                        <div class="flex me-2 h-7 justify-between">
                                            <div class="join h-5">
                                                <button
                                                    class="bg-red-500 rounded-full w-7 h-7 font-bold text-lg">-</button>
                                                <input type="text"
                                                    class="join-item mx-1 w-5 h-7 text-center bg-transparent" value="2"
                                                    disabled />
                                                <button
                                                    class="bg-green-600 rounded-full w-7 h-7 font-bold text-lg">+</button>
                                            </div>
                                            <p class="self-center font-semibold text-nowrap">Rp 40.000</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <input type="text" placeholder="Type here"
                                        class="input input-bordered input-primary w-full mb-0 h-8 text-sm mt-3 rounded-full" />
                                </div>
                            </div>
                            <button class="w-1/12 h-12 self-center ms-5">
                                <ion-icon name="trash" class="text-red-500 text-4xl ">
                            </button>
                            </ion-icon>
                        </div>
                    </div>
                    {{-- akhir card --}}
                </div>
                {{-- akhir kumpulan card --}}

                {{-- Buat Pesanan --}}
                <div class="bg-base-200 border-t-2 fixed bottom-0 w-full h-1/3 left-0 px-10 py-3">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text opacity-50">Nomor Meja</span>
                        </div>
                        <input type="text" placeholder="Nomor Meja"
                            class="input input-bordered w-full h-8 text-xs border-black outline-black" />
                        <div class="label">
                        </div>
                    </label>
                    <div class="flex justify-between mb-5">
                        <input type="radio" name="service" id="DineIn" value="DineIn" class="peer/DineIn hidden"
                            checked>
                        <label for="DineIn"
                            class="text-center py-2 hover:bg-slate-300 rounded-lg bg-base-300 w-[48%] shadow-xl  peer-checked/DineIn:bg-mainColor">Dine
                            In</label>
                        <input type="radio" name="service" id="TakeAway" value="TakeAway" class="peer/TakeAway hidden">
                        <label for="TakeAway"
                            class="text-center py-2 hover:bg-slate-300 transition-all duration-300 rounded-lg bg-base-300 w-[48%] shadow-xl peer-checked/TakeAway:bg-mainColor">Take
                            Away</label>
                    </div>
                    <button class="btn bg-mainColor hover:bg-amber-500 w-full shadow-xl">Buat pesanan</button>
                </div>
                {{-- Akhir buat pesanan --}}
            </div>
            {{-- akhir isi konten --}}
        </div>
        {{-- akhir sidebar kanan --}}
        <a wire:navigate href="/test">Back</a>
    </div>