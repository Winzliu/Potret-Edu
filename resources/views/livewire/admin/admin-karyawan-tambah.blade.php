<div class="pt-8 pe-8 xl:pe-0">
    <a href="/admin/karyawan" wire:navigate class="flex items-center gap-2 font-bold">
        <svg class="
            @if(auth()->user()->userDetail->custom == 'kecil')
                w-4
            @elseif(auth()->user()->userDetail->custom == 'normal')
                w-6
            @elseif(auth()->user()->userDetail->custom == 'besar')
                w-8
            @endif"
        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
        </svg>                
        <p>Kembali</p>
    </a>
    <p class="font-bold text-3xl text-center">Tambah Karyawan</p>
    {{-- form --}}
    <div
        class="bg-tertiaryColor mb-8 flex flex-col justify-center rounded-lg mt-5 overflow-y-scroll h-[100vh] xl:h-[75vh] scrollbar-hidden  shadow-[0_0_60px_0_rgba(0,0,0,0.2)]">
        <div class="flex flex-wrap gap-x-5 gap-y-2 px-10 justify-center pt-0 xl:pt-20">
            {{-- nama karyawan --}}
            <label class="form-control w-full max-w-md">
                <div class="label">
                    <span class="label-text font-semibold text-white">Nama Karyawan</span>
                </div>
                <input type="text" placeholder="Nama Karyawan" wire:model="name"
                    class="input input-bordered w-full max-w-md cursor-pointer text-sm" />
                @error('name')
                <i class="text-red-500 ms-4 mt-0 mb-0 font-medium">
                    *{{ $message }}
                </i>
                @enderror
            </label>
            {{-- akhir nama karyawan --}}
            {{-- nomor Telepon --}}
            <label class="form-control w-full max-w-md">
                <div class="label">
                    <span class="label-text font-semibold text-white">Nomor Telepon</span>
                </div>
                <input type="number" placeholder="Nomor Telepon Karyawan" wire:model="phone_number"
                    class="input input-bordered w-full max-w-md cursor-pointer text-sm" />
                @error('phone_number')
                <i class="text-red-500 ms-4 mt-0 mb-0 font-medium">
                    *{{ $message }}
                </i>
                @enderror
            </label>
            {{-- akhir nomor Telepon --}}
            {{-- Tanggal Masuk --}}
            <label class="form-control w-full max-w-md">
                <div class="label">
                    <span class="label-text font-semibold text-white">Tanggal Masuk</span>
                </div>

                <div class="relative max-w-md">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                        <input id="datepicker" datepicker type="text" wire:model="employment_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-3.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 cursor-pointer"
                            placeholder="Tanggal Masuk Karyawan">
                    </div>
                    @error('employment_date')
                        <i class="text-red-500 ms-4 mt-0 mb-0 font-medium">
                            *{{ $message }}
                        </i>
                    @enderror
            </label>
            {{-- akhir Tanggal Masuk --}}
            {{-- Alamat --}}
            <div class="w-full max-w-md relative">
                <div class="label">
                    <span class="label-text font-semibold text-white">Alamat Lengkap</span>
                </div>
                <input type="text" id="alamat" placeholder="Alamat Lengkap Karyawan" wire:model="address"
                    class="input input-bordered w-full max-w-md cursor-pointer text-sm" autocomplete="off" />
                <div id="pelengkap-alamat" wire:click="selectAddress(suggestion)" class="absolute z-50 bg-white w-full max-w-md rounded-lg">
                </div>
                @error('address')
                    <i class="text-red-500 ms-4 mt-0 mb-0 font-medium">
                        *{{ $message }}
                    </i>
                @enderror
            </div>
            {{-- Akhir Alamat --}}
        </div>
        <div class="flex flex-wrap gap-y-2 gap-x-5 px-10 justify-center">
            {{-- Role --}}
            <label class="form-control w-full max-w-md text-start">
                <div class="label w-full">
                    <span class="label-text font-semibold text-white">Role</span>
                </div>
                <select id="role" wire:model="role" name="role"
                    class="bg-gray-50 h-full border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block text-bold p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full text-left">
                    <option value="" selected>Choose Role</option>
                    <option value="Waiter">Waiter</option>
                    <option value="Cashier">Cashier</option>
                    <option value="Kitchen">Kitchen</option>
                </select>
                @error('role')
                <i class="text-left text-red-500 ms-4 mt-0 mb-0 font-medium">
                    *{{ $message }}
                </i>
                @enderror
            </label>
            <label class="form-control w-full max-w-md text-start">
                <div class="label w-full">
                    <span class="label-text font-semibold text-white">Posisi</span>
                </div>
                <input wire:model="position" type="text" name="position" placeholder="Posisi Karyawan" class="input input-bordered w-full max-w-md cursor-pointer text-sm">
                @error('position')
                <i class="text-red-500 ms-4 mt-0 mb-0 font-medium">
                    *{{ $message }}
                </i>
                @enderror
            </label>
        </div>
        <div class="flex flex-wrap gap-y-2 gap-x-5 justify-center w-full">
            <label class="form-control w-full max-w-md text-start">
                <div class="label w-full">
                    <span class="label-text font-semibold text-white">Deskripsi</span>
                </div>
                <input wire:model="description" name="description" type="text" placeholder="Deskripsi Karyawan" class="input input-bordered w-full cursor-pointer text-sm">
                @error('description')
                <i class="text-red-500 ms-4 mt-0 mb-0 font-medium">
                    *{{ $message }}
                </i>
                @enderror
            </label>
        </div>      
        <div class="divider mt-5 mb-0"></div>
        <div class="flex flex-wrap gap-y-2 gap-x-5 pb-8 px-10 justify-center">
            {{-- username --}}
            <label class="form-control w-full max-w-md text-start items">
                <div class="label">
                    <span class="label-text font-semibold text-white">Username</span>
                </div>
                <input type="text" placeholder="Username" wire:model="username"
                    class="input input-bordered w-full max-w-md cursor-pointer text-sm" />
                    @error('username')
                    <i class="text-red-500 ms-4 mt-0 mb-0 font-medium">
                        *{{ $message }}
                    </i>
                    @enderror
            </label>
            {{-- akhir username --}}
            {{-- Password --}}
            <label class="form-control w-full max-w-md text-start">
                <div class="label">
                    <span class="label-text font-semibold text-white">Password</span>
                </div>
                <div class="relative">
                    <input id="password" type="password" placeholder="Password" wire:model="password" name="password"
                        class="input input-bordered w-full max-w-md cursor-pointer text-sm" />
                        <button onclick="showPassword()" type="button" class="absolute text-xl w-[35px] h-[35px] top-2 right-2
                        flex justify-center items-center">
                        <ion-icon name="eye" id="toggle"></ion-icon>
                        </button>
                </div>
                @error('password')
                    <i class="text-red-500 ms-4 mt-0 mb-0 font-medium">
                        *{{ $message }}
                    </i>
                @enderror
            </label>
            {{-- akhir Password --}}
        </div>
       
        <button wire:click="modal_tambah"
            class="flex mx-auto px-8 py-3  border-2 mb-6 bg-secondaryColor border-secondaryColor hover:bg-mainColor hover:border-mainColor text-black font-bold rounded-lg">Simpan</button>
    </div>
    {{-- akhir form --}}

    {{-- MODAL HAPUS  --}}
        @if($modalTambah)
        <div class="fixed top-0 left-0 w-full h-full bg-slate-500 bg-opacity-30 flex justify-center items-center">
            <div class="bg-background px-12 py-10 rounded-xl shadow-lg text-center border-4 border-tertiaryColor font-semibold">
                <p>Apakah Anda yakin ingin menambah Karyawan?</p>
                <div class="mt-4 flex flex-row justify-center gap-8 font-medium">
                    <button wire:click="$set('modalTambah', false)"
                        class="bg-red-500 hover:bg-red-600  px-8 py-2 text-white rounded-md">Tidak</button>
                    <button wire:click="buatKaryawan" class="bg-greenConfirm hover:bg-green-500 text-white px-10 py-2 rounded-md mr-2">Ya</button>
                </div>
            </div>
        </div>
        @endif
    {{-- AKHIR MODAL HAPUS --}}

    {{-- loading --}}
    <dialog wire:loading wire:target="buatKaryawan" wire:loading.attr="open"
    class="modal bg-black/30">
    <span
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 loading loading-spinner loading-lg"></span>
    </dialog>
    {{-- akhir loading --}}


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


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize datepicker
            $('#datepicker').datepicker({
                dateFormat: 'yy-mm-dd', // Adjust date format
                onSelect: function (dateText) {
                    @this.set('employment_date', dateText); // Update Livewire property
                }
            });
    
            // Update datepicker when Livewire property changes
            window.livewire.hook('message.processed', (message, component) => {
                const date = @this.get('employment_date');
                if (date) {
                    $('#datepicker').datepicker('setDate', date);
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize datepicker
            $('#datepicker').datepicker({
                dateFormat: 'yy-mm-dd', // Adjust date format
                onSelect: function (employment_date) {
                    // Update Livewire property
                    @this.set('employment_date', employment_date);
                }
            });
    
            // Update datepicker when Livewire property changes
            window.livewire.hook('message.processed', (message, component) => {
                const date = @this.get('employment_date');
                if (date) {
                    $('#datepicker').datepicker('setDate', date);
                }
            });
        });
    </script>
    
</div>