<table class="w-full max-w-xl mt-6 mx-auto text-sm text-left text-gray-800">
    <caption class="caption-top text-left text-xl font-semibold text-gray-900 pb-2">
        {{ $title }}
    </caption>
    <tbody>
        <thead>
          <td class="w-[42.5%] px-2 py-1 border border-gray-600 font-medium sm:text-lg">Imię i nazwisko</td>
          <td class="w-[27.5%] px-2 py-1 border border-gray-600 font-medium sm:text-lg">Sklep</td>
          <td class="w-[30%] px-2 py-1 border border-gray-600 font-medium sm:text-lg">Paragon</td>
        </thead>
        @foreach ($winners as $winner)
            <tr>
                <td class="w-[42.5%] px-2 py-1 border border-gray-600 text-xs sm:text-base">{{$winner->participant_name}}</td>
                <td class="w-[27.5%] px-2 py-1 border border-gray-600 text-xs sm:text-base">{{ empty($winner->store) ? 'brak' : $winner->store->name}}</td>
                <td class="w-[30%] px-2 py-1 border border-gray-600 text-xs sm:text-base">{{$winner->receipt_number}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
