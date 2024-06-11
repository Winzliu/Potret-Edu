<div class="h-screen md:block fixed hidden w-[22%] xl:w-1/6 xl:ps-12 ps-8 py-7 bg-blue-50">
  {{-- parent sidebar --}}
  <div class="h-full flex flex-col justify-between items-center">
    {{-- bagian atas --}}
    <div class="">
      {{-- logo --}}
      <button class="flex items-center justify-center gap-5">
        <img src="{{ asset('img/logo.png') }}" class="w-12 xl:w-9" alt="">
        @if($role == 'waiter')
        <a href="/waiter" class="
        @if(auth()->user()->userDetail->custom == 'kecil')
        text-lg xl:text-base
        @elseif(auth()->user()->userDetail->custom == 'normal')
        text-xl xl:text-lg
        @elseif(auth()->user()->userDetail->custom == 'besar')
        text-2xl xl:text-xl
        @endif
        font-bold">Waiter</a>
        @elseif($role == 'cashier')
        <a href="/cashier" class="
        @if(auth()->user()->userDetail->custom == 'kecil')
        text-lg xl:text-base
        @elseif(auth()->user()->userDetail->custom == 'normal')
        text-xl xl:text-lg
        @elseif(auth()->user()->userDetail->custom == 'besar')
        text-2xl xl:text-xl
        @endif
        font-bold">Cashier</a>
        @elseif($role== 'kitchen')
        <a href="/kitchen" class="
        @if(auth()->user()->userDetail->custom == 'kecil')
        text-lg xl:text-base
        @elseif(auth()->user()->userDetail->custom == 'normal')
        text-xl xl:text-lg
        @elseif(auth()->user()->userDetail->custom == 'besar')
        text-2xl xl:text-xl
        @endif
        font-bold">Kitchen</a>
        @elseif($role== 'admin')
        <a href="/admin" class="
        @if(auth()->user()->userDetail->custom == 'kecil')
        text-lg xl:text-base
        @elseif(auth()->user()->userDetail->custom == 'normal')
        text-xl xl:text-lg
        @elseif(auth()->user()->userDetail->custom == 'besar')
        text-2xl xl:text-xl
        @endif
        font-bold">Admin</a>
        @endif
      </button>
      {{-- akhir logo --}}

      {{-- menu --}}
      <div class="mt-7 flex flex-col w-32 items-center gap-10 xl:gap-7 overflow-y-scroll h-[55vh] scrollbar-hidden">
        @if ($role == 'waiter')
        {{-- menu waiter --}}
        <a href="/waiter" wire:navigate
          class="{{ ($active == 'waiter-home') ? 'text-mainColor' : 'text-black opacity-60 hover:bg-slate-200 hover:-translate-y-1 transition-all duration-200 hover:shadow-xl' }} text-center leading-3 rounded-lg py-2 w-full">
          <ion-icon name="fast-food" class="text-2xl"></ion-icon>
          <p>Beranda</p>
        </a>
        {{-- akhir menu waiter --}}
        {{-- pesanan waiter --}}
        <a href="/waiter/pesanan" wire:navigate
          class="{{ ($active == 'waiter-pesanan') ? 'text-mainColor' : 'text-black  opacity-60 hover:bg-slate-200 hover:-translate-y-1 transition-all duration-200 hover:shadow-xl' }}  text-center leading-3  rounded-lg py-2 w-full">
          <ion-icon name="cart" class="text-2xl"></ion-icon>
          <p>Pesanan</p>
        </a>
        {{-- akhir pesanan waiter --}}
        @elseif ($role == 'cashier')
        {{-- menu cashier --}}
        <a href="/cashier" wire:navigate
          class="{{ ($active == 'cashier-home') ? 'text-mainColor' : 'text-black opacity-60 hover:bg-slate-200 hover:-translate-y-1 transition-all duration-200 hover:shadow-xl' }} text-center leading-3 rounded-lg py-2 w-full">
          <ion-icon name="fast-food" class="text-2xl"></ion-icon>
          <p>Beranda</p>
        </a>
        {{-- akhir menu cashier --}}
        {{-- pesanan cashier --}}
        <a href="/cashier/pesanan" wire:navigate
          class="{{ ($active == 'cashier-pesanan') ? 'text-mainColor' : 'text-black  opacity-60 hover:bg-slate-200 hover:-translate-y-1 transition-all duration-200 hover:shadow-xl' }}  text-center leading-3  rounded-lg py-2 w-full">
          <ion-icon name="cart" class="text-2xl"></ion-icon>
          <p>Pesanan</p>
        </a>
        {{-- akhir pesanan cashier --}}
        {{-- riwayat cashier --}}
        <a href="/cashier/riwayat" wire:navigate
          class="{{ ($active == 'cashier-riwayat') ? 'text-mainColor' : 'text-black  opacity-60 hover:bg-slate-200 hover:-translate-y-1 transition-all duration-200 hover:shadow-xl' }}  text-center leading-3  rounded-lg py-2">
          <ion-icon name="timer" class="text-2xl"></ion-icon>
          <p>Riwayat Pesanan</p>
        </a>
        {{-- akhir riwayat cashier --}}
        @elseif ($role == 'admin')
        {{-- role admin --}}
        <a href="/admin" wire:navigate
          class="{{ ($active == 'admin-home') ? 'text-tertiaryColor' : 'text-black opacity-60 hover:bg-slate-200 hover:-translate-y-1 transition-all duration-200 hover:shadow-xl' }} text-center leading-3  rounded-lg py-2 w-full">
          <ion-icon name="home" class="text-2xl"></ion-icon>
          <p>Beranda</p>
        </a>
        <a href="/admin/riwayat-pesanan" wire:navigate
          class="{{ ($active == 'admin-riwayat') ? 'text-tertiaryColor' : 'text-black opacity-60 hover:bg-slate-200 hover:-translate-y-1 transition-all duration-200 hover:shadow-xl' }} text-center leading-3  rounded-lg py-2 w-full">
          <ion-icon name="timer" class="text-2xl"></ion-icon>
          <p>Riwayat Pesanan</p>
        </a>
        <a href="/admin/menu" wire:navigate
          class="{{ ($active == 'admin-menu') ? 'text-tertiaryColor' : 'text-black opacity-60 hover:bg-slate-200 hover:-translate-y-1 transition-all duration-200 hover:shadow-xl' }} text-center leading-3  rounded-lg py-2 w-full">
          <ion-icon name="restaurant" class="text-2xl"></ion-icon>
          <p>Menu</p>
        </a>
        <a href="/admin/karyawan" wire:navigate
          class="{{ ($active == 'admin-karyawan') ? 'text-tertiaryColor' : 'text-black opacity-60 hover:bg-slate-200 hover:-translate-y-1 transition-all duration-200 hover:shadow-xl' }} text-center leading-3  rounded-lg py-2 w-full">
          <ion-icon name="person" class="text-2xl"></ion-icon>
          <p>Karyawan</p>
        </a>
        <a href="/admin/metode-pembayaran" wire:navigate
          class="flex flex-col items-center text-center {{ ($active == 'admin-metodePembayaran') ? 'text-tertiaryColor' : 'text-black opacity-60 hover:bg-slate-200 hover:-translate-y-1 transition-all duration-200 hover:shadow-xl' }} text-center leading-3  rounded-lg py-2 w-full">
          <svg class="w-8" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M928 160H96c-17.7 0-32 14.3-32 32v160h896V192c0-17.7-14.3-32-32-32zM64 832c0 17.7 14.3 32 32 32h832c17.7 0 32-14.3 32-32V440H64v392zm579-184c0-4.4 3.6-8 8-8h165c4.4 0 8 3.6 8 8v72c0 4.4-3.6 8-8 8H651c-4.4 0-8-3.6-8-8v-72z">
            </path>
          </svg>
          <p>Metode Pembayaran</p>
        </a>
        <a href="/admin/diskon" wire:navigate
          class="flex flex-col items-center text-center {{ ($active == 'admin-diskon') ? 'text-tertiaryColor' : 'text-black opacity-60 hover:bg-slate-200 hover:-translate-y-1 transition-all duration-200 hover:shadow-xl' }} text-center leading-3  rounded-lg py-2 w-full">
          <svg class="w-7 mb-2 flex text-center" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path fill="currentColor"
              d="M13.946 2.094a3 3 0 0 0-3.892 0L8.706 3.243a1 1 0 0 1-.569.236l-1.765.14A3 3 0 0 0 3.62 6.371l-.14 1.766a1 1 0 0 1-.237.569l-1.148 1.348a3 3 0 0 0 0 3.891l1.148 1.349a1 1 0 0 1 .236.569l.141 1.765a3 3 0 0 0 2.752 2.752l1.765.14a1 1 0 0 1 .57.237l1.347 1.148a3 3 0 0 0 3.892 0l1.348-1.148a1 1 0 0 1 .57-.236l1.765-.141a3 3 0 0 0 2.752-2.752l.14-1.765a1 1 0 0 1 .236-.57l1.149-1.347a3 3 0 0 0 0-3.892l-1.149-1.348a1 1 0 0 1-.236-.57l-.14-1.765a3 3 0 0 0-2.752-2.752l-1.766-.14a1 1 0 0 1-.569-.236zm.882 5.663l1.415 1.414l-7.071 7.072l-1.415-1.415zm-4.596 2.475a1.5 1.5 0 1 1-2.121-2.121a1.5 1.5 0 0 1 2.121 2.121m3.536 5.657a1.5 1.5 0 1 1 2.12-2.121a1.5 1.5 0 0 1-2.12 2.12" />
          </svg>
          <p>Diskon</p>
        </a>
        {{-- akhir role admin --}}
        @elseif ($role == 'kitchen')
        {{-- KITCHEN START--}}
        {{-- menu 1 --}}
        <a href="/kitchen" wire:navigate class="{{ ($active == 'kitchen-pesanan') ? 'text-mainColor' : 'text-black hover:bg-slate-200 hover:-translate-y-1 transition-all duration-200 hover:shadow-xl' }} 
          text-center  w-full leading-3 pb-4 rounded-lg">
          <i class="icon-[game-icons--wok] ml-3 text-5xl "></i>
          <p>Pesanan</p>
        </a>
        {{-- akhir menu 1 --}}
        {{-- menu 2 --}}
        <a href="/kitchen-menu" wire:navigate class="{{ ($active == 'kitchen-kelolaMenu') ? 'text-mainColor' : 'text-black hover:bg-slate-200 hover:-translate-y-1 transition-all duration-200 hover:shadow-xl' }} 
          text-center  w-full leading-3 py-4 rounded-lg">
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
      <a href="/profile" class="flex items-center gap-3 text-left">
        <ion-icon name="person-circle" class="text-5xl xl:text-4xl"></ion-icon>
        <div class="leading-5">
          <p class="font-bold xl:text-sm">{{ auth()->user()->userDetail->name }}</p>
          @if($role == 'waiter')
          <p class="xl:text-sm">Waiter</p>
          @elseif($role == 'cashier')
          <p class="xl:text-sm">Cashier</p>
          @elseif($role== 'kitchen')
          <p class="xl:text-sm">Kitchen</p>
          @elseif($role== 'admin')
          <p class="xl:text-sm">Admin</p>
          @endif
        </div>
      </a>
      {{-- akhir menu 1 --}}
      {{-- menu 2 --}}
      <form action="/logout" method="POST" class="hover:bg-base-300 rounded-lg transition-all duration-300">
        @csrf
        <button class="flex items-center gap-3 text-red-500 w-full h-full py-2 px-1">
          <ion-icon name="log-out-outline" class="text-4xl xl:text-3xl"></ion-icon>
          <p class="font-bold text-xl xl:text-base">Logout</p>
        </button>
      </form>
      {{-- akhir menu 2 --}}
    </div>
    {{-- akhir bagian bawah --}}
  </div>
  {{-- akhir parent sidebar --}}
</div>