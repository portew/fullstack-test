<div class="flex items-center rounded-2xl bg-cookie-misty-rose px-4 py-3 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-cookie-verdigris relative">
    @if($id === 'receipt-number')
        <x-layout.inputNumber>1</x-layout.inputNumber>
    @elseif($id === 'purchase-date')
        <x-layout.inputNumber>2</x-layout.inputNumber>
    @endif
    <input {{ $attributes->merge(['type' => 'text', 'class' => 'block min-w-0 font-normal grow pl-1 pr-3 text-xxl placeholder:text-black  focus:outline focus:outline-0 font-sans border-0 bg-cookie-misty-rose']) }}>
</div>

