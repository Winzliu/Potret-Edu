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
    <div class="flex flex-wrap gap-4 justify-evenly xl:justify-start">
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
            <div class="menu p-4 w-96 min-h-full bg-base-200 text-base-content">
                <img src="{{ asset('img/logo.png') }}" class="w-12" alt="">
            </div>
        </div>
    </div>
    {{-- akhir sidebar kanan --}}
    <a wire:navigate href="/test">Back</a>
</div>