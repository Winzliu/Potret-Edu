<div class="">
    {{-- search --}}
    @livewire('waiter.component.search-menu')
    {{-- akhir search --}}

    {{-- katergori makanan --}}
    @livewire('waiter.component.kategori-makanan', ['active' => $active, 'categories' => $categories])
    {{-- akhir kategori makanan --}}
    {{-- card makanan --}}
    @livewire('waiter.component.card-menu-makanan', ['categoryId' => $category_id])
    {{-- akhir card makanan --}}

    {{-- sidebar kanan --}}
    <div class="drawer drawer-end">
        <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content fixed end-7 bottom-1/2 ">
            <!-- Page content here -->
            <label for="my-drawer-4" class="drawer-button rounded-full">
                <div class="fixed end-0 top-0 h-screen w-14 bg-white shadow-[0_0_65px_3px_rgba(0,0,0,0.2)]"></div>
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 192 512"
                    class="text-3xl absolute -end-3 pe-4 py-4 bottom-1/2 translate-y-1/2 bg-white rounded-full"
                    width="80px" height="80px" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M192 127.338v257.324c0 17.818-21.543 26.741-34.142 14.142L29.196 270.142c-7.81-7.81-7.81-20.474 0-28.284l128.662-128.662c12.599-12.6 34.142-3.676 34.142 14.142z">
                    </path>
                </svg>
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
                    <div class="card card-side px-5 py-5 bg-secondaryColor shadow-xl flex-col mb-5">
                        <div class="flex">
                            <div class="w-10/12">
                                <div class="flex">
                                    <figure><img src="img/makanan.jpg" class="mask mask-squircle w-14 me-4"
                                            alt="Movie" />
                                    </figure>
                                    <div class="self-center w-10/12">
                                        <p class="font-semibold mb-2">Nasi Goreng Telur Putih</p>
                                        <div class="flex me-2 h-7 justify-between">
                                            <div class="h-5">
                                                <button
                                                    class="bg-red-500 rounded-full w-7 h-7 font-bold text-lg">-</button>
                                                <input type="text" name="" id=""
                                                    class="mx-1 w-5 h-7 text-center p-0 border-0 bg-transparent"
                                                    value="2" disabled>
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
                                <svg stroke="currentColor" class="text-red-500 ps-2" fill="currentColor"
                                    stroke-width="0" viewBox="0 0 448 512" height="35px" width="35px"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z">
                                    </path>
                                </svg>
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
    </div>
</div