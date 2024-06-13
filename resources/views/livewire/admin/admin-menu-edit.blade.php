<div class="mt-7">
    {{-- START --}}
    <a href="/admin/menu" wire:navigate class="flex items-center gap-2 font-bold">
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
    <div class="flex items-center gap-5 my-2">
        <p class="text-3xl font-bold">Edit Menu</p>
    </div>
    <div class="w-full mt-8 font-medium h-[80vh] overflow-y-scroll scrollbar-hidden bg-tertiaryColor rounded-xl">
        <p class="mx-5 mb-2 font-semibold text-white my-6 text-center">Gambar Menu</p>
        <div class="flex flex-col justify-center items-center mx-6">
        {{-- FORM --}}
            {{-- GAMBAR --}}
            <label id="label_gambar" for="gambar" class="bg-background  w-5/12 cursor-pointer relative h-[200px] 
            shadow-[0_0_10px_0px_rgba(0,0,0,0.3)] rounded-xl flex items-center justify-center">
            @if ($gambar)
            <img id="previewImage"
                 class="object-contain h-[200px]"
                 src="{{ $gambar->temporaryUrl() }}" alt="Preview Image">
            @elseif($oldImageUrl)
                <img id="previewImage"
                    class="object-contain h-[200px]"
                    src="{{ asset("storage/menu-images/" . $oldImageUrl) }}" alt="Old Image">
            @else
                <i id="placeholderIcon"
                class='icon-[icon-park-outline--add-picture] text-gray-400   
                text-9xl text-center rounded-md'></i>
            @endif
                <input wire:model="gambar"
                type="file" id="gambar" name="gambar" class="hidden" accept="image/*">
            </label>
            
            <div class="text-start mx-5 2xl:mx-40 mt-2 font-semibold">
                <p id="fileInfo" class="mt-0 mb-0 font-medium"></p>
                @error('gambar')
                <i class="text-red-500 font-medium">
                    *{{ $message }}
                </i><br>
                @enderror
                <i class="text-slate-200">*klik gambar di atas untuk mengunggah file</i>
            </div>
        </div>

        <div class="flex flex-col gap-4">
            {{-- NAMA MENU --}}
            <div class="flex flex-col w-full gap-2">
                <label for="menu_name" class="mx-5 font-semibold text-white">Nama Menu</label>
                <input autocomplete="off" type="text" wire:model="menu_name"
                class="rounded-lg mx-5" name="menu_name">
                @error('menu_name')
                <i class="text-red-500 ms-4 mt-0 mb-0 font-medium">
                    *{{ $message }}
                </i>
                @enderror
            </div>
            <div class="flex  gap-2">
                {{-- HARGA MENU --}}
                <div class="flex flex-col gap-2">
                    <label for="menu_category" class="mx-5 font-semibold text-white">Kategori Menu</label>
                    <select class="mx-5  rounded-lg w-full max-w-xs" wire:model="menu_category" name="menu_category">
                        <option selected>Pilih kategori menu</option>
                        @foreach ($menu_categories as $category)
                            <option value="{{ $category->menu_category_id }}">{{ $category->menu_category_name }}</option>
                        @endforeach
                      </select>
                    @error('menu_category')
                    <i class="text-red-500 ms-4 mt-0 mb-0 font-medium">
                        *{{ $message }}
                    </i>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label for="harga_menu" class="mx-5 font-semibold text-white">Harga Menu</label>
                    <input autocomplete="off" type="number" 
                        wire:model="menu_price"
                    class="rounded-lg mx-5" name="menu_price" placeholder="Masukkan Harga">
                    @error('menu_price')
                    <i class="text-red-500 ms-4 mt-0 mb-0 font-medium">
                        *{{ $message }}
                    </i>
                    @enderror
                </div>
            </div>

            {{-- ALERGEN --}}
            <div class="flex flex-col w-full gap-2">
                <label for="alergen_menu" class="mx-5 font-semibold text-white">Alergen <i class="font-medium text-slate-200">*Gunakan format koma. Cth: Udang, Susu</i></label>
                <input  autocomplete="off" type="text" wire:model.live.debounce.300ms="menu_allergen"class="rounded-lg mx-5" name="menu_allergen" placeholder="Masukkan bahan makanan yang berpotensi memicu alergi">
                @error('menu_allergen')
                <i class="text-red-500 ms-4 mt-0 mb-0 font-medium">
                    *{{ $message }}
                </i>
                @enderror
            </div>
            {{-- WYSWYG Deskripsi --}}
            <div class="flex flex-col w-full gap-2">
                <label for="menu_description" class="mx-5 font-semibold text-white">Bahan Menu <i class="font-medium text-slate-200">*Gunakan format koma. Cth: Nasi, 3 Butir Bakso</i></label>
                <div class="mx-5">
                    <input wire:model.live.debounce.300ms="menu_description"
                    autocomplete="off" class="w-full rounded-md p-2 border border-black focus:outline-none focus:border-primaryColor"
                        id="menu_description" name="menu_description" placeholder="Masukkan Bahan Menu"/>
                    @error('menu_description')
                    <i class="text-red-500 ms-4 mt-0 mb-0 font-medium">
                        *{{ $message }}
                    </i>
                    @enderror
                </div>
            </div>
        </div>
        <div class="mx-5 flex justify-end my-4">
            <button type="button" wire:click="modal_tambah" 
                class="bg-mainColor hover:bg-yellow-500 px-8 py-2 rounded-md font-semibold text-black">Simpan</button>
            {{-- MODAL TAMBAH  --}}
                @if($modalTambah)
                <div class="fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 flex justify-center items-center">
                    <div class="bg-background px-12 py-10 rounded-xl shadow-lg text-center border-4 border-tertiaryColor font-semibold">
                        <p>Apakah Anda yakin ingin menambah menu ini?</p>
                        <div class="mt-4 flex flex-row justify-center gap-8 font-medium">
                            <button wire:click="$set('modalTambah', false)"
                                class="bg-red-500 hover:bg-red-600 px-8 py-2 text-white rounded-md">Tidak</button>
                            <button wire:click="editMenu" class="bg-greenConfirm hover:bg-green-500 text-white px-10 py-2 rounded-md mr-2">Ya</button>
                        </div>
                    </div>
                </div>
                @endif
            {{-- AKHIR MODAL TAMBAH --}}
        </div>
    </div>
    {{-- <style>
        .tox-tinymce {
        border: 1px solid #000000; /* Warna hitam */
      }
    </style> --}}
    @livewireScripts

    <script>
        function previewFile() {
            var fileInput = document.getElementById('gambar');
            var placeholderIcon = document.getElementById('placeholderIcon');
            var previewImage = document.getElementById('previewImage');
            const fileInfo = document.getElementById('fileInfo');
            
            const file = fileInput.files[0];
    
            // Menampilkan nama file yang dipilih
            fileInfo.textContent = file ? `File terpilih: ${file.name}` : '';
    
            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();
    
                reader.onload = function (e) {
                    placeholderIcon.style.display = 'none';  // Sembunyikan elemen i
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';  // Tampilkan elemen gambar
                };
    
                reader.readAsDataURL(fileInput.files[0]);
            } else {
                // Jika tidak ada file yang diupload, tampilkan kembali elemen i dan sembunyikan gambar
                placeholderIcon.style.display = 'block';
                previewImage.style.display = 'none';
            }
        }
    </script>
</div>

{{-- WYSIWYG EDITOR START --}}
{{-- <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector: 'textarea#deskripsi_menu',
        plugins: 'textcolor colorpicker',
        toolbar_mode: 'floating',
        toolbar: 'undo redo | styleselect | bold italic underline strikethrough alignleft alignright alignjustify aligncenter forecolor backcolor | fontsizeinput | bullist numlist outdent indent' ,
        font_size_input_default_unit: "px",
        statusbar: false,
        setup: function(editor) {
            editor.on('init', function() {
                this.formatter.register('remove_font_styles', {
                    inline: 'span',
                    styles: {'font-size': '%value'}
                });
            });
        }
    });
</script> --}}
{{-- WYSIWYG EDITOR END --}}
