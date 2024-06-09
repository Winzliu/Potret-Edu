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
        <h1 class="text-2xl font-bold">Menu</h1>
        <a href="/admin/tambah-menu" wire:navigate data-tip="Tambah menu baru"
        class="tooltip tooltip-bottom bg-purpleRed hover:bg-red-700 px-4 py-1 flex rounded-md text-white items-center justify-center">
            <i class="icon-[ic--round-add] text-2xl font-mediumd text-white px-4"></i>
            <p class="font-medium pt-[2px]">Tambah Menu</p>
        </a>
    </div>
    <div class="flex flex-col w-full">
        <div class="overflow-x-auto rounded-lg shadow-[0_0_5px_0_rgba(0,0,0,0.1)]">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr class="text-base text-black bg-fourthColor">
                        <th scope="col" class="px-3 py-3 text-center cursor-default">No</th>
                        <th scope="col" class="py-3 text-start cursor-default">Nama</th>
                        <th scope="col" class="py-3 text-center cursor-default">Gambar</th>
                        <th scope="col" class="px-6 py-3 text-center cursor-default">Harga</th>
                        <th scope="col" class="px-6 py-3 text-center cursor-default">Alergen</th>
                        <th scope="col" class="px-6 py-3 text-center cursor-default">Deskripsi</th>
                        <th scope="col" class="px-6 py-3 text-center cursor-default">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $menu)
                    <!-- row 1 -->
                    <tr class="hover:bg-fourthColor/40  Color transition-all duration-300 even:bg-slate-200">
                        <th class="whitespace-nowrap text-center cursor-default font-medium">{{ ($menus->currentPage() - 1) *
                            $menus->perPage() + $loop->iteration }}</th>
                        <th class="max-w-10 whitespace-nowrap text-start cursor-default truncate font-medium">{{ $menu->menu_name }}</th>
                        <th class=" whitespace-nowrap text-center cursor-default flex justify-center">
                            <img src="{{ asset('storage/menu-images/' . $menu->menu_image) }}" alt='menu' class="w-7 rounded-full">
                        </th>
                        <td class="whitespace-nowrap text-center cursor-default">Rp{{number_format($menu->menu_price, 0, ',', '.')}}</td>
                        <td class="max-w-10 whitespace-nowrap text-center cursor-default truncate">{{ $menu->menu_allergen}}</td>
                        <td class="max-w-10 whitespace-nowrap text-center cursor-default truncate">{{ $menu->menu_description}}</td>
                        <td class="whitespace-nowrap ">
                            <div class="text-center flex justify-center gap-2">
                                <a href="/admin/edit-menu/{{ $menu->menu_id }}" wire-navigate data-tip="Edit Menu"
                                    class="tooltip bg-mainColor hover:bg-yellow-500 flex items-center justify-center px-3 py-2 rounded-md transition-all duration-300 ">
                                    <i class="icon-[tabler--edit] rounded-md text-white text-xl">H</i>
                                </a>
                                    <button wire:click="modal_hapus('{{ $menu->menu_id }}')" data-tip="Hapus Menu"
                                        class="tooltip bg-red-500 flex items-center justify-center px-3 py-2 h-full hover:bg-red-700 rounded-md transition-all duration-300">
                                        <i class="icon-[typcn--trash] text-white text-xl"></i>
                                    </button>
                            </div>
                            {{-- MODAL HAPUS  --}}
                                @if($modalHapus)
                                <div class="fixed top-0 left-0 w-full h-full bg-slate-500 bg-opacity-10 flex justify-center items-center">
                                    <div class="bg-background px-12 py-10 rounded-xl shadow-lg text-center border-4 border-purpleRed font-semibold">
                                        <p>Apakah Anda yakin ingin menghapus menu ini?</p>
                                        <div class="mt-4 flex flex-row justify-center gap-8 font-medium">
                                            <button wire:click="$set('modalHapus', false)"
                                                class="bg-red-500 px-8 py-2 text-white rounded-md">Tidak</button>
                                            <button wire:click="hapusMenu" class="bg-green-500 text-white px-10 py-2 rounded-md mr-2">Ya</button>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            {{-- AKHIR MODAL HAPUS --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- pagination --}}
    <div class="flex justify-end items-center gap-10">
        {{ $menus->links('livewire.admin.component.admin-pagination-link') }}
    </div>
    {{-- akhir pagination --}}
</div>