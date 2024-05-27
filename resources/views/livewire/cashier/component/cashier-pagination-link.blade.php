<div class="">
  @if ($paginator->hasPages())
  <nav role="navigation" aria-label="Pagination Navigation" class="items-end text-right mt-5">
    <div class="join shadow-[0_0_30px_0_rgba(0,0,0,0.1)]">
      @if ($paginator->onFirstPage())
      <button class="join-item btn bg-slate-300 hover:bg-slate-400" disabled>«</button>
      @else
      <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev"
        class="join-item btn bg-slate-300 hover:bg-slate-400">«</button>
      @endif
      @foreach ($elements as $element)
      @if (is_string($element))
      <a class="join-item btn">{{ $element }}</a>
      @endif
      @if (is_array($element))
      @foreach ($element as $page=>$url)
      @if ($page == $paginator->currentPage())
      <button wire:click="gotoPage({{ $page }})" class="join-item btn bg-mainColor hover:bg-mainColor">{{ $page
        }}</button>
      @else
      <button wire:click="gotoPage({{ $page }})" class="join-item btn">{{ $page }}</button>
      @endif
      @endforeach
      @endif
      @endforeach
      {{-- <button class="join-item btn">1</button>
      <button class="join-item btn bg-mainColor hover:bg-mainColor">2</button>
      <button class="join-item btn">3</button>
      <button class="join-item btn">4</button> --}}
      @if ($paginator->hasMorePages())
      <button wire:click="nextPage" wire:loading.attr="disabled" rel="next"
        class="join-item btn bg-slate-300 hover:bg-slate-400">»</button>
      @else
      <button class="join-item btn bg-slate-300 hover:bg-slate-400" disabled>»</button>
      @endif
    </div>
  </nav>
  @endif
</div>