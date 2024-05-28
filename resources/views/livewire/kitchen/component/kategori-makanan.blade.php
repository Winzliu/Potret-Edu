<div class="flex gap-5 my-5 flex-wrap w-10/12">
    <button wire:click="categoryActive('0')" class="
    @if ($active == '0')
        bg-mainColor
    @else
        hover:bg-gray-200 bg-white text-mainColor hover:-translate-y-0.5 duration-300 transition-all
    @endif
    rounded-lg min-w-24 shadow-md px-3 py-1 font-semibold text-lg">Semua</button>
    @foreach ($categories as $category)
    <button wire:click="categoryActive('{{ $category->menu_category_id }}')" class="
        @if ($active == $category->menu_category_id)
        bg-mainColor
        @else
        hover:bg-gray-200 bg-white text-mainColor hover:-translate-y-0.5 duration-300 transition-all
        @endif
        rounded-lg min-w-24 px-3 py-1 font-semibold text-lg shadow-md">{{
        $category->menu_category_name }}</button>
    @endforeach
</div>