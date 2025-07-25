<div {{$attributes->merge(['class' => ' lg:flex-row flex-col items-center justify-center'])}}>
    <div class="flex flex-col items-center  w-full hover-scale">
        <div class="{{$additionalClasses}} relative">
            <img class="max-w-none hover-scale-target w-[10rem] sm:w-[12rem] lg:w-[13rem]" src="{{$prizeImage}}" alt="">
            <x-layout.prizeBoxCount class=" left-[-3%] bottom-2 absolute {{$prizeSize === 'normal' ? 'w-[4rem] h-[4rem]' : 'w-[7rem] h-[7rem] big'}}">{{$prizeCount}}</x-layout.prizeBoxCount>
        </div>
        <x-layout.heading class="font-bold xl:text-4xl lg:text-3xl text-3xl  mt-6">{!! $prizeName !!}</x-layout.heading>
        <x-layout.paragraph class="font-sans mt-2 xl:text-xl lg:text-lg text-xl ">{{$slot}}</x-layout.paragraph>
    </div>
</div>
