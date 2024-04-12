<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>To Do List</title>
  @vite('resources/css/app.css')
  @livewireStyles
</head>

<body class="min-h-screen flex flex-col justify-between">
  {{-- navbar --}}
  <p>navbar</p>
  {{-- akhir navbar --}}

  {{-- content --}}
  {{ $slot }}
  {{-- akhir content --}}

  {{-- footer --}}
  <p>footer</p>
  {{-- akhir footer --}}
  @livewireScripts
</body>

</html>