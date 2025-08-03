<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Mail\UserRegistrationMail;
use App\Models\ReceiptRegistration;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class ActivationController extends Controller
{
    public function index() {
        return view('index');
    }


    public function storeReceipt(Request $request): RedirectResponse
    {

        $rules = [
            'participant-name' => ['required', 'min:3'],
            'email' => 'required|email',
            'phone' => 'required|min:9',
            'store' => ['required', 'integer', 'min:0', Rule::exists('stores', 'id')],
            'receipt-number' => 'required|min:4',
            'purchase-date' => [
                'required',
                'date_format:d-m-Y',
                function ($attribute, $value, $fail) {
                    $minDate = \Carbon\Carbon::createFromFormat('d-m-Y', '23-07-2025');
                    $maxDate = \Carbon\Carbon::createFromFormat('d-m-Y', '22-08-2025');

                    try {
                        $inputDate = \Carbon\Carbon::createFromFormat('d-m-Y', $value);

                        if ($inputDate->lt($minDate)) {
                            $fail('Data zakupu nie może być wcześniejsza niż ' . $minDate->format('d.m.Y') . '.');
                        }

                        if ($inputDate->gt($maxDate)) {
                            $fail('Data zakupu nie może być późniejsza niż ' . $maxDate->format('d.m.Y') . '.');
                        }
                    } catch (\Exception $e) {
                        $fail('Niepoprawny format daty zakupu.');
                    }
                },

            ],
            'receipt-image' => 'required|image|mimes:jpeg,png,jpg|max:25600|dimensions:min_width=600,min_height=800',
            'contest-answer' => 'required|min:100|max:1000',
            'consent-regulations' => 'accepted',
            'consent-rodo' => 'accepted'
        ];

        $messages = [
            'participant-name.required' => 'Podaj swoje imię i nazwisko.',
            'participant-name.min' => 'Imię i nazwisko musi mieć co najmniej 3 znaki.',

            'email.required' => 'Podaj swój adres e-mail.',
            'email.email' => 'Podany adres e-mail jest nieprawidłowy.',

            'phone.required' => 'Podaj numer telefonu.',
            'phone.min' => 'Numer telefonu jest za krótki.',

            'receipt-number.required' => 'Wpisz numer paragonu.',
            'receipt-number.min' => 'Numer paragonu musi zawierać co najmniej 4 znaki.',

            'store.required' => 'Wybierz sklep z którego pochodzi paragon',
            'store.exists' => 'Sklep musi pochodzić z listy dostępnych sklepów.',

            'purchase-date.required' => 'Podaj datę zakupu.',
            'purchase-date.date_format' => 'Data zakupu musi być w formacie dzień-miesiąc-rok (np. 24-04-2025).',

            'receipt-image.required' => 'Dołącz zdjęcie paragonu.',
            'receipt-image.image' => 'Plik z paragonem musi być obrazem.',
            'receipt-image.mimes' => 'Dozwolone formaty zdjęcia paragonu to: JPG, JPEG lub PNG.',
            'receipt-image.max' => 'Zdjęcie paragonu może mieć maksymalnie 25 MB.',
            'receipt-image.dimensions' => 'Zdjęcie paragonu musi mieć co najmniej 800x600 pikseli.',

            'contest-answer.required' => 'Odpowiedz na pytanie konkursowe.',
            'contest-answer.min' => 'Odpowiedź konkursowa musi mieć co najmniej 100 znaków.',
            'contest-answer.max' => 'Odpowiedź konkursowa może mieć maksymalnie 1000 znaków.',

            'consent-regulations.accepted' => 'Musisz zaakceptować regulamin, aby wziąć udział w konkursie.',
            'consent-rodo.accepted' => 'Musisz wyrazić zgodę na przetwarzanie danych osobowych.',
            'cf-turnstile-response.required' => 'Potwierdź, że nie jesteś robotem.',
        ];


        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            Log::info('Nieudana walidacja formularza konkursowego.', [
                'ip' => $request->ip(),
                'email' => $request->input('email'),
                'errors' => $validator->errors()->all(),
            ]);

            return redirect('/#form')
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'W formularzu wystąpiły błędy.');
        }

        $validated = $validator->validated();

        $purchaseDate = \Carbon\Carbon::createFromFormat('d-m-Y', $validated['purchase-date'])->format('Y-m-d');

        // Zapisz obrazek
        $receiptImagePath = $request->file('receipt-image')->store('receipts', 'public');
        Log::info('Obraz paragonu zapisany.', [
            'email' => $validated['email'],
            'path' => $receiptImagePath,
        ]);

        // Zapisz dane do bazy
        $registration = ReceiptRegistration::create([
            'participant_name' => $validated['participant-name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'receipt_number' => $validated['receipt-number'],
            'purchase_date' => $purchaseDate,
            'receipt_image_path' => $receiptImagePath,
            'contest_answer' => $request->input('contest-answer'),
            'consent_regulations' => $request->has('consent-regulations'),
            'consent_rodo' => $request->has('consent-rodo'),
            'consent_external' => $request->has('consent-external'),
            'referrer' => $request->cookie('initial_referrer'),
            'landing_url' => $request->cookie('initial_landing'),
            'ip_address' => $request->ip()
        ]);

        Mail::to($registration->email)->send(new UserRegistrationMail($registration));

        Log::info('Zgłoszenie konkursowe zapisane pomyślnie.', [
            'id' => $registration->id,
            'email' => $registration->email,
            'ip' => $request->ip(),
        ]);

        $request->session()->flash('register-success', 'Gratulacje! Pomyślnie zarejestrowaliśmy Twoją odpowiedź konkursową.');

        return redirect('/#form');
    }


}
