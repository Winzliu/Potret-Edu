@if ($active == 'home' || $active == 'kelolaMenu' || $active == 'masakan' )
<div class="my-6 w-96 h-10">
  {{-- Search Bar --}}
  <form action="">
    <label class="input input-bordered flex items-center gap-2 rounded-full h-10 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">
      <input type="text" class="grow text-sm" placeholder="Cari Menu" />
      <button>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
          <path fill-rule="evenodd"
            d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
            clip-rule="evenodd" />
        </svg>
      </button>
    </label>
  </form>
  {{-- Akhir Search Bar --}}
</div>
@endif
