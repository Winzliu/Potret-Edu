<div class="">
    {{-- search --}}
    @livewire('waiter.component.search-menu')
    {{-- akhir search --}}

    {{-- katergori makanan --}}
    @livewire('waiter.component.kategori-makanan', ['active' => $active, 'categories' => $categories])
    {{-- akhir kategori makanan --}}

    @if ($pesanan_id)
    {{-- card makanan --}}
    @livewire('waiter.component.card-menu-makanan', ['categoryId' => $category_id, 'pesanan_id' => $pesanan_id])
    {{-- akhir card makanan --}}

    {{-- sidebar kanan --}}
    @livewire('waiter.component.edit-sidebar-kanan', ['pesanan_id' => $pesanan_id])
    {{-- akhir sidebar kanan --}}
    @else
    {{-- card makanan --}}
    @livewire('waiter.component.card-menu-makanan', ['categoryId' => $category_id])
    {{-- akhir card makanan --}}

    {{-- sidebar kanan --}}
    @livewire('waiter.component.waiter-sidebar-kanan')
    {{-- akhir sidebar kanan --}}
    @endif
</div