<div class="mt-8 w-[95%] xl:w-full">
    <div class="flex justify-between items-start pb-5 noprint">
        <h1 class="text-2xl font-bold">Riwayat Pesanan</h1>
        {{-- Search Bar --}}
        <label data-tip="Cari riwayat berdasarkan id/status"
            class="tooltip tooltip-bottom input input-bordered flex items-center gap-2 rounded-lg h-9 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] noprint">
            <input  wire:model="search" wire:keydown="searchHistory" type="text" class="grow text-xs border-0 input"
                placeholder="Cari History Pesanan" />
        </label>
        {{-- Akhir Search Bar --}}
    </div>
    <div class="flex flex-col w-full noprint">
        <div class="overflow-x-auto rounded-lg shadow-[0_0_5px_0_rgba(0,0,0,0.1)]">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr class="text-base text-black bg-fourthColor">
                        <th scope="col" class="px-6 py-3 text-center">No</th>
                        <th scope="col" class="px-6 py-3 text-center">ID Pesanan</th>
                        <th scope="col" class="px-6 py-3 text-center">Status Pesanan</th>
                        <th scope="col" class="px-6 py-3 text-center">Total Harga</th>
                        <th scope="col" class="px-6 py-3 text-center">Meja</th>
                        <th scope="col" class="px-6 py-3 text-center">Metode Pembayaran</th>
                        <th scope="col" class="px-6 py-3 text-center">Tanggal</th>
                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($histories as $history)
                    <!-- row 1 -->
                    <tr class="hover:bg-fourthColor/40 transition-all duration-300 even:bg-slate-200">
                        <th class="whitespace-nowrap text-center">{{ ($histories->currentPage() - 1) *
                            $histories->perPage() + $loop->iteration }}</th>
                        </th>
                        <td class="whitespace-nowrap text-center">#{{ strtoupper(substr($history->history_id, 0, 8)) }}
                        </td>
                        <td
                            class="whitespace-nowrap text-center font-bold @if($history->order_status == 'selesai') text-green-500 @else text-pink-500 @endif">
                            {{ strtoupper($history->order_status) }}
                        </td>
                        @php
                        $total_price = 0;
                        @endphp
                        @foreach ($history->historyDetail as $detail)
                        @php
                        $total_price += $detail->price * $detail->quantity
                        @endphp
                        @endforeach
                        <td class="whitespace-nowrap text-center">Rp {{ number_format($total_price + ($total_price *
                            0.1) + ($total_price *
                            $history->taxes) - ($total_price * $history->discount),0,
                            ',','.')
                            }}</td>
                        <td class="whitespace-nowrap text-center">{{ $history->table_number }}</td>
                        <td class="whitespace-nowrap text-center">{{ $history->payment_method }}</td>
                        <td class="whitespace-nowrap text-center">@php
                            try {
                            $dateTime = new \DateTime($history->payment_date);
                            $formattedDate = $dateTime->format('d-m-Y');
                            } catch (\Exception $e) {
                            $formattedDate = 'Invalid date format';
                            }
                            @endphp
                            {{ $formattedDate }}
                        </td>
                        <td class="whitespace-nowrap text-center tooltip flex justify-center" data-tip="Detail">
                            <a href="/admin/riwayat/{{ $history->history_id }}"
                                class="p-1 hover:bg-fourthColor rounded-lg transition-all duration-300 ">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20"
                                    aria-hidden="true" height="20px" width="20px" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                                    </path>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex w-full justify-end gap-5 items-center mt-5 noprint">
        <button onclick="printStruks()" data-tip="Cetak Riwayat Pesanan"
            class="tooltip w-24 h-10 rounded-lg bg-white hover:bg-slate-200 text-black border-2 border-black transition-all duration-300 font-bold">Print</button>
        {{ $histories->links('livewire.admin.component.admin-pagination-link') }}
    </div>

    <h1 class="print text-2xl font-bold text-center w-screen hidden">Riwayat Pemesanan Selama ...</h1>
    <div class="print w-full hidden" id="StrukButton">
        <table id="StrukButton" class="table">
            <!-- head -->
            <thead>
                <tr class="text-base text-black bg-fourthColor">
                    <th scope="col" class="px-6 py-3 text-center">No</th>
                    <th scope="col" class="px-6 py-3 text-center">ID Pesanan</th>
                    <th scope="col" class="px-6 py-3 text-center">Status Pesanan</th>
                    <th scope="col" class="px-6 py-3 text-center">Total Harga</th>
                    <th scope="col" class="px-6 py-3 text-center">Metode Pembayaran</th>
                    <th scope="col" class="px-6 py-3 text-center">Tanggal</th>
                    <th scope="col" class="px-6 py-3 text-center">Penanggung Jawab</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($history_print as $history)
                <!-- row 1 -->
                <tr class="hover:bg-fourthColor/40 transition-all duration-300 even:bg-slate-200">
                    <th class="whitespace-nowrap text-center">{{ ($histories->currentPage() - 1) *
                        $histories->perPage() + $loop->iteration }}</th>
                    </th>
                    <td class="whitespace-nowrap text-center">#{{ strtoupper(substr($history->history_id, 0, 8)) }}
                    </td>
                    <td
                        class="whitespace-nowrap text-center font-bold @if($history->order_status == 'selesai') text-green-500 @else text-pink-500 @endif">
                        {{ strtoupper($history->order_status) }}
                    </td>
                    @php
                    $total_price = 0;
                    @endphp
                    @foreach ($history->historyDetail as $detail)
                    @php
                    $total_price += $detail->price * $detail->quantity
                    @endphp
                    @endforeach
                    <td class="whitespace-nowrap text-center">Rp {{ number_format($total_price + ($total_price *
                        0.1) + ($total_price *
                        $history->taxes) - ($total_price * $history->discount),0,
                        ',','.')
                        }}</td>
                    <td class="whitespace-nowrap text-center">{{ $history->payment_method }}</td>
                    <td class="whitespace-nowrap text-center">@php
                        try {
                        $dateTime = new \DateTime($history->payment_date);
                        $formattedDate = $dateTime->format('d-m-Y');
                        } catch (\Exception $e) {
                        $formattedDate = 'Invalid date format';
                        }
                        @endphp
                        {{ $formattedDate }}
                    </td>
                    <td class="whitespace-nowrap text-center">{{ $history->waiter_name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        var modal = document.getElementById('StrukButton');
        function printStruks() {
        modal.scrollTo(0,0);
        window.print();
        }
    </script>
</div>