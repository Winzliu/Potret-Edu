<div class="h-screen md:block fixed hidden w-[22%] xl:w-1/6 xl:ps-12 ps-8 py-5 
@if ($role == 'admin')
bg-blue-50 
@else
bg-background 
@endif">
  {{-- parent sidebar --}}
  <div class="h-full flex flex-col justify-between items-center">
    {{-- bagian atas --}}
    <div class="">
      {{-- logo --}}
      <button class="flex items-center justify-center gap-5">
        <img src="{{ asset('img/logo.png') }}" class="w-12 xl:w-9" alt="">
        @if($role == 'waiter')
        <p class="text-xl xl:text-lg font-bold">Waiter</p>
        @elseif($role == 'cashier')
        <p class="text-xl xl:text-lg font-bold">Cashier</p>
        @elseif($role== 'kitchen')
        <p class="text-xl xl:text-lg font-bold">Kitchen</p>
        @elseif($role== 'admin')
        <p class="text-xl xl:text-lg font-bold">Admin</p>
        @endif
      </button>
      {{-- akhir logo --}}

      {{-- menu --}}
      <div class="mt-7 flex flex-col w-32 items-center gap-10 xl:gap-7">
        @if ($role == 'waiter')
        {{-- menu waiter --}}
        <a href="/waiter" wire:navigate
          class="{{ ($active == 'waiter-home') ? 'text-mainColor' : 'text-black' }} text-center leading-3 hover:bg-slate-200 rounded-lg py-2 w-full">
          <ion-icon name="fast-food" class="text-2xl"></ion-icon>
          <p>Beranda</p>
        </a>
        {{-- akhir menu waiter --}}
        {{-- menu waiter --}}
        <a href="/waiter/pesanan" wire:navigate
          class="{{ ($active == 'waiter-pesanan') ? 'text-mainColor' : 'text-black' }}  text-center leading-3 hover:bg-slate-200 rounded-lg py-2 w-full">
          <ion-icon name="cart" class="text-2xl"></ion-icon>
          <p>Pesanan</p>
        </a>
        {{-- akhir menu waiter --}}
        @elseif ($role == 'cashier')
        {{-- menu cashier --}}
        <a href="/cashier/riwayat" wire:navigate
          class="{{ ($active == 'cashier-riwayat') ? 'text-mainColor' : 'text-black' }}  text-center leading-3 hover:bg-slate-200 rounded-lg py-2">
          <ion-icon name="timer" class="text-2xl"></ion-icon>
          <p>Riwayat Pesanan</p>
        </a>
        {{-- akhir menu cashier --}}
        @elseif ($role == 'admin')
        {{-- role admin --}}
        <a href="/admin" wire:navigate
          class="{{ ($active == 'admin-home') ? 'text-tertiaryColor' : 'text-black' }} text-center leading-3 hover:bg-slate-200 rounded-lg py-2 w-full">
          <ion-icon name="home" class="text-2xl"></ion-icon>
          <p>Beranda</p>
        </a>
        <a href="/admin/riwayat-pesanan" wire:navigate
          class="{{ ($active == 'admin-riwayat') ? 'text-tertiaryColor' : 'text-black' }} text-center leading-3 hover:bg-slate-200 rounded-lg py-2 w-full">
          <ion-icon name="timer" class="text-2xl"></ion-icon>
          <p>Riwayat Pesanan</p>
        </a>
        <a href="/admin/admin-menu" wire:navigate
          class="{{ ($active == 'admin-menu') ? 'text-tertiaryColor' : 'text-black' }} text-center leading-3 hover:bg-slate-200 rounded-lg py-2 w-full">
          <ion-icon name="timer" class="text-2xl"></ion-icon>
          <p>Riwayat Pesanan</p>
        </a>
        {{-- akhir role admin --}}
        @elseif ($role == 'kitchen')
        {{-- KITCHEN START--}}
        {{-- menu 1 --}}
        <a href="/kitchen" wire:navigate
          class="{{ ($active == 'kitchen-pesanan') ? 'text-mainColor font-medium' : 'text-black font-base' }} 
          text-center hover:bg-slate-200 w-full leading-3 pb-4 rounded-lg">
          <i class="icon-[game-icons--wok] ml-3 text-5xl "></i>
          <p>Pesanan</p>
        </a>
        {{-- akhir menu 1 --}}
        {{-- menu 2 --}}
        <a href="/kitchen-menu" wire:navigate
          class="{{ ($active == 'kitchen-kelolaMenu') ? 'text-mainColor font-medium' : 'text-black font-base' }} 
          text-center hover:bg-slate-200 w-full leading-3 py-4 rounded-lg">
          <span class="icon-[ic--sharp-restaurant-menu] text-4xl"></span>
          <p>Menu</p>
        </a>
        {{-- akhir menu 2 --}}
        {{-- KITCHEN END --}}
        @endif
      </div>
      {{-- akhir menu --}}
    </div>
    {{-- akhir bagian atas --}}

    {{-- bagian bawah --}}
    <div class=" flex flex-col gap-10">
      {{-- menu 1 --}}
      <a href="/profil/1"class="flex items-center gap-3 text-left">
        <ion-icon name="person-circle" class="text-5xl xl:text-4xl"></ion-icon>
        <div class="leading-5">
          <p class="font-bold xl:text-sm">Tatang Subarjo</p>
          <p class="xl:text-sm">Waiter</p>
        </div>
      </a>
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