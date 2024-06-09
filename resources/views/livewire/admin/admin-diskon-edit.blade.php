<div class="pt-8 pe-8 xl:pe-0">
    {{-- START --}}
    <a href="/admin/diskon" wire:navigate class="flex items-center gap-2 font-bold">
        <svg class="
            @if(auth()->user()->userDetail->custom == 'kecil')
                w-4
            @elseif(auth()->user()->userDetail->custom == 'normal')
                w-6
            @elseif(auth()->user()->userDetail->custom == 'besar')
                w-8
            @endif"
        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
        </svg>                
        <p>Kembali</p>
    </a>
    <p class="font-bold text-3xl text-center">Tambah Diskon</p>
    {{-- form --}}
    <div
        class="bg-tertiaryColor mb-8 flex flex-col justify-start mt-5 rounded-lg overflow-y-scroll scrollbar-hidden h-[33vh] xl:h-[33vh] shadow-[0_0_60px_0_rgba(0,0,0,0.2)]">
        <div class="flex gap-x-5 gap-y-2 pb-8 px-10 justify-center items-start pt-5 ">
            {{-- nama karyawan --}}
            <label class="form-control w-full max-w-md">
                <div class="label">
                    <span class="label-text font-semibold text-white">Nama Diskon</span>
                </div>
                <input type="text" placeholder="Nama Diskon" wire:model="discount_name"
                    class="input input-bordered w-full max-w-md cursor-pointer text-sm" />
                @error('discount_name')
                <i class="text-red-500 ms-4 mt-0 mb-0 font-medium">
                    *{{ $message }}
                </i>
                @enderror
            </label>
            {{-- akhir nama karyawan --}}
            {{-- persentase diskon --}}
            <label class="form-control w-full max-w-md">
                <div class="label">
                    <span class="label-text font-semibold text-white">Persentase Diskon (%)</span>
                </div>
                <input type="number" placeholder="Persentase Diskon (Nilai antara 1-100)" wire:model="discount_rate"
                    class="input input-bordered w-full max-w-md cursor-pointer text-sm" />
                @error('discount_rate')
                <i class="text-red-500 ms-4 mt-0 mb-0 font-medium">
                    *{{ $message }}
                </i>
                @enderror
                {{-- akhir persentase diskon --}}
            </label>
        </div>
        <button wire:click="modal_tambah"
            class="flex mx-auto px-8 py-3  border-2 mb-6 bg-secondaryColor border-secondaryColor hover:bg-mainColor hover:border-mainColor text-black font-bold rounded-lg">Simpan</button>
    </div>
    {{-- akhir form --}}

    {{-- MODAL HAPUS  --}}
        @if($modalTambah)
        <div class="fixed top-0 left-0 w-full h-full bg-slate-500 bg-opacity-30 flex justify-center items-center">
            <div class="bg-background px-12 py-10 rounded-xl shadow-lg text-center border-4 border-tertiaryColor font-semibold">
                <p>Apakah Anda yakin ingin mengedit Diskon ini?</p>
                <div class="mt-4 flex flex-row justify-center gap-8 font-medium">
                    <button wire:click="$set('modalTambah', false)"
                        class="bg-red-500 hover:bg-red-600  px-8 py-2 text-white rounded-md">Tidak</button>
                    <button wire:click="editDiskon" class="bg-greenConfirm hover:bg-green-500 text-white px-10 py-2 rounded-md mr-2">Ya</button>
                </div>
            </div>
        </div>
        @endif
    {{-- AKHIR MODAL HAPUS --}}
        {{-- loading --}}
        <dialog wire:loading wire:target="editDiskon" wire:loading.attr="open"
        class="modal bg-black/30">
        <span
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 loading loading-spinner loading-lg"></span>
        </dialog>
        {{-- akhir loading --}}
</div>