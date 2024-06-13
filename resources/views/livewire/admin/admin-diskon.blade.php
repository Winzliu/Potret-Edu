<div class="xl:mt-6 mt-8 w-[95%] xl:w-full">
    {{-- ALERT HAPUS --}}
    @if (session()->has('error'))
    <div role="alert"
        class="text-white font-medium alert alert-error rounded-lg absolute z-50 top-2 w-auto left-1/2 -translate-x-1/2 opacity-0 animate-notif unselectable">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('error') }}</span>
    </div>
    @elseif (session()->has('success'))
    <div role="alert"
        class="text-white font-medium alert alert-success rounded-lg absolute z-50 top-2 w-auto left-1/2 -translate-x-1/2 opacity-0 animate-notif unselectable">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('success') }}</span>
    </div>
    @endif
    {{-- AKHIR ALERT HAPUS --}}
    <div class="flex justify-between items-start pb-5">
        <h1 class="text-2xl font-bold">Diskon</h1>
        <div class="flex gap-5">
            <a href="/admin/tambah-diskon" wire:navigate data-tip="Tambah Diskon baru"
                class="tooltip tooltip-bottom bg-purpleRed hover:bg-red-700 px-4 py-1 flex rounded-md text-white items-center justify-center">
                <i class="icon-[ic--round-add] text-2xl font-mediumd text-white px-4"></i>
                <p class="font-medium pt-[2px]">Tambah</p>
            </a>
            {{-- Search Bar --}}
            <label data-tip="Cari diskon berdasarkan nama"
                class="tooltip tooltip-bottom input input-bordered flex items-center gap-2 rounded-lg h-9 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">
                <input wire:model="search" wire:keydown="searchDiskon" type="text" class="grow text-xs border-0 input"
                    placeholder="Cari Diskon" />
            </label>
            {{-- Akhir Search Bar --}}
        </div>
    </div>
    <div class="flex flex-col w-full">
        <div
            class="xl:overflow-x-hidden overflow-x-auto scrollbar-hidden rounded-lg shadow-[0_0_5px_0_rgba(0,0,0,0.1)]">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr class="text-base text-black bg-fourthColor">
                        <th scope="col" class="px-6 py-3 text-center cursor-default">No</th>
                        <th scope="col" class="px-6 py-3 text-center cursor-default">Nama Diskon</th>
                        <th scope="col" class="px-6 py-3 text-center cursor-default">Persentase</th>
                        <th scope="col" class="px-6 py-3 text-center cursor-default">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    {{-- @dd($discounts) --}}
                    @foreach($discounts as $discount)
                    <tr class="hover:bg-fourthColor/40  Color transition-all duration-300 even:bg-slate-200">
                        <th class="whitespace-nowrap text-center cursor-default font-medium">
                            {{ ($discounts->currentPage() - 1) * $discounts->perPage() + $loop->iteration }}
                        </th>
                        <th class="max-w-10 whitespace-nowrap text-center cursor-default truncate font-medium">{{
                            $discount->discount_name }}</th>
                        <th class="max-w-10 whitespace-nowrap text-center cursor-default truncate font-medium">{{
                            $discount->discount_rate }}</th>
                        <th class="whitespace-nowrap">
                            <div class="text-center flex justify-center gap-2">
                                <a href="/admin/edit-diskon/{{ $discount->discount_id }}" wire-navigate
                                    data-tip="Edit Diskon"
                                    class="tooltip bg-mainColor hover:bg-yellow-500 flex items-center justify-center px-3 py-2 rounded-md transition-all duration-300 ">
                                    <i class="icon-[tabler--edit] rounded-md text-white text-xl">H</i>
                                </a>
                                <button wire:click="modal_hapus('{{ $discount->discount_id }}')" data-tip="Hapus Diskon"
                                    class="tooltip bg-red-500 flex items-center justify-center px-3 py-2 h-full hover:bg-red-700 rounded-md transition-all duration-300">
                                    <i class="icon-[typcn--trash] text-white text-xl"></i>
                                </button>
                            </div>
                            {{-- MODAL HAPUS --}}
                            @if($modalHapus)
                            <div
                                class="fixed top-0 left-0 w-full h-full bg-slate-500 bg-opacity-10 flex justify-center items-center">
                                <div
                                    class="bg-background px-12 py-10 rounded-xl shadow-lg text-center border-4 border-purpleRed font-semibold">
                                    <p>Apakah Anda yakin ingin menghapus discount ini?</p>
                                    <div class="mt-4 flex flex-row justify-center gap-8 font-medium">
                                        <button wire:click="$set('modalHapus', false)"
                                            class="bg-red-500 px-8 py-2 text-white rounded-md">Tidak</button>
                                        <button wire:click="hapusDiskon"
                                            class="bg-green-500 text-white px-10 py-2 rounded-md mr-2">Ya</button>
                                    </div>
                                </div>
                            </div>
                            @endif
                            {{-- AKHIR MODAL HAPUS --}}
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- loading --}}
    <dialog wire:loading wire:target="hapusDiskon" wire:loading.attr="open" class="modal bg-black/30">
        <span
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 loading loading-spinner loading-lg"></span>
    </dialog>
    {{-- akhir loading --}}
    {{-- pagination --}}
    <div class="flex justify-end items-center gap-10">
        {{ $discounts->links('livewire.admin.component.admin-pagination-link') }}
    </div>
    {{-- akhir pagination --}}
</div>