<div class="mt-7">
    <a href="/admin/menu" wire:navigate class="flex items-center gap-2 font-bold">
        <ion-icon name="arrow-back-outline"></ion-icon>
        <p>Kembali</p>
    </a>
    <div class="flex items-center gap-5 my-2">
        <p class="text-3xl font-bold">Tambah Menu</p>
    </div>
    <div class="w-full mt-8 font-medium">
        <p class="mx-5 mb-2 font-semibold">Gambar Menu</p>
        <div class="flex flex-col justify-center items-center ">

        {{-- FORM --}}
        <form action="" method="post" enctype="multipart/form-data">
        @csrf
            {{-- GAMBAR --}}
            <label for="gambar" class="cursor-pointer relative h-[200px] shadow-[0_0_10px_0px_rgba(0,0,0,0.3)] rounded-xl flex items-center justify-center">
                <i id="placeholderIcon"
                    class='icon-[icon-park-outline--add-picture] text-gray-400   
                    text-9xl text-center shadow-[0_0_15px_0_rgba(0,0,0,0.5)] rounded-md'></i>
                <img id="previewImage"
                    class="object-contain w-3/5 h-[200px] hadow-xl hidden"
                    src="" alt="Preview Image">
                <input type="file" id="gambar" name="gambar" class="hidden" accept="image/*"
                    onchange="previewFile()">
            </label>
            
            <div class="text-start mx-5 2xl:mx-40 mt-2 font-semibold">
                <p id="fileInfo" class="mt-0 mb-0 font-medium"></p>
                <i class="text-red-500">*klik gambar di atas untuk mengunggah file</i>
                @error('gambar')
                <p class="text-red-500 mt-0 mb-0 font-bold">
                    *({{ $message }})
                </p>
                @enderror
            </div>

            {{-- <input type="file" id="gambar2" name="gambar" accept="image/*" onchange="previewFile()"
            class="file-input file-input-bordered file-input-info w-full my-4"/> --}}
        </div>

        <div class="flex flex-col gap-4">
            {{-- NAMA MENU --}}
            <div class="flex flex-col w-full gap-2">
                <label for="nama_menu" class="mx-5 font-semibold">Nama Menu</label>
                <input type="text" class="rounded-lg mx-5" name="nama" placeholder="Masukkan Nama Menu Baru">
            </div>
            
            {{-- HARGA MENU --}}
            <div class="flex flex-col w-full gap-2">
                <label for="harga_menu" class="mx-5 font-semibold">Harga Menu</label>
                <input type="text" class="w-[28%] rounded-lg mx-5" name="harga" placeholder="Masukkan Harga">
            </div>

            {{-- ALEGERGEN --}}
            <div class="flex flex-col w-full gap-2">
                <label for="alergen_menu" class="mx-5 font-semibold">Alergen</label>
                <input type="text" class="rounded-lg mx-5" name="alergen" placeholder="Masukkan bahan makanan yang berpotensi memicu alergi">
            </div>
            {{-- WYSWYG Deskripsi --}}
            <div class="flex flex-col w-full gap-2">
                <label for="deskripsi" class="mx-5 font-semibold">Deskripsi</label>
                <div class="mx-5">
                    <textarea
                        class="h-[180px] w-full rounded-md p-2 border border-black focus:outline-none focus:border-primaryColor"
                        id="deskripsi_menu" name="deskripsi_menu" placeholder="Masukkan Deskripsi"
                        row="10">{{ old('deskripsi_paket') }}</textarea>
                    @error('deskripsi_paket')
                    <p class="text-red-500 mt-0 mb-0 font-bold">
                        *({{ $message }})
                    </p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="mx-5 flex justify-end my-4">
 <button type="button" onclick="modal_submit.showModal()" 
            class="bg-greenConfirm px-8 py-1 rounded-md text-white">Simpan</button>
            <dialog id="modal_submit" class="modal">
                    <div class="modal-box bg-background">
                    <div class="flex flex-col bg-background items-center">
                        {{-- <div class="border-4 border-greenConfirm p-8 rounded-full">
                            <i class='icon-[ic--outline-question-mark] text-6xl text-greenConfirm'></i>
                        </div> --}}
                        <h3 class="font-dalfitra text-[30px] md:text-[50px] max-sm:text-[30px]">Simpan?</h3>
                        <p class="font-poppins text-[18px] md:text-[20px] max-sm:text-[18px] text-center mb-5">
                            Apakah anda yakin ingin menambah <br>menu baru ini?</p>
                        <div class="flex flex-row-reverse justify-center gap-4 w-full">
                            <button type="submit"
                                class="flex justify-center items-center w-full text-xl font-poppins bg-greenConfirm text-center text-white rounded-md h-12">
                                SIMPAN
                            </button>
        </form>
                        <form method="dialog" class="w-full">
                            <button
                                class="w-full text-[20px] font-poppins h-12 rounded-md  bg-red-500 text-white text-center">
                                BATAL
                            </button>
                        </form>
                        </div>
                    </div>
                </div>
                <form method="dialog" class="modal-backdrop">
                    <button>close</button>
                </form>
            </dialog>
        </div>
    </form>
    </div>
    <style>
        .tox-tinymce {
        border: 1px solid #000000; /* Warna hitam */
      }
    </style>
</div>
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
