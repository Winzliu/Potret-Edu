<div class="mt-7">
    <a href="/kitchen" wire:navigate class="flex items-center gap-2 font-bold">
        <ion-icon name="arrow-back-outline"></ion-icon>
        <p>Kembali</p>
    </a>
    <div class="flex items-center gap-5 my-2">
        <p class="text-3xl font-bold">Detail Menu</p>
    </div>
    <div class="w-full bg-red-100 mt-8">
        <div class="flex justify-center bg-slate-200">
            <label for="gambar" class="cursor-pointer relative w-3/4 shadow-[0_0_10px_3px_rgba(0,0,0,0.2)] rounded-xl flex justify-center">
                <i id="placeholderIcon"
                    class='icon-[icon-park-outline--add-picture] text-gray-400 bg-slate-100 w-full md:w-[500px] md:h-[350px] lg:h-[450px] lg:w-[886px] text-[250px] lg:text-[400px] md:text-[300px] max-sm:text-[200px] px-0 max-sm:px-7 sm:px-10 text-center shadow-[0_0_15px_0_rgba(0,0,0,0.5)] rounded-md'></i>
                <img id="previewImage"
                    class="object-contain bg-slate-100 w-full max-md:w-[700px] md:h-[350px] lg:h-[450px] lg:w-[886px] shadow-xl hidden"
                    src="" alt="Preview Image">
                <input type="file" id="gambar" name="gambar" class="hidden" accept="image/*"
                    onchange="previewFile()">
            </label>
        </div>
        
        <div class="text-start mx-auto 2xl:mx-40 mt-2 font-bold">
            <p id="fileInfo" class="mt-0 mb-0 font-medium"></p>
            <i class="text-red-500">*klik gambar di atas untuk mengunggah file</i>
            @error('gambar')
            <p class="text-red-500 mt-0 mb-0 font-bold">
                *({{ $message }})
            </p>
            @enderror
        </div>

        <div >
            <label for=""></label>
        </div>
    </div>
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
