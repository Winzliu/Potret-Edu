<div class="xl:mt-6 mt-8 w-[95%] xl:w-full">
    <div class="flex justify-between items-start pb-5 ">
        <h1 class="text-2xl font-bold">Riwayat Pesanan</h1>
        <div class="dropdown dropdown-end">
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
        </div>
    </div>
    <div class="flex flex-col w-full">
        <div class="overflow-x-auto rounded-lg shadow-[0_0_5px_0_rgba(0,0,0,0.1)]">
            <table class="table ">
                <!-- head -->
                <thead>
                    <tr class="text-base text-black bg-fourthColor">
                        <th scope="col" class="px-6 py-3 text-center cursor-default">No</th>
                        <th scope="col" class="px-6 py-3 text-center cursor-default">ID Pesanan</th>
                        <th scope="col" class="px-6 py-3 text-center cursor-default">Total Harga</th>
                        <th scope="col" class="px-6 py-3 text-center cursor-default">Meja</th>
                        <th scope="col" class="px-6 py-3 text-center cursor-default">Metode Pembayaran</th>
                        <th scope="col" class="px-6 py-3 text-center cursor-default">Tanggal</th>
                        <th scope="col" class="px-6 py-3 text-center cursor-default">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <tr class="hover:bg-tertiaryColor transition-all duration-300 ">
                        <th class="whitespace-nowrap text-center cursor-default">1</th>
                        <td class="whitespace-nowrap text-center cursor-default">4587198751</td>
                        <td class="whitespace-nowrap text-center cursor-default">Rp 500.000</td>
                        <td class="whitespace-nowrap text-center cursor-default">12</td>
                        <td class="whitespace-nowrap text-center cursor-default">Cash</td>
                        <td class="whitespace-nowrap text-center cursor-default">23-03-2024</td>
                        <td class="whitespace-nowrap text-center cursor-default flex justify-center">
                            <a href="/admin/menu/1" wire-navigate
                                class="flex items-center justify-center w-3/4 h-full hover:bg-fourthColor rounded-md transition-all duration-300 ">
                                <ion-icon name="information-circle" class="text-xl"></ion-icon>
                            </a>
                        </td>
                    </tr>
                    @for($i=0; $i < 6;$i++)
                    <!-- row 2 -->
                    <tr class="hover:bg-tertiaryColor transition-all duration-300 even:bg-base-300">
                        <th class="whitespace-nowrap text-center cursor-default">2</th>
                        <td class="whitespace-nowrap text-center cursor-default">4587198751</td>
                        <td class="whitespace-nowrap text-center cursor-default">Rp 500.000</td>
                        <td class="whitespace-nowrap text-center cursor-default">12</td>
                        <td class="whitespace-nowrap text-center cursor-default">Cash</td>
                        <td class="whitespace-nowrap text-center cursor-default">23-03-2024</td>
                        <td class="whitespace-nowrap text-center cursor-default flex justify-center">
                            <a href="/admin/menu/1" wire-navigate
                                class="flex items-center justify-center w-3/4 h-full hover:bg-fourthColor rounded-md transition-all duration-300 ">
                                <ion-icon name="information-circle" class="text-xl"></ion-icon>
                            </a>
                        </td>
                    </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex justify-end gap-10 mt-5">
        <button class="flex items-center px-6 h-12 y-2 font-semibold gap-1 bg-green-600 text-white rounded-lg">
            <p class="">Print</p>
            <ion-icon name="print-outline" class="text-xl">
            </ion-icon>
        </button>
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