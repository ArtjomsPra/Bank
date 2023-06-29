<?php

namespace Database\Seeders;

use App\Models\CryptoCurrency;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class CryptoCurrencySeeder extends Seeder
{

    public function run()
    {
        $response = Http::withHeaders([
            'X-CMC_PRO_API_KEY' => env('COINMARKETCAP_API_KEY'),
        ])->get('https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest', [
            'limit' => 20,
            'convert' => 'EUR',
        ]);

        $data = $response->json();

        foreach ($data['data'] as $crypto) {
            CryptoCurrency::create([
                'name' => $crypto['name'],
                'rate' => $crypto['quote']['EUR']['price'],
            ]);
        }
        DB::table('crypto_currencies')->update(['updated_at' => now()]);
    }
}
