<div class="h-screen md:block fixed hidden w-[22%] xl:w-1/6 ps-12 py-5 bg-background">
  {{-- parent sidebar --}}
  <div class="h-full flex flex-col justify-between">
    {{-- bagian atas --}}
    <div class="">
      {{-- logo --}}
      <button class="flex items-center gap-5">
        <img src="{{ asset('img/logo.png') }}" class="w-12 xl:w-9" alt="">
        <p class="text-xl xl:text-lg font-bold">Waiter</p>
      </button>
      {{-- akhir logo --}}

      {{-- menu --}}
      <div class="mt-12 xl:mt-7 flex flex-col gap-14 xl:gap-10">
        {{-- menu 1 --}}
        <button class="text-mainColor text-center w-20 leading-3">
          <ion-icon name="home" class="text-2xl xl:text-xl"></ion-icon>
          <p>Home</p>
        </button>
        {{-- akhir menu 1 --}}
        {{-- menu 2 --}}
        <button class="text-black text-center w-20 leading-3">
          <ion-icon name="cart" class="text-2xl xl:text-xl"></ion-icon>
          <p>Pesanan</p>
        </button>
        {{-- akhir menu 2 --}}
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
      <button class="flex items-center gap-3 text-red-500">
        <ion-icon name="log-out-outline" class="text-4xl xl:text-3xl"></ion-icon>
        <p class="font-bold text-xl xl:text-base">Logout</p>
      </button>
      {{-- akhir menu 2 --}}
    </div>
    {{-- akhir bagian bawah --}}
  </div>
  {{-- akhir parent sidebar --}}
</div>