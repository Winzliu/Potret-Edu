<div class="xl:mt-6 mt-8 w-[95%] xl:w-full">
    <div class="flex justify-between items-start pb-5 items-center">
        <h1 class="text-2xl font-bold">Riwayat Pesanan</h1>
        <a href="/admin/tambah-menu" wire:navigate
        class="bg-purpleRed px-4 py-1 flex rounded-md text-white items-center justify-center">
            <i class="icon-[ic--round-add] text-2xl font-mediumd text-white px-4"></i>
            <p class="font-medium pt-[2px]">Tambah Menu</p>
        </a>
        {{-- <div class="dropdown dropdown-end">
            <div class="flex items-center gap-4">
                <p class="font-semibold">Filter Berdasarkan Bulan: </p>
                <div tabindex="0" role="button"
                    class="px-7 py-1 bg-white border-2 border-black font-bold text-black rounded-lg">Januari
                </div>
            </div>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-lg w-52">
                <li><a>Februari</a></li>
                <li><a>Maret</a></li>
            </ul>
        </div> --}}
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
                    @for($i=0; $i < 6;$i++)
                    <!-- row 1 -->
                    <tr class="hover:bg-tertiaryColor transition-all duration-300 ">
                        <th class="whitespace-nowrap text-center cursor-default">{{ $i+1 }}</th>
                        <th class="whitespace-nowrap text-center cursor-default">{{ 'Budi ' . ($i+1) }}</th>
                        <th class="whitespace-nowrap text-center cursor-default flex justify-center">
                            <img src="{{ asset('img/Makanan.jpg') }}" alt='menu' class="w-8 rounded-full">
                        </th>
                        <td class="whitespace-nowrap text-center cursor-default">{{ 'Rp' . ($i+5).'00.000' }}</td>
                        <td class="whitespace-nowrap text-center cursor-default">{{ 'Ini adalah deskripsi' . ($i+1) }}</td>
                        <td class="whitespace-nowrap text-center cursor-default flex justify-center w-full gap-2">
                            <a href="/admin/edit-menu/1" wire-navigate
                                class="bg-mainColor flex items-center justify-center h-full px-2  hover:bg-fourthColor rounded-md transition-all duration-300 ">
                                <i class="icon-[tabler--edit] rounded-md text-white text-xl">H</i>
                            </a>
                            <form action="/admin/hapus-menu/1" method="post" wire-navigate>
                                @csrf
                                <button type="button" onclick="modal_submit.showModal()" 
                                    class="flex bg-red-500 flex items-center justify-center px-2 h-full hover:bg-fourthColor rounded-md transition-all duration-300">
                                    <i class="icon-[typcn--trash] text-white text-xl"></i>
                                </button>
                                    <dialog id="modal_submit" class="modal">
                                            <div class="modal-box bg-background">
                                            <div class="flex flex-col bg-background items-center">
                                                {{-- <div class="border-4 border-greenConfirm p-8 rounded-full">
                                                    <i class='icon-[ic--outline-question-mark] text-6xl text-greenConfirm'></i>
                                                </div> --}}
                                                <h3 class="font-poppins text-[30px] md:text-[50px] max-sm:text-[30px]">Simpan?</h3>
                                                <p class="font-poppins text-[18px] md:text-[20px] max-sm:text-[18px] text-center mb-5">
                                                    Apakah anda yakin ingin menghapus menu ini?.<br>Tindakan tidak dapat dikembalikan.</p>
                                                <div class="flex flex-row-reverse justify-center gap-4 w-full">
                                                    <button type="submit"
                                                        class="flex justify-center items-center w-full text-xl font-poppins bg-greenConfirm text-center text-white rounded-md h-12">
                                                        Ya
                                                    </button>
                            </form>
                                                <form method="dialog" class="w-full">
                                                    <button
                                                        class="w-full text-[20px] font-poppins h-12 rounded-md  bg-red-500 text-white text-center">
                                                        Tidak
                                                    </button>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                        <form method="dialog" class="modal-backdrop">
                                            <button>close</button>
                                        </form>
                                    </dialog>
                        </td>
                    </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex justify-end gap-10 mt-5">
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