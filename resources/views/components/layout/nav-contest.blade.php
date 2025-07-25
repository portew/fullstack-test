<nav class="xl:w-1200 lg:w-960 m-auto flex items-center justify-between px-6 xl:px-8 z-10 flex-wrap lg:flex-nowrap h-full" aria-label="Global">
    <div class="flex w-3/5 lg:w-auto lg:mx-8 mx-6 max-h-full">
        <h1 class="font-serif text-3xl text-black font-bold">Ciasteczkowo</h1>
    </div>
    <button id="navbar-default-button" data-collapse-toggle="navbar-default" type="button" class="lg:hidden inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-black rounded-lg md:hidden focus:outline-none focus:ring-2 focus:ring-cookie-verdigris dark:text-white dark:hover:bg-cookie-celeste dark:focus:ring-cookie-verdigris" aria-controls="navbar-default" aria-expanded="false">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"></path>
        </svg>
    </button>
    <div class="hidden lg:flex items-center xl:gap-x-10 lg:gap-x-6 lg:flex-row flex-col w-full lg:w-auto text-center lg:text-start py-10 lg:py-0" id="navbar-default">

        <x-layout.link id="mentoptake" class="w-fit lg:w-auto bg-cookie-verdigris text-white rounded-full px-3 pt-1 pb-1 text-xxl xl:text-xxl lg:text-xl transition-colors duration-500 uppercase" href="#form">
            Weź udział
        </x-layout.link>

        <x-layout.link id="mentoprules"  href="#rules" class="text-xxl xl:text-xxl lg:text-xl w-fit lg:w-auto text-black uppercase">Zasady</x-layout.link>
        <x-layout.link id="mentopprizes"  href="#prizes" class="text-xxl xl:text-xxl lg:text-xl w-fit lg:w-auto text-black uppercase">Nagrody</x-layout.link>
        <x-layout.link id="mentopwinners"  href="#winners" class="text-xxl xl:text-xxl lg:text-xl w-fit lg:w-auto text-black uppercase">Zwycięzcy</x-layout.link>
        <x-layout.link id="mentopcontact"  href="#footer" class="text-xxl xl:text-xxl lg:text-xl w-fit lg:w-auto text-black uppercase">Kontakt</x-layout.link>
    </div>
</nav>
