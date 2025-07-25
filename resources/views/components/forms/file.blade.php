<div>
    <input {{ $attributes->merge(['type' => 'file', 'class' => 'hidden']) }}>
    <label for="{{$labelFor}}">
        <div class="flex justify-between flex-col sm:flex-row gap-6">
            <div class="grow rounded-2xl px-4 py-3 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-cookie-verdigris relative sm:w-8/12">
                <x-layout.paragraph class="break-all block min-w-0 font-normal grow pl-1 pr-3 text-xxl placeholder:text-black  focus:outline focus:outline-0 font-mono border-0 text-start">{{$placeholder}}</x-layout.paragraph>
            </div>
            <div class="h-auto mt-3 sm:mt-0 ">
                <div id="" class="whitespace-nowrap h-full button flex items-center justify-center w-full sm:w-fit bg-cookie-verdigris text-black hover:bg-cookie-celeste hover:text-black rounded-full px-12 text-2xl transition-colors duration-500 cursor-pointer uppercase font-bold py-2 sm:py-0" >
                    Wskaż plik
                </div>
            </div>
        </div>
    </label>
</div>

