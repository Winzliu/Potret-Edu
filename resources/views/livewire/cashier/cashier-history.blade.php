<div class="mt-8 w-[95%] xl:w-full">
    <div class="flex justify-between items-start pb-5 ">
        <h1 class="text-2xl font-bold">Riwayat Pesanan</h1>
    </div>
    <div class="flex flex-col w-full">
        <div class="overflow-x-auto rounded-lg shadow-[0_0_5px_0_rgba(0,0,0,0.1)]">
            <table class="table ">
                <!-- head -->
                <thead>
                    <tr class="text-base text-black bg-secondaryColor">
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
                    <tr class="hover:bg-mainColor transition-all duration-300 even:bg-base-300">
                        <th class="whitespace-nowrap text-center">{{ ($histories->currentPage() - 1) *
                            $histories->perPage() + $loop->iteration }}</th>
                        </th>
                        <td class="whitespace-nowrap text-center">#{{ strtoupper(substr($history->history_id, 0, 8)) }}
                        </td>
                        <td
                            class="whitespace-nowrap text-center font-bold @if($history->order_status == 'selesai') text-green-500 @else text-pink-500 @endif">
                            {{ strtoupper($history->order_status) }}
                        </td>
                        <td class="whitespace-nowrap text-center">Rp {{ number_format($history->total_payment,0,
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
                            <a href="/cashier/riwayat/{{ $history->history_id }}"
                                class="p-1 hover:bg-secondaryColor rounded-lg transition-all duration-300 ">
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
    {{ $histories->links('livewire.cashier.component.cashier-pagination-link') }}
</div>