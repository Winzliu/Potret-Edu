<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title }}</title>

  {{-- poppins Font --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  {{-- akhir poppins font --}}

  @vite('resources/css/app.css')
  @livewireStyles
</head>

<body class="min-h-screen h-[20000px] bg-background font-Poppins">
  {{-- tampilan Laptop/Tablet --}}
  <div class="md:flex hidden">
    {{-- navbar --}}
    @include('components.layouts.sidebar')
    {{-- akhir navbar --}}

    {{-- sidebar position --}}
    <div class="md:block hidden w-[22%] xl:w-1/6"></div>
    {{-- akhir sidebar position --}}

    <div class="w-4/5 ps-5 pe-24 xl:pe-12">
      {{-- navbar --}}
      @include('components.layouts.navbar')
      {{-- akhir navbar --}}

      {{-- content --}}
      {{ $slot }}
      {{-- akhir content --}}
    </div>
  </div>
  {{-- akhir tampilan Laptop/Tablet --}}
  {{-- tampilan Mobile --}}
  <div class="md:hidden flex flex-col justify-center items-center w-screen h-screen">
    <img src="{{ asset('img/logo.png') }}" class="w-20 mb-10" alt="">
    <p class="text-center font-bold text-red-500 text-xl">Perangkat Ini Tidak Mendukung!</p>
    <p class="text-center ">Silahkan Menggunakan Perangkat Yang Lebih Lebar</p>
  </div>
  {{-- akhir tampilan Mobile --}}
  @livewireScripts

  {{-- icon --}}
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  {{-- akhir icon --}}
</body>

</html>