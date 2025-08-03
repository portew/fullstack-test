<div class="w-full max-w-[1500px] sm:px-12 m-auto gap-5 xl:flex xxl:gap-10">
  @if(isset($winners['spa']))
    <x-layout.winnersTable title="Weekendowy pobyt w SPA" :winners="$winners['spa']" />
  @endif
  @if(isset($winners['kitchen-tools']))
    <x-layout.winnersTable title="Zestaw gadżetów kuchennych" :winners="$winners['kitchen-tools']" />
  @endif
  @if(isset($winners['box']))
    <x-layout.winnersTable title="Pudełko" :winners="$winners['box']" />
  @endif
</div>
