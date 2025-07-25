<div class="mt-2 ">
    <div class="overflow-x-hidden flex items-center rounded-2xl bg-cookie-misty-rose px-4 py-3 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-cookie-verdigris">
        <select {{ $attributes->merge(['class' => 'col-start-1 row-start-1 w-full appearance-none font-normal grow pl-1 pr-3 text-xxl placeholder:text-black focus:outline focus:outline-0 font-mono bg-cookie-misty-rose border-0']) }}>
            {{ $slot }}
        </select>
    </div>
</div>

