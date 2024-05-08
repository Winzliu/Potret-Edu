<div class="flex flex-wrap gap-4 justify-start overflow-y-scroll h-[75vh] scrollbar-hidden">
    @php
    $i = 1;
    @endphp
    @foreach ($menus as $menu)
    {{-- card 1 --}}
    <div
        class="card min-w-1/4 w-[15.5rem] h-[17rem] px-4 py-4 bg-base-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl">
        <figure class="mb-3 cursor-pointer" onclick="my_modal_{{ $i }}.showModal()">
            <img src="{{ asset('img/makanan.jpg') }}" alt="Shoes" class="rounded-xl h-36 w-full object-cover" />
        </figure>
        <div class="items-center text-left">
            <h2 class="text-lg font-bold">{{ $menu->menu_name }}</h2>
            <div class="flex items-end justify-between mt-2">
                <div class="">
                    <p class="text-xs w-32">{{ Str::limit($menu->menu_description, 15) }}</p>
                    <p class="font-semibold">Rp. {{ number_format($menu->menu_price,0, ',', '.') }}</p>
                </div>
                <button class="bg-mainColor w-10 h-10 rounded-full font-bold text-2xl">
                    +
                </button>
            </div>
        </div>
    </div>
    {{-- modal 1 --}}
    <dialog id="my_modal_{{ $i }}" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-2xl text-center">{{ $menu->menu_name }}</h3>
            <div class="flex justify-evenly">
                <div class="w-32">
                    <p class="pt-4 font-semibold">Bahan :</p>
                    @php
                    $menuDescriptions = explode(',', $menu->menu_description);
                    @endphp
                    <ul class="list-disc text-wrap">
                        @foreach($menuDescriptions as $description)
                        <li>{{ trim($description) }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="w-32 ">
                    <p class="pt-4 font-semibold">Alergi :</p>
                    @php
                    $menuAllergens = explode(',', $menu->menu_allergen);
                    @endphp
                    <ul class="list-disc text-wrap">
                        @foreach($menuAllergens as $allergen)
                        <li>{{ trim($allergen) }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    {{-- akhir modal 1 --}}
    {{-- akhir card 1 --}}
    @php
    $i++;
    @endphp
    @endforeach
</div>