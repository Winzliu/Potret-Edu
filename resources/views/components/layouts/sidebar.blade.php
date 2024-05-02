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
        @endif
      </button>
      {{-- akhir logo --}}

      {{-- menu --}}
      <div class="mt-7 flex flex-col w-32 items-center gap-10 xl:gap-7">
        @if ($role == 'waiter')
        {{-- menu waiter --}}
        <a href="/waiter" wire:navigate
          class="{{ ($active == 'home') ? 'text-mainColor' : 'text-black' }} text-center leading-3 hover:bg-slate-200 rounded-lg py-2 w-full">
          <ion-icon name="fast-food" class="text-2xl"></ion-icon>
          <p>Beranda</p>
        </a>
        {{-- akhir menu waiter --}}
        {{-- menu waiter --}}
        <a href="/waiter/pesanan" wire:navigate
          class="{{ ($active == 'pesanan') ? 'text-mainColor' : 'text-black' }}  text-center leading-3 hover:bg-slate-200 rounded-lg py-2 w-full">
          <ion-icon name="cart" class="text-2xl"></ion-icon>
          <p>Pesanan</p>
        </a>
        {{-- akhir menu waiter --}}
        @elseif ($role == 'cashier')
        {{-- menu cashier --}}
        <a href="/cashier/riwayat" wire:navigate
          class="{{ ($active == 'riwayat') ? 'text-mainColor' : 'text-black' }}  text-center leading-3 hover:bg-slate-200 rounded-lg py-2">
          <ion-icon name="timer" class="text-2xl"></ion-icon>
          <p>Riwayat Pesanan</p>
        </a>
        {{-- akhir menu cashier --}}
        @elseif ($role == 'admin')
        {{-- role admin --}}
        <a href="/admin" wire:navigate
          class="{{ ($active == 'admin') ? 'text-mainColor' : 'text-black' }} text-center leading-3 hover:bg-slate-200 rounded-lg py-2 w-full">
          <ion-icon name="home" class="text-2xl"></ion-icon>
          <p>Beranda</p>
        </a>
        {{-- akhir role admin --}}
        @elseif ($role == 'kitchen')
        {{-- KITCHEN START--}}
        {{-- menu 1 --}}
        <div class="hover:bg-slate-200 pl-4 pr-4 pb-5 rounded-lg">
          <a wire:navigate href="/kitchen"
            class="{{ ($active == 'masakan') ? 'text-mainColor' : 'text-black' }} text-center w-20 leading-3 ">
            <svg class="ml-3 w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path fill="currentColor"
                d="M465.1 127.9c-4.8 0-9.5 1.6-13.4 4.5l-8 6.1c9.3 6.3 18.7 15.4 25.3 28.2l11.8-7.1c5.9-3.6 8.3-11 5.8-17.4c-2.7-6.6-8.2-11.6-15-13.5c-2.2-.6-4.4-.9-6.5-.8m-35.6 21.2l-95.2 71.8c7.6 3.1 15.2 7.7 22.3 14.3l98.1-59.7c-6.2-13-16.1-21.2-25.2-26.4m-111.4 84L303 244.4l26.6 7.3l12.1-7.4c-7.7-6.1-16-9.4-23.6-11.2m-126.2 12.8c-34.2 0-66 3-92.32 8.2c-1.63.3-3.25.7-4.84 1c8.8 1.2 17.9 3.6 26.5 7.9c21.3-3 45.3-4.6 70.7-4.6c60.6 0 113.2 9.5 139.3 23.7c4.9 2.7 8.8 5.6 11.5 8.6c1.9 2.2 3.1 4.4 3.1 6.8c0 2.3-1.2 4.6-3.1 6.8c-2.7 3-6.6 5.8-11.5 8.5c-26.1 14.3-78.7 23.8-139.3 23.8c-16.2 0-31.9-.7-46.6-2c-1.8 3.2-4.7 5.8-8.4 7.3c-8.5 3.4-18.2-.8-21.6-9.4l-.6-1.6c-15.1-2.4-28.58-5.4-39.99-9c-2.08 2-4.73 3.5-7.78 4.3c-8.94 2.1-17.95-3.4-20.1-12.3l-1.37-5.7c-1.68-1.3-3.13-2.6-4.31-3.9c-1.92-2.2-3.12-4.5-3.12-6.8c0-2.4 1.2-4.6 3.12-6.8l.1-.1c-1.22-4.8-2.39-10.1-2.41-14.5c-8.8 6.6-13.27 14-13.27 21.3v.1c0 2.2.43 4.5 1.28 6.8C46.26 389.2 132.7 413 191.9 413c59.3 0 145.7-23.8 165.1-108.7c.9-2.3 1.3-4.6 1.3-6.8v-.1c0-9.2-7.1-18.6-21.1-26.2c-27.3-14.9-82.1-25.3-145.3-25.3M79.48 266.4c-15.25-.2-26.8 3-26.8 3c-1.87 4.8-1.68 9.3-.35 13.5c26.03 12.7 64.77 9.7 64.77 9.7c2.5-4.6 2.8-12 1-17c-12.6-7.1-26.75-9.2-38.62-9.2m202.32 11.7c-3.2-.2-6.6 2.8-8.1 7.3c-1.8 5-.4 10.2 3.1 11.3c3.5 1.2 7.7-2 9.4-7c1.7-5.1.3-10.2-3.1-11.4c-.4-.1-.9-.2-1.3-.2M55.87 297.9l3.15 13.1c.54 2.2 2.79 3.6 5.02 3c2.24-.5 3.62-2.8 3.08-5l-2.02-8.3c-3.12-.8-6.21-1.7-9.23-2.8m69.73 4c-2.1 1.8-4.7 3-7.5 3.2h-.2l9 22.8c.9 2.1 3.3 3.2 5.4 2.3c2.2-.8 3.2-3.2 2.4-5.4zm147.2 1.7c-3.2-.2-6.6 2.8-8.1 7.3c-1.8 5-.4 10.2 3.1 11.3c3.5 1.2 7.7-2 9.4-7c1.7-5.1.3-10.2-3.1-11.4c-.4-.1-.9-.2-1.3-.2" />
            </svg>
            <p class="font-bold">Pesanan</p>
          </a>
        </div>
        {{-- akhir menu 1 --}}
        {{-- menu 2 --}}
        <div class="hover:bg-slate-200 p-4 px-8 rounded-lg text-center">
          <a wire:navigate href="/kitchen-menu"
            class="{{ ($active == 'kelolaMenu') ? 'text-mainColor' : 'text-black' }} text-center w-20 space-y-2 leading-3 ">
            <svg class="mx-auto w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <path fill="currentColor"
                d="m8.1 13.34l2.83-2.83L3.91 3.5a4.008 4.008 0 0 0 0 5.66zm6.78-1.81c1.53.71 3.68.21 5.27-1.38c1.91-1.91 2.28-4.65.81-6.12c-1.46-1.46-4.2-1.1-6.12.81c-1.59 1.59-2.09 3.74-1.38 5.27L3.7 19.87l1.41 1.41L12 14.41l6.88 6.88l1.41-1.41L13.41 13z" />
            </svg>
            <p class="font-semibold">Menu</p>
          </a>
        </div>
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