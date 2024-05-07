<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  {{-- poppins Font --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  {{-- akhir poppins font --}}
  @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-blue-50 font-Poppins">
  <div class="flex flex-col items-center justify-center px-8 py-10 mx-auto md:h-screen">
    @if(session()->has('loginError'))
    <div role="alert" class="alert alert-error rounded-lg absolute top-10 w-auto opacity-0 animate-notif unselectable">
      <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <span>{{ session('loginError') }}</span>
    </div>
    @endif
    <div class="w-full bg-white rounded-xl shadow md:mt-0 md:max-w-xl xl:p-0 p-10 flex flex-col items-center py-10">
      <img class="w-40 h-40 mt-8 rounded-full" src="../img/logo.png" alt="logo">
      <p class="text-2xl font-bold text-gray-900">
        Potret Edupark
      </p>
      <form class="w-full space-y-6 md:space-y-12 md:p-6 mx-auto" action="/login" method="POST">
        @csrf
        <div>
          <label for="username" class="border-current block mb-2 text-sm font-medium text-gray-900">Username</label>
          <input type="username" name="username" id="username" class="input input-bordered w-full max-w-xl"
            placeholder="Masukkan username anda" required autofocus>
          @error('username')
          <p class="text-red-500 text-xs ps-1">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
          <div class="relative">
            <input type="password" name="password" id="password" class="input input-bordered w-full max-w-xl"
              placeholder="Masukkan password anda" required>
            <button onclick="showPassword()" type="button" class="absolute text-xl w-[35px] h-[35px] top-2 right-2
              flex justify-center items-center">
              <ion-icon name="eye" id="toggle"></ion-icon>
            </button>
          </div>
          @error('password')
          <p class="text-red-500 text-xs ps-1">{{ $message }}</p>
          @enderror
        </div>
        <div class="flex items-center justify-center">
          <button class="btn btn-success text-white px-10">Masuk</button>
        </div>
      </form>
    </div>
  </div>
  {{-- icon --}}
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  {{-- akhir icon --}}

  <script>
    // show password
    function showPassword() {
        const toggle = document.getElementById('toggle');
        const passwordInput = document.getElementById('password');
  
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
  
        if (toggle.getAttribute('name') === 'eye') {
            toggle.setAttribute('name', 'eye-off');;
        } else {
          toggle.setAttribute('name', 'eye');;
        }
    }
  // akhir show password
  </script>
</body>

</html>