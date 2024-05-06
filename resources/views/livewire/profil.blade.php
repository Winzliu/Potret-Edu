<div class="mt-20">
    <a href="/kitchen" wire:navigate class="flex items-center gap-2 font-bold">
        <ion-icon name="arrow-back-outline"></ion-icon>
        <p>Kembali</p>
    </a>

    <!-- Badge Berhasil -->
    <div class="hidden flex justify-center">
        <span class=" mt-4 inline-block bg-greenConfirm text-white font-semibold px-8 py-1 rounded-md">Berhasil mengubah ukuran font!</span>
    </div>

    <!-- Profil -->
    <div class="flex items-center gap-5 mt-4">
        <p class="text-3xl font-bold">Profil</p>
    </div>
    <div class="divider"></div>
    <div class="flex items-center">
        <div class="flex justify-center w-1/3">
            <img src="{{ asset('img/Makanan.jpg') }}" alt="" class="rounded-lg w-52">
        </div>
        <div class="flex flex-col w-2/3 font-medium gap-6 mx-12">
            <div class="flex gap-2 font-medium">
                <p class="font-semibold">Nama:</p>
                <p>Tatang Subarjo</p>
            </div>
            <div class="flex gap-2">
                <p class="font-semibold">Alamat: </p>
                <p>Jalan Setiabudi</p>
            </div>
            <div class="flex gap-2">
                <p class="font-semibold">Posisi: </p>
                <p>Kasir</p>
            </div>
            <div class="flex flex-col max-w-[90%]">
                <p class="font-semibold">Deskripsi: </p>
                <p class="text-justify overflow-ellipsis line-clamp-3">
                    Melayani Pembayaran Pelanggan dan menangani pesanan take away selain itu ini adalah kalimat tambahan
                </p>
            </div>
        </div>      
    </div>

    <div class="divider"></div>
</div>