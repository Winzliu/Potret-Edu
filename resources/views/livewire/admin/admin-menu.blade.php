<div class="xl:mt-6 mt-8 w-[95%] md:h-[75vh] xl:w-full overflow-y-scroll scrollbar-hidden">
    <div class="flex justify-between items-start pb-5 items-center">
        <h1 class="text-2xl font-bold">Menu</h1>
        <a href="/admin/tambah-menu" wire:navigate
        class="bg-purpleRed px-4 py-1 flex rounded-md text-white items-center justify-center">
            <i class="icon-[ic--round-add] text-2xl font-mediumd text-white px-4"></i>
            <p class="font-medium pt-[2px]">Tambah Menu</p>
        </a>
    </div>
    <div class="flex flex-col w-full">
        <div class="overflow-x-auto rounded-lg shadow-[0_0_5px_0_rgba(0,0,0,0.1)]">
            <table class="table ">
                <!-- head -->
                <thead>
                    <tr class="text-base text-black bg-fourthColor">
                        <th scope="col" class="px-6 py-3 text-center cursor-default">No</th>
                        <th scope="col" class="px-6 py-3 text-center cursor-default">Nama</th>
                        <th scope="col" class="px-6 py-3 text-center cursor-default">Gambar</th>
                        <th scope="col" class="px-6 py-3 text-center cursor-default">Harga</th>
                        <th scope="col" class="px-6 py-3 text-center cursor-default">Deskripsi</th>
                        <th scope="col" class="px-6 py-3 text-center cursor-default">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach($menus as $menu)
                    <!-- row 1 -->
                    <tr class="hover:bg-tertiaryColor transition-all duration-300 ">
                        <th class="whitespace-nowrap text-center cursor-default">{{ $i+1 }}</th>
                        <th class="whitespace-nowrap text-center cursor-default">{{ $menu->menu_name }}</th>
                        <th class="whitespace-nowrap text-center cursor-default flex justify-center">
                            <img src="{{ asset('img/Makanan.jpg') }}" alt='menu' class="w-8 rounded-full">
                        </th>
                        <td class="whitespace-nowrap text-center cursor-default">Rp{{number_format($menu->menu_price, 0, ',', '.')}}</td>
                        <td class="whitespace-nowrap text-center cursor-default">{{ $menu->menu_description}}</td>
                        <td class="whitespace-nowrap text-center cursor-default flex justify-center w-full gap-2">
                            <a href="/admin/edit-menu/{{ $menu->menu_id }}" wire-navigate
                                class="bg-mainColor flex items-center justify-center h-full px-2  hover:bg-fourthColor rounded-md transition-all duration-300 ">
                                <i class="icon-[tabler--edit] rounded-md text-white text-xl">H</i>
                            </a>
                            <form action="/admin/hapus-menu/{{ $menu->menu_id }}" method="post" wire-navigate>
                                @csrf
                                <button type="button" wire:click="modal_hapus{{ $menu->menu_id }}"
                                    class="flex bg-red-500 flex items-center justify-center px-2 h-full hover:bg-fourthColor rounded-md transition-all duration-300">
                                    <i class="icon-[typcn--trash] text-white text-xl"></i>
                                </button>
                            {{-- MODAL HAPUS  --}}
                                @if($modalHapus)
                                <div class="fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-10 flex justify-center items-center">
                                    <div class="bg-background px-12 py-10 rounded-xl shadow-lg text-center border-4 border-purpleRed font-semibold">
                                        <p>Apakah Anda yakin ingin menghapus menu ini?</p>
                                        <div class="mt-4 flex flex-row justify-center gap-8 font-medium">
                                            <button wire:click="$set('modalHapus', false)"
                                                class="bg-red-500 px-8 py-2 text-white rounded-md">Tidak</button>
                                            <button wire:click="switchKosong" class="bg-green-500 text-white px-10 py-2 rounded-md mr-2">Ya</button>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            {{-- AKHIR MODAL HAPUS --}}
                            </form>

                        </td>
                    </tr>
                        @php
                            $i++
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex justify-end gap-10 mt-5">
        {{-- {{ $menus->links() }} --}}
        <div class="items-end text-right">
            <div class="join shadow-[0_0_30px_0_rgba(0,0,0,0.1)]">
                <button class="join-item btn bg-slate-300 hover:bg-slate-400">«</button>
                <button class="join-item btn">1</button>
                <button class="join-item btn bg-tertiaryColor hover:bg-tertiaryColor">2</button>
                <button class="join-item btn">3</button>
                <button class="join-item btn">4</button>
                <button class="join-item btn bg-slate-300 hover:bg-slate-400">»</button>
            </div>
        </div>
    </div>
</div>