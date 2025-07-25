<div class="flex flex-col text-center basis-[25%]">
    <div class="rounded-full w-12 h-12 flex items-center justify-center m-auto">
        <x-layout.paragraph class="text-4xl">{{$ruleNumber}}</x-layout.paragraph>
    </div>
    <x-layout.heading class="xl:text-5xl lg:text-4xl text-5xl mt-6 font-bold">{{$ruleName}}</x-layout.heading>
    <x-layout.paragraph class="font-sans mt-2 xl:text-xl lg:text-lg text-xl ">{{$slot}}</x-layout.paragraph>
</div>
