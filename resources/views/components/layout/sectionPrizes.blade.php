<div class="intro-text w-full mb-12">
    <x-layout.heading class="font-bold text-4xl lg:text-5xl">NAGRODY</x-layout.heading>
</div>
<div class="flex justify-center items-center  lg:items-start flex-col lg:flex-row xl:w-1200 lg:w-960 w-full m-auto">
        <x-layout.prizeBoxGame
            prizeCount="1x"
            prizeSize="normal"
            prizeImage="{{Vite::asset('resources/images/nagroda-1.webp')}}"
            prizeName="Weekendowy pobyt w SPA"
            additionalClasses="flex items-center flex-col  space-y-4"
            class="flex lg:w-3/12 sm:px-4 pe-0 sm:w-1/2 mt-6 lg:mt-0 w-full">
            dla dwóch osób + zapas ciastek Ciasteczkowo na cały rok!
        </x-layout.prizeBoxGame>
        <x-layout.prizeBoxGame
            prizeCount="8x"
            prizeSize="normal"
            prizeImage="{{Vite::asset('resources/images/nagroda-2.webp')}}"
            prizeName="Zestaw gadżetów kuchennych"
            additionalClasses="flex items-center flex-col  space-y-4"
            class="flex lg:w-3/12 sm:px-4 pe-0 sm:w-1/2 mt-6 lg:mt-0 w-full">
            i&nbsp;słodyczy Ciasteczkowo
        </x-layout.prizeBoxGame>
        <x-layout.prizeBoxGame
            prizeCount="56x"
            prizeSize="normal"
            prizeImage="{{Vite::asset('resources/images/nagroda-3.webp')}}"
            prizeName="Pudełko"
            additionalClasses="flex items-center flex-col  space-y-4"
            class="flex lg:w-3/12 sm:px-4 pe-0 sm:w-1/2 mt-6 lg:mt-0 w-full">
            pełne pysznych ciasteczek
        </x-layout.prizeBoxGame>
</div>


<div class="buttons  text-center mt-20">
    <x-layout.link id="contestButton" class="button w-fit mt-20px-4 transition-colors duration-500 uppercase" href="#form">
        weź udział!
    </x-layout.link>
</div>

