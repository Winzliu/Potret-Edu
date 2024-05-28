<div class="mt-10 w-96 h-10 tooltip" data-tip="Cari menu dengan nama">
    {{-- Search Bar --}}
    <label class=" input input-bordered flex items-center gap-2 rounded-lg h-9 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">
        <input wire:model="search" wire:keydown="searchMenu" type="text" class="grow text-xs border-0 input"
            placeholder="Cari Menu" />
    </label>
    {{-- Akhir Search Bar --}}
</div>
