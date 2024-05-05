<div class="pt-8 pe-10">
    <a href="/admin" wire:navigate class="flex items-center font-bold text-lg gap-1">
        <ion-icon name="arrow-back"></ion-icon>
        <p>Kembali</p>
    </a>
    <p class="font-bold text-3xl text-center">Tambah Karyawan</p>
    {{-- form --}}
    <div
        class="bg-tertiaryColor rounded-lg mt-5 overflow-y-scroll scrollbar-hidden h-[78vh] shadow-[0_0_60px_0_rgba(0,0,0,0.2)]">
        <div class="flex flex-wrap gap-x-5 gap-y-2 pt-6 px-10 justify-center">
            {{-- nama karyawan --}}
            <label class="form-control w-full max-w-md">
                <div class="label">
                    <span class="label-text font-semibold text-white">Nama Karyawan</span>
                </div>
                <input type="text" placeholder="Nama Karyawan"
                    class="input input-bordered w-full max-w-md cursor-pointer text-sm" />
            </label>
            {{-- akhir nama karyawan --}}
            {{-- nomor Telepon --}}
            <label class="form-control w-full max-w-md">
                <div class="label">
                    <span class="label-text font-semibold text-white">Nomor Telepon</span>
                </div>
                <input type="number" placeholder="Nomor Telepon Karyawan"
                    class="input input-bordered w-full max-w-md cursor-pointer text-sm" />
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
                    <input datepicker type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-3.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 cursor-pointer"
                        placeholder="Tanggal Masuk Karyawan">
                </div>

            </label>
            {{-- akhir Tanggal Masuk --}}
            {{-- Alamat --}}
            <div class="w-full max-w-md relative">
                <div class="label">
                    <span class="label-text font-semibold text-white">Alamat Lengkap Karyawan</span>
                </div>
                <input type="text" id="alamat" placeholder="Alamat Lengkap Karyawan"
                    class="input input-bordered w-full max-w-md cursor-pointer text-sm" autocomplete="off" />
                <div id="pelengkap-alamat" class="absolute bg-white w-full max-w-md rounded-lg">
                </div>
            </div>
            {{-- Akhir Alamat --}}
        </div>
        <div class="divider mt-5 mb-0"></div>
        <div class="flex flex-wrap gap-y-2 gap-x-5 pb-8 px-10 justify-center">
            {{-- Role --}}
            <label class="form-control w-full items-center">
                <div class="label">
                    <span class="label-text font-semibold text-white">Role</span>
                </div>
                <select id="countries"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block text-bold p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-auto text-center">
                    <option selected>Choose Role</option>
                    <option value="Waiter">Waiter</option>
                    <option value="Cashier">Cashier</option>
                    <option value="Kitchen">Kitchen</option>
                </select>
            </label>
            {{-- akhir Role --}}
            {{-- username --}}
            <label class="form-control w-full max-w-md">
                <div class="label">
                    <span class="label-text font-semibold text-white">Username</span>
                </div>
                <input type="text" placeholder="Username"
                    class="input input-bordered w-full max-w-md cursor-pointer text-sm" />
            </label>
            {{-- akhir username --}}
            {{-- Password --}}
            <label class="form-control w-full max-w-md">
                <div class="label">
                    <span class="label-text font-semibold text-white">Password</span>
                </div>
                <input type="password" placeholder="Password"
                    class="input input-bordered w-full max-w-md cursor-pointer text-sm" />
            </label>
            {{-- akhir Password --}}
        </div>
        <button
            class="flex mx-auto px-8 py-3 border-2 mb-6 bg-green-500 border-green-600 hover:bg-green-700 text-white font-bold rounded-lg">Simpan</button>
    </div>
    {{-- akhir form --}}
</div>