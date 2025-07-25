@props(['placeholder' => '', 'old' => ''])

<div class="flex items-center rounded-2xl bg-cookie-misty-rose px-4 py-3 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-cookie-verdigris">
    <textarea
        required
        minlength="100"
        maxlength="1000"
        name="contest-answer"
        id="contest-answer"
        rows="8"
        class="block min-w-0 font-normal grow pl-1 pr-3 text-xxl placeholder:text-black focus:outline focus:outline-0 font-sans resize-none border-0 sha shadow-none bg-cookie-misty-rose"
        placeholder="{{$placeholder}}">{{ $old ?? '' }}</textarea>
</div>
