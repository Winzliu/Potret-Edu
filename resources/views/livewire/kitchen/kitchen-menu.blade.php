<div class="mb-10">
    {{-- Search Bar --}}
        <div class="my-6 w-96 h-10">
            <form action="">
              <label class=" input input-bordered flex items-center gap-2 rounded-lg h-9 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">
                <input type="text" class="grow text-xs border-0 input" placeholder="Cari Menu" />
                <button>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                    <path fill-rule="evenodd"
                      d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                      clip-rule="evenodd" />
                  </svg>
                </button>
              </label>
            </form>
        </div>
    {{-- Akhir Search Bar --}}
    
    {{-- katergori makanan --}}
    <div class="flex gap-5 my-5 flex-wrap">
        <button class="rounded-lg min-w-24 shadow-md bg-mainColor px-3 py-1 font-semibold text-lg">Nasi</button>
        <button
            class="rounded-lg min-w-24 hover:bg-gray-200 bg-white px-3 py-1 font-semibold text-lg text-mainColor shadow-md">Mie</button>
        <button
            class="rounded-lg min-w-24 hover:bg-gray-200 bg-white px-3 py-1 font-semibold text-lg text-mainColor shadow-md">Cemilan</button>
        <button
            class="rounded-lg min-w-24 hover:bg-gray-200 bg-white px-3 py-1 font-semibold text-lg text-mainColor shadow-md">Penutup</button>
        <button
            class="rounded-lg min-w-24 hover:bg-gray-200 bg-white px-3 py-1 font-semibold text-lg text-mainColor shadow-md">Minuman</button>
        <button
            class="rounded-lg min-w-24 hover:bg-gray-200 bg-white px-3 py-1 font-semibold text-lg text-mainColor shadow-md">Paket</button>
        <button>
    </div>
    {{-- akhir kategori makanan --}}

    {{-- card makanan --}}
    <div class="flex flex-wrap gap-4 justify-start">
        @for($i=0; $i < 5; $i++)
        {{-- card 1 --}}
        <div class="card min-w-1/4 px-4 py-4 bg-base-100 shadow-[0_0_15px_2px_rgba(0,0,0,0.1)]">
            <figure class="mb-3 cursor-pointer" onclick="my_modal_1.showModal()">
                <img src="{{ asset('img/makanan.jpg') }}" alt="Shoes"
                    class="rounded-xl h-36 w-full object-cover {{ $isOn ? 'filter-none' : 'filter grayscale' }}" />
            </figure>
            <div class="items-center text-left">
                <h2 class="text-lg font-bold">Nasi Goreng Telur Putih</h2>
                <div class="flex items-end justify-between mt-2">
                    <p class="text-xs w-32">Nasi, Telur, Kerupuk, Timun , dkk</p>
                    <button wire:click="confirmToggle" class="{{ $isOn ? 'bg-white hover:bg-purpleRed text-purpleRed hover:text-white' : 'bg-white hover:bg-greenConfirm text-greenConfirm hover:text-white' }} 
                    border-2  text-sm border-secondaryColor w-10 h-10 rounded-full font-bold">
                        {{ $isOn ? 'Off' : 'On' }}
                    </button>
                </div>
            </div>
        </div>
        {{-- modal 1 --}}
        <dialog id="my_modal_1" class="modal">
            <div class="modal-box">
                <h3 class="font-bold text-2xl text-center">Nasi Goreng Telur Putih</h3>
                <div class="flex justify-evenly">
                    <div class="w-32">
                        <p class="pt-4 font-semibold">Bahan :</p>
                        <ul class="list-disc text-wrap">
                            <li>Nasi</li>
                            <li>Telur</li>
                            <li>Kerupuk</li>
                            <li>Timun</li>
                            <li>Dan lain-lainasdfsadfsadfsa fsdafasdfasdfsafsaf</li>
                        </ul>
                    </div>
                    <div class="w-32 ">
                        <p class="pt-4 font-semibold">Alergi :</p>
                        <ul class="list-disc text-wrap">
                            <li>Telur</li>
                            <li>Bawang</li>
                        </ul>
                    </div>
                </div>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>
        {{-- akhir modal 1 --}}
        {{-- akhir card 1 --}}
        @endfor
    </div>
    {{-- akhir card makanan --}}
    @if($confirmingToggle)
    <div class="fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 py-10 rounded-xl shadow-lg text-center border-4 border-mainColor font-semibold">
            <p>Apakah Anda yakin ingin {{ $isOn ? 'Menonaktifkan' : 'Mengaktifkan' }} menu ini?</p>
            <div class="mt-4 flex flex-row justify-center gap-8 font-medium">
                <button wire:click="$set('confirmingToggle', false)"
                    class="bg-red-500 px-8 py-2 text-white rounded-md">Tidak</button>
                <button wire:click="toggle" class="bg-green-500 text-white px-10 py-2 rounded-md mr-2">Ya</button>
            </div>
        </div>
    </div>
    @endif
</div>