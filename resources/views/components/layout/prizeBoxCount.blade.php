<div {{$attributes->merge(['class' => 'bg-cookie-misty-rose rounded-full flex items-center justify-center '])}}>
    <p class="{{str_contains($attributes['class'], 'big') ? 'text-5xl ' : 'text-4xl '}} text-black">
        {{$slot}}
    </p>
</div>
