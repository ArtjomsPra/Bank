<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;

class CurrencyController extends Controller
{

    public function index()
    {
        $currencies = Currency::all();

        return view('currencies', compact('currencies'));
    }

}
