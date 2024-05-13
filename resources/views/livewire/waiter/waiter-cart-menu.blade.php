<div class="">
    {{-- search --}}
    @livewire('waiter.component.search-menu')
    {{-- akhir search --}}

    {{-- katergori makanan --}}
    @livewire('waiter.component.kategori-makanan', ['active' => $active, 'categories' => $categories])
    {{-- akhir kategori makanan --}}
    {{-- card makanan --}}
    @livewire('waiter.component.card-menu-makanan', ['categoryId' => $category_id])
    {{-- akhir card makanan --}}

    {{-- sidebar kanan --}}
    @livewire('waiter.component.waiter-sidebar-kanan')
    {{-- akhir sidebar kanan --}}
</div