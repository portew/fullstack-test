<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Store;

class Register extends Component
{
    public $stores;

    public function __construct()
    {
        $this->stores = Store::all();
    }

    public function render(): View|Closure|string
    {
        return view('components.forms.register');
    }
}
