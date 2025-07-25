<a {{ $attributes->merge(['class' => ' pt-1 leading-[normal]']) }}>
    @if(str_contains($attributes['class'], 'button'))
        @if(str_contains($attributes['class'], 'big'))
            <x-layout.button class="uppercase text-2xl rounded-full py-8 px-16 bg-cookie-verdigris text-white hover:text-black hover:bg-cookie-celeste big">{{$slot}}</x-layout.button>
        @else
            <x-layout.button class="uppercase text-2xl rounded-full py-8 px-16 bg-cookie-verdigris text-white hover:text-black hover:bg-cookie-celeste">{{$slot}}</x-layout.button>
        @endif
    @else
        {{$slot}}
    @endif
</a>

