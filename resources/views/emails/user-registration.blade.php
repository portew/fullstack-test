@extends('emails.layout')

@section('title', 'Ciasteczkowo! - potwierdzenie rejestracji paragonu')

@section('content')
    <p><strong>Mamy to!</strong></p>

    <p>Twoje zgłoszenie zostało przyjęte. Dziękujemy za rejestrację paragonu na stronie <a href="#" target="_blank">Ciasteczkowo</a>.</p>

    <p>Oto szczegóły dotyczące rejestracji Twojego paragonu:</p>

    <ul>
        <li><strong>Numer paragonu:</strong> {{ $entry->receipt_number }}</li>
        <li><strong>Data zakupu:</strong> {{ \Carbon\Carbon::parse($entry->purchase_date)->format('d.m.Y') }}</li>
    </ul>

    <p>Jeśli zauważysz jakiekolwiek błędy w swoich danych lub masz pytania, skontaktuj się z nami pod adresem: <a href="mailto:konkurs@example.com">konkurs@example.com</a>.</p>

    <p><strong>Pamiętaj, aby zachować oryginał paragonu do końca trwania promocji.</strong></p>

    <hr>

    <p><strong>Zespół about ad</strong></p>
@endsection
