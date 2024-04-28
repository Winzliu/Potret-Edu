<div class="h-screen md:block fixed hidden w-[22%] xl:w-1/6 xl:ps-12 ps-8 py-5 bg-background">
  {{-- parent sidebar --}}
  <div class="h-full flex flex-col justify-between">
    {{-- bagian atas --}}
    <div class="">
      {{-- logo --}}
      <button class="flex items-center justify-center gap-5">
        <img src="{{ asset('img/logo.png') }}" class="w-12 xl:w-9" alt="">
        <p class="text-xl xl:text-lg font-bold">Waiter</p>
      </button>
      {{-- akhir logo --}}

      {{-- menu --}}
      <div class="mt-12 xl:mt-7 flex flex-col w-32 items-center gap-10 xl:gap-7">
        {{-- menu 1 --}}
        <a href="/waiter" wire:navigate
          class="{{ ($active == 'home') ? 'text-mainColor' : 'text-black' }} text-center leading-3 hover:bg-base-300 rounded-lg py-2 w-full">
          <ion-icon name="fast-food" class="text-2xl"></ion-icon>
          <p>Home</p>
        </a>
        {{-- akhir menu 1 --}}
        {{-- menu 2 --}}
        <a href="/cashier/pesanan/1" wire:navigate
          class="{{ ($active == 'pesanan') ? 'text-mainColor' : 'text-black' }}  text-center leading-3 hover:bg-base-300 rounded-lg py-2 w-full">
          <ion-icon name="cart" class="text-2xl"></ion-icon>
          <p>Pesanan</p>
        </a>
        {{-- akhir menu 2 --}}
        {{-- menu 2 --}}
        <a href="/cashier/riwayat" wire:navigate
          class="{{ ($active == 'riwayat') ? 'text-mainColor' : 'text-black' }}  text-center leading-3 hover:bg-base-300 rounded-lg py-2">
          <ion-icon name="timer" class="text-2xl"></ion-icon>
          <p>Riwayat Pesanan</p>
        </a>
        {{-- akhir menu 2 --}}
      </div>
      {{-- akhir menu --}}
    </div>
    {{-- akhir bagian atas --}}

    {{-- bagian bawah --}}
    <div class=" flex flex-col gap-5 mb-3">
      {{-- menu 1 --}}
      <button class="flex items-center gap-3 text-left">
        <ion-icon name="person-circle" class="text-5xl xl:text-4xl"></ion-icon>
        <div class="leading-5">
          <p class="font-bold xl:text-sm">Tatang Subarjo</p>
          <p class="xl:text-sm">Waiter</p>
        </div>
      </button>
      {{-- akhir menu 1 --}}
      {{-- menu 2 --}}
      <button
        class="flex items-center gap-3 text-red-500 hover:bg-base-300 rounded-lg transition-all duration-300 py-2 px-1">
        <ion-icon name="log-out-outline" class="text-4xl xl:text-3xl"></ion-icon>
        <p class="font-bold text-xl xl:text-base">Logout</p>
      </button>
      {{-- akhir menu 2 --}}
    </div>
    {{-- akhir bagian bawah --}}
  </div>
  {{-- akhir parent sidebar --}}
</div>