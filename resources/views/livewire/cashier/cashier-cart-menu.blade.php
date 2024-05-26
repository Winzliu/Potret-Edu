<div class="">
    {{-- search --}}
    @livewire('cashier.component.search-menu')
    {{-- akhir search --}}

    {{-- katergori makanan --}}
    @livewire('cashier.component.kategori-makanan', ['active' => $active, 'categories' => $categories])
    {{-- akhir kategori makanan --}}

    @if ($pesanan_id)
    {{-- card makanan --}}
    @livewire('cashier.component.card-menu-makanan', ['categoryId' => $category_id, 'pesanan_id' => $pesanan_id])
    {{-- akhir card makanan --}}

    {{-- sidebar kanan --}}
    @livewire('cashier.component.edit-sidebar-kanan', ['pesanan_id' => $pesanan_id])
    {{-- akhir sidebar kanan --}}
    @else
    {{-- card makanan --}}
    @livewire('cashier.component.card-menu-makanan', ['categoryId' => $category_id])
    {{-- akhir card makanan --}}

    {{-- sidebar kanan --}}
    @livewire('cashier.component.cashier-sidebar-kanan')
    {{-- akhir sidebar kanan --}}
    @endif

</div