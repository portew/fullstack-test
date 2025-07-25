<footer {{$attributes->merge(['class' => ''])}}>
    <div class="xl:w-1200 lg:w-960 w-full px-3 sm:px-0 m-auto py-10">
        <div class="flex space-y-6 items-center justify-between w-11/12 m-auto flex-col sm:flex-row text-center sm:text-start">
            <div class="flex flex-col w-auto items-center sm:items-start">

                <x-layout.link id="menbotrules" class="text-xxl my-1 text-black" target="_blank" href="#">Regulamin</x-layout.link>

                <x-layout.link id="menbotprivacy" class="text-xxl my-1 text-black" target="_blank" href="#">Polityka prywatności</x-layout.link>
                <x-layout.link id="menbotcookies" class="text-xxl my-1 text-black" target="_blank" href="#">Polityka cookies</x-layout.link>
            </div>
            <div class="flex flex-col justify-between w-auto items-center sm:items-start ">
                <div class="flex  flex-col items-center sm:items-start ">
                    <x-layout.paragraph class="text-cookie-green text-xl text-start">KONTAKT:</x-layout.paragraph>
                    <x-layout.paragraph class="text-black text-xl text-start mt-6">Organizator:</x-layout.paragraph>
                    <x-layout.paragraph class="text-black text-xl text-start">about ad sp. z o.o.
                    </x-layout.paragraph>
                    <x-layout.paragraph class="text-black text-xl text-start">ul. Śląska 14, 60-614 Poznań
                    </x-layout.paragraph>
                    <x-layout.link id="menbotemail" class="text-black text-xl mt-4  text-start transform-none" href="mailto:konkurs@example.com">konkurs@example.com</x-layout.link>
                </div>
            </div>
        </div>
    </div>
</footer>

