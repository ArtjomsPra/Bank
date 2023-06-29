<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CryptoCurrency;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class CryptoCurrencyController extends Controller
{

    public function index(Request $request)
    {
        $cryptocurrencies = CryptoCurrency::all();

        return view('crypto', compact('cryptocurrencies'));
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'rate' => 'required',
        ]);

        $cryptocurrency = CryptoCurrency::create($data);

        return redirect('/cryptocurrencies')->with('success', 'Cryptocurrency created successfully!');
    }
}
