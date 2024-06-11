<div class="mt-10 me-5">
    {{-- Menu --}}
    <div class="flex justify-around">
        {{-- Menu 1 --}}
        <div class="flex gap-4 bg-fourthColor px-8 py-4 rounded-lg items-center">
            <ion-icon name="restaurant" class="text-3xl p-3 bg-base-200 rounded-lg"></ion-icon>
            <div class="text-center w-20">
                <p class="font-bold text-3xl">{{ $totalMenu }}</p>
                <p class="text-base font-semibold">Menu</p>
            </div>
        </div>
        {{-- Akhir Menu 1 --}}
        {{-- Menu 1 --}}
        <div class="flex gap-4 bg-fourthColor px-8 py-4 rounded-lg items-center">
            <ion-icon name="people" class="text-3xl p-3 bg-base-200 rounded-lg"></ion-icon>
            <div class="text-center w-20">
                <p class="font-bold text-3xl">{{ $totalUser }}</p>
                <p class="text-base font-semibold">Karyawan</p>
            </div>
        </div>
        {{-- Akhir Menu 1 --}}
        {{-- Menu 1 --}}
        <div class="flex gap-4 bg-fourthColor px-8 py-4 rounded-lg items-center">
            <ion-icon name="cash" class="text-3xl p-3 bg-base-200 rounded-lg"></ion-icon>
            <div class="text-center w-20">
                <p class="font-bold text-3xl">{{ $totalHistory }}</p>
                <p class="text-base font-semibold">Transaksi</p>
            </div>
        </div>
        {{-- Akhir Menu 1 --}}
    </div>
    {{-- Akhir Menu --}}

    {{-- Section --}}
    <div class="flex mt-7">
        {{-- Menu Terlaris --}}
        <div class="w-1/2 py-3 px-5">
            <p class="font-bold text-xl mb-3">Menu Terlaris</p>
            {{-- Menu --}}
            <div class="h-[70vh] xl:h-[62vh] flex flex-col gap-5 overflow-y-scroll">
                @foreach ($mostOrdered as $terlaris)
                {{-- Menu 1 --}}
                <div class="flex gap-3">
                    {{-- @foreach ($historyDetail as $item) --}}
                    <img src="{{ asset('img/makanan.jpg') }}" class="mask mask-squircle w-[4.5rem] h-[4.5rem]" alt="">
                    {{-- @endforeach --}}
                    <div class="flex flex-col justify-center">
                        <p class="font-bold text-lg">{{ $terlaris->menu_name }}</p>
                        {{-- <p class="font-semibold">Rp {{ number_format($terlaris->price,0, ',', '.') }} </p> --}}
                        <p class="text-xs">Dipesan {{ $terlaris->total_orders }} kali bulan ini</p>
                    </div>
                </div>
                @endforeach
                {{-- Akhir Menu 1 --}}
            </div>
            {{-- Akhir Menu --}}
        </div>
        {{-- Akhir Menu Terlaris --}}
        <div class="divider divider-horizontal"></div>
        {{-- Pesanan Hari Ini --}}
        <div class="w-1/2 py-3 px-5">
            <div class="flex gap-2">
                <p class="font-bold text-xl mb-3">Pesanan Hari Ini</p>
                <p class="bg-tertiaryColor rounded-full h-7 w-7 text-center pt-[0.3rem] text-sm font-bold text-white">{{
                    count($pesanans) }}
                </p>
            </div>
            {{-- Pesanan --}}
            <div class="h-[70vh] xl:h-[62vh] flex flex-col gap-5 overflow-y-scroll">
                @foreach ($pesanans as $history)
                {{-- Pesanan 1 --}}
                <div class="flex justify-between pe-5 items-center">
                    <div class="flex gap-5 items-center">
                        <ion-icon name="storefront" class="bg-tertiaryColor p-3 text-2xl rounded-lg text-white">
                        </ion-icon>
                        <div class="flex flex-col justify-between">
                            @php
                            $j=0;
                            $harga=0;
                            @endphp
                            @foreach ($history->historyDetail as $pesanan)
                            @php
                            $j++;
                            $harga += ($pesanan->price * $pesanan->quantity);
                            @endphp
                            @endforeach
                            <p class="font-bold ">Meja {{ $history->table_number }} ({{ $j }} Pesanan)</p>
                            <p class="text-sm">{{ date('d F Y, H:i', strtotime($history->payment_date)) }}</p>
                        </div>
                    </div>
                    <p class="font-semibold">Rp {{ number_format($harga + $harga * 0.1 - $harga * $history->discount +
                        $harga * $history->taxes,0, ',', '.') }} </p>
                </div>
                {{-- Akhir Pesanan 1 --}}
                @endforeach
            </div>
            {{-- Akhir Pesanan --}}
        </div>
        {{-- Akhir Pesanan Hari Ini --}}
    </div>
    {{-- Akhir Section --}}
</div>