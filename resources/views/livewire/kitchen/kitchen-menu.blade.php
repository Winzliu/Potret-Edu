<div class="mb-10 h-[10vh]">
    {{-- search --}}
    @livewire('kitchen.component.search-menu')
    {{-- akhir search --}}

    @livewire('kitchen.component.kategori-makanan', ['active' => $active, 'categories' => $categories])
    
    @livewire('kitchen.component.card-menu-makanan', ['categoryId' => $category_id])
</div>