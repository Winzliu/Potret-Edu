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
  {{-- style --}}
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  {{-- akhir style --}}
  @vite('resources/css/app.css')
  @livewireStyles
</head>

<body class="min-h-screen bg-blue-50 font-Poppins">
  {{-- tampilan Mobile --}}
  @include('components.mobile')
  {{-- akhir tampilan Mobile --}}

  {{-- tampilan Laptop/Tablet --}}
  {{-- login --}}
  @auth
  <div class="md:flex hidden">
    {{-- sidebar --}}
    @include('components.layouts.sidebar')
    {{-- akhir sidebar --}}

    {{-- sidebar position --}}
    <div class="md:block hidden w-[22%] xl:w-1/6"></div>
    {{-- akhir sidebar position --}}

    <div class="w-[80%] ps-5 z-50">

      {{-- content --}}
      {{ $slot }}
      {{-- akhir content --}}
    </div>
  </div>
  @endauth
  {{-- akhir login --}}

  {{-- akhir tampilan Laptop/Tablet --}}

  {{-- flowbite --}}
  <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
  {{-- akhir flowbite --}}

  {{-- ionicons --}}
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  {{-- akhir ionicons --}}

  {{-- script --}}
  <script src="{{ asset('js/script.js') }}"></script>
  {{-- akhir script --}}
  @livewireScripts
</body>

</html>