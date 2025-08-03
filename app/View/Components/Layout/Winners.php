<?php

namespace App\View\Components\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\ReceiptRegistration;

class Winners extends Component
{

    public $winners;

    public function __construct()
    {
      $this->winners = ReceiptRegistration::winners();
    }


    public function render(): View|Closure|string
    {
        return view('components.layout.winners');
    }
}
